<?php
/**
 * Created by PhpStorm.
 * User: laccastello
 * Date: 23/03/2016
 * Time: 12:05
 */

namespace crmcomercial\Repositories;


use crmcomercial\Entities\ContactoCliPot;

class ContactoCliPotRepository
{
    public function getMaxCodigo()
    {
        return ContactoCliPot::groupBy('ComCliPotencialesCont.cpc_codigo')
            ->selectRaw('MAX(ComCliPotencialesCont.cpc_codigo) as maximo')
            ->orderBy('ComCliPotencialesCont.cpc_codigo', 'desc')
            ->first();
    }

    public function getMaxCodigo2()
    {
        return ContactoCliPot::groupBy('ComCliPotencialesCont.cpc_prospecto')
            ->selectRaw('MAX(ComCliPotencialesCont.cpc_codigo) as maximo')
            ->get();
    }

    public function getContactosCliPotRealizados($id)
    {
        return ContactoCliPot::where('ComCliPotencialesCont.cpc_prospecto', '=', $id)
            ->orderBy('cpc_fecha', 'asc')
            ->with('modocontac', 'tipoContac', 'estado', 'modContacto')
            ->get();
    }

    public function getAdjuntos($prospecto)
    {
        return ContactoCliPot::select('cpc_codigo','cpc_prospecto', 'cpc_fecha', 'cpc_tipoarc', 'cpc_adjunto')
            ->where('cpc_adjunto', '!=', '')
            ->where('cpc_prospecto', '=', $prospecto)
            ->get();
    }

    public function getUltimoContacto($prospecto)
    {
        return ContactoCliPot::from(\DB::raw('(select MAX(cpc_fecha) as fecha, cpc_codigo as maximo, cpc_prospecto as prosp from ComCliPotencialesCont
                            group by cpc_codigo, cpc_prospecto) as codprox'))
            ->leftJoin('ComCliPotencialesCont', 'codprox.maximo', '=', 'ComCliPotencialesCont.cpc_codigo')
            ->leftJoin('ComCliPotencialesPros', 'codprox.prosp', '=', 'ComCliPotencialesPros.cpp_codigo')
            ->leftJoin('ComCliPotencialesContProx', 'codprox.prosp', '=', 'ComCliPotencialesContProx.cpcp_prospecto')
            ->leftJoin('conces', 'ComCliPotencialesPros.cpp_conces', '=', 'conces.con_codigo')
            ->leftJoin('ComProbCierre', 'ComProbCierre.pci_codigo', '=', 'ComCliPotencialesCont.cpc_probcierre')
            ->leftJoin('ComVendedor as vpc', 'vpc.ven_codigo', '=', 'ComCliPotencialesContProx.cpcp_vendeprox')
            ->leftJoin('ComVendedor as vc', 'vc.ven_codigo', '=', 'ComCliPotencialesCont.cpc_vendedor')
            ->leftJoin('ComVendedor as vp', 'vp.ven_codigo', '=', 'ComCliPotencialesPros.cpp_vendedor')
            ->leftJoin('ComTipoContac', 'ComTipoContac.tco_codigo', '=', 'ComCliPotencialesCont.cpc_tipocont')
            ->leftJoin('CommodoContac', 'ComModoContac.mod_codigo', '=', 'ComCliPotencialesCont.cpc_modalidadcontac')
            ->leftJoin('ComTipoOrigenPotenciales', 'ComTipoOrigenPotenciales.top_codigo', '=', 'ComCliPotencialesPros.cpp_tiporig')
            ->leftJoin('ComEstadoProspecto', 'ComEstadoProspecto.epr_codigo', '=', 'ComCliPotencialesCont.cpc_estado')
            ->leftJoin('ComMotCierreNeg', 'ComMotCierreNeg.mcn_codigo', '=', 'ComCliPotencialesCont.cpc_motCierreNeg')
            ->leftJoin('ComFinanciacion', 'ComFinanciacion.fin_codigo', '=', 'ComCliPotencialesCont.cpc_financia')
            ->leftJoin('ComModContacto', 'ComModContacto.mco_codigo', '=', 'ComCliPotencialesCont.cpc_modocontac')
            ->leftJoin('ComPais', 'ComPais.pais_codigo' , '=', 'ComCliPotencialesPros.cpp_pais')
            ->leftJoin('ComProvincia', 'ComProvincia.prov_codigo' , '=', 'ComCliPotencialesPros.cpp_provincia')
            ->leftJoin('ComLocalidad', 'ComLocalidad.loc_codigo1' , '=', 'ComCliPotencialesPros.cpp_codpos1')
            ->leftJoin('ComLocalidad as loc', 'loc.loc_codigo2' , '=', 'ComCliPotencialesPros.cpp_codpos2')
            ->leftJoin('ComTipoMarca', 'ComTipoMarca.tmar_codigo' , '=', 'ComCliPotencialesPros.cpp_tipomarca')
            ->leftJoin('ComMarca', 'ComMarca.mar_codigo' , '=', 'ComCliPotencialesPros.cpp_marca')
            ->leftJoin('ComActividad', 'ComActividad.act_codigo' , '=', 'ComCliPotencialesPros.cpp_actividad')
            ->leftJoin('ComSisCont', 'ComSisCont.siscont_codigo' , '=', 'ComSisCont.contacto_cli_pot_id')
            ->leftJoin('ComCategoria', 'ComCliPotencialesPros.cpp_categoria' , '=', 'ComCategoria.cate_codigo')
            ->leftJoin('ComConfProvActual', 'ComConfProvActual.cpa_codigo' , '=', 'ComCliPotencialesCont.cpc_confprovactual')
            ->where('ComCliPotencialesPros.cpp_codigo', '=', $prospecto)
            ->orderBy('ComCliPotencialesCont.cpc_codigo', 'desc')
            ->orderBy('ComCliPotencialesContProx.cpcp_codigo', 'desc')
            ->with('prospecto', 'tipoContac', 'vendedor', 'tipoContac', 'modoContac',
                'estado', 'motCierreNeg', 'financiacion', 'modContacto', 'contactoProx')
            ->first();
    }

    public function getUltimoContactoRePlanifica($prospecto)
    {
        return ContactoCliPot::from(\DB::raw('(select MAX(cpc_fecha) as fecha, cpc_codigo as maximo, cpc_prospecto as prosp from ComCliPotencialesCont
                            group by cpc_codigo, cpc_prospecto) as codprox'))
            ->leftJoin('ComCliPotencialesCont', 'codprox.maximo', '=', 'ComCliPotencialesCont.cpc_codigo')
            ->leftJoin('ComCliPotencialesPros', 'codprox.prosp', '=', 'ComCliPotencialesPros.cpp_codigo')
            ->leftJoin('ComCliPotencialesContProx', 'codprox.prosp', '=', 'ComCliPotencialesContProx.cpcp_prospecto')
            ->leftJoin('conces', 'ComCliPotencialesPros.cpp_conces', '=', 'conces.con_codigo')
            ->leftJoin('ComProbCierre', 'ComProbCierre.pci_codigo', '=', 'ComCliPotencialesCont.cpc_probcierre')
            ->leftJoin('ComVendedor as vpc', 'vpc.ven_codigo', '=', 'ComCliPotencialesContProx.cpcp_vendeprox')
            ->leftJoin('ComVendedor as vc', 'vc.ven_codigo', '=', 'ComCliPotencialesCont.cpc_vendedor')
            ->leftJoin('ComVendedor as vp', 'vp.ven_codigo', '=', 'ComCliPotencialesPros.cpp_vendedor')
            ->leftJoin('ComTipoContac', 'ComTipoContac.tco_codigo', '=', 'ComCliPotencialesCont.cpc_tipocont')
            ->leftJoin('CommodoContac', 'ComModoContac.mod_codigo', '=', 'ComCliPotencialesCont.cpc_modalidadcontac')
            ->leftJoin('ComTipoOrigenPotenciales', 'ComTipoOrigenPotenciales.top_codigo', '=', 'ComCliPotencialesPros.cpp_tiporig')
            ->leftJoin('ComEstadoProspecto', 'ComEstadoProspecto.epr_codigo', '=', 'ComCliPotencialesCont.cpc_estado')
            ->leftJoin('ComMotCierreNeg', 'ComMotCierreNeg.mcn_codigo', '=', 'ComCliPotencialesCont.cpc_motCierreNeg')
            ->leftJoin('ComFinanciacion', 'ComFinanciacion.fin_codigo', '=', 'ComCliPotencialesCont.cpc_financia')
            ->leftJoin('ComModContacto', 'ComModContacto.mco_codigo', '=', 'ComCliPotencialesCont.cpc_modocontac')
            ->leftJoin('ComPais', 'ComPais.pais_codigo' , '=', 'ComCliPotencialesPros.cpp_pais')
            ->leftJoin('ComProvincia', 'ComProvincia.prov_codigo' , '=', 'ComCliPotencialesPros.cpp_provincia')
            ->leftJoin('ComLocalidad', 'ComLocalidad.loc_codigo1' , '=', 'ComCliPotencialesPros.cpp_codpos1')
            ->leftJoin('ComLocalidad as loc', 'loc.loc_codigo2' , '=', 'ComCliPotencialesPros.cpp_codpos2')
            ->leftJoin('ComTipoMarca', 'ComTipoMarca.tmar_codigo' , '=', 'ComCliPotencialesPros.cpp_tipomarca')
            ->leftJoin('ComMarca', 'ComMarca.mar_codigo' , '=', 'ComCliPotencialesPros.cpp_marca')
            ->leftJoin('ComActividad', 'ComActividad.act_codigo' , '=', 'ComCliPotencialesPros.cpp_actividad')
            ->leftJoin('ComSisCont', 'ComSisCont.siscont_codigo' , '=', 'ComSisCont.contacto_cli_pot_id')
            ->leftJoin('ComConfProvActual', 'ComConfProvActual.cpa_codigo' , '=', 'ComCliPotencialesCont.cpc_confprovactual')
            ->where('ComCliPotencialesPros.cpp_codigo', '=', $prospecto)
            ->orderBy('ComCliPotencialesCont.cpc_codigo', 'desc')
            ->orderBy('ComCliPotencialesContProx.cpcp_codigo', 'desc')
            ->with('prospecto', 'tipoContac', 'vendedor', 'tipoContac', 'modoContac',
                'estado', 'motCierreNeg', 'financiacion', 'modContacto', 'contactoProx')
            ->first();
    }
}