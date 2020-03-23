<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class TipoMarca extends Model
{
    protected $table = 'ComTipoMarca';

    protected $primaryKey = 'tmar_codigo';

    public $timestamps = false;
    public $fillable = ['tmar_nombre'];
}
