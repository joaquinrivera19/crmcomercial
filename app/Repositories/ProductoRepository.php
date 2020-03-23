<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 16/02/2016
 * Time: 12:35 PM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\Producto;

class ProductoRepository
{
    public function getProductos()
    {
        return Producto::where('prod_eliminado','=',0)-> lists('prod_nombre', 'prod_codigo');
    }

    public function getProductoAll(){
        return Producto::all();
    }

    public function getProductosPorClase($clase)
    {
        return Producto::where('prod_clasprod', '=', $clase)->where('prod_eliminado','=',0)->get();
    }
}