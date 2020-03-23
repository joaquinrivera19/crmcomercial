<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class EstadoProspecto extends Model
{
    protected $table = 'ComEstadoProspecto';

    protected $primaryKey = 'epr_codigo';

    public $timestamps = false;

    public $fillable = ['epr_nombre'];
}
