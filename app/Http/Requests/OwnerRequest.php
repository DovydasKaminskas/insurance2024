<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OwnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|min:2|max:32|',
            'surname' => 'required|string|min:2|max:32|',
            'phone' => [
                'required',
                'string',
                'max:20',
                'regex:/^\\+?[0-9]{1,20}$/',
            ],
            'email'=> [
                'required',
                'string',
                'max:50',
                'regex:/(.*)@gmail\.com$/i',
            ],
            'address' => 'required|string|max:60',
        ];
        if($this->isMethod('post')) { // jeigu esame create faile, taikome unique, jeigu esame edit faile - netaikome.
            $rules['phone'][] = Rule::unique('owners');
            $rules['email'][] = Rule::unique('owners');
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'name'=>__("Name is required and must be 2-32 letters long"),
            'surname'=>__("Surname is required and must be 2-32 letters long"),
            'phone.required'=>__("Phone is required"),
            'phone.max'=>__("Phone number should not exceed 20 numbers"),
            'phone.unique'=>__("Phone already exits"),
            'phone.regex'=>__("Phone number should only contain numbers"),
            'email.required'=>__("Email is required"),
            'email.max'=>__("Email should not exceed 50 symbols"),
            'email.unique'=>__("Email already exists"),
            'email.regex'=>__("Email should end with @gmail.com"),
            'address'=>__("Address is required and should not exceed 60 characters")
        ];

    }
}
