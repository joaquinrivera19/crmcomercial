<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 16/02/2016
 * Time: 12:27 PM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\ClasesProducto;

class ClasesProductoRepository
{
    public function getClasesProducto()
    {
        return ClasesProducto::orderBy('cp_codigo', 'desc')->lists('cp_nombre', 'cp_codigo');
    }
}