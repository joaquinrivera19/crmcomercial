<?php

namespace crmcomercial\Http\Requests;

use crmcomercial\Http\Requests\Request;

class SistemaRequest extends Request
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
            'sist_nombre' => 'required|max:50'
        ];
    }
}
