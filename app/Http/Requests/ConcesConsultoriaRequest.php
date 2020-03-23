<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 10/04/2017
 * Time: 11:43 AM
 */

namespace crmcomercial\Http\Requests;

class ConcesConsultoriaRequest extends Request
{

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
            'con_codigo' => 'required|unique:conces|min:1|max:6',
            'con_nombre' => 'required|min:3|max:50'
        ];
    }

}