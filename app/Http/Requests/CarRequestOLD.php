<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequestOLD extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function messages()
    {
        return [
            'reg_number.required'=>'Registracijos numeris yra privalomas',
            'reg_number.unique'=>'Toks registracijos numeris jau egzistuoja',
            'reg_number.regex'=>'Registracijos numeris turi atitikti šabloną: ABC123',
            'brand'=>'Markės pavadinimas yra privalomas ir turi būti nuo 2 iki 32 simbolių ilgio',
            'model'=>'Modelio pavadinimas yra privalomas ir turi būti nuo 2 iki 32 simbolių ilgio',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'reg_number' => 'required|string|unique:cars|regex:/^[A-Z]{3}[0-9]{3}$/',
            'brand'=> 'required|string|min:2|max:32',
            'model'=>'required|string|min:2|max:32'
        ];
    }
}
