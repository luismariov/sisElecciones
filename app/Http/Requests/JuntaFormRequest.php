<?php

namespace sisElecciones\Http\Requests;

use sisElecciones\Http\Requests\Request;

class JuntaFormRequest extends Request
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
            'numero'=>'required',
            'tipo'=>'required',
            'idrecinto'=>'required',        ];
    }
}
