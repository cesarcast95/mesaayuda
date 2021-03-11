<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceRequest extends FormRequest
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
     * @return int
     */
    public function rules()
    {
        return [
            'code'=>'required|max:50',
            'name'=>'required|max:50',
            'os_id'=>'required|max:100',
            'state_device_id'=>'required|max:25',
            'serie'=>'required|max:25',
            'licencia'=>'required|max:25',
            'ip'=>'required|max:50|ip|',
            'mac'=>'required|max:50|',
            'dependence_id'=>'required', 'max:100',
            'categoryHW_id'=>'required',
            'personal_id'=>'required',
            'brand_id'=>'required'
        ];
    }
}
