<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 08/03/2016
 * Time: 09:24 AM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\Provincia;

class ProvinciaRepository
{
    public  function getProvincia($pais)
    {
        return Provincia::where('prov_pais', '=', $pais)->lists('prov_nombre','prov_codigo','prov_pais');
    }

    public function getProvinciasAll($pais)
    {
        return Provincia::where('prov_pais', '=' , $pais)->get();
    }

    public function getProvinciassAll()
    {
        return Provincia::lists('prov_nombre','prov_codigo');
    }
}