<?php

namespace App\Console\Commands;

use App\League;
use App\Country;
use App\Category;
use App\Racecourse;
use App\Jobs\SyncLeagueJob;
use App\Jobs\SyncCareersJob;
use Illuminate\Console\Command;

class SyncCareers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:careers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Careers for day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
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
                SyncCareersJob::dispatch($racecourse, date('m-d-Y'));
            }
        }
    }
}
