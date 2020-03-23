<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 16/02/2016
 * Time: 01:43 PM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\ModPrestacion;

class ModPrestacionRepository
{
    public function getModPrestacion()
    {
        return ModPrestacion::lists('mpr_nombre', 'mpr_codigo');
    }
}