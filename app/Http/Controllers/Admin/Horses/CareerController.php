<?php

namespace App\Http\Controllers\Admin\Horses;

use App\Horse;
use App\Career;
use App\Jockey;
use App\Trainer;
use App\Racecourse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inscription;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sync()
    {
        // $racecourse = Racecourse::findOrFail($id);

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', request()->url)->getBody();

        $response = str_replace('\\\\', '', $response);
        $response = str_replace('\\"', '"', $response);
        $response = str_replace('"{', '{', $response);
        $response = str_replace('}"', '}', $response);

        $data = json_decode($response, true);

        $career_data = $data['Data'];

        $postdate = date_create_from_format('F, d Y H:i:s', $career_data['post']);

        $career = Career::firstOrCreate([
            "number" => $career_data['number'],
            "posttime" => date_format($postdate, 'Y-m-d H:i:s')
        ],
        [
            "code" => "GF20488",
            "title" => $career_data['raceDescription'],
            "racecourse_id" => 4,
        ]);

        foreach ($career_data['starters'] as $key => $ins) {
            $jockey = (object) $ins['jockey'];
            
            $jockey = Jockey::firstOrCreate(
                [
                    "name" => trim($jockey->firstName . (($jockey->middleName != '') ? " " . $jockey->middleName : '') . " " . $jockey->lastName)
                ],
                [
                    "name_id" => trim($jockey->firstName . (($jockey->middleName != '') ? " " . $jockey->middleName : '') . " " . $jockey->lastName),
                    "country_id" => 242
                ]
            );

            $trainer = (object) $ins['trainer'];
            
            $trainer = Trainer::firstOrCreate(
                [
                    "name" => trim($trainer->firstName . (($trainer->middleName != '') ? " " . $trainer->middleName : '') . " " . $trainer->lastName)
                ],
                [
                    "name_id" => trim($trainer->firstName . (($trainer->middleName != '') ? " " . $trainer->middleName : '') . " " . $trainer->lastName),
                    "country_id" => 242
                ]
            );

            $horse = (object) $ins['horse'];
            
            $horse = Horse::firstOrCreate(
                [
                    "name" => str_replace('0027', '\'', $horse->name)
                ],
                [
                    "sex" => ($horse->sex == 'Filly') ? 'F' : 'M'
                ]
            );

            Inscription::updateOrCreate(
                [
                    "career_id" => $career->id,
                    "number" => $ins['programNumber']
                ],
                [
                    "horse_id" => $horse->id,
                    "jockey_id" => $jockey->id,
                    'trainer_id' => $trainer->id,
                    'position' => $ins['postPosition'],
                    'odd' => $ins['morningLineOdds']
                ]
            );
        }        
    }
}
