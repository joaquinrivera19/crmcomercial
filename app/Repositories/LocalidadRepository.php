<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 21/03/2016
 * Time: 13:02
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\Localidad;

class LocalidadRepository
{
    public function getLocalidades($codPostal1, $codPostal2)
    {
        return Localidad::where('loc_codpostal1', '=', $codPostal1)
                         ->where('loc_codpostal2', '=', $codPostal2)
                         ->get();
    }

    public function getLocalidadAll()
    {
        return Localidad::all();
    }

    public function getLocalidadesAll()
    {
        return Localidad::all();
    }
}