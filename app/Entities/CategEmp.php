<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class CategEmp extends Model
{
    protected $table = 'ComCategEmp';

    protected $primaryKey = 'cat_codigo';

    public $timestamps = false;
    public $fillable = ['cat_nombre'];
}