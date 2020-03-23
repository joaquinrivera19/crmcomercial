<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 08/03/2016
 * Time: 10:29 AM
 */

namespace crmcomercial\Repositories;

use crmcomercial\Entities\Sistema;

class SistemaRepository
{
    public function getSistema()
    {
        return Sistema::where('sist_eliminado','=',0)-> lists('sist_nombre','sist_codigo');
    }

    public function getSistemasAll()
    {
        return Sistema::all();
    }
}