<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class ModoContac extends Model
{
    protected $table = 'ComModoContac';

    protected $primaryKey = 'mod_codigo';

    public $timestamps = false;
}
