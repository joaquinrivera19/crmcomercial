<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoOrigenPotenciales extends Model
{
    protected $table = 'ComTipoOrigenPotenciales';

    protected $primaryKey = 'top_codigo';

    public $timestamps = false;

    public $fillable = ['top_nombre'];
}
