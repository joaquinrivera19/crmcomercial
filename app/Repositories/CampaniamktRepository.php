<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 24/10/2016
 * Time: 09:10 AM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\Campaniamkt;

class CampaniamktRepository
{
    public function getCampaniamkt()
    {
        return Campaniamkt::all();
    }



    public function getCampaniamktlist()
    {
        $results = '';
        $queries = \DB::table('ComCampaniamkt')
            ->get();

        foreach ($queries as $query) {

            $cod = $query->camk_codigo;
            $des = $query->camk_descripcion;
            $url = $query->camk_url;
            $est = $query->camk_estado;
            $results .= $cod. '|' .$des.'|' .$url.'|' .$est. "\r\n";
        }

        return ($results);
    }



    public function getSigCod()
    {
        $max = \DB::table('comcampaniamkt')
            ->select(\DB::raw('MAX(camk_codigo) as maximo'))
            ->first();

        if ($max == null) {
            return $max = 1;
        } else {
            return $sig = $max->maximo + 1;
        }

    }

}