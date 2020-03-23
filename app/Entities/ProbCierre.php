<?php

namespace crmcomercial\Entities;

use Illuminate\Database\Eloquent\Model;

class ProbCierre extends Model
{
    protected $table = 'ComProbCierre';

    protected $primaryKey = 'pci_codigo';

    public $timestamps = false;

    public $fillable = ['pci_nombre'];
}
