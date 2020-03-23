<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Financiacion extends Model
{
    protected $table = 'ComFinanciacion';

    protected $primaryKey = 'fin_codigo';

    public $timestamps = false;

}
