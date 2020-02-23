<?php

namespace blogArticulo\Http\Requests;

use blogArticulo\Http\Requests\Request;

class UsuarioFormRequest extends Request
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
            'email' => 'required | max:225',
            'password' => 'min:6|max:100',
            'imagen' => 'mimes: jpg,jpeg,bmp,png',
        ];
    }
}
