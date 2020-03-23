<?php

namespace crmcomercial\Http\Requests;

use crmcomercial\Entities\Vendedor;
use crmcomercial\Http\Requests\Request;

class VendedorCreateRequest extends Request
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
            'ven_nombre' => 'Required|Min:3|Max:255|Regex:/^[a-z-.]+( [a-z-.]+)*$/i',
            'username' => 'Required|max:50|unique:ComVendedor',
            'ven_email' => 'Required|Between:3,255|Email|unique:ComVendedor',
            'password' => 'Required|Min:6|Confirmed|Regex:/^([a-z0-9!@#$€£%^&*_+-])+$/i',
            'password_confirmation' => 'Required|Min:6'
        ];
    }

}
