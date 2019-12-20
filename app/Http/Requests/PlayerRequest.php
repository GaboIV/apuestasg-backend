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
            'language_id' => 'idioma de preferencia',
            'timezone' => 'franja horaria',
            'format_quot' => 'formato de cuotas de preferencia',
            'name' => 'nombre',
            'lastname' => 'apellidos',
            'birthday' => 'fecha de nacimiento',
            'password' => 'contraseña',
            'password_confirmation' => 'verificación de password',
            'code_security' => 'código de seguridad',
            'code_security_confirmation' => 'verificación de código de seguridad',
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
            'document_type' => 'required|string|in:V,E',
            'document_number' => 'required|numeric',
            'name' => 'required|string',
            'lastname' => 'required|string',
            'birthday' => 'required|date',
            'password' => 'required|min:6|confirmed',
            'code_security' => 'required|min:4|confirmed',
            'email' => 'required|email|unique:users,email',
            // 'gender' => 'required|'.Rule::in(Player::$genders),
            // 'state' => 'required|string',
            // 'city' => 'required|string',
            // 'parish' => 'required|string',
            'phone' => 'string|unique:players,phone',
            // 'address' => 'string',
            'nick' => 'required|string|unique:users,nick',
            'language_id' => 'required|numeric',
            'timezone' => 'required|string',
            'format_quot' => 'required|numeric',
            'country_id' => 'required|numeric',
            'treatment' => 'required|string',
            // 'browser' => 'string',
            // 'ip' => 'string'
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
