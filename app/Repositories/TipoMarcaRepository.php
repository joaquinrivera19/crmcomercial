<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 08/03/2016
 * Time: 10:55 AM
 */

namespace crmcomercial\Repositories;

use crmcomercial\Entities\TipoMarca;

class TipoMarcaRepository
{
    public function getTipoMarca()
    {
        return TipoMarca::lists('tmar_nombre','tmar_codigo');
    }
}