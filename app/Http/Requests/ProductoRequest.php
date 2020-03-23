<?php

namespace crmcomercial\Http\Requests;

use crmcomercial\Http\Requests\Request;

class ProductoRequest extends Request
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
            'prod_clasprod' => 'required|in: 1,2',
            'prod_nombre'   => 'required|max:255',
            'prod_tipo'     => 'required|max:255',
            'prod_abrevia'  => 'required|max:50'
        ];
    }
}
