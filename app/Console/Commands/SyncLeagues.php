<?php

namespace App\Console\Commands;

use App\League;
use App\Category;
use App\Jobs\SyncLeagueJob;
use Illuminate\Console\Command;

class SyncLeagues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:leagues';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Leagues for 48 hrs';

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

        $url = 'https://sports.tipico.de/json/program/navigationTree/48hrs';

        $data = json_decode($client->request('GET', $url)->getBody());

        foreach ($data->children as $key => $category) {
            $category_ids[] = $category->icon;

            $category_db = Category::whereNameId($category->icon)->first();

            if ($category)
                $categories[] = $category_db;

            foreach ($category->children as $key => $country) {
                foreach ($country->children as $key => $league) {
                    $leagues[] = (int) $league->groupId;
                }
            }

            $query_league = League::orderBy('name');

            foreach( $leagues as $league_item) {
                // $query_league->orWhereRaw("JSON_CONTAINS(name_uk, ?)", $league_item);

                $query_league->orWhere('name_uk', 'like', '%'.$league_item.'%');
            }

            $leagues_db = $query_league->get();

            foreach ($leagues_db as $key => $league_job) {
                $job_league = new SyncLeagueJob($league_job);
                \Log::info($league_job->name);
                dispatch($job_league);
            }

            $leagues_db = [];
            $leagues = [];
        }
    }
}
