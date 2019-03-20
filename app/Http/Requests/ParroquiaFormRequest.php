<?php

namespace sisElecciones\Http\Requests;

use sisElecciones\Http\Requests\Request;

class ParroquiaFormRequest extends Request
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
            'nombre'=>'required|unique:parroquia|max:45',
            'tipo'=>'required|max:45',
            'idcanton'=>'required',
        ];
    }
}
