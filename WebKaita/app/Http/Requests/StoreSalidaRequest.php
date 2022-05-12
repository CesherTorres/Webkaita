<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalidaRequest extends FormRequest
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
            'motivo_id' => 'required',
            'store_id' => 'required',
            'cliente_id' => 'required',
            'chofer_id' => 'required',
            'fecha' => 'required',
            'total_product' => 'required',
            'nro_serie_guia' => 'required',
            'nguia' => 'required',
        ];

        return $rules;
    }
}

           
           
