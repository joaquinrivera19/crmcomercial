<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 16/02/2016
 * Time: 12:45 PM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\Encuesta;

class EncuestaRepository
{
    public function getEncuesta()
    {
        return Encuesta::where('enc_estado', '=',0)->lists('enc_nombre', 'enc_codigo');
    }
}