<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            
          
             
            'name'=>'string|required|unique:products,name,'.$this->route('product')->id.'|max:250',


            
            'sell_price'=>'required',
            'category_id'=>'integer|required',
            'provider_id'=>'integer|required',
            

    ];
    
}
public function messages()
    {
        return[
            'name.required'=>'Este campo es requerido',
            'name.string'=>'El valor no es correcto',
            'name.unique'=>'El producto ya esta registrado', 
            'name.max'=>'Solo se permiten 250 caracteres',

           

            'sell_price.required'=>'Este campo es requerido',

            'category_id.integer'=>'El valor tiene que ser entero',
            'category_id.required'=>'El campo es requerido',
            'category_id'=>'La categoria no existe',
           
            'provider_id.integer'=>'El valor tiene que ser entero',
            'provider_id.required'=>'El campo es requerido',
            'provider_id'=>'EL provedor no existe',
        ];
    
}
}
