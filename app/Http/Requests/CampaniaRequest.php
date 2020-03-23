<?php

namespace crmcomercial\Http\Requests;

use crmcomercial\Http\Requests\Request;

class CampaniaRequest extends Request
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
            'cam_nombre' => 'required|max:150',
            'cam_fecini' => 'required',
            'cam_fecfin' => 'required|after:cam_fecini',
            'cam_abrevia' => 'max:50'
        ];
    }
}
