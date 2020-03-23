<?php

namespace crmcomercial\Http\Requests;

use crmcomercial\Http\Requests\Request;

class VendedorRequest extends Request
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
            'ven_nombre' => 'required',
            'username' => 'required|unique|max:50',
            'ven_password' => 'required|confirmed',
            'password_confirmation' => 'required|same:ven_password',
            'ven_email' => 'required|email|unique',
        ];
    }
}
