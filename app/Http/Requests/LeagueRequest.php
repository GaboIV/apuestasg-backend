<?php

namespace App\Http\Requests;

use App\Helpers\Functions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LeagueRequest extends FormRequest
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

    public function attributes()
    {
        return [
            'name' => 'nombre de liga',
            'name_uk' => 'nombre web de liga',
            'description' => 'descripción',
            'category_id' => 'categoría',
            'country_id' => 'país',
            'url' => 'Link de ruta'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:leagues,name',
            'name_uk' => 'string',
            'description' => 'string',
            'category_id' => 'required|numeric',
            'country_id' => 'required|numeric',
            'url' => 'nullable|string|unique:leagues,url'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw  new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => Functions::getValidatorMessage($validator),
        ], 422));
    } 
}
