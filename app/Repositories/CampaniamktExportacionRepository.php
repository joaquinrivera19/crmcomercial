<?php

namespace crmcomercial\Repositories;

use crmcomercial\Entities\CampaniamktExportacion;

class CampaniamktExportacionRepository
{
    
    public function getCampaniamktExportacion()
    {
        return \DB::select('exec campaniamkt_resultado');
    }

}