<?php

namespace crmcomercial\Http\Requests;

use crmcomercial\Http\Requests\Request;

class FormRequest extends Request
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
            'con_nombre' => 'required',
            'pro_vendedor' => 'required',
            'pro_producto' => 'required',
            'comp_fechaprox' => 'required',
            'comp_vendeprox' => 'required',
            'comp_detalleprox' => 'required'
        ];
    }
}
