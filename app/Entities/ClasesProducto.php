<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class ClasesProducto extends Model
{
    protected $table = 'ComClasesProducto';

    protected $primaryKey = 'cp_codigo';

    public $timestamps = false;


}
