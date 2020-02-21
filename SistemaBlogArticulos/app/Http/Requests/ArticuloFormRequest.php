<?php

namespace blogArticulo\Http\Requests;

use blogArticulo\Http\Requests\Request;

class ArticuloFormRequest extends Request
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
            'titulo' => 'required | max:40',
            'cabecera' => 'required | max:100',
            'cuerpo' => 'required | max:400',
            'imagen' => 'mimes: jpg,jpeg,bmp,png',
            'idTipoArticulo' => 'required',
        ];
    }
}
