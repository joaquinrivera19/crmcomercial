<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 16/02/2016
 * Time: 01:47 PM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\Financiacion;

class FinanciacionRepository
{
    public function getFinanciacion()
    {
        return Financiacion::lists('fin_nombre', 'fin_codigo');
    }
 }