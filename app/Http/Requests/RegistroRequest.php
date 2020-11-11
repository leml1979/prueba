<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
{
    protected $redirectRoute='registro';
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'rif' => ['required', 'string','min:10', 'max:10','regex:/(^([VJGNPEC]+)(\d+)?$)/u','unique:users,rif'],
            //'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:dns','unique:users,email'],
        ];
    }

    public function messages(){
        return [
            'rif.required'=>'El :attribute es obligatorio',
            'rif.min'=>'El :attribute debe contener un mínimo de 10 caracteres',
            'rif.max'=>'El :attribute debe contener un máximo de 10 caracteres',
            'rif.regex'=>'El formato del :attribute es invalido',
            'email.dns'=>'El formato del :attribute es invalido',
        ];
    }

    public function attributes(){

        return [
            'email'=>'correo',
        ];
    }
}
