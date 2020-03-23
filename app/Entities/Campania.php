<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Campania extends Model
{
    protected $table = 'ComCampania';

    protected $primaryKey = 'cam_codigo';

    public $timestamps = false;
    public $fillable = ['cam_nombre','cam_fecini','cam_fecfin','cam_estado','cam_abrevia'];
}
