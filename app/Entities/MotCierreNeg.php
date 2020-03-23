<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class MotCierreNeg extends Model
{
    protected $table = 'ComMotCierreNeg';

    protected $primaryKey = 'mcn_codigo';

    public $timestamps = false;
}
