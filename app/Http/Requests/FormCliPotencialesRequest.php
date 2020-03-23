<?php

namespace crmcomercial\Http\Requests;

use crmcomercial\Http\Requests\Request;

class FormCliPotencialesRequest extends Request
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
/*            'con_nombre' => 'required',
            'cpp_codpos1' => 'required',
            'cpp_marca' => 'required',
            'cpc_valorsist' => 'required',
            'cpc_valorimpl' => 'required',*/
            'cpc_fecha' => 'required',
            'cpc_detallecont' => 'required'
        ];
    }
}
