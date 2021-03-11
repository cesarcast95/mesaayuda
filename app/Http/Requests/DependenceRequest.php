<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DependenceRequest extends FormRequest
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
            'name'=>'required|max:50|unique:dependence',
            'description'=>'required', 'max:100',
            'ip1'=>'required|max:15|ip|unique:dependence',
            'ip2'=>'required|max:15|ip|unique:dependence',
        ];
    }
}
