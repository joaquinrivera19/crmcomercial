<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 16/02/2016
 * Time: 12:57 PM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\TipoOrigen;

class TipoOrigenRepository
{
    public function getTipoOrigen()
    {
        return TipoOrigen::where('to_eliminado','=',0)-> lists('to_nombre', 'to_codigo');
    }
    public function getTipoOrigenAll()
    {
        return TipoOrigen::all();
    }
}