<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 16/02/2016
 * Time: 01:38 PM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\Vendedor;

class VendedorRepository
{
    public function getVendedores()
    {
        return Vendedor::where('ven_estado','=',1)->lists('ven_nombre', 'ven_codigo');

    }
    public function getVendedorAll(){
        return Vendedor::all();
    }
}