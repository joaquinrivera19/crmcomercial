<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoContac extends Model
{
    protected $table = 'ComTipoContac';

    protected $primaryKey = 'tco_codigo';

    public $timestamps = false;

    public $fillable = ['tco_codigo','tco_nombre','tco_codcat'];
}
