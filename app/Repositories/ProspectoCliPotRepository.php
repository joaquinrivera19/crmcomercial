<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 22/03/2016
 * Time: 11:58
 */

namespace crmcomercial\Repositories;

use crmcomercial\Entities\ProspectoCliPot;

class ProspectoCliPotRepository
{

    private $contactoCliPotRepository;
    private $max;
    private $max2;

    /**
     * ProspectoCliPotRepository constructor.
     * @param $contactoCliPotRepository
     */
    public function __construct(ContactoCliPotRepository $contactoCliPotRepository)
    {
        $this->contactoCliPotRepository = $contactoCliPotRepository;
        $this->max = $this->contactoCliPotRepository->getMaxCodigo();
        $this->max2 = $this->contactoCliPotRepository->getMaxCodigo2();
    }


    public function getSigCodigoConces()
    {
        $max = \DB::table('ComCliPotencialesPros')
            ->select(\DB::raw('MAX(cpp_conces) as maximo'))
            ->first();

//        dd($max);
        if ($max == null) {
            return $max = 1;
        } else {
            return $sig = $max->maximo + 1;
        }
    }

    public function getMaxCodigo()
    {
         return  \DB::table('ComCliPotencialesPros')
            ->select(\DB::raw('MAX(cpp_codigo) as maximo'))
            ->first();

    }

    public function getSigCod()
    {
        $max = \DB::table('ComCliPotencialesPros')
            ->select(\DB::raw('MAX(cpp_codigo) as maximo'))
            ->first();

        if ($max == null) {
            return $max = 1;
        } else {
            return $sig = $max->maximo + 1;
        }

    }

    public function getProspectoCliPotAll(){
        return ProspectoCliPot::orderBy('cpp_codigo', 'desc')->get();
    }

    public function getProspectosconces()
    {
        return ProspectoCliPot::leftJoin('ComCliPotencialesCont', 'ComCliPotencialesPros.cpp_codigo', '=', 'ComCliPotencialesCont.cpc_prospecto')
            ->whereIn('ComCliPotencialesCont.cpc_codigo', $this->max2)
            //->where('ComCliPotencialesCont.cpc_fecha','>=','20150101')
            ->orWhereNull('ComCliPotencialesCont.cpc_codigo')
            ->orderBy('ComCliPotencialesPros.cpp_codigo','desc')
            ->get();
    }


    public function getProspectosCliPot()
    {
        return \DB::select('exec planilla_prospecto_potenciales');
    }


    public function getProspCliPotById($id)
    {
        return ProspectoCliPot::leftJoin('ComCliPotencialesCont', 'ComCliPotencialesPros.cpp_codigo', '=', 'ComCliPotencialesCont.cpc_prospecto')
            ->where('ComCliPotencialesPros.cpp_codigo', '=', $id)
            ->with('conces', 'tipoOrigenPotenciales', 'estado', 'vendedor', 'contactoProx', 'localidad')
            ->orderBy('ComCliPotencialesCont.cpc_codigo', 'desc')
            ->first();
    }

    public function getProspCliPot()
    {
        return ProspectoCliPot::leftJoin('ComCliPotencialesCont', 'ComCliPotencialesPros.cpp_codigo', '=', 'ComCliPotencialesCont.cpc_prospecto')
            ->with('conces', 'tipoOrigenPotenciales', 'estado', 'vendedor', 'categEmp')
            ->orderBy('ComCliPotencialesPros.cpp_codigo', 'desc')
            ->get();
    }
    
    public function getProspModal($id)
    {
        return ProspectoCliPot::where('cpp_codigo','=',$id)
            ->select('cpp_codigo as codigo', 'cpp_nombre as nombre')
            ->first();
    }

    public function getConcesPotenciales()
    {
        return ProspectoCliPot::join('comcategemp', 'ComCliPotencialesPros.cpp_categemp', '=', 'comcategemp.cat_codigo')
            ->get();
    }

    public  function getConcesPotencialesAll()
    {
        return ProspectoCliPot::with('categemp')->get();
    }
}