<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 20/07/2016
 * Time: 10:16 AM
 */

namespace crmcomercial\Repositories;

use crmcomercial\Entities\ConfProvActual;

class ConfProvActualRepository
{
    public function getConfProvActual()
    {
        return ConfProvActual::orderBy('cpa_codigo', 'desc')->lists('cpa_nombre', 'cpa_codigo');
    }
}