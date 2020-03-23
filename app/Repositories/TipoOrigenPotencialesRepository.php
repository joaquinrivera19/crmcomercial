<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 09/08/2016
 * Time: 12:36 PM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\TipoOrigenPotenciales;

class TipoOrigenPotencialesRepository
{
    public function getTipoOrigenPotenciales()
    {
        return TipoOrigenPotenciales::where('top_eliminado','=',0)-> lists('top_nombre', 'top_codigo');
    }

}