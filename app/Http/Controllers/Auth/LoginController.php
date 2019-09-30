<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ApiController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends ApiController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login (LoginRequest $request) {
        $nick = $request->nick;
        $password = $request->password;

        $user = User::where('nick', $nick)->first() ?? null;
      
        if (! $user->status)
            return $this->errorResponse("Su cuenta se encuentra inhabiltada.", 403);        
        
        if (! $user->hasRole('player')) {
            return $this->errorResponse("Usuario identificado como usuario de comercio. Por favor diríjase a la aplicación respectiva.", 403); 
        }
        
        $validatePassword = Hash::check($password, $user->password);

        if (!$validatePassword) 
            return $this->errorResponse("La contraseña que ingresaste es incorrecta. Inténtalo de nuevo.", 403);

        $tokenResult = $user->createToken('Pl@y3rTok3n');
        $token = $tokenResult->token;
        $token->save();

        $data = array(
            'access_token' => $tokenResult->accessToken,
            'user' => $user
        );        
        
        return $this->successResponse($data, 200);
    }
}
