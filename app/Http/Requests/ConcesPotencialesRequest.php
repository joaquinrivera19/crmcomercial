<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 22/03/2016
 * Time: 10:58 AM
 */

namespace crmcomercial\Http\Requests;

use crmcomercial\Http\Requests\Request;


class ConcesPotencialesRequest extends Request
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
            'cpp_nombre' => 'required|max:50',
            'cpp_codpos1' => 'required',
            'localidad' => 'required'

        ];
    }
}