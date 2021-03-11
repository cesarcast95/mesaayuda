<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncidenceRequest extends FormRequest
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
            'description'=>'required|min:30',
            'evidence'=>'required|image|mimes:jpeg,bmp,png,jpg',
            'state_id'=>'required|integer',
            'device_id'=>'required|integer',
            'score'=>'required',
            'diagnostic'=>'required',
            'functionary_id'=>'required|integer',
            'usuario_id'=>'required|integer'
        ];
    }
}
