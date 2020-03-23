<?php

namespace crmcomercial\Repositories;

use crmcomercial\Entities\Prospecto;
use crmcomercial\Entities\Contacto;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

class ProspectosRepository
{

    private $contactoRepository;
    private $contactoProx;
    private $max;

    public function __construct(ContactoRepository $contactoRepository, ContactoProxRepository $contactoProx)
    {
        $this->contactoRepository = $contactoRepository;
        $this->contactoProx = $contactoProx;
        $this->max = $this->contactoRepository->getMaxCodigo();
    }

    /**
     * Devuelvo los prospectos para la planilla
     * @return mixed
     */
//    public function getProspectos()
//    {
//        return Prospecto::join('ComContacto', 'ComProspecto.pro_codigo', '=', 'ComContacto.coc_prospecto')
//            ->whereIn('ComContacto.coc_codigo', $this->max)
//            ->where('ComContacto.coc_fecha', '>=', '2014-01-01')
//            ->with('conces', 'clasesProducto', 'producto', 'estado', 'vendedor')
//            ->orderBy('ComProspecto.pro_codigo','desc')
//            ->get();
//    }


    public function getProspectos()
    {
        return \DB::select('exec planilla_prospecto_consultoria');
    }


    /**
     * Devuelvo los datos necesarios para la agenda
     * @return mixed
     */
    public function getAgenda()
    {
        return \DB::select('exec planilla_agenda');
    }

    public function getProspecto($id)
    {
        return Prospecto::join('ComContacto', 'ComProspecto.pro_codigo', '=', 'ComContacto.coc_prospecto')
            ->whereIn('ComContacto.coc_codigo', $this->max)
            ->where('ComContacto.coc_fecha', '>=', '2014-01-01')
            ->where('ComProspecto.pro_codigo', '=', $id)
            ->with('conces', 'clasesProducto', 'producto', 'campania', 'tipoOrigen', 'estado', 'vendedor', 'motCierreNeg',
                'contactoProx', 'categoria')
            ->first();
    }

    public function getMaxCodigo()
    {
        return \DB::table('ComProspecto')
            ->select(\DB::raw('MAX(pro_codigo) as maximo'))
            ->first();
    }

    public function getSigCod()
    {
        $max =  \DB::table('ComProspecto')
            ->select(\DB::raw('MAX(pro_codigo) as maximo'))
            ->first();

        if ($max == null) {
            return $max = 1;
        } else {
            return $sig = $max->maximo + 1;
        }
    }


    public function getProspModal($id)
    {
        return Prospecto::join('conces','conces.con_codigo','=','comprospecto.pro_conces')
            ->where('comprospecto.pro_codigo','=',$id)
            ->select('comprospecto.pro_codigo as codigo', 'conces.con_nombre as nombre')
            ->first();
    }

}