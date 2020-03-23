<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $table = 'ComSistemas';

    protected $primaryKey = 'sist_codigo';

    public $timestamps = false;
    public $fillable = ['sist_nombre'];

    /**
     * Relaci�n a la tabla intermedia
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sistema()
    {
        return $this->belongsToMany('crmcomercial\Entities\ContactoCliPot', 'ComSisCont');
    }
}
