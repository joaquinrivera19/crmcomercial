<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class ModContacto extends Model
{
    protected $table = 'ComModContacto';

    protected $primaryKey = 'mco_codigo';

    public $timestamps = false;

    public $fillable =['mco_nombre'];
}
