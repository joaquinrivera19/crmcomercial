<?php

namespace crmcomercial\Http\Requests;

use crmcomercial\Http\Requests\Request;
use Illuminate\Routing\Route;

class VendedorUpdateRequest extends Request
{

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

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
            'username' => 'Required|max:50|unique:ComVendedor,username,' . $this->route->getParameter('vendedor') .',ven_codigo',
            'ven_email' => 'Required|Between:3,255|Email|unique:ComVendedor,ven_email,' . $this->route->getParameter('vendedor')  .',ven_codigo',
            'password' => 'Min:6|Confirmed|Regex:/^([a-z0-9!@#$€£%^&*_+-])+$/i',
            'password_confirmation' => 'Min:6'
        ];
    }
}
