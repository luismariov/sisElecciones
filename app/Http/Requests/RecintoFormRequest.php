<?php

namespace sisElecciones\Http\Requests;

use sisElecciones\Http\Requests\Request;

class RecintoFormRequest extends Request
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
            'nombre'=>'required|unique:recinto|max:45',
            'totvotantes'=>'required',
            'idparroquia'=>'required',
        ];
    }
}
