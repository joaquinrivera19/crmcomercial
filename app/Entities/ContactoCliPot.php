<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class ContactoCliPot extends Model
{
    protected $table = 'ComCliPotencialesCont';

    protected $primaryKey = 'cpc_codigo';

    public $timestamps = false;

    public $fillable = [
        'cpc_valorsist',
        'cpc_valorimp',
        'cpc_valortotal',
        'cpc_cantlicen',
        'cpc_diasimple',
        'cpc_preciomanteni',
        'cpc_fecha',
        'cpc_usuario',
        'cpc_detallecont',
        'cpc_adjunto',
        'cpc_estado',
        'cpc_prospecto',
        'cpc_motivo',
        'cpc_probcierre'
    ];

    /**
     * Un contacto pertenece a un prospecto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prospecto()
    {
        return $this->belongsTo('crmcomercial\Entities\ProspectoCliPot', 'cpc_prospecto');
    }

    /**
     * Un contacto tiene un tipo de contacto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoContac()
    {
        return $this->belongsTo('crmcomercial\Entities\TipoContac', 'cpc_tipocont');
    }

    /**
     * Un contacto tiene una modalidad de contrato
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modoContac()
    {
        return $this->belongsTo('crmcomercial\Entities\ModoContac', 'cpc_modocontac');
    }

    /**
     * Un contacto tiene un modo de contacto
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modContacto()
    {
        return $this->belongsTo('crmcomercial\Entities\ModContacto', 'cpc_modalidadcontac');
    }

    /**
     * Un contacto tiene una probabilidad de cierre
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function probCierre()
    {
        return $this->belongsTo('crmcomercial\Entities\ProbCierre', 'cpc_probcierre');
    }

    /**
     * Un contacto tiene un motivo de cierre negativo
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function motCierreNeg()
    {
        return $this->belongsTo('crmcomercial\Entities\MotCierreNeg', 'cpc_MotCierreNeg');
    }

    /**
     * Un contacto tiene un modo de financiaci�n
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function financiacion()
    {
        return $this->belongsTo('crmcomercial\Entities\Financiacion', 'cpc_financia');
    }

    /**
     * Un contacto tiene un vendedor
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendedor()
    {
        return $this->belongsTo('crmcomercial\Entities\Vendedor', 'cpc_vendedor');
    }

    /**
     * Un contacto tiene una encuesta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo('crmcomercial\Entities\EstadoProspecto', 'cpc_estado');
    }

    /**
     * Un contacto tiene una encuesta
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactoProx()
    {
        return $this->belongsTo('crmcomercial\Entities\ContactoProx', 'comp_codigo');
    }

    /**
     * Un contacto tiene un sistema actual
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sistemaActual()
    {
        return $this->belongsTo('crmcomercial\Entities\Sistema', 'cpc_sistemact');
    }

    /**
     * Un contacto tiene un sistema actual
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sistemaAnterior()
    {
        return $this->belongsTo('crmcomercial\Entities\Sistema', 'cpc_sistemant');
    }

    /**
     * Un contacto tiene un sistema actual
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sistemaEvaluados()
    {
        return $this->belongsToMany('crmcomercial\Entities\Sistema', 'ComSisCont', 'contacto_cli_pot_id', 'sistema_id');
    }
    
}
