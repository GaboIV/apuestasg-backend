<?php

namespace App\Jobs;

use App\Game;
use App\Team;
use App\BetType;
use App\Country;
use App\Competitor;
use App\Racecourse;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncRacecoursesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;
    public $league;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($league)
    {
        $this->league = $league; 
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client(['verify' => false, 'headers' => [
            'Content-Type' => 'text/plain'
        ]]);

        $sync_date = date('m-d-Y');

        $url = 'https://www.drf.com/results/raceTracks/page/entries/date/' . $sync_date;

        $data = json_decode($client->request('GET', $url)->getBody()) ?? null; 
        
        $tracks = array_merge($data->raceTracks->topTracks, $data->raceTracks->allTracks);
        
        foreach ($tracks as $key => $rc) {

            $racecourse = Racecourse::whereAcro($rc->trackId)->with('country')->first();

            if (! $racecourse) {
                $country = Country::where('acro_3', $rc->country)->first();

                if ($country) {
                    $racecourse = Racecourse::create([
                        "name" => $rc->trackName,
                        "location" => $country->id,
                        "acro" => $rc->trackId,
                        "origin" => "DRF",
                        "url" => null
                    ]);

                    $racecourse->load('country');
                }
            }

            if ($racecourse) {
                $this->dispatch(new SyncCareersJob($racecourse, date('m-d-Y')));
            }
        }
    }
}
