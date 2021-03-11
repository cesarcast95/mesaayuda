<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUsuario extends FormRequest
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

        /*Si va a modificar el usuario no va a ser requerido cambiar la contraseña
        Si es una creación de usuario sí se requerirá*/
        if($this->route('id')){
            return[
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $this->route('id'),
                'password' => 'nullable|min:8',
                're_password' => 'nullable|required_with:password|same:password',
                'rol_id' => 'required|array'
            ];
          
        }else{
            return [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $this->route('id'),
                'password' => 'required|min:8',
                're_password' => 'required|min:8|same:password',
                'rol_id' => 'required|array'
            ];
        }

    }
}
