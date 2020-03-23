<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 08/03/2016
 * Time: 09:17 AM
 */

namespace crmcomercial\Repositories;

use crmcomercial\Entities\Pais;

class PaisRepository
{
    public function getPais()
    {
        return Pais::lists('pais_nombre','pais_codigo');
    }
}