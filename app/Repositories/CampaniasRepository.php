<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 16/02/2016
 * Time: 12:52 PM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\Campania;

class CampaniasRepository
{
    public function getCampanias()
    {
        return Campania::where('cam_eliminado','=',0)->lists('cam_nombre', 'cam_codigo');
    }

    public function getCampaniaAll(){
        return Campania::all();
    }

    public function getCampaniaById($id)
    {
        return Campania::where('cam_codigo', '=', $id)->first();
    }
}