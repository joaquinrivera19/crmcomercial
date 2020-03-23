<?php

namespace crmcomercial\Http\Requests;

use crmcomercial\Http\Requests\Request;

class ActividadRequest extends Request
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
            'act_nombre' => 'required|max:50',
            'act_abrevia' => 'required|max:50'
        ];
    }
}
