<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 16/02/2016
 * Time: 11:48 AM
 */

namespace crmcomercial\Repositories;

use crmcomercial\Entities\Categoria;


class CategoriasRepository
{
    public function getCategorias()
    {
        return Categoria::where('cate_eliminado','=',0)
            -> lists('cate_nombre', 'cate_codigo');
    }

    public function getCategoriaspotenciales()
    {
        return Categoria::where('cate_eliminado','=',0)
            ->where('cate_codigo','<=',2)
            -> lists('cate_nombre', 'cate_codigo');
    }

    public function getCategoriasAll(){
        return Categoria::all();
    }
}