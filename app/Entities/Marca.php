<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'ComMarca';

    protected $primaryKey = 'mar_codigo';

    public $timestamps = false;
    public $fillable = ['mar_nombre'];
}
