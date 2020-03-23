<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 08/03/2016
 * Time: 10:05 AM
 */

namespace crmcomercial\Repositories;

use crmcomercial\Entities\Actividad;

class ActividadRepository
{
    public function getActividad()
    {
        return Actividad::where('act_eliminado','=',0)->lists('act_nombre','act_codigo') ;
    }

    public function getActividadAll(){
        return Actividad::all();
    }
}