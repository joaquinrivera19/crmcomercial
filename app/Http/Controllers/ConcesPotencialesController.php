<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Entities\EstadoProspecto;
use crmcomercial\Entities\ProspectoCliPot;
use crmcomercial\Repositories\ActividadRepository;
use crmcomercial\Repositories\CategEmpRepository;
use crmcomercial\Repositories\CategoriasRepository;
use crmcomercial\Repositories\ConfProvActualRepository;
use crmcomercial\Repositories\ContactoCliPotRepository;
use crmcomercial\Repositories\EstadoProspectoRepository;
use crmcomercial\Repositories\FinanciacionRepository;
use crmcomercial\Repositories\LocalidadRepository;
use crmcomercial\Repositories\MarcaRepository;
use crmcomercial\Repositories\PaisRepository;
use crmcomercial\Repositories\ProspectoCliPotRepository;
use crmcomercial\Repositories\ProvinciaRepository;
use crmcomercial\Repositories\TipoMarcaRepository;
use crmcomercial\Repositories\TipoOrigenRepository;
use crmcomercial\Repositories\VendedorRepository;
use Illuminate\Http\Request;
use crmcomercial\Http\Requests\ConcesPotencialesRequest;
use crmcomercial\Http\Requests;
use crmcomercial\Http\Controllers\Controller;

class ConcesPotencialesController extends Controller
{

    private $marcaRepository,$categEmpRepository,$tipoOrigenRepository,$vendedorRepository,$paisRepository,$provinciaRepository,
        $actividadRepository,$tipoMarcaRepository,$financiacionRepository,$localidadRepository,$contactoCliPotRepository,
        $prospectoCliPotRepository,$confProvActualRepository,$estadoProspectoRepository;

    public function __construct(MarcaRepository $marcaRepository, CategEmpRepository $categEmpRepository,
                                TipoOrigenRepository $tipoOrigenRepository, VendedorRepository $vendedorRepository,
                                PaisRepository $paisRepository, ProvinciaRepository $provinciaRepository, ActividadRepository $actividadRepository, TipoMarcaRepository $tipoMarcaRepository,
                                FinanciacionRepository $financiacionRepository, LocalidadRepository $localidadRepository, ContactoCliPotRepository $contactoCliPotRepository,
                                ProspectoCliPotRepository $prospectoCliPotRepository,ConfProvActualRepository $confProvActualRepository, EstadoProspectoRepository $estadoProspectoRepository)
    {
        $this->middleware('auth');
        $this->marcaRepository = $marcaRepository;
        $this->categEmpRepository = $categEmpRepository;
        $this->tipoOrigenRepository = $tipoOrigenRepository;
        $this->vendedorRepository = $vendedorRepository;
        $this->paisRepository = $paisRepository;
        $this->provinciaRepository = $provinciaRepository;
        $this->actividadRepository = $actividadRepository;
        $this->tipoMarcaRepository = $tipoMarcaRepository;
        $this->financiacionRepository = $financiacionRepository;
        $this->localidadRepository = $localidadRepository;
        $this->contactoCliPotRepository = $contactoCliPotRepository;
        $this->prospectoCliPotRepository = $prospectoCliPotRepository;
        $this->confProvActualRepository = $confProvActualRepository;
        $this->estadoProspectoRepository = $estadoProspectoRepository;
    }


    public function index()
    {
       // $prospectoclipot = $this->prospectoCliPotRepository->getProspectosconces();

        $prospectoclipot = $this->prospectoCliPotRepository->getProspectosCliPot();

/*        dump($prospectoclipot);
        dd();*/

        return view('concespotenciales_listado', compact('prospectoclipot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marca = $this->marcaRepository->getMarca();
        $categemp = $this->categEmpRepository->getCategEmp();
        $pais = $this->paisRepository->getPais();
        $provincia = $this->provinciaRepository->getProvincia(1);
        $tipomarca = $this->tipoMarcaRepository->getTipoMarca();
        $actividad = $this->actividadRepository->getActividad();
        $vendedor = $this->vendedorRepository->getVendedores();
        $tiporigen = $this->tipoOrigenRepository->getTipoOrigen();
        $financiacion = $this->financiacionRepository->getFinanciacion();
        $sigCod = $this->prospectoCliPotRepository->getSigCodigoConces();
        $ConfProvActual = $this->confProvActualRepository->getConfProvActual();

        return view('concespotenciales', compact('concespotenciales','marca','categemp','pais','provincia',
            'tipomarca','actividad','vendedor','tiporigen','financiacion','sigCod','ConfProvActual'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $concespotenciales = $this->prospectoCliPotRepository->getProspCliPotById($id);
        $marca = $this->marcaRepository->getMarca();
        $categemp = $this->categEmpRepository->getCategEmp();
        $pais = $this->paisRepository->getPais();
        $provincia = $this->provinciaRepository->getProvincia(1);
        $tipomarca = $this->tipoMarcaRepository->getTipoMarca();
        $actividad = $this->actividadRepository->getActividad();
        $vendedor = $this->vendedorRepository->getVendedores();
        $tiporigen = $this->tipoOrigenRepository->getTipoOrigen();
        $financiacion = $this->financiacionRepository->getFinanciacion();
        $localidad = $this->localidadRepository->getLocalidadAll();
        $ConfProvActual = $this->confProvActualRepository->getConfProvActual();
        return view('concespotenciales_show', compact('concespotenciales','marca','categemp','pais','provincia',
            'localidad','tipomarca','actividad','vendedor','tiporigen','financiacion','ConfProvActual'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concespotenciales = $this->prospectoCliPotRepository->getProspCliPotById($id);
        $marca = $this->marcaRepository->getMarca();
        $categemp = $this->categEmpRepository->getCategEmp();
        $pais = $this->paisRepository->getPais();
        $provincia = $this->provinciaRepository->getProvincia(1);
        $tipomarca = $this->tipoMarcaRepository->getTipoMarca();
        $actividad = $this->actividadRepository->getActividad();
        $vendedor = $this->vendedorRepository->getVendedores();
        $tiporigen = $this->tipoOrigenRepository->getTipoOrigen();
        $financiacion = $this->financiacionRepository->getFinanciacion();
        $localidad = $this->localidadRepository->getLocalidadAll();
        $ConfProvActual = $this->confProvActualRepository->getConfProvActual();
        $estado = $this->estadoProspectoRepository->getEstado();

        return view('concespotenciales_edit', compact('concespotenciales','marca','categemp','pais','provincia',
            'localidad','tipomarca','actividad','vendedor','tiporigen','financiacion','ConfProvActual','estado'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
