<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
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
        $rules = [
            'name' => 'required|unique:productos',
            'codigo' => 'required|unique:productos',
            'temperatura' => 'required',
            'descripcion' => 'required',
            'beneficios' => 'required',
            'imagen' => 'required',
            'category_id' => 'required',
            'medida_id' => 'required',
            'tipo_id' => 'required',
            'marca_id' => 'required',
        ];

        return $rules;
    }
}
