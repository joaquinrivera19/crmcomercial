<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'ComProducto';

    protected $primaryKey = 'prod_codigo';

    public $timestamps = false;

    public $fillable = ['prod_clasprod','prod_nombre','prod_tipo','prod_abrevia'];

    /**
     * Un contacto tiene una clase de producto
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function clasesProducto()
    {
        return $this->belongsTo('crmcomercial\Entities\ClasesProducto', 'prod_clasprod');
    }
}
