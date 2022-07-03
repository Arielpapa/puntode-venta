<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'string|required|max:250',
            'dni'=>'string|required|unique:clients,dni,'.$this->route('client')->id.'|min:8|max:8',
            'ruc'=>'string|required|unique:clients,ruc,'.$this->route('client')->id.'|min:8|max:10',
            'address'=>'string|required|max:250',
            'phone'=>'string|required|unique:clients,phone,'.$this->route('client')->id.'|min:8|max:10',
            'email'=>'string|required|unique:clients,email,'.$this->route('client')->id.'|max:250|email:rfc,dns'
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Solo se permiten 250 caracteres',

            'dni.string'=>'El valor no es correcto',
            'dni.required'=>'Este campo es requerido',
            'dni.max'=>'Solo se permiten 8 caracteres',
            'dni.min'=>'Solo se permiten 8 caracteres',
            'dni.unique'=>'El DNI ya se encuentra registrado',

            'ruc.string'=>'El valor no es correcto',
            'ruc.max'=>'Solo se permiten 10 caracteres',
            'ruc.min'=>'Solo se permiten 10 caracteres',
            'ruc.unique'=>'El ruc ya se encuentra registrado',

            'address.string'=>'El valor no es correcto',
            'address.max'=>'Solo se permiten 250 caracteres',

            'phone.string'=>'El valor no es correcto',
            'phone.max'=>'Solo se permiten 10 caracteres',
            'phone.min'=>'Solo se permiten 8 caracteres',
            'phone.unique'=>'El ruc ya se encuentra registrado',

            'email.string'=>'El valor no es correcto',
            'email.max'=>'Solo se permiten 250 caracteres',
            'email.unique'=>'El EMAIL ya se encuentra registrado',
            'email.email'=>'No es un correo electronico',

        ];
    
    }
    
}
