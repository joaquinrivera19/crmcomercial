<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 22/02/2016
 * Time: 08:49 AM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\MotCierreNeg;

class MotCierreNegRepository
{
    public function getMotCierreNeg()
    {
        return MotCierreNeg::orderBy('mcn_codigo', 'desc')->lists('mcn_nombre', 'mcn_codigo');
    }
}