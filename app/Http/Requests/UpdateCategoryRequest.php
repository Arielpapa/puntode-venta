<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name'=>'required|string|max:50',
            'description'=>'nullable|string|max:250'
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.max'=>'Solo se permiten 50 caracteres', 
         
            'description.string'=>'El valor no es correcto', 
            'description.max'=> 'Solo se permiten 250 caracteres'
        ];
    }
}
