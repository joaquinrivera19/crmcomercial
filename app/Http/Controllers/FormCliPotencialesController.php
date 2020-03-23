<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Repositories\CategoriasRepository;
use Yajra\Datatables\Facades\Datatables;
use crmcomercial\Entities\ContactoCliPot;
use crmcomercial\Entities\ContactoProxCliPot;
use crmcomercial\Entities\Localidad;
use crmcomercial\Entities\ProspectoCliPot;
use crmcomercial\Http\Requests;
use crmcomercial\Http\Requests\FormCliPotencialesRequest;
use crmcomercial\Repositories\ActividadRepository;
use crmcomercial\Repositories\ConcesRepository;
use crmcomercial\Repositories\ConfProvActualRepository;
use crmcomercial\Repositories\ContactoCliPotRepository;
use crmcomercial\Repositories\EstadoProspectoRepository;
use crmcomercial\Repositories\FinanciacionRepository;
use crmcomercial\Repositories\HistReplanificaRepository;
use crmcomercial\Repositories\LocalidadRepository;
use crmcomercial\Repositories\MarcaRepository;
use crmcomercial\Repositories\ModContactoRepository;
use crmcomercial\Repositories\ModoContacRepository;
use crmcomercial\Repositories\MotCierreNegRepository;
use crmcomercial\Repositories\PaisRepository;
use crmcomercial\Repositories\ProbCierreRepository;
use crmcomercial\Repositories\ProspectoCliPotRepository;
use crmcomercial\Repositories\ProvinciaRepository;
use crmcomercial\Repositories\SistemaRepository;
use crmcomercial\Repositories\TipoContacRepository;
use crmcomercial\Repositories\TipoMarcaRepository;
use crmcomercial\Repositories\TipoOrigenPotencialesRepository;
use crmcomercial\Repositories\VendedorRepository;
use Illuminate\Http\Request;

class FormCliPotencialesController extends Controller
{

    public $categorias, $clasesProducto, $productos, $encuestas, $campanias, $tipoContac,
        $estadoProspecto, $probCierre, $vendedores, $modPrestacion, $financiacion, $modoContac, $localidad, $confProvActual, $tipoorigenpotenciales;

    private $prospectoCliPotRepository, $estadoProspectoRepository,
        $probCierreRepository, $vendedorRepository, $financiacionRepository,
        $modContactoRepository, $modoContacRepository, $tipoContacRepository, $contactoRepository, $motCierreNegRepository,
        $paisRepository, $provinciaRepository, $actividadRepository, $marcaRepository, $sistemaRepository, $tipoMarcaRepository,
        $localidadRepository, $confProvActualRepository, $tipoOrigenPotencialesRepository,$histReplanificaRepository,$categoriasRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProspectoCliPotRepository $prospectoCliPotRepository,
                                EstadoProspectoRepository $estadoProspectoRepository, ProbCierreRepository $probCierreRepository,
                                VendedorRepository $vendedorRepository, FinanciacionRepository $financiacionRepository,
                                ModContactoRepository $modContactoRepository, ModoContacRepository $modoContacRepository, TipoContacRepository $tipoContacRepository,
                                MotCierreNegRepository $motCierreNegRepository, ContactoCliPotRepository $contactoRepository,
                                PaisRepository $paisRepository, ProvinciaRepository $provinciaRepository, ActividadRepository $actividadRepository,
                                MarcaRepository $marcaRepository, SistemaRepository $sistemaRepository, TipoMarcaRepository $tipoMarcaRepository,
                                LocalidadRepository $localidadRepository, ConfProvActualRepository $confProvActualRepository,
                                TipoOrigenPotencialesRepository $tipoOrigenPotencialesRepository, HistReplanificaRepository $histReplanificaRepository, 
                                CategoriasRepository $categoriasRepository)
    {
        $this->middleware('auth');
        $this->prospectoCliPotRepository = $prospectoCliPotRepository;
        $this->tipoOrigenPotencialesRepository = $tipoOrigenPotencialesRepository;
        $this->estadoProspectoRepository = $estadoProspectoRepository;
        $this->probCierreRepository = $probCierreRepository;
        $this->vendedorRepository = $vendedorRepository;
        $this->financiacionRepository = $financiacionRepository;
        $this->modContactoRepository = $modContactoRepository;
        $this->modoContacRepository = $modoContacRepository;
        $this->tipoContacRepository = $tipoContacRepository;
        $this->motCierreNegRepository = $motCierreNegRepository;
        $this->paisRepository = $paisRepository;
        $this->provinciaRepository = $provinciaRepository;
        $this->actividadRepository = $actividadRepository;
        $this->marcaRepository = $marcaRepository;
        $this->sistemaRepository = $sistemaRepository;
        $this->tipoMarcaRepository = $tipoMarcaRepository;
        $this->contactoRepository = $contactoRepository;
        $this->localidadRepository = $localidadRepository;
        $this->confProvActualRepository = $confProvActualRepository;
        $this->histReplanificaRepository = $histReplanificaRepository;
        $this->categoriasRepository = $categoriasRepository;
    }

    public function index()
    {

        $prospectoclipot = $this->prospectoCliPotRepository->getProspectosCliPot();

        return view('planilla_prospectospot', ['prospectoclipot' => $prospectoclipot]);

        //return $prospectoclipot;
    }

    public function create()
    {
        $sigCod = $this->prospectoCliPotRepository->getSigCodigoConces();
        $tipoorigenpotenciales = $this->tipoOrigenPotencialesRepository->getTipoOrigenPotenciales();
        $estadoProspecto = $this->estadoProspectoRepository->getEstado();
        $probCierre = $this->probCierreRepository->getProbCierre();
        $vendedores = $this->vendedorRepository->getVendedores();
        $financiacion = $this->financiacionRepository->getFinanciacion();
        $modContacto = $this->modContactoRepository->getModContacto();
        $modoContac = $this->modoContacRepository->getModoContac();
        $tipoContac = $this->tipoContacRepository->getTipoContac();
        $motCierreNeg = $this->motCierreNegRepository->getMotCierreNeg();
        $pais = $this->paisRepository->getPais();
        $provincia = $this->provinciaRepository->getProvincia(1);
        $actividad = $this->actividadRepository->getActividad();
        $marca = $this->marcaRepository->getMarca();
        $sistema = $this->sistemaRepository->getSistema();
        $tipoMarca = $this->tipoMarcaRepository->getTipoMarca();
        $sigProsp = $this->prospectoCliPotRepository->getSigCod();
        $confProvActual = $this->confProvActualRepository->getConfProvActual();
        $categorias = $this->categoriasRepository->getCategoriaspotenciales();
        

        return view('form_clipotenciales', compact('sigCod', 'sigProsp',
            'tipoorigenpotenciales', 'estadoProspecto', 'probCierre', 'vendedores', 'modPrestacion', 'financiacion', 'modContacto',
            'modoContac', 'tipoContac', 'motCierreNeg', 'pais', 'provincia', 'actividad', 'marca', 'sistema', 'tipoMarca','confProvActual','categorias'));
    }

    public function edit($id)
    {
        $tipoorigenpotenciales = $this->tipoOrigenPotencialesRepository->getTipoOrigenPotenciales();
        $estadoProspecto = $this->estadoProspectoRepository->getEstado();
        $probCierre = $this->probCierreRepository->getProbCierre();
        $vendedores = $this->vendedorRepository->getVendedores();
        $financiacion = $this->financiacionRepository->getFinanciacion();
        $modContacto = $this->modContactoRepository->getModContacto();
        $modoContac = $this->modoContacRepository->getModoContac();
        $tipoContac = $this->tipoContacRepository->getTipoContacPoten();
        $motCierreNeg = $this->motCierreNegRepository->getMotCierreNeg();
        $pais = $this->paisRepository->getPais();
        $provincia = $this->provinciaRepository->getProvincia(1);
        $localidad = $this->localidadRepository->getLocalidadesAll();
        $actividad = $this->actividadRepository->getActividad();
        $marca = $this->marcaRepository->getMarca();
        $sistema = $this->sistemaRepository->getSistema();
        $tipoMarca = $this->tipoMarcaRepository->getTipoMarca();
        $prospCliPot = $this->prospectoCliPotRepository->getProspCliPotById($id);
        $contactos = $this->contactoRepository->getContactosCliPotRealizados($id);
        $sistemas = $this->sistemaRepository->getSistemasAll();
        $confProvActual = $this->confProvActualRepository->getConfProvActual();
        $histreplanifica = $this->histReplanificaRepository->getHistReplanificaProsPoten($id);
        $categorias = $this->categoriasRepository->getCategoriaspotenciales();
        $adjuntos = $this->contactoRepository->getAdjuntos($id);

        $modal_empresa = $this->prospectoCliPotRepository->getProspModal($id);


        return view('form_clipotenciales_edit', compact('prospCliPot', 'tipoorigenpotenciales', 'estadoProspecto', 'probCierre', 'vendedores', 'financiacion', 'modContacto',
            'modoContac', 'tipoContac', 'motCierreNeg', 'pais', 'provincia','localidad', 'actividad', 'marca', 'sistema', 'tipoMarca',
            'contactos', 'sistemas','confProvActual','histreplanifica','categorias','modal_empresa','adjuntos'));
    }

    public function update(Request $request, $id)
    {

        if ($request->file('cpc_adjunto') != null) {
            $file = $request->file('cpc_adjunto');
            $namefile = $file->getClientOriginalName();
            \Storage::disk('local')->put($namefile, \File::get($file));
        }
        
        if ($request->input('editProsp') != 1) {
            
            $prospecto = ProspectoCliPot::findOrNew($id);
            $prospecto->cpp_fechafac = $request->input('cpp_fechafac');
            $prospecto->cpp_numfac = $request->input('cpp_numfac');
            $prospecto->cpp_fechacarga = $request->input('fechacarga');
            $prospecto->save();

            $contacto = new ContactoCliPot();
            $contacto->cpc_estado = $request->input('cpc_estado');
            $contacto->cpc_probcierre = $request->input('cpc_probcierre') != null ? $request->input('cpc_probcierre') : 1;
            $contacto->cpc_financia = $request->input('cpc_financia') != null ? $request->input('cpc_financia') : 1;
            $contacto->cpc_sistemact = $request->input('cpc_sistemact');
            $contacto->cpc_sistemant = $request->input('cpc_sistemant');
            $contacto->cpc_conformidad = $request->input('cpc_conformidad') != null ? $request->input('cpc_conformidad') : 1;
            $contacto->cpc_cantlicen = $request->input('cpc_cantlicen') != 0 ? $request->input('cpc_cantlicen') : 0;
            $contacto->cpc_valorsist = $request->input('cpc_valorsist') != 0 ? floatval($request->input('cpc_valorsist')) : 0;
            $contacto->cpc_valorimpl = $request->input('cpc_valorimpl') != 0 ? floatval($request->input('cpc_valorimpl')) : 0;
            $contacto->cpc_valortotal = $request->input('cpc_valortotal') != 0 ? floatval($request->input('cpc_valortotal')) : 0;
            $contacto->cpc_diasimple = $request->input('cpc_diasimple') != 0 ? $request->input('cpc_diasimple') : 0;
            $contacto->cpc_preciomanteni = $request->input('cpc_preciomanteni') != null ? $request->input('cpc_preciomanteni') : 0;
            $contacto->cpc_fechademo = $request->input('cpc_fechademo');
            $contacto->cpc_feccierre = $request->input('cpc_feccierre');
            $contacto->cpc_motcierreneg = $request->input('cpc_motcierreneg') != null ? $request->input('cpc_motcierreneg') : 4;
            $contacto->cpc_fechareact = $request->input('cpc_fechareact');
            if ($request->cpc_fecha ) {
                $contacto->cpc_fecha = $request->input('cpc_fecha');
            }
            $contacto->cpc_modalidadcontac = $request->input('cpc_modalidadcontac');
            $contacto->cpc_usuario = $request->input('cpc_usuario');
            $contacto->cpc_modocontac = $request->input('cpc_modocontac');
            $contacto->cpc_tipocont = $request->input('cpc_tipocont');
            $contacto->cpc_vendedor = $request->input('cpc_vendedor') != null ? $request->input('cpc_vendedor') : 1;
            $contacto->cpc_detallecont = $request->input('cpc_detallecont');
            $contacto->cpc_prospecto = $request->input('cpp_codigo');
            $contacto->cpc_confprovactual = $request->input('cpc_confprovactual');
            $contacto->cpc_fechaimplemen = $request->input('cpc_fechaimplemen');
            $contacto->cpc_fechaplanifica = $request->input('cpcp_fechaprox');
            $contacto->cpc_fechacarga = $request->input('fechacarga');
            $contacto->cpc_motivo = $request->input('cpc_motivo');

            if ($request->file('cpc_adjunto') != null) {
                $contacto->cpc_adjunto = pathinfo($namefile, PATHINFO_BASENAME);
                $contacto->cpc_tipoarc = pathinfo($namefile, PATHINFO_EXTENSION);
            }

            $contacto->save();

            if ($request->cpc_sistemeva) {
                $contacto->sistemaEvaluados()->sync($request->cpc_sistemeva);
            }

            if ($request->input('cpc_estado') != 5 && $request->input('cpc_estado') != 8) {
                $proxContacto = new ContactoProxCliPot();
                $proxContacto->cpcp_fechaprox = $request->input('cpcp_fechaprox');
                $proxContacto->cpcp_vendeprox = $request->input('cpcp_vendeprox') != null ? $request->input('cpcp_vendeprox') : 1;
                $proxContacto->cpcp_detalleprox = $request->input('cpcp_detalleprox');
                $proxContacto->cpcp_prospecto = $request->input('cpp_codigo');
                $proxContacto->cpcp_contacto = $contacto->cpc_codigo;
                $proxContacto->cpcp_fechacarga = $request->input('fechacarga');
                $proxContacto->cpcp_usuarioprox = $request->input('cpcp_usuarioprox');
                $proxContacto->save();
            }

            return redirect('/agenda')->with('success', 'Se ha cargado un nuevo contacto al prospecto correctamente');
        } else {

            $prospecto = ProspectoCliPot::findOrNew($id);

            $prospecto->cpp_nombre = $request->input('con_nombre');
            $prospecto->cpp_conces = $request->input('cpp_conces');
            $prospecto->cpp_pais = $request->input('cpp_pais');
            $prospecto->cpp_provincia = $request->input('cpp_provincia');
            $prospecto->cpp_codpos1 = $request->input('cpp_codpos1');
            $prospecto->cpp_codpos2 = $request->input('cpp_codpos2');
            $prospecto->cpp_localinombre = $request->input('localidad');
            $prospecto->cpp_domicilio = $request->input('cpp_domicilio');
            $prospecto->cpp_categemp = $request->input('cpp_categemp') != null ? $request->input('cpp_categemp') : 1;
            $prospecto->cpp_tipoprod = 1;
            $prospecto->cpp_sophab = $request->input('cpp_sophab') != null ? $request->input('cpp_sophab') : 1;
            $prospecto->cpp_tipomarca = $request->input('cpp_tipomarca');
            $prospecto->cpp_marca = $request->input('cpp_marca');
            $prospecto->cpp_marcadetalle = $request->input('cpp_marcadetalle');
            $prospecto->cpp_actividad = $request->input('cpp_actividad');
            $prospecto->cpp_tiporig = $request->input('cpp_tiporig');
            $prospecto->cpp_nombreorig = $request->input('cpp_nombreorig');
            $prospecto->cpp_vendedor = $request->input('cpp_vendedor');
            $prospecto->cpp_fechafac = $request->input('cpp_fechafac');
            $prospecto->cpp_numfac = $request->input('cpp_numfac');
            $prospecto->cpp_conocsiac = $request->input('cpp_conocsiac');
            $prospecto->cpp_telefono = $request->input('cpp_telefono');
            $prospecto->cpp_celular = $request->input('cpp_celular');
            $prospecto->cpp_email = $request->input('cpp_email');
            $prospecto->cpp_observa = $request->input('cpp_observa') != null ? $request->input('cpp_observa') : '-';
            $prospecto->cpp_conocsiac = $request->input('cpp_conocsiac') != null ? $request->input('cpp_conocsiac') : 0;
            $prospecto->cpp_fechacarga = $request->input('fechacarga');
            $prospecto->cpp_categoria = $request->input('cpp_categoria');
            $prospecto->cpp_tipoprod = 1;

            $prospecto->save();

            $contacto = ContactoCliPot::where('cpc_prospecto', '=', $id)->orderBy('cpc_codigo', 'desc')->first();
            $contacto->cpc_estado = $request->input('cpc_estado') != null ? $request->input('cpc_estado') : 9;
            $contacto->cpc_probcierre = $request->input('cpc_probcierre') != null ? $request->input('cpc_probcierre') : 1;
            $contacto->cpc_financia = $request->input('cpc_financia') != null ? $request->input('cpc_financia') : 1;
            $contacto->cpc_sistemact = $request->input('cpc_sistemact') != null ? $request->input('cpc_sistemact') : 1;
            $contacto->cpc_sistemant = $request->input('cpc_sistemant') != null ? $request->input('cpc_sistemant') : 1;
            $contacto->cpc_conformidad = $request->input('cpc_conformidad') != null ? $request->input('cpc_conformidad') : 1;
            $contacto->cpc_cantlicen = $request->input('cpc_cantlicen');
            $contacto->cpc_valorsist = floatval($request->input('cpc_valorsist')) != null ? $request->input('cpc_valorsist') : 0;
            $contacto->cpc_valorimpl = floatval($request->input('cpc_valorimpl')) != null ? $request->input('cpc_valorimpl') : 0;
            $contacto->cpc_valortotal = floatval($request->input('cpc_valortotal')) != null ? $request->input('cpc_valortotal') : 0;
            $contacto->cpc_diasimple = $request->input('cpc_diasimple');
            $contacto->cpc_preciomanteni = $request->input('cpc_preciomanteni') != null ? $request->input('cpc_preciomanteni') : 0;
            $contacto->cpc_fechademo = $request->input('cpc_fechademo');
            $contacto->cpc_feccierre = $request->input('cpc_feccierre') != null ? $request->input('cpc_feccierre') : '1900-01-01';
            $contacto->cpc_motcierreneg = $request->input('cpc_motcierreneg') != null ? $request->input('cpc_motcierreneg') : 4;
            $contacto->cpc_fechareact = $request->input('cpc_fechareact');

            if ($request->cpc_fecha ) {
                $contacto->cpc_fecha = $request->input('cpc_fecha');
            }

            $contacto->cpc_modalidadcontac = $request->input('cpc_modalidadcontac') != null ? $request->input('cpc_modalidadcontac') : 1;
            $contacto->cpc_usuario = $request->input('cpc_usuario');
            $contacto->cpc_modocontac = $request->input('cpc_modocontac') != null ? $request->input('cpc_modocontac') : 1;
            $contacto->cpc_tipocont = $request->input('cpc_tipocont') != null ? $request->input('cpc_tipocont') : 1;
            $contacto->cpc_vendedor = $request->input('cpc_vendedor') != null ? $request->input('cpc_vendedor') : 1;
            $contacto->cpc_detallecont = $request->input('cpc_detallecont');
            $contacto->cpc_prospecto = $request->input('cpp_codigo');
            $contacto->cpc_confprovactual = $request->input('cpc_confprovactual') != null ? $request->input('cpc_confprovactual') : 1;
            $contacto->cpc_fechaimplemen = $request->input('cpc_fechaimplemen');
            //$contacto->cpc_fechaplanifica = $request->input('cpc_fechaplanifica') != '1900-01-01' ? $request->input('cpc_fechaplanifica') : $request->input('cpcp_fechaprox');
            $contacto->cpc_fechaplanifica = $request->input('cpcp_fechaprox');
            $contacto->cpc_motivo = $request->input('cpc_motivo') != null ? $request->input('cpc_motivo') : '-';
            $contacto->cpc_fechacarga = $request->input('fechacarga');

            if ($request->file('cpc_adjunto') != null) {
                $contacto->cpc_adjunto = pathinfo($namefile, PATHINFO_BASENAME);
                $contacto->cpc_tipoarc = pathinfo($namefile, PATHINFO_EXTENSION);
            }

            $contacto->save();

            if ($request->cpc_sistemeva) {
                $contacto->sistemaEvaluados()->sync($request->cpc_sistemeva);
            }


            $proxContacto = ContactoProxCliPot::where('cpcp_prospecto', '=', $id)
                ->where('cpcp_contacto', '=', $contacto->cpc_codigo)
                ->get();

            if ($proxContacto->count() == 0){

                $proxCont = new ContactoProxCliPot();
                $proxCont->cpcp_fechaprox = $request->input('cpcp_fechaprox');
                $proxCont->cpcp_vendeprox = $request->input('cpcp_vendeprox') != null ? $request->input('cpcp_vendeprox') : 1;
                $proxCont->cpcp_detalleprox = $request->input('cpcp_detalleprox');
                $proxCont->cpcp_prospecto = $request->input('cpp_codigo');
                $proxCont->cpcp_contacto = $contacto->cpc_codigo;
                $proxCont->cpcp_fechacarga = $request->input('fechacarga');
                $proxCont->cpcp_usuarioprox = $request->input('cpcp_usuarioprox');
                $proxCont->save();

            } else {
                $proxCont = ContactoProxCliPot::where('cpcp_prospecto', '=', $id)
                    ->where('cpcp_contacto', '=', $contacto->cpc_codigo)
                    ->first();
                $proxCont->cpcp_fechaprox = $request->input('cpcp_fechaprox');
                $proxCont->cpcp_vendeprox = $request->input('cpcp_vendeprox') != null ? $request->input('cpcp_vendeprox') : 1;
                $proxCont->cpcp_detalleprox = $request->input('cpcp_detalleprox');
                $proxCont->cpcp_fechacarga = $request->input('fechacarga');
                $proxCont->cpcp_usuarioprox = $request->input('cpcp_usuarioprox');
                $proxCont->save();
            }


            if ($request->input('concePotencial') == 0){
                return redirect('/agenda')->with('success', 'Se ha actualizado el prospecto correctamente');
            } else{
                return redirect('/agenda')->with('success', 'Se ha actualizado correctamente el registro');
            }

        }
    }

    public function store(Request $request)
    {
        if ($request->file('cpc_adjunto') != null) {
            $file = $request->file('cpc_adjunto');
            $namefile = $file->getClientOriginalName();

            \Storage::disk('local')->put($namefile, \File::get($file));
        }
        
        $prospecto = new ProspectoCliPot();
        $prospecto->cpp_nombre = $request->input('con_nombre');
        $prospecto->cpp_conces = $request->input('cpp_conces');
        $prospecto->cpp_pais = $request->input('cpp_pais');
        $prospecto->cpp_provincia = $request->input('cpp_provincia');
        $prospecto->cpp_codpos1 = $request->input('cpp_codpos1');
        $prospecto->cpp_codpos2 = $request->input('cpp_codpos2');
        $prospecto->cpp_localinombre = $request->input('localidad');
        $prospecto->cpp_domicilio = $request->input('cpp_domicilio');
        $prospecto->cpp_categemp = $request->input('cpp_categemp') != null ? $request->input('cpp_categemp') : 1;
        $prospecto->cpp_tipoprod = 1;
        $prospecto->cpp_sophab = $request->input('cpp_sophab') != null ? $request->input('cpp_sophab') : 1;
        $prospecto->cpp_tipomarca = $request->input('cpp_tipomarca');
        $prospecto->cpp_marca = $request->input('cpp_marca');
        $prospecto->cpp_marcadetalle = $request->input('cpp_marcadetalle');
        $prospecto->cpp_actividad = $request->input('cpp_actividad');
        $prospecto->cpp_tiporig = $request->input('cpp_tiporig');
        $prospecto->cpp_nombreorig = $request->input('cpp_nombreorig');
        $prospecto->cpp_vendedor = $request->input('cpp_vendedor');
        $prospecto->cpp_fechafac = $request->input('cpp_fechafac');
        $prospecto->cpp_numfac = $request->input('cpp_numfac');
        $prospecto->cpp_telefono = $request->input('cpp_telefono');
        $prospecto->cpp_celular = $request->input('cpp_celular');
        $prospecto->cpp_email = $request->input('cpp_email');
        $prospecto->cpp_observa = $request->input('cpp_observa') != null ? $request->input('cpp_observa') : '-';
        $prospecto->cpp_conocsiac = $request->input('cpp_conocsiac') != null ? $request->input('cpp_conocsiac') : 0;
        $prospecto->cpp_fechacarga = $request->input('fechacarga');
        $prospecto->cpp_categoria = $request->input('cpp_categoria');
        $prospecto->cpp_tipoprod = 1;


        $prospecto->save();

        $maxProspecto = $this->prospectoCliPotRepository->getMaxCodigo();

        $contacto = new ContactoCliPot();
        $contacto->cpc_estado = $request->input('cpc_estado') != null ? $request->input('cpc_estado') : 9;
        $contacto->cpc_probcierre = $request->input('cpc_probcierre') != null ? $request->input('cpc_probcierre') : 1;
        $contacto->cpc_financia = $request->input('cpc_financia') != null ? $request->input('cpc_financia') : 1;
        $contacto->cpc_sistemact = $request->input('cpc_sistemact') != null ? $request->input('cpc_sistemact') : 1;
        $contacto->cpc_sistemant = $request->input('cpc_sistemant') != null ? $request->input('cpc_sistemant') : 1;
        $contacto->cpc_conformidad = $request->input('cpc_conformidad') != null ? $request->input('cpc_conformidad') : 0;
        $contacto->cpc_cantlicen = $request->input('cpc_cantlicen');
        $contacto->cpc_valorsist = floatval($request->input('cpc_valorsist')) != null ? $request->input('cpc_valorsist') : 0;
        $contacto->cpc_valorimpl = floatval($request->input('cpc_valorimpl')) != null ? $request->input('cpc_valorimpl') : 0;
        $contacto->cpc_valortotal = floatval($request->input('cpc_valortotal')) != null ? $request->input('cpc_valortotal') : 0;
        $contacto->cpc_diasimple = $request->input('cpc_diasimple');
        $contacto->cpc_preciomanteni = $request->input('cpc_preciomanteni');
        $contacto->cpc_fechademo = $request->input('cpc_fechademo');
        $contacto->cpc_feccierre = $request->input('cpc_feccierre');
        $contacto->cpc_confprovactual = $request->input('cpc_confprovactual') != null ? $request->input('cpc_confprovactual') : 1;
        $contacto->cpc_motcierreneg = $request->input('cpc_motcierreneg') != null ? $request->input('cpc_motcierreneg') : 4;
        $contacto->cpc_fechareact = $request->input('cpc_fechareact');
        if ($request->cpc_fecha ) {
            $contacto->cpc_fecha = $request->input('cpc_fecha');
        }
        $contacto->cpc_modalidadcontac = $request->input('cpc_modalidadcontac') != null ? $request->input('cpc_modalidadcontac') : 1;
        $contacto->cpc_usuario = $request->input('cpc_usuario');
        $contacto->cpc_modocontac = $request->input('cpc_modocontac') != null ? $request->input('cpc_modocontac') : 1;
        $contacto->cpc_tipocont = $request->input('cpc_tipocont') != null ? $request->input('cpc_tipocont') : 1;
        $contacto->cpc_vendedor = $request->input('cpc_vendedor') != null ? $request->input('cpc_vendedor') : 1;
        $contacto->cpc_detallecont = $request->input('cpc_detallecont');
        $contacto->cpc_fechaimplemen = $request->input('cpc_fechaimplemen');

        // Cuando se guarda por primera vez la fecha de planificacion se guarda con la fecha de prox contacto
        $contacto->cpc_fechaplanifica = $request->input('cpcp_fechaprox');
        $contacto->cpc_motivo = $request->input('cpc_motivo') != null ? $request->input('cpc_motivo') : '-';
        $contacto->cpc_fechacarga = $request->input('fechacarga');


        if ($request->file('cpc_adjunto') != null) {
            $contacto->cpc_adjunto = pathinfo($namefile, PATHINFO_BASENAME);
            $contacto->cpc_tipoarc = pathinfo($namefile, PATHINFO_EXTENSION);
        }
        $contacto->cpc_prospecto = $maxProspecto->maximo;


        $contacto->save();

        $sistemas[] = $request->cpc_sistemas;

        if ($request->cpc_sistemeva) {
            $contacto->sistemaEvaluados()->sync($request->cpc_sistemeva);
        }

        if ($request->input('cpc_estado') != 5 && $request->input('cpc_estado') != 8) {
            $maxContacto = $this->contactoRepository->getMaxCodigo();
            $proxContacto = new ContactoProxCliPot();
            $proxContacto->cpcp_fechaprox = $request->input('cpcp_fechaprox');
            $proxContacto->cpcp_vendeprox = $request->input('cpcp_vendeprox') != null ? $request->input('cpcp_vendeprox') : 1;
            $proxContacto->cpcp_detalleprox = $request->input('cpcp_detalleprox');
            $proxContacto->cpcp_prospecto = $maxProspecto->maximo;
            $proxContacto->cpcp_contacto = $maxContacto->maximo;
            $proxContacto->cpcp_fechacarga = $request->input('fechacarga');
            $proxContacto->cpcp_usuarioprox = $request->input('cpcp_usuarioprox');
            $proxContacto->save();
        }


        return redirect('/agenda')->with('success', 'El prospecto se ha cargado correctamente');


    }

    public function show($id)
    {
        $adjuntos = $this->contactoRepository->getAdjuntos($id);
        $marca = $this->marcaRepository->getMarca();
        $contacto = $this->contactoRepository->getUltimoContacto($id);
        $contactos = $this->contactoRepository->getContactosCliPotRealizados($id);
        $histreplanifica = $this->histReplanificaRepository->getHistReplanificaProsPoten($id);

        $modal_empresa = $this->prospectoCliPotRepository->getProspModal($id);
        
        return view('form_clipotenciales_show', compact('contacto', 'contactos', 'adjuntos','marca','histreplanifica','modal_empresa'));
    }

    public function editProspecto($id)
    {
        $tipoorigenpotenciales = $this->tipoOrigenPotencialesRepository->getTipoOrigenPotenciales();
        $estadoProspecto = $this->estadoProspectoRepository->getEstado();
        $probCierre = $this->probCierreRepository->getProbCierre();
        $vendedores = $this->vendedorRepository->getVendedores();
        $financiacion = $this->financiacionRepository->getFinanciacion();
        $modContacto = $this->modContactoRepository->getModContacto();
        $modoContac = $this->modoContacRepository->getModoContac();
        $tipoContac = $this->tipoContacRepository->getTipoContacPoten();
        $motCierreNeg = $this->motCierreNegRepository->getMotCierreNeg();
        $pais = $this->paisRepository->getPais();
        $provincia = $this->provinciaRepository->getProvincia(1);
        $actividad = $this->actividadRepository->getActividad();
        $marca = $this->marcaRepository->getMarca();
        $sistema = $this->sistemaRepository->getSistema();
        $tipoMarca = $this->tipoMarcaRepository->getTipoMarca();
        $contactos = $this->contactoRepository->getContactosCliPotRealizados($id);
        $contacto = $this->contactoRepository->getUltimoContacto($id);
        $adjuntos = $this->contactoRepository->getAdjuntos($id);
        $sistemas = $this->sistemaRepository->getSistemasAll();
        $confProvActual = $this->confProvActualRepository->getConfProvActual();
        $histreplanifica = $this->histReplanificaRepository->getHistReplanificaProsPoten($id);
        $categorias = $this->categoriasRepository->getCategoriaspotenciales();

        $modal_empresa = $this->prospectoCliPotRepository->getProspModal($id);

        return view('form_prospectos_poten', compact('tipoorigenpotenciales', 'estadoProspecto', 'probCierre', 'vendedores', 'financiacion', 'modContacto',
            'modoContac', 'tipoContac', 'motCierreNeg', 'pais', 'provincia', 'actividad', 'marca',
            'sistema', 'tipoMarca', 'contactos', 'contacto', 'adjuntos', 'sistemas','confProvActual','histreplanifica','categorias','modal_empresa'));
    }
    

    public function getCodPos1($localidad)
    {
        $codPos = substr($localidad, 0, 4);
        return $codPos;
    }

    public function getClientesPotenciales($id)
    {
        $prospectoclipot = $this->contactoRepository->getUltimoContactoRePlanifica($id);

        return $prospectoclipot;
    }

    public function listado_data()
    {

        $prospectoclipot = $this->prospectoCliPotRepository->getProspectosCliPot();
        $prospectoclipot= collect($prospectoclipot);

        return Datatables::of($prospectoclipot)->make(true);
    }


    public function changefecfact(Request $request)
    {
        $codprospecto = $request->input('codprospecto');

        $prospecto = ProspectoCliPot::where('cpp_codigo', '=', $codprospecto)->first();
        $prospecto->cpp_fechafac = $request->input('fechafact');
        $prospecto->cpp_numfac = $request->input('numerofact');
        $prospecto->save();

        return ['created' => true];
    }
}