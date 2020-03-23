<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'ComVendedor';

    protected $primaryKey = 'ven_codigo';

    public $timestamps = false;
    public $fillable = ['ven_nombre','ven_usuario','ven_estado','ven_clave','ven_email', 'username', 'ven_foto','ven_menu'];

    /**
     * Un contacto tiene un vendedor
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contactoProx()
    {
        return $this->hasMany('crmcomercial\Entities\ContactoProx', 'comp_vendeprox');
    }
}
