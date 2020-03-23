<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Prospecto extends Model
{
    protected $table = 'ComProspecto';

    protected $primaryKey = 'pro_codigo';

    public $timestamps = false;

    public $fillable = [
        'pro_fechafac',
        'pro_numfac'
    ];

    /**
     * Un prospecto tiene un concesionario
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function conces()
    {
        return $this->belongsTo('crmcomercial\Entities\Conces', 'pro_conces');
    }

    /**
     * Un prospecto tiene una clase de producto
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function clasesProducto()
    {
        return $this->belongsTo('crmcomercial\Entities\ClasesProducto', 'pro_clasprod');
    }

    /**
     * Un prospecto tiene un o muchos contactos
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function contacto()
    {
        return $this->hasMany('crmcomercial\Entities\Contacto', 'coc_prospecto');
    }

    /**
     * Un prospecto tiene un contacto próximo
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contactoProx()
    {
        return $this->hasOne('crmcomercial\Entities\ContactoProx', 'comp_prospecto');
    }

    /**
     * Un prospecto tiene una categoría
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function categoria()
    {
        return $this->belongsTo('crmcomercial\Entities\Categoria', 'pro_categoria');
    }

    /**
     * Un prospecto tiene un producto
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function producto()
    {
        return $this->belongsTo('crmcomercial\Entities\Producto', 'pro_producto');
    }

    /**
     * Un prospecto tiene un tipo origen
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function tipoOrigen()
    {
        return $this->belongsTo('crmcomercial\Entities\TipoOrigen', 'pro_tiporig');
    }

    /**
     * Un prospecto tiene un vendedor
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function vendedor()
    {
        return $this->belongsTo('crmcomercial\Entities\Vendedor', 'pro_vendedor');
    }

    /**
     * Un prospecto pertenece a una campaña
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function campania()
    {
        return $this->belongsTo('crmcomercial\Entities\Campania', 'pro_nombrecamp');
    }

    /**
     * Un prospecto tiene un estado
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function estado()
    {
        return $this->belongsTo('crmcomercial\Entities\EstadoProspecto', 'coc_estado');
    }

    /**
     * Un prospecto tiene un motivo de cierre negativo
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function motCierreNeg()
    {
        return $this->belongsTo('crmcomercial\Entities\MotCierreNeg', 'coc_MotCierreNeg');
    }
}
