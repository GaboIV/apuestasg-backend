<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Pay;
use App\Selection;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PlayerController extends ApiController 
{
    public function updatePersonal(Request $request) 
    {
        $data = $request->except('document_number', 'document_type');
        $user = Auth::user();
        $player = $user->player;

        if (isset($data['nick'])){
            $nick = User::whereNick($data['nick'])->Where('id', '!=', $user->id)->first();
            
        	if ($nick) {
        		return $this->errorResponse("Este nombre de usuario no está disponible", 409); 
            }
            
            if (isset($data['password_old']) && $data['password_old'] != '') 
            {
                $validatePassword = Hash::check($data['password_old'], $user->password);
                
        		if (!$validatePassword) {
	        		return $this->errorResponse("La contraseña actual ingresada no es correcta", 409); 
                }
                
	        	$validator = Validator::make($request->all(), [
		            'password' => 'required|min:6|confirmed'
		        ]);

		        if ($validator->fails()) {
		            return $this->errorResponse("La contraseña nueva ingresada no cumple los requisitos", 409);
		        }
        	}

            if (isset($data['code_security_old']) && $data['code_security_old'] != '') 
            {
                $validateCode = Hash::check($data['code_security_old'], $user->code_security);
                
        		if ($user->code_security != '' && $user->code_security != '0') {
        			if (!$validateCode) {
		        		return $this->errorResponse("El número de seguridad actual ingresado no es correcto", 409); 
		        	}
        		}
        		
	        	$validator = Validator::make($request->all(), [
		            'code_security' => 'required|min:4|max:4|confirmed'
		        ]);

		        if ($validator->fails()) {
		            return $this->errorResponse("El número de seguridad nuevo ingresado no cumple los requisitos", 409);
		        }
        	}

        	if (strlen($data['password']) < 6) unset($data['password']);
        	if (strlen($data['code_security']) < 4) unset($data['code_security']);
        	
        	$user->update($data);
        }

        $player->update($data);

        $user->load;
        $user->player;

        return $this->successResponse([
            'status' => 'success',
            'user' => $user,
            'data' => $data
        ], 200);
    }

    public function registerPay(Request $request) {
        $data = $request->all();
        $user = Auth::user();
        $player = $user->player;

        $pay_exist = Pay::whereReference($data['reference'])
        ->wherePlayerId($player->id)
        ->first();

        if ($pay_exist) {
            return $this->errorResponse("Ya has registrado un pago con esta referencia.", 409);
        }

        // $data['register_date'] = $data['register_date'] + " " + $data['registro'];

        $data['code'] = substr(md5(rand()),0,15);
        $data['player_id'] = $player->id;
        $data['email'] = $user->email;
        $data['status'] = 0;

        $pay = Pay::create($data);

        $result = array(
            "status" => "correcto",
            "pay" => $pay
        );

        return $this->successResponse($result, 200);
    }

    public function getTransactions() {
        $user = Auth::user();
        $player = $user->player;

        $transactions = Transaction::wherePlayerId($player->id)
        ->orderBy('created_at', 'desc')
        ->paginate(50);

        $result = array(
            "status" => "correcto",
            "transactions" => $transactions
        );

        return $this->successResponse($result, 200);
    }

    public function getPays() {
        $user = Auth::user();
        $player = $user->player;

        $pays = Pay::wherePlayerId($player->id)
        ->orderBy('created_at', 'desc')
        ->paginate(50);

        $result = array(
            "status" => "correcto",
            "pays" => $pays
        );

        return $this->successResponse($result, 200);
    }
}
