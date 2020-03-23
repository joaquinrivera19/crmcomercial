<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 18/10/2016
 * Time: 11:52 AM
 */

namespace crmcomercial\Repositories;

use crmcomercial\Entities\HistReplanifica;

class HistReplanificaRepository
{
    public function getHistReplanifica()
    {
        return HistReplanifica::all();
    }

    public function getHistReplanificaProsPoten($prospecto)
    {
        return HistReplanifica::select('hir_feccar','hir_vendedor', 'hir_motivo')
            ->where('hir_proscod', '=', $prospecto)
            ->where('hir_tipoprospecto','=',2)
            ->orderBy('hir_feccar', 'desc')
            ->get();
    }

    public function getHistReplanificaProsConsul($prospecto)
    {
        return HistReplanifica::select('hir_feccar','hir_vendedor', 'hir_motivo')
            ->where('hir_proscod', '=', $prospecto)
            ->where('hir_tipoprospecto','=',1)
            ->orderBy('hir_feccar', 'desc')
            ->get();
    }

}