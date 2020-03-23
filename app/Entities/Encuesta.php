<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    protected $table = 'ComEncuesta';

    protected $primaryKey = 'enc_codigo';

    public $timestamps = false;

}
