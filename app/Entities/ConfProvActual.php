<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 20/07/2016
 * Time: 10:06 AM
 */

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class ConfProvActual extends Model
{
    protected $table = 'ComConfProvActual';

    protected $primaryKey = 'cpa_codigo';

    public $timestamps = false;
    public $fillable = ['cpa_nombre'];
}