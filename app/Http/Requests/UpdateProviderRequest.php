<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProviderRequest extends FormRequest
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
            'nombre'=>'required|string|max:250',

            'email'=>'required|string|unique:providers,email,'.$this->route('provider')->id.'|max:250',

            'telefono'=>'required|string|min:8|unique:providers,telefono,'.$this->route('provider')->id.'|max:10',

            'ruc_number'=>'required|string|min:8|unique:providers,ruc_number,'.$this->route('provider')->id.'|max:8',

            'direccion'=>'nullable|string|max:250',
         
        ];
    }

    public function messages()
        {
            return[
                'nombre.required'=>'Este campo es requerido',
                'nombre.string'=>'El valor no es correcto',
                'nombre.max'=>'Solo se permiten 50 caracteres', 
             
                'email.required'=>'Este campo es requerido',
                'email.email'=>'No es un correo electronico',
                'email.string'=>'El valor no es correcto',
                'email.max'=>'Solo se permiten 250 caracteres', 
                'email.unique'=>'El correo ya se encuentra registrado',

                'ruc_number.required'=>'Este campo es requerido',
                'ruc_number.string'=>'El valor no es correcto',
                'ruc_number.max'=>'Solo se permiten 8 caracteres', 
                'ruc_number.min'=>'Solo se permiten 8 caracteres', 
                'ruc_number.unique'=>'El correo ya se encuentra registrado',
             
                'direccion.string'=>'El valor no es correcto',
                'direccion.max'=>'Solo se permiten 250 caracteres', 

                'telefono.required'=>'Este campo es requerido',
                'telefono.string'=>'El valor no es correcto',
                'telefono.max'=>'Solo se permiten 10 caracteres', 
                'telefono.min'=>'Solo se permiten 8 caracteres', 
                'telefono.unique'=>'El telefono ya se encuentra registrado'
            ];
        }
}