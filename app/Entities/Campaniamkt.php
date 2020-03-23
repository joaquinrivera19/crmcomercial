<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Campaniamkt extends Model
{
    protected $table = 'ComCampaniamkt';

    protected $primaryKey = 'camk_codigo';

    public $timestamps = false;
    public $fillable = ['camk_descripcion','camk_url','camk_feccarga','camk_estado','camk_foto','camk_abrevia','camk_url_img'];
}