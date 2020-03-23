<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class ContactoProxCliPot extends Model
{
    protected $table = 'ComCliPotencialesContProx';

    protected $primaryKey = 'cpcp_codigo';

    public $timestamps = false;

    public $fillable = [
        'cpcp_fechaprox',
        'cpcp_vendeprox',
        'cpcp_detalleprox',
        'cpcp_usuarioprox'
    ];
    /**
     * Un contacto pr�ximo pertenece a un prospecto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prospecto()
    {
        return $this->belongsTo('crmcomercial\Entities\Prospecto', 'cpcp_prospecto');
    }

    /**
     * Un contacto pr�ximo pertenece a un contacto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contacto()
    {
        return $this->belongsTo('crmcomercial\Entities\Contacto', 'cpcp_contacto');
    }

    /**
     * Un contacto tiene un vendedor
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendedor()
    {
        return $this->belongsTo('crmcomercial\Entities\Vendedor', 'cpcp_vendeprox');
    }
}
