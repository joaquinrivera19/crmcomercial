<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoOrigen extends Model
{
    protected $table = 'ComTipoOrigen';

    protected $primaryKey = 'to_codigo';

    public $timestamps = false;

    public $fillable = ['to_nombre'];
}
