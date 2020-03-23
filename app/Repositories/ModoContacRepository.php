<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 17/02/2016
 * Time: 09:27 AM
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\ModoContac;

class ModoContacRepository
{
    public function getModoContac()
    {
        return ModoContac::lists('mod_nombre', 'mod_codigo');
    }
}