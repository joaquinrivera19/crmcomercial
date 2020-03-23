<?php

namespace crmcomercial\Repositories;

use crmcomercial\Entities\ContactoProx;

class AgendaRepository
{
    public function getAgendaContactos() {
        return ContactoProx::with('vendedor', 'prospecto', 'producto', 'contacto')->paginate(15);
    }
}