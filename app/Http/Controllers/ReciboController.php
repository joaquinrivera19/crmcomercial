<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Entities\CampaniamktExportacion;
use crmcomercial\Repositories\CampaniamktExportacionRepository;
use Illuminate\Http\Request;

use crmcomercial\Http\Requests;

class ReciboController extends Controller
{

    public function __construct(CampaniamktExportacionRepository $campaniamktExportacionRepository)
    {
        $this->campaniamktexportacion = $campaniamktExportacionRepository;
    }

    public function getrecibo($conce,$campania,$usuario,$sistema)
    {

        $dt = \Carbon\Carbon::now('America/Argentina/Buenos_Aires')->toDateString();

        $campaniaexp = CampaniamktExportacion::where('camex_idconces', '=' , $conce)->
            where('camex_idcampania', '=', $campania)->
            where('camex_usuario', '=', $usuario)->
            where('camex_idsistema', '=', $sistema)->
            where('camex_fecha', '=', $dt)->get();

        if ($campaniaexp->count() == 0){
            $act = new CampaniamktExportacion();
            $act->camex_idconces = $conce;
            $act->camex_idcampania = $campania;
            $act->camex_usuario = $usuario;
            $act->camex_idsistema = $sistema;
            $act->camex_fecha = $dt;
            $act->save();
        }
    }
}
