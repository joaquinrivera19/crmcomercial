<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 16/02/2016
 * Time: 01:06 PM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\ProbCierre;

class ProbCierreRepository
{
    public function getProbCierre()
    {
        return ProbCierre::orderBy('pci_codigo')
            ->lists('pci_nombre', 'pci_codigo');
    }
}