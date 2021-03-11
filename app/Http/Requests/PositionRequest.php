<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
        return [
            // validacion para que en la tabla menu
            // en el campo nombre no hayan dos registros iguales
            // Esto se hace para poder editar de forma correcta
            'name'=>'required|max:50',
            'description'=>'required', 'max:100',
            'dependence_id'=>'required', 'max:100'
        ];
    }
}
