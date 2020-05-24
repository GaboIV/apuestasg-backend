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

            // dd($url_1);

            $tracks_1 = json_decode($client->request('GET', $url_1)->getBody());    

            $tracks_2 = json_decode($client->request('GET', $url_2)->getBody()); 
                
            // dd($tracks_1);

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

                // $s = $raceKey->raceDate->year . "-" . ($raceKey->raceDate->month + 1) . "-" . $raceKey->raceDate->day . " " . $trk->postTime;
                // $stro_date = strtotime($s);
                $posttime = date('Y-m-d H:i:s', ($trk->postTimeLong / 1000)); 

                $career = Career::updateOrCreate([
                    "racecourse_id" => $racecourse->id,
                    "date" => date('Y-m-d', ($trk->postTimeLong / 1000)),
                    "number" => $raceKey->raceNumber
                ],[
                    "name" => trim($trk->raceClass) . ", " . trim($trk->sexRestrictionDescription) . ", " . trim($trk->ageRestrictionDescription),
                    "title" => $trk->raceTypeDescription,
                    "posttime" => $posttime,
                    "distance" => number_format($distance, 0, '.', ''),
                    "surface" => $surface ?? null,
                    "status" => 1,
                    "grade" => null,
                    "purse" => $trk->purse,
                    "age_restriction" => $trk->ageRestrictionDescription,
                    "sex_restriction" => $trk->sexRestrictionDescription,
                    "record" => null
                ]);

                // dd($tracks_2->tracks[$key_trk]->runners);

                foreach ($tracks_2->tracks[$key_trk]->runners as $ins) { 
                    
                    if (isset($ins->jockey)) {
                        $jockey = $ins->jockey;

                        $jockeyName = trim(($jockey->firstName ? $jockey->firstName . " " : "") . ($jockey->lastName ? $jockey->lastName . " " : ""));

                        $jockey = Jockey::firstOrCreate(
                            [ "name" =>  $jockeyName],
                            [ "name_id" => $jockeyName, "country_id" => $racecourse->country->id ]
                        );
                    }

                    if ($ins->trainer) {     
                        $trainer = $ins->trainer;

                        $trainerName = trim(($trainer->firstName ? $trainer->firstName . " " : "") . ($trainer->lastName ? $trainer->lastName . " " : ""));

                        $trainer = Trainer::firstOrCreate(  
                            [ "name" =>  $trainerName],
                            [ "name_id" => $trainerName, "country_id" => $racecourse->country->id ]                    
                        );
                    } else {
                        $jockey = null;
                    }

                    // if ($trk->sexRestrictionDescription == 'Horses' || $trk->sexRestrictionDescription == 'Geldings' || $trk->sexRestrictionDescription == 'Colts') {
                    //     $sexHorse = "M";
                    // } elseif ($trk->sexRestrictionDescription == 'Mares' || $trk->sexRestrictionDescription == 'Fillies' || $trk->sexRestrictionDescription == 'Females') {
                    //     $sexHorse = "F";
                    // } else {
                    //     $sexHorse = "N";
                    // }
                    
                    $horse = Horse::updateOrCreate(
                        [
                            "name" => $ins->name
                        ],
                        [
                            "sex" => $ins->gender ?? null,
                            "color" => $ins->color ?? null,
                            "birthday" => (isset($ins->yearOfBirth)) ? $ins->yearOfBirth . "-01-01" : null
                        ]
                    );
        
                    Inscription::updateOrCreate(
                        [
                            "career_id" => $career->id,
                            "number" => $ins->programNumber
                        ],
                        [
                            "horse_id" => $horse->id,
                            "jockey_id" => $jockey->id ?? null,
                            'trainer_id' => $trainer->id,
                            'position' => $ins->postPosition,
                            'odd' => $ins->MLOdd ?? 0,
                            'weight' => (round(($ins->wtCarried / 2.205) * 2) / 2),
                            'medicines' => $ins->medication ?? null,
                            'implements' => $ins->equipment ?? null
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
