<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $table = 'ComProvincia';

    protected $primaryKey = 'prov_codigo';

    public $timestamps = false;
    public $fillable = ['prov_nombre','prov_pais'];

    /**
     * Una provincia pertenece a un país
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pais(){
        return $this->belongsTo('crmcomercial\Entities\Pais', 'prov_pais');
    }
}
