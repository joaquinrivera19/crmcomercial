<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 16/02/2016
 * Time: 01:00 PM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\EstadoProspecto;

class EstadoProspectoRepository
{
    public function getEstado()
    {
        return EstadoProspecto::lists('epr_nombre', 'epr_codigo');
    }
}