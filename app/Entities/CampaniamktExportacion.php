<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class CampaniamktExportacion extends Model
{
    protected $table = 'ComCampaniamktExportacion';

    protected $primaryKey = 'camex_idconces';

    public $timestamps = false;
    public $fillable = ['camex_idconces','camex_idcampania','camex_usuario','camex_idsistema','camex_fecha'];
}