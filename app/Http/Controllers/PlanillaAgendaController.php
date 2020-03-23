<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Entities\ContactoCliPot;
use crmcomercial\Entities\ContactoProx;
use crmcomercial\Entities\ContactoProxCliPot;
use crmcomercial\Entities\HistReplanifica;
use crmcomercial\Repositories\AgendaRepository;
use crmcomercial\Repositories\ContactoCliPotRepository;
use crmcomercial\Repositories\ContactoProxRepository;
use crmcomercial\Repositories\ContactoRepository;
use crmcomercial\Repositories\HistReplanificaRepository;
use crmcomercial\Repositories\ProspectoCliPotRepository;
use crmcomercial\Repositories\ProspectosRepository;
use crmcomercial\Repositories\VendedorRepository;
use Illuminate\Http\Request;

use crmcomercial\Http\Requests;
use crmcomercial\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class PlanillaAgendaController extends Controller
{

    private $prospectosRepository,$histReplanificaRepository,$vendedorRepository,$contactoCliPotRepository,$prospectoCliPotRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProspectosRepository $prospectosRepository, HistReplanificaRepository $histReplanificaRepository,
                                VendedorRepository $vendedorRepository, ContactoCliPotRepository $contactoCliPotRepository,
                                ProspectoCliPotRepository $prospectoCliPotRepository)
    {
        $this->middleware('auth');
        $this->prospectosRepository = $prospectosRepository;
        $this->histReplanificaRepository = $histReplanificaRepository;
        $this->vendedorRepository = $vendedorRepository;
        $this->contactoCliPotRepository = $contactoCliPotRepository;
        $this->prospectosRepository = $prospectosRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = $this->prospectosRepository->getAgenda();
        $vendedor = $this->vendedorRepository->getVendedores();

        return view('planilla_agenda', ['agenda' => $agenda, 'vendedor' => $vendedor]);
    }

    public function store(Request $request)
    {

        $replanifica = new HistReplanifica();
        $replanifica->hir_motivo = $request->input('hir_motivo');
        $replanifica->hir_proscod = $request->input('hir_proscod');
        $pros = $request->input('hir_proscod');
        $replanifica->hir_contcod = $request->input('hir_contcod');
        $replanifica->hir_tipoprospecto = $request->input('hir_tipoprospecto');
        $replanifica->hir_feccar = $request->input('hir_feccar');
        $replanifica->hir_estado = $request->input('hir_estado');
        $replanifica->hir_vendedor = $request->input('hir_vendedor');
        $replanifica->save();

        if ($request->input('hir_tipoprospecto') != 1) {
            $contactoprox = ContactoProxCliPot::where('cpcp_prospecto', '=', $pros)->orderBy('cpcp_codigo', 'desc')->first();
            $contactoprox->cpcp_fechaprox = $request->input('hir_feccar');
            $contactoprox->cpcp_vendeprox = $request->input('hir_vendedor');
            $contactoprox->save();
        } else {
            $contprox = ContactoProx::where('comp_prospecto', '=', $pros)->orderBy('comp_codigo', 'desc')->first();
            $contprox->comp_fechaprox = $request->input('hir_feccar');
            $contprox->comp_vendeprox = $request->input('hir_vendedor');
            $contprox->save();
        }

        return redirect('/agenda')->with('success', 'Se ha modifico los datos del prospecto correctamente');;
    }


}
