<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Conces extends Model
{
    protected $table = 'conces';

    protected $primaryKey = 'con_codigo';

    public $timestamps = false;

    public $fillable = ['con_codigo','con_nombre','con_marca','con_codpos1','con_telefono','con_email','con_eliminado'];
}
