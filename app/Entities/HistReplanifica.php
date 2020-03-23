<?php
/**
 * Created by PhpStorm.
 * User: jrivera
 * Date: 18/10/2016
 * Time: 11:44 AM
 */

namespace crmcomercial\Entities;


use Illuminate\Database\Eloquent\Model;

class HistReplanifica extends Model
{
    protected $table = 'ComHistReplanifica';

    protected $primaryKey = 'hir_codigo';

    public $timestamps = false;
    public $fillable = ['hir_codigo','hir_motivo','hir_proscod','hir_contcod', 'hir_tipoprospecto','hir_feccar','hir_estado','hir_eliminado','hir_vendedor'];

    public function vendedor()
    {
        return $this->belongsTo('crmcomercial\Entities\Vendedor', 'hir_vendedor');
    }

}