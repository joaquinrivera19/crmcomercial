<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'ComActividad';

    protected $primaryKey = 'act_codigo';

    public $timestamps = false;
    public $fillable = ['act_nombre','act_abrevia'];
}
