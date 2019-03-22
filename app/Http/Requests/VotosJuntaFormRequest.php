<?php

namespace sisElecciones\Http\Requests;

use sisElecciones\Http\Requests\Request;

class VotosJuntaFormRequest extends Request
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
          'idcandidato'=>'required',
          'dignidad'=>'required',
          'canton'=>'required',
          'parroquia'=>'required',
          'recinto'=>'required',
          'junta'=>'required|unique:VotosJunta',
          'totalvotos'=>'required|int'
        ];
    }
}
