<?php

namespace App\Jobs;

use App\Game;
use App\Team;
use App\Horse;
use App\Career;
use App\Jockey;
use App\BetType;
use App\Trainer;
use App\Competitor;
use App\Inscription;
use App\Helpers\Functions;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SyncCareersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;
    public $racecourse;
    public $date;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($racecourse, $date)
    {
        $this->racecourse = $racecourse; 
        $this->date = $date;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $racecourse = $this->racecourse;

        if (isset($racecourse)) {
            $client = new \GuzzleHttp\Client(['verify' => false, 'headers' => [
                'Content-Type' => 'text/plain'
            ]]);

            $date = $this->date;

            $date_2 = explode("-", $date);

            $url_1 = 'https://www.drf.com/entries/entryDetails/id/' . $racecourse->acro . '/country/' . $racecourse->country->acro_3 . '/date/' . $date;

            $url_2 = 'https://xpbapi.drf.com/races/'. $date_2['2'] . "-" . $date_2['0'] . "-" . $date_2['1'] . '/track/' . $racecourse->acro;

            $tracks_1 = json_decode($client->request('GET', $url_1)->getBody());    

            $tracks_2 = json_decode($client->request('GET', $url_2)->getBody()); 

            \Log::info([$url_1, $url_2]);

            foreach ($tracks_1->races as $key_trk => $trk) {
                if ($trk->distanceUnit == ''){
                    $data_trk = explode("|", $trk->raceTypeDescription);

                    if (strpos(strtolower($data_trk[0]), "f") != false){
                        $trk->distanceUnit = "F";
                        $distance_explode = explode("f", trim($data_trk[0]));
                        $trk->distanceValue = Functions::parseFraction($distance_explode[0]);
                    } elseif (strpos(strtolower($data_trk[0]), "m") != false){
                        $trk->distanceUnit = "M";
                        $distance_explode = explode("m", trim($data_trk[0]));
                        $trk->distanceValue = Functions::parseFraction($distance_explode[0]);
                    } else {
                        $trk->distanceUnit = "MT";
                        $trk->distanceValue = trim($data_trk[0]);
                    }
                }
                
                if ($trk->distanceUnit == "F") {
                    $distance = ($trk->distanceValue) * 201;
                } elseif ($trk->distanceUnit == "Y") {
                    $distance = ($trk->distanceValue / 1.094);
                } elseif ($trk->distanceUnit == "M") {
                    $distance = $trk->distanceValue * 1609.34;
                } elseif ($trk->distanceUnit == "MT") {
                    $distance = $trk->distanceValue;
                }             

                if ($trk->surfaceDescription == "Turf") {
                    $surface = "Grama";
                } elseif ($trk->surfaceDescription == "Dirt") {
                    $surface = "Arena";
                }

                $raceKey = $trk->raceKey;

                if ($trk->postTimeLong < 1577836800000) {
                    $posttime = date('Y-m-d H:i:s', (($trk->raceKey->raceDate->date + $trk->postTimeLong) / 1000)); 
                    $postdate = date('Y-m-d', (($trk->raceKey->raceDate->date + $trk->postTimeLong) / 1000)); 
                } else {
                    $posttime = date('Y-m-d H:i:s', ($trk->postTimeLong / 1000)); 
                    $postdate = date('Y-m-d', ($trk->postTimeLong / 1000)); 
                }   

                $career = Career::updateOrCreate([
                    "racecourse_id" => $racecourse->id,
                    "date" => $postdate,
                    "number" => $raceKey->raceNumber
                ],[
                    "name" => trim($trk->raceClass) . ", " . trim($trk->sexRestrictionDescription) . ", " . trim($trk->ageRestrictionDescription),
                    "title" => $trk->raceTypeDescription,
                    "posttime" => $posttime,
                    "distance" => is_numeric($distance) ? number_format($distance, 0, '.', '') : 0,
                    "surface" => $surface ?? null,
                    "status" => 1,
                    "grade" => null,
                    "purse" => $trk->purse,
                    "age_restriction" => $trk->ageRestrictionDescription ?? null,
                    "sex_restriction" => $trk->sexRestrictionDescription ?? null,
                    "record" => null
                ]);

                if (isset($tracks_2->tracks[$key_trk]->runners)) {
                    $runners = $tracks_2->tracks[$key_trk]->runners;
                } else {
                    $runners = $trk->runners;
                }

                foreach ($runners as $key_ins => $ins) { 
                    
                    if (isset($ins->jockey)) {
                        $jockey = $ins->jockey;

                        $jockeyName = trim(($jockey->firstName ? $jockey->firstName . " " : "") . (isset($jockey->middleName) ? $jockey->middleName . " " : "") . ($jockey->lastName ? $jockey->lastName . " " : ""));

                        $jockey = Jockey::firstOrCreate(
                            [ "name" =>  $jockeyName],
                            [ "name_id" => $jockeyName, "country_id" => $racecourse->country->id ]
                        );
                    } else {
                        $jockey = null;
                    }

                    if (isset($ins->trainer)) {     
                        $trainer = $ins->trainer;

                        $trainerName = trim(($trainer->firstName ? $trainer->firstName . " " : "") . (isset($trainer->middleName) ? $trainer->middleName . " " : "") . ($trainer->lastName ? $trainer->lastName . " " : ""));

                        $trainer = Trainer::firstOrCreate(  
                            [ "name" =>  $trainerName],
                            [ "name_id" => $trainerName, "country_id" => $racecourse->country->id ]                    
                        );
                    } else {
                        $trainer = null;
                    }

                    if (!isset($ins->gender)) {
                        if ($trk->sexRestrictionDescription == 'Horses' || $trk->sexRestrictionDescription == 'Geldings' || $trk->sexRestrictionDescription == 'Colts') {
                            $ins->gender = "M";
                        } elseif ($trk->sexRestrictionDescription == 'Mares' || $trk->sexRestrictionDescription == 'Fillies' || $trk->sexRestrictionDescription == 'Females') {
                            $ins->gender = "F";
                        } else {
                            $ins->gender = "N/A";
                        }
                    }
                    
                    $horse = Horse::updateOrCreate(
                        [
                            "name" => $ins->name ?? $ins->horseName
                        ],
                        [
                            "sex" => $ins->gender ?? null,
                            "color" => $ins->color ?? null,
                            "birthday" => (isset($ins->yearOfBirth)) ? $ins->yearOfBirth . "-01-01" : null
                        ]
                    );

                    if (isset($ins->wtCarried)) {
                        $weight = (round(($ins->wtCarried / 2.205) * 2) / 2);
                    } elseif (isset($ins->wtCarried)) {
                        $weight = (round(($ins->weight / 2.205) * 2) / 2);
                    } else {
                        $weight = 0;
                    }

                    if (isset($ins->scratchIndicator)) {
                        $status = ($ins->scratchIndicator == 'Y') ? 1 : 2;
                    } elseif (isset($ins->status)) {
                        $status = ($ins->status == 'LIVE') ? 1 : 2;
                    } else {
                        $status = 1;
                    }

                    if (isset($ins->status)) {
                        $horse_active = array_filter(
                            $trk->runners,
                            function ($e) use ($ins) {
                                return $e->horseName == $ins->name;
                            }
                        );

                        if (isset($horse_active[0]->liveOdds)) {
                            $odd = $horse_active[0]->liveOdds;
                        } elseif (isset($ins->MLOdd)) {
                            $odd = $ins->MLOdd;
                        } else {
                            $odd = 0;
                        }
                    } elseif(isset($ins->scratchIndicator)) {
                        if (isset($ins->liveOdds)) {
                            $odd = $ins->liveOdds;
                        } elseif (isset($ins->morningLineOdds)) {
                            $odd = $ins->morningLineOdds;
                        } else {
                            $odd = 0;
                        }
                    }
        
                    Inscription::updateOrCreate(
                        [
                            "career_id" => $career->id,
                            "number" => $ins->programNumber
                        ],
                        [
                            "horse_id" => $horse->id,
                            "jockey_id" => $jockey->id ?? null,
                            'trainer_id' => $trainer->id ?? null,
                            'position' => $ins->postPosition ?? $ins->postPos,
                            'odd' => $odd ?? 0,
                            'weight' => $weight,
                            'medicines' => $ins->medication ?? null,
                            'implements' => $ins->equipment ?? null,
                            'status' => $status
                        ]
                    );
                }  
            }            

            return true;
        } else {
            return false;
        }
    }
}
