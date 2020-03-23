<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'ComCategoria';

    protected $primaryKey = 'cate_codigo';

    public $timestamps = false;

    public $fillable = ['cate_nombre','cate_abrevia'];
}
