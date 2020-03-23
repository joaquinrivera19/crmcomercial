<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 17/02/2016
 * Time: 09:02 AM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\ModContacto;

class ModContactoRepository
{
    public function getModContacto()
    {
        return ModContacto::where('mco_eliminado','=',0)-> lists('mco_nombre', 'mco_codigo');

    }
    public function getModContactoall()
    {
        return ModContacto::all();
    }
}