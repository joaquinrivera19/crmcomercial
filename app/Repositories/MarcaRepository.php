<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 08/03/2016
 * Time: 10:20 AM
 */

namespace crmcomercial\Repositories;

use crmcomercial\Entities\Marca;

class MarcaRepository
{
    public function getMarca()
    {
        return Marca::lists('mar_nombre','mar_codigo');
    }

    public function getMarcasAll()
    {
        return Marca::all();
    }
}