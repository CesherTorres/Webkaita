<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlmacenRequest extends FormRequest
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
            'name' => 'required|unique:stores',
            'direccion' => 'required',
            'referencia' => 'required|max:100',
            'plano' => 'required',
            'fecha' => 'required',
            'ubigeo_id' => 'required',
            'descripcion' => 'max:200',
        ];

        return $rules;
    }
}
