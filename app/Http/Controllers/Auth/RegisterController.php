<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;
use App\Role;
use App\User;
use App\Player;
use App\Http\Requests\PlayerRequest;
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
        $data = $request->all();   

        $uniqueUser = Player::where('document_number', $data['document_number'])
                          ->where('document_type', $data['document_type'])
                          ->first();  

        if ($uniqueUser) 
            return $this->errorResponse("Ya existe un usuario con este tipo y número de documento", 409);

        $user = User::create($data);

        // Relación Usuario-Rol. Jugador por defecto.
        $user->roles()->attach(Role::where('name', 'player')->first());
        
        $user->player()->create($data); 
        
        $response['user'] = $user;

        return $this->successResponse($response, 201);
    }


    
}
