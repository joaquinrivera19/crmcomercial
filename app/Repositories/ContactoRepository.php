<?php

namespace crmcomercial\Repositories;

use crmcomercial\Entities\Contacto;

class ContactoRepository
{
    public function getMaxCodigo()
    {
        return Contacto::groupBy('ComContacto.coc_prospecto')
            ->selectRaw('MAX(ComContacto.coc_codigo) as maximo')
            ->get();
    }

    public function getContactosRealizados($id)
    {
        return Contacto::where('ComContacto.coc_prospecto', '=', $id)
                ->orderBy('coc_fecha', 'asc')
                ->with('modocontac', 'tipoContac', 'estado', 'modContacto')
            ->get();
    }

    public function getUltContactoPorProspecto($id)
    {
        return Contacto::where('ComContacto.coc_prospecto', '=', $id)
            ->orderBy('coc_fecha', 'desc')
            ->first();
    }

    public function getMaxCod()
    {
        return \DB::table('ComContacto')
            ->select(\DB::raw('MAX(coc_codigo) as maximo'))
            ->first();
    }

    public function getUltimoContacto($prospecto)
    {
        return Contacto::from(\DB::raw('(select MAX(coc_fecha) as fecha, coc_codigo as maximo, coc_prospecto as prosp from ComContacto
                            group by coc_codigo, coc_prospecto) as codprox'))
            ->leftJoin('ComContacto', 'codprox.maximo', '=', 'ComContacto.coc_codigo')
            ->leftJoin('ComProspecto', 'codprox.prosp', '=', 'ComProspecto.pro_codigo')
            ->leftJoin('ComContactoProx', 'codprox.prosp', '=', 'ComContactoProx.comp_prospecto')
            ->leftJoin('conces', 'ComProspecto.pro_conces', '=', 'conces.con_codigo')
            ->leftJoin('ComProducto', 'ComProducto.prod_codigo', '=', 'ComProspecto.pro_producto')
            ->leftJoin('ComProbCierre', 'ComProbCierre.pci_codigo', '=', 'ComContacto.coc_probcierre')
            ->leftJoin('ComVendedor as vpc', 'vpc.ven_codigo', '=', 'ComContactoProx.comp_vendeprox')
            ->leftJoin('ComVendedor as vc', 'vc.ven_codigo', '=', 'ComContacto.coc_vendedor')
            ->leftJoin('ComVendedor as vp', 'vp.ven_codigo', '=', 'ComProspecto.pro_vendedor')
            ->leftJoin('ComCategoria', 'ComCategoria.cate_codigo', '=', 'ComProspecto.pro_categoria')
            ->leftJoin('ComTipoContac', 'ComTipoContac.tco_codigo', '=', 'ComContacto.coc_tipocont')
            ->leftJoin('CommodoContac', 'ComModoContac.mod_codigo', '=', 'ComContacto.coc_modcont')
            ->leftJoin('ComClasesProducto', 'ComClasesProducto.cp_codigo', '=', 'ComProspecto.pro_clasprod')
            ->leftJoin('ComCampania', 'ComCampania.cam_codigo', '=', 'ComProspecto.pro_nombrecamp')
            ->leftJoin('ComTipoOrigen', 'ComTipoOrigen.to_codigo', '=', 'ComProspecto.pro_tiporig')
            ->leftJoin('ComEstadoProspecto', 'ComEstadoProspecto.epr_codigo', '=', 'ComContacto.coc_estado')
            ->leftJoin('ComModPrestacion', 'ComModPrestacion.mpr_codigo', '=', 'ComContacto.coc_modprest')
            ->leftJoin('ComMotCierreNeg', 'ComMotCierreNeg.mcn_codigo', '=', 'ComContacto.coc_motCierreNeg')
            ->leftJoin('ComFinanciacion', 'ComFinanciacion.fin_codigo', '=', 'ComContacto.coc_financia')
            ->leftJoin('ComModContacto', 'ComModContacto.mco_codigo', '=', 'ComContacto.coc_modocontac')
            ->leftJoin('ComEncuesta', 'ComEncuesta.enc_codigo', '=', 'ComContacto.coc_encuesta')
            ->where('ComProspecto.pro_codigo', '=', $prospecto)
            ->orderBy('ComContacto.coc_codigo', 'desc')
            ->orderBy('ComContactoProx.comp_codigo', 'desc')
            ->with('prospecto', 'tipoContac', 'vendedor', 'tipoContac', 'modoContac',
                'estado', 'modPrestacion', 'motCierreNeg', 'financiacion', 'modContacto', 'encuesta', 'contactoProx')
            ->first();
    }

    public function getAdjuntos($prospecto)
    {
        return Contacto::select('coc_codigo','coc_prospecto', 'coc_fecha', 'coc_tipoarc', 'coc_adjunto')
                ->where('coc_adjunto', '!=', '')
                ->where('coc_prospecto', '=', $prospecto)
                ->get();
    }
}