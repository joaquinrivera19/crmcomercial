<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class ModPrestacion extends Model
{
    protected $table = 'ComModPrestacion';

    protected $primaryKey = 'mpr_codigo';

    public $timestamps = false;
}
