<?php

namespace App\Http\Requests;

use App\Player;
use App\Helpers\Functions;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PlayerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'document_type' => 'tipo de documento',
            'document_number' => 'número de documento',
            'name' => 'nombre',
            'lastname' => 'apellidos',
            'birthday' => 'fecha de nacimiento',
            'password' => 'contraseña',
            'email' => 'correo electrónico',
            'gender' => 'género',
            'state' => 'estado',
            'city' => 'ciudad',
            'parish' => 'parroquia',
            'address' => 'dirección',
            'phone' => 'número telefónico',
            'nick' => 'nombre de usuario',
            'country' => 'pais de nacionalidad',
            'treatment' => 'tratamiento',
            'browser' => 'navegador',
            'ip' => 'IP de conexión'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'document_type' => 'required|string|in:CED,PAS',
            'document_number' => 'required|numeric',
            'name' => 'required|string',
            'lastname' => 'required|string',
            'birthday' => 'required|date_format:Y-m-d',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|'.Rule::in(Player::$genders),
            'state' => 'required|string',
            'city' => 'required|string',
            'parish' => 'required|string',
            'phone' => 'numeric|unique:players,phone',
            'address' => 'string',
            'nick' => 'required|string|unique:users,nick',
            'country' => 'required|string',
            'treatment' => 'required|string',
            'browser' => 'string',
            'ip' => 'string'
        ];
        if ($this->isMethod('PUT')) {
            $currentUser = Auth::user()->person->id;
	        $rules['password'] = '';
            $rules['email'] = 'string|email|unique:users,email,' . $currentUser;
            $rules['phone'] = 'numeric|unique:players,phone,' . $currentUser;
            $rules['document_number'] = 'required|numeric';
        }
        return $rules;
    }

    /**
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => Functions::getValidatorMessage($validator),
        ], 422));
    }
}
