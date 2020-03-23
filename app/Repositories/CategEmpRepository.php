<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 16/02/2016
 * Time: 11:48 AM
 */

namespace crmcomercial\Repositories;

use crmcomercial\Entities\CategEmp;


class CategEmpRepository
{
    public function getCategEmp()
    {
        return CategEmp::lists('cat_nombre', 'cat_codigo');
    }
    public function getCategEmpAll(){
        return CategEmp::all();
    }
}