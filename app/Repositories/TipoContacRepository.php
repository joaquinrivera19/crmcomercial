<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 17/02/2016
 * Time: 09:31 AM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\TipoContac;

class TipoContacRepository
{
    public function getTipoContac()
    {
        return TipoContac::where('tco_codigo','=',1)->lists('tco_nombre', 'tco_codigo');
    }

    public function getTipoContacPoten()
    {
        return TipoContac::where('tco_codcat','=',1)->lists('tco_nombre', 'tco_codigo');
    }

    public function getTipoContacCons()
    {
        return TipoContac::where('tco_codcat','=',6)->lists('tco_nombre', 'tco_codigo');
    }
}