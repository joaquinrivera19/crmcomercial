<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 10/04/2017
 * Time: 10:21 AM
 */

namespace crmcomercial\Repositories;

use crmcomercial\Entities\Conces;

class ConcesRepository
{
    public function getConcesAll(){
        return Conces::all();
    }

}