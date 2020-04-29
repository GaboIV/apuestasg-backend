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

    public function syncCareers ($id) {
        $racecourse = Racecourse::find($id);

        if (isset($racecourse->url)) {
            $client = new \GuzzleHttp\Client(['verify' => base_path('cacert.pem'), 'headers' => [
                'User-Agent' => 'testing/1.0',
                'Accept' => 'application/json',
                'Content' => 'application/json'
            ]]);

            $tracks = json_decode($client->request('GET', $racecourse->url)->getBody());
        

            foreach ($tracks->AllRaces as $trk) {

                $country = Country::where('acro_2', $trk->Country)->OrWhere('acro_3', $trk->Country)->first();  

                if ($trk->DistanceUnit == "F") {
                    $distance = ($trk->Distance / 100) * 201;
                }

                if ($trk->Surface == "T") {
                    $surface = "Grama";
                } elseif ($trk->Surface == "D") {
                    $surface = "Arena";
                }

                $career = Career::updateOrCreate([
                    "racecourse_id" => $racecourse->id,
                    "date" => date("Y-m-d", strtotime($trk->PostTime)),
                    "number" => $trk->RaceNumber
                ],
                [
                    "name" => $trk->RaceName,
                    "title" => $trk->RaceConditions,
                    "time" => date("H:i:s", strtotime($trk->PostTime)),
                    "distance" => $distance,
                    "surface" => $surface,
                    "status" => 1,
                    "grade" => $trk->Grade,
                    "purse" => $trk->Purse,
                    "age_restriction" => $trk->AgeRestriction,
                    "sex_restriction" => $trk->SexRestriction,
                    "record" => $trk->TrackRecord
                ]);

                foreach ($trk->Entries as $ins) { 
                    
                    if ($ins->JockeyName) {
                        $jockey = Jockey::firstOrCreate(
                            [ "name" =>  $ins->JockeyName],
                            [ "name_id" => $ins->JockeyName, "country_id" => $country->id ]
                        );
                    }

                    if ($ins->TrainerName) {                    
                        $trainer = Trainer::firstOrCreate(  
                            [ "name" =>  $ins->TrainerName],
                            [ "name_id" => $ins->TrainerName, "country_id" => $country->id ]                    
                        );
                    }

                    if ($ins->SexDescription == 'Horse' || $ins->SexDescription == 'Gelding' || $ins->SexDescription == 'Colt') {
                        $sexHorse = "M";
                    } elseif ($ins->SexDescription == 'Mare' || $ins->SexDescription == 'Filly') {
                        $sexHorse = "M";
                    }
                    
                    $horse = Horse::updateOrCreate(
                        [
                            "name" => $ins->HorseName
                        ],
                        [
                            "sex" => $sexHorse ?? null,
                            "color" => $ins->Color ?? null,
                            "birthday" => $ins->YearOfBirth . "-01-01"
                        ]
                    );
        
                    Inscription::updateOrCreate(
                        [
                            "career_id" => $career->id,
                            "number" => $ins->ProgramNumber
                        ],
                        [
                            "horse_id" => $horse->id,
                            "jockey_id" => $jockey->id,
                            'trainer_id' => $trainer->id,
                            'position' => $ins->PostPosition,
                            'odd' => $ins->MorningLineOdds,
                            'weight' => (round(($ins->JockeyWeight / 2.205) * 2) / 2),
                            'medicines' => $ins->Medication,
                            'implements' => $ins->Equipment
                        ]
                    );
                }  
            }            

            return $this->successResponse($tracks->AllRaces, 200);
        } else {
            $this->errorResponse("Hipodromo sin link de actualización", 406);
        }
    }
}
