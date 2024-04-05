<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CarRequest extends FormRequest
{
    public function rules()
    {
        $rules = [
            'reg_number' => [
                'required',
                'string',
                'regex:/^[A-Z]{3}[0-9]{3}$/',
            ],
            'brand'=> 'required|string|min:2|max:32',
            'model'=>'required|string|min:2|max:32'
        ];

        if ($this->isMethod('post')) {
            $rules['reg_number'][] = Rule::unique('cars'); // jeigu esame create faile, taikome unique, jeigu esame edit faile - netaikome.
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'reg_number.required'=>__("Registration number is neccessary"),
            'reg_number.unique'=>__("This registration number already exits"),
            'reg_number.regex'=>__("Registration number must match this template: ABC123"),
            'brand'=>__("Brand name is neccessary and must be 2-32 symbols long"),
            'model'=>__("Model name is neccessary and must be 2-32 symbols long"),
        ];
    }
}
