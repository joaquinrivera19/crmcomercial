<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'ComPais';

    protected $primaryKey = 'pais_codigo';

    public $timestamps = false;
    public $fillable = ['pais_nombre'];
}
