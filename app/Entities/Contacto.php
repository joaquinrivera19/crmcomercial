<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = 'ComContacto';

    protected $primaryKey = 'coc_codigo';

    public $timestamps = false;

    public $fillable = [
        'coc_encuesta',
        'coc_estado',
        'coc_probcierre',
        'coc_cotizapro',
        'coc_cantdias',
        'coc_modprest',
        'coc_cotizaserv',
        'coc_canthoras',
        'coc_financia',
        'coc_fechademo',
        'coc_fecha',
        'coc_modcont',
        'coc_usuario',
        'coc_modocontac',
        'coc_tipocont',
        'coc_vendedor',
        'coc_detallecont',
        'coc_adjunto'
    ];

    /**
     * Un contacto pertenece a un prospecto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prospecto()
    {
        return $this->belongsTo('crmcomercial\Entities\Prospecto','coc_prospecto');
    }

    /**
     * Un contacto tiene un tipo de contacto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoContac()
    {
        return $this->belongsTo('crmcomercial\Entities\TipoContac', 'coc_tipocont');
    }

    /**
     * Un contacto tiene una modalidad de contrato
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modoContac()
    {
        return $this->belongsTo('crmcomercial\Entities\ModoContac', 'coc_modocontac');
    }

    /**
     * Un contacto tiene un modo de contacto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modContacto()
    {
        return $this->belongsTo('crmcomercial\Entities\ModContacto', 'coc_modcont');
    }

    /**
     * Un contacto tiene una probabilidad de cierre
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function probCierre()
    {
        return $this->belongsTo('crmcomercial\Entities\ProbCierre', 'coc_probcierre');
    }

    /**
     * Un contacto tiene una modalidad de prestación
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modPrestacion()
    {
        return $this->belongsTo('crmcomercial\Entities\ModPrestacion', 'coc_modprest');
    }

    /**
     * Un contacto tiene un motivo de cierre negativo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function motCierreNeg()
    {
        return $this->belongsTo('crmcomercial\Entities\MotCierreNeg', 'coc_MotCierreNeg');
    }

    /**
     * Un contacto tiene un modo de financiación
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function financiacion()
    {
        return $this->belongsTo('crmcomercial\Entities\Financiacion', 'coc_financia');
    }

    /**
     * Un contacto tiene un vendedor
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendedor()
    {
        return $this->belongsTo('crmcomercial\Entities\Vendedor', 'coc_vendedor');
    }

    /**
     * Un contacto tiene una encuesta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function encuesta()
    {
        return $this->belongsTo('crmcomercial\Entities\Encuesta', 'coc_encuesta');
    }

    /**
     * Un contacto tiene una encuesta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo('crmcomercial\Entities\EstadoProspecto', 'coc_estado');
    }

    /**
     * Un contacto tiene una encuesta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactoProx()
    {
        return $this->belongsTo('crmcomercial\Entities\ContactoProx', 'comp_codigo');
    }
}
