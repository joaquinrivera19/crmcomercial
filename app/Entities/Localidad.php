<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table = 'ComLocalidad';

    protected $primaryKey = 'loc_codigo1';

    public $timestamps = false;

    public $fillable = ['loc_codigo1','loc_codigo2','loc_nombre'];

    /**
     * Una localidad pertenece a una provincia
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function provincia(){
        return $this->belongsTo('crmcomercial\Entities\Provincia', 'loc_provin');
    }
}
