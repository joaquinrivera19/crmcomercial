<?php

namespace crmcomercial\Repositories;

use crmcomercial\Entities\ContactoProx;

class ContactoProxRepository
{
    public function getMaxCodigo()
    {
        return ContactoProx::groupBy('ComContactoProx.comp_prospecto')
            ->selectRaw('MAX(ComContactoProx.comp_codigo) as maximo')
            ->get();
    }

    public function getUltContacto($prospecto, $contacto)
    {
        return ContactoProx::where('comp_prospecto', '=', $prospecto)
                            ->where('comp_contacto', '=' , $contacto)
                            ->first();
    }
}