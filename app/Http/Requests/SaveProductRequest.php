<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        // return $request->sucursales;
        return [
            "provider_id" => 'required',
            "code" => 'required',
            "name" => 'required',
            "price" => 'required|numeric',
            "stock" => 'numeric'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Hace falta el nombre del producto',
            'code.required' => 'Hace falta un código para el producto',
            'price.required' => 'El precio solo deben ser números enteros o decimales',
            'stock.numeric' => 'numeric|between:0,2000'
        ];
    }
}
