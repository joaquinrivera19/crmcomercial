<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class ProspectoCliPot extends Model
{
    protected $table = 'ComCliPotencialesPros';

    protected $primaryKey = 'cpp_codigo';

    public $timestamps = false;

    public $fillable = ['cpp_codigo','cpp_conces','cpp_nombre','cpp_pais','cpp_provincia','cpp_codpos1','cpp_codpos2','cpp_tipomarca','cpp_actividad',
        'cpp_marca','cpp_tiporig','cpp_nombreorig','cpp_vendedor','cpp_fechafac','cpp_numfac','cpp_conocsiac','cpp_marcadetalle',
        'cpp_fechacarga','cpp_telefono','cpp_email','cpp_categemp','cpp_tipoprod','cpp_sophab','cpp_observa','cpp_estado','cpc_prospecto'];

    /**
     * Un prospecto tiene un concesionario
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */

    public function conces()
    {
        return $this->belongsTo('crmcomercial\Entities\Conces', 'cpp_conces');
    }

    /**
     * Un prospecto tiene un pais
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function pais()
    {
        return $this->belongsTo('crmcomercial\Entities\Pais', 'cpp_pais');
    }

    /**
     * Un prospecto tiene una provincia
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function provincia()
    {
        return $this->belongsTo('crmcomercial\Entities\Provincia', 'cpp_provincia');
    }

    /**
     * Un prospecto tiene una localidad
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function localidad()
    {
        return $this->belongsTo('crmcomercial\Entities\Localidad', 'cpp_codpos1');
    }

    /**
     * Un prospecto tiene un tipo de marca
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function tipoMarca()
    {
        return $this->belongsTo('crmcomercial\Entities\TipoMarca', 'cpp_tipomarca');
    }

    /**
     * Un prospecto tiene una actividad
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function actividad()
    {
        return $this->belongsTo('crmcomercial\Entities\Actividad', 'cpp_actividad');
    }

    /**
     * Un prospecto tiene una marca
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function marca()
    {
        return $this->belongsTo('crmcomercial\Entities\Marca', 'cpp_marca');
    }

    /**
     * Un prospecto tiene un contacto pr�ximo
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contactoProx()
    {
        return $this->hasOne('crmcomercial\Entities\ContactoProxCliPot', 'cpcp_prospecto');
    }

    /**
     * Un prospecto tiene un tipo origen
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function tipoorigenpotenciales()
    {
        return $this->belongsTo('crmcomercial\Entities\TipoOrigenPotenciales', 'cpp_tiporig');
    }

    /**
     * Un prospecto tiene un vendedor
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function vendedor()
    {
        return $this->belongsTo('crmcomercial\Entities\Vendedor', 'cpp_vendedor');
    }

    /**
     * Un prospecto tiene un estado
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function estado()
    {
        return $this->belongsTo('crmcomercial\Entities\EstadoProspecto', 'cpc_estado');
    }

    public function contactoCliPot()
    {
        return $this->hasMany('crmcomercial\Entities\ContactoCliPot', 'cpc_prospecto');
    }

    /**
     * Un prospecto tiene una categoría empresa
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function categEmp()
    {
        return $this->belongsTo('crmcomercial\Entities\CategEmp', 'cpp_categemp');
    }

    public function probCierre()
    {
        return $this->belongsTo('crmcomercial\Entities\ProbCierre', 'cpc_probcierre');
    }

    public function categoria()
    {
        return $this->belongsTo('crmcomercial\Entities\Categoria', 'pro_categoria');
    }
}
