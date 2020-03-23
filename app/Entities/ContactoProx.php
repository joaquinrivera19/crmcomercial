<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class ContactoProx extends Model
{
    protected $table = 'ComContactoProx';

    protected $primaryKey = 'comp_codigo';

    public $timestamps = false;

    public $fillable = [
        'comp_fechaprox',
        'comp_vendeprox',
        'comp_detalleprox',
        'comp_usuarioprox'
    ];
    /**
     * Un contacto próximo pertenece a un prospecto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prospecto()
    {
        return $this->belongsTo('crmcomercial\Entities\Prospecto', 'comp_prospecto');
    }

    /**
     * Un contacto próximo pertenece a un contacto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contacto()
    {
        return $this->belongsTo('crmcomercial\Entities\Contacto', 'comp_contacto');
    }

    /**
     * Un contacto tiene un vendedor
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendedor()
    {
        return $this->belongsTo('crmcomercial\Entities\Vendedor', 'comp_vendeprox');
    }

    /**
     * Un contacto tiene un producto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->hasOne('crmcomercial\Entities\Producto', 'prod_codigo');
    }

}
