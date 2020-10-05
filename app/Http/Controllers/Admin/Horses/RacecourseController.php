<?php

namespace App\Http\Controllers\Admin\Horses;

use App\Horse;
use App\Career;
use App\Jockey;
use App\Country;
use App\Trainer;
use App\Racecourse;
use App\Inscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Jobs\SyncCareersJob;

class RacecourseController extends ApiController{
    public function index() {
        $racecourses = Racecourse::orderBy('name', 'asc')
                    ->get();

        return $this->successResponse([
            'status' => 'correcto',
            'hipodromos' => $racecourses,
            'time' => date("Y-m-d H:i:s")
        ], 200);
    }

    public function store(Request $request) {
        
    }

    public function show($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }

    public function syncRacecoursesByDate() {
        $client = new \GuzzleHttp\Client(['verify' => false, 'headers' => [
            'Content-Type' => 'text/plain'
        ]]);

        $date = request()->date;

        if (! $date) {
            return $this->errorResponse("Debe enviar una fecha de sincronización", 422);
        }

        $sync_date = $date;

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
                $this->dispatch(new SyncCareersJob($racecourse, $sync_date));
            }
        }

        return $this->successResponse($data, 200);
    }

    public function syncCareers ($id, $date) {
        ini_set('max_execution_time', 600);

        $racecourse = Racecourse::find($id);

        if (isset($racecourse)) {
            $client = new \GuzzleHttp\Client(['verify' => false, 'headers' => [
                'Content-Type' => 'text/plain'
            ]]);

            $date_2 = explode("-", $date);

            $url_1 = 'https://www.drf.com/entries/entryDetails/id/' . $racecourse->acro . '/country/' . $racecourse->country->acro_3 . '/date/' . $date;

            $url_2 = 'https://xpbapi.drf.com/races/'. $date_2['2'] . "-" . $date_2['0'] . "-" . $date_2['1'] . '/track/' . $racecourse->acro;

            // dd($url_2);

            $tracks_1 = json_decode($client->request('GET', $url_1)->getBody());    

            $tracks_2 = json_decode($client->request('GET', $url_2)->getBody()); 

            foreach ($tracks_1->races as $key_trk => $trk) {

                // $country = Country::where('acro_2', $trk->Country)->OrWhere('acro_3', $trk->Country)->first(); 

                // dd($trk);

                if ($trk->distanceUnit == ''){
                    $data_trk = explode("|", $trk->raceTypeDescription);

                    if (strpos(strtolower($data_trk[0]), "f") != false){
                        $trk->distanceUnit = "F";
                        $distance_explode = explode("f", trim($data_trk[0]));
                        $trk->distanceValue = $this->parseFraction($distance_explode[0]);
                    } elseif (strpos(strtolower($data_trk[0]), "m") != false){
                        $trk->distanceUnit = "M";
                        $distance_explode = explode("m", trim($data_trk[0]));
                        $trk->distanceValue = $this->parseFraction($distance_explode[0]);
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

                // dd($tracks_2->tracks[$key_trk]->runners);

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

            return $this->successResponse("Se sincronizaron " . count($tracks_1->races). " carreras.", 200);
        } else {
            $this->errorResponse("Hipodromo sin link de actualización", 406);
        }
    }

    public function parseFraction(string $fraction): float 
    {
        if(preg_match('#(\d+)\s+(\d+)/(\d+)#', $fraction, $m)) {
            return ($m[1] + $m[2] / $m[3]);
        } else if( preg_match('#(\d+)/(\d+)#', $fraction, $m) ) {
            return ($m[1] / $m[2]);
        }
        return (float) $fraction;
    }

    // public function syncCareers ($id) {
    //     ini_set('max_execution_time', 600);

    //     $racecourse = Racecourse::find($id);

    //     if (isset($racecourse->url)) {
    //         $client = new \GuzzleHttp\Client(['verify' => false, 'headers' => [
    //             'Content-Type' => 'text/plain'
    //         ]]);

    //         $tracks = json_decode($client->request('POST', "https://xpbapi.drf.com/races", 
    //         [ 
    //             "body" => '[{"raceKey":"GP2020-05-215","raceDate":"2020-05-21","raceNumber":6,"trackCode":"GP"}]'])->getBody());    
                
    //         dd($tracks);

    //         foreach ($tracks->AllRaces as $trk) {

    //             $country = Country::where('acro_2', $trk->Country)->OrWhere('acro_3', $trk->Country)->first();  

    //             if ($trk->DistanceUnit == "F") {
    //                 $distance = ($trk->Distance / 100) * 201;
    //             } elseif ($trk->DistanceUnit == "Y") {
    //                 $distance = ($trk->Distance / 1.094);
    //             } elseif ($trk->DistanceUnit == "M") {
    //                 $distance = $trk->Distance;
    //             }

    //             if ($trk->Surface == "T") {
    //                 $surface = "Grama";
    //             } elseif ($trk->Surface == "D") {
    //                 $surface = "Arena";
    //             }

    //             $career = Career::updateOrCreate([
    //                 "racecourse_id" => $racecourse->id,
    //                 "date" => date("Y-m-d", strtotime($trk->PostTime)),
    //                 "number" => $trk->RaceNumber
    //             ],
    //             [
    //                 "name" => $trk->RaceName,
    //                 "title" => $trk->RaceConditions,
    //                 "posttime" => date("Y-m-d H:i:s", strtotime($trk->PostTime)),
    //                 "distance" => $distance,
    //                 "surface" => $surface ?? null,
    //                 "status" => 1,
    //                 "grade" => $trk->Grade,
    //                 "purse" => $trk->Purse,
    //                 "age_restriction" => $trk->AgeRestriction,
    //                 "sex_restriction" => $trk->SexRestriction,
    //                 "record" => $trk->TrackRecord
    //             ]);

    //             foreach ($trk->Entries as $ins) { 
                    
    //                 if ($ins->JockeyName) {
    //                     $jockey = Jockey::firstOrCreate(
    //                         [ "name" =>  $ins->JockeyName],
    //                         [ "name_id" => $ins->JockeyName, "country_id" => $country->id ]
    //                     );
    //                 }

    //                 if ($ins->TrainerName) {                    
    //                     $trainer = Trainer::firstOrCreate(  
    //                         [ "name" =>  $ins->TrainerName],
    //                         [ "name_id" => $ins->TrainerName, "country_id" => $country->id ]                    
    //                     );
    //                 }

    //                 if ($ins->SexDescription == 'Horse' || $ins->SexDescription == 'Gelding' || $ins->SexDescription == 'Colt') {
    //                     $sexHorse = "M";
    //                 } elseif ($ins->SexDescription == 'Mare' || $ins->SexDescription == 'Filly' || $ins->SexDescription == 'Female') {
    //                     $sexHorse = "M";
    //                 }
                    
    //                 $horse = Horse::updateOrCreate(
    //                     [
    //                         "name" => $ins->HorseName
    //                     ],
    //                     [
    //                         "sex" => $sexHorse ?? null,
    //                         "color" => $ins->Color ?? null,
    //                         "birthday" => $ins->YearOfBirth . "-01-01"
    //                     ]
    //                 );
        
    //                 Inscription::updateOrCreate(
    //                     [
    //                         "career_id" => $career->id,
    //                         "number" => $ins->ProgramNumber
    //                     ],
    //                     [
    //                         "horse_id" => $horse->id,
    //                         "jockey_id" => $jockey->id,
    //                         'trainer_id' => $trainer->id,
    //                         'position' => $ins->PostPosition,
    //                         'odd' => $ins->MorningLineOdds,
    //                         'weight' => (round(($ins->JockeyWeight / 2.205) * 2) / 2),
    //                         'medicines' => $ins->Medication,
    //                         'implements' => $ins->Equipment
    //                     ]
    //                 );
    //             }  
    //         }            

    //         return $this->successResponse($tracks->AllRaces, 200);
    //     } else {
    //         $this->errorResponse("Hipodromo sin link de actualización", 406);
    //     }
    // }
}
