<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use App\Assist;
use App\Player;
use App\Transaction;
use App\Configuration;
use App\Jobs\SendRegisterMailJob;
use App\Http\Requests\PlayerRequest;
use App\Http\Controllers\ApiController;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createPlayer(PlayerRequest $request)
    {
        $data = $request->validated();  

        $data['ip'] = '';
        $host= $_SERVER["HTTP_HOST"];

        if (getenv('HTTP_CLIENT_IP')) {
            $data['ip'] = getenv('HTTP_CLIENT_IP');
        }
        else if(getenv('HTTP_X_FORWARDED_FOR')) {
            $data['ip'] = getenv('HTTP_X_FORWARDED_FOR');
        }
        else if(getenv('HTTP_X_FORWARDED')) {
            $data['ip'] = getenv('HTTP_X_FORWARDED');
        }
        else if(getenv('HTTP_FORWARDED_FOR')) {
            $data['ip'] = getenv('HTTP_FORWARDED_FOR');
        }
        else if(getenv('HTTP_FORWARDED')) {
           $data['ip'] = getenv('HTTP_FORWARDED');
        }
        else if(getenv('REMOTE_ADDR')) {
            $data['ip'] = getenv('REMOTE_ADDR');
        }
        else {
            $data['ip'] = 'UNKNOWN';
        }

        $uniqueUser = Player::where('document_number', $data['document_number'])
                          ->where('document_type', $data['document_type'])
                          ->first();  

        if ($uniqueUser) 
            return $this->errorResponse("Ya existe un usuario con este tipo y número de documento", 409);

        $user = User::create($data);

        if (isset($data['bonus']) && $data['bonus'] == "ENTRADA_100K_AG")
            $data['available'] = 100000;
        else 
            $data['available'] = 0;

        $data['birthday'] = date("Y-m-d", strtotime($data['birthday']));

        // Relación Usuario-Rol. Jugador por defecto.
        $user->roles()->attach(Role::where('name', 'player')->first());
        
        $user->player()->create($data); 

        $player = $user->player;

        $encab = "Usuario creado correctamente";
        $status = "success";

        if (isset($data['bonus']) && $data['bonus'] == "ENTRADA_100K_AG")
            $mstatus = "Tiene un regalo de Bs. 100.000,00 para que disfrute de la pasión de las apuestas.";
        else
            $mstatus = "Gracias por registrarte en Apuestas G";
        
        $cod_serial = substr(md5(rand()),0,32);

        $admin_email = Configuration::whereGroup('EMAIL')->whereSubgroup('REGISTER')->first()->value;

        $assist = Assist::create([
            "status" => 1,
            "email_sent_player" => $user['email'],
            "email_sent_admin" => $admin_email,
            "admin_id" => null,
            "player_id" => $player->id,
            "type" => "register"
        ]);
    
        $this->dispatch(new SendRegisterMailJob($user, $player, $admin_email, $assist->id));
       
        if (isset($data['bonus']) && $data['bonus'] == "ENTRADA_100K_AG") {
            $transaction = Transaction::create([
                "event_type_id" => 4,
                "player_id" => $player->id,
                "amount" => 100000,
                "player_balance" => 100000
            ]);
        }    

        $result = array(
            "status" => $status,
            "mstatus" => $mstatus,
            "ip" => $data['ip'],
            "titulo" => $encab
        );

        return $this->successResponse($result, 201);
    }

    public function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
            $output = NULL;
            if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
                $ip = $_SERVER["REMOTE_ADDR"];
                if ($deep_detect) {
                    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                }
            }
            $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
            $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
            $continents = array(
                "AF" => "Africa",
                "AN" => "Antarctica",
                "AS" => "Asia",
                "EU" => "Europe",
                "OC" => "Australia (Oceania)",
                "NA" => "North America",
                "SA" => "South America"
            );
            
            if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
                $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
                if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                    switch ($purpose) {
                        case "location":
                            $output = array(
                                "city"           => @$ipdat->geoplugin_city,
                                "state"          => @$ipdat->geoplugin_regionName,
                                "country"        => @$ipdat->geoplugin_countryName,
                                "country_code"   => @$ipdat->geoplugin_countryCode,
                                "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                                "continent_code" => @$ipdat->geoplugin_continentCode
                            );
                            break;
                        case "address":
                            $address = array($ipdat->geoplugin_countryName);
                            if (@strlen($ipdat->geoplugin_regionName) >= 1)
                                $address[] = $ipdat->geoplugin_regionName;
                            if (@strlen($ipdat->geoplugin_city) >= 1)
                                $address[] = $ipdat->geoplugin_city;
                            $output = implode(", ", array_reverse($address));
                            break;
                        case "city":
                            $output = @$ipdat->geoplugin_city;
                            break;
                        case "state":
                            $output = @$ipdat->geoplugin_regionName;
                            break;
                        case "region":
                            $output = @$ipdat->geoplugin_regionName;
                            break;
                        case "country":
                            $output = @$ipdat->geoplugin_countryName;
                            break;
                        case "countrycode":
                            $output = @$ipdat->geoplugin_countryCode;
                            break;
                    }
                }
            }
            return $output;
        } 


    
}
