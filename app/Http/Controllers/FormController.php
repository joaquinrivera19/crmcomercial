<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Repositories\HistReplanificaRepository;
use Yajra\Datatables\Facades\Datatables;
use crmcomercial\Entities\Contacto;
use crmcomercial\Entities\ContactoProx;
use crmcomercial\Entities\ModContacto;
use crmcomercial\Entities\MotCierreNeg;
use crmcomercial\Entities\Prospecto;
use crmcomercial\Http\Requests;
use crmcomercial\Repositories\CampaniasRepository;
use crmcomercial\Repositories\CategoriasRepository;
use crmcomercial\Repositories\ClasesProductoRepository;
use crmcomercial\Repositories\ConcesRepository;
use crmcomercial\Repositories\ContactoProxRepository;
use crmcomercial\Repositories\ContactoRepository;
use crmcomercial\Repositories\EncuestaRepository;
use crmcomercial\Repositories\EstadoProspectoRepository;
use crmcomercial\Repositories\FinanciacionRepository;
use crmcomercial\Repositories\ModContactoRepository;
use crmcomercial\Repositories\ModoContacRepository;
use crmcomercial\Repositories\ModPrestacionRepository;
use crmcomercial\Repositories\MotCierreNegRepository;
use crmcomercial\Repositories\ProbCierreRepository;
use crmcomercial\Repositories\ProductoRepository;
use crmcomercial\Repositories\ProspectosRepository;
use crmcomercial\Repositories\TipoContacRepository;
use crmcomercial\Repositories\TipoOrigenRepository;
use crmcomercial\Repositories\VendedorRepository;
use crmcomercial\Http\Requests\FormRequest;
use Illuminate\Http\Request;

class FormController extends Controller
{

    public $categorias, $clasesProducto, $productos, $encuestas, $campanias, $tipoOrigen, $tipoContac,
        $estadoProspecto, $probCierre, $vendedores, $modPrestacion, $financiacion, $modoContac, $contactoProx;

    private $prospectoRepository, $categoriasRepository, $clasesProductoRepository, $productosRepository,
        $encuestaRepository, $campaniasRepository, $tipoOrigenRepository, $estadoProspectoRepository,
        $probCierreRepository, $vendedorRepository, $modPrestacionRepository, $financiacionRepository,
        $modContactoRepository, $modoContacRepository, $tipoContacRepository, $contactoRepository,
        $contactoProxRepository, $motCierreNegRepository,$histReplanificaRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProspectosRepository $prospectosRepository, CategoriasRepository $categoriasRepository,
                                ClasesProductoRepository $clasesProductoRepository, ProductoRepository $productosRepository,
                                EncuestaRepository $encuestaRepository, CampaniasRepository $campaniasRepository, TipoOrigenRepository $tipoOrigenRepository,
                                EstadoProspectoRepository $estadoProspectoRepository, ProbCierreRepository $probCierreRepository,
                                VendedorRepository $vendedorRepository, ModPrestacionRepository $modPrestacionRepository, FinanciacionRepository $financiacionRepository,
                                ModContactoRepository $modContactoRepository, ModoContacRepository $modoContacRepository, TipoContacRepository $tipoContacRepository,
                                ContactoRepository $contactoRepository, MotCierreNegRepository $motCierreNegRepository, ContactoProxRepository $contactoProxRepository,
                                HistReplanificaRepository $histReplanificaRepository)
    {
        $this->middleware('auth');
        $this->prospectoRepository = $prospectosRepository;
        $this->categoriasRepository = $categoriasRepository;
        $this->clasesProductoRepository = $clasesProductoRepository;
        $this->productosRepository = $productosRepository;
        $this->encuestaRepository = $encuestaRepository;
        $this->campaniasRepository = $campaniasRepository;
        $this->tipoOrigenRepository = $tipoOrigenRepository;
        $this->estadoProspectoRepository = $estadoProspectoRepository;
        $this->probCierreRepository = $probCierreRepository;
        $this->vendedorRepository = $vendedorRepository;
        $this->modPrestacionRepository = $modPrestacionRepository;
        $this->financiacionRepository = $financiacionRepository;
        $this->modContactoRepository = $modContactoRepository;
        $this->modoContacRepository = $modoContacRepository;
        $this->tipoContacRepository = $tipoContacRepository;
        $this->contactoRepository = $contactoRepository;
        $this->motCierreNegRepository = $motCierreNegRepository;
        $this->contactoProxRepository = $contactoProxRepository;
        $this->histReplanificaRepository = $histReplanificaRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prospectos = $this->prospectoRepository->getProspectos();

        return view('planilla_prospectos', ['prospectos' => $prospectos]);
    }

    public function create()
    {
        $categorias = $this->categoriasRepository->getCategorias();
        $clasesProducto = $this->clasesProductoRepository->getClasesProducto();
        $encuestas = $this->encuestaRepository->getEncuesta();
        $campanias = $this->campaniasRepository->getCampanias();
        $tipoOrigen = $this->tipoOrigenRepository->getTipoOrigen();
        $estadoProspecto = $this->estadoProspectoRepository->getEstado();
        $probCierre = $this->probCierreRepository->getProbCierre();
        $vendedores = $this->vendedorRepository->getVendedores();
        $modPrestacion = $this->modPrestacionRepository->getModPrestacion();
        $financiacion = $this->financiacionRepository->getFinanciacion();
        $modContacto = $this->modContactoRepository->getModContacto();
        $modoContac = $this->modoContacRepository->getModoContac();
        $tipoContac = $this->tipoContacRepository->getTipoContac();
        $motCierreNeg = $this->motCierreNegRepository->getMotCierreNeg();
        $sigProsp = $this->prospectoRepository->getSigCod();

        return view('form', compact('categorias', 'clasesProducto', 'encuestas', 'campanias', 'sigProsp',
            'tipoOrigen', 'estadoProspecto', 'probCierre', 'vendedores', 'modPrestacion', 'financiacion', 'modContacto',
            'modoContac', 'tipoContac', 'motCierreNeg'));
    }

    public function edit($id)
    {
        $categorias = $this->categoriasRepository->getCategorias();
        $clasesProducto = $this->clasesProductoRepository->getClasesProducto();
        $productos = $this->productosRepository->getProductos();
        $encuestas = $this->encuestaRepository->getEncuesta();
        $campanias = $this->campaniasRepository->getCampanias();
        $tipoOrigen = $this->tipoOrigenRepository->getTipoOrigen();
        $estadoProspecto = $this->estadoProspectoRepository->getEstado();
        $probCierre = $this->probCierreRepository->getProbCierre();
        $vendedores = $this->vendedorRepository->getVendedores();
        $modPrestacion = $this->modPrestacionRepository->getModPrestacion();
        $financiacion = $this->financiacionRepository->getFinanciacion();
        $modContacto = $this->modContactoRepository->getModContacto();
        $modoContac = $this->modoContacRepository->getModoContac();
        $tipoContac = $this->tipoContacRepository->getTipoContacCons();
        $prospectos = $this->prospectoRepository->getProspecto($id);
        $contactos = $this->contactoRepository->getContactosRealizados($id);
        $motCierreNeg = $this->motCierreNegRepository->getMotCierreNeg();
        $adjuntos = $this->contactoRepository->getAdjuntos($id);

        $histreplanifica = $this->histReplanificaRepository->getHistReplanificaProsConsul($id);
        $modal_empresa = $this->prospectoRepository->getProspModal($id);
        

        return view('form_edit', compact('prospectos', 'categorias', 'clasesProducto', 'productos', 'encuestas', 'campanias',
            'tipoOrigen', 'estadoProspecto', 'probCierre', 'vendedores', 'modPrestacion', 'financiacion', 'modContacto',
            'modoContac', 'tipoContac', 'contactos', 'motCierreNeg','histreplanifica','modal_empresa','adjuntos'));
    }

    public function update(Request $request, $id)
    {

        if ($request->file('coc_adjunto') != null) {
            $file = $request->file('coc_adjunto');
            $namefile = $file->getClientOriginalName();

            \Storage::disk('local')->put($namefile, \File::get($file));
        }

        if ($request->input('editProsp') != 1) {

            $prospecto = Prospecto::findOrNew($id);
            $prospecto->pro_fechafac = $request->input('pro_fechafac');
            $prospecto->pro_numfac = $request->input('pro_numfac');
            $prospecto->pro_fechacarga = $request->input('fechacarga');
            $prospecto->save();

            $contacto = new Contacto();
            $contacto->coc_encuesta = $request->input('coc_encuesta');
            $contacto->coc_estado = $request->input('coc_estado');
            $contacto->coc_probcierre = $request->input('coc_probcierre');
            $contacto->coc_cantdias = $request->input('coc_cantdias');
            $contacto->coc_modprest = $request->input('coc_modprest') != null ? $request->input('coc_modprest') : 1;
            $contacto->coc_cotizapro = floatval($request->input('coc_cotizapro')) != null ? $request->input('coc_cotizapro') : 0;
            $contacto->coc_cotizaserv = floatval($request->input('coc_cotizaserv')) != null ? $request->input('coc_cotizaserv') : 0;
            $contacto->coc_cotizatotal = floatval($request->input('coc_cotizatotal')) != null ? $request->input('coc_cotizatotal') : 0;
            $contacto->coc_canthoras = $request->input('coc_canthoras');
            $contacto->coc_financia = $request->input('coc_financia') != null ? $request->input('coc_financia') : 1;
            $contacto->coc_fechademo = $request->input('coc_fechademo');
            $contacto->coc_feccierre = $request->input('coc_feccierre');
            $contacto->coc_MotCierreNeg = $request->input('coc_MotCierreNeg') != null ? $request->input('coc_MotCierreNeg') : 4;
            $contacto->coc_fecha = $request->input('coc_fecha');
            $contacto->coc_modcont = $request->input('coc_modcont');
            $contacto->coc_usuario = $request->input('coc_usuario');
            $contacto->coc_modocontac = $request->input('coc_modocontac');
            $contacto->coc_tipocont = $request->input('coc_tipocont');
            $contacto->coc_vendedor = $request->input('coc_vendedor') != null ? $request->input('coc_vendedor') : 1;
            $contacto->coc_detallecont = $request->input('coc_detallecont');
            $contacto->coc_prospecto = $request->input('pro_codigo');
            $contacto->coc_fechacarga = $request->input('fechacarga');
            $contacto->coc_fechaplanifica = $request->input('comp_fechaprox');
            $contacto->coc_motivo = $request->input('coc_motivo');
            
            if ($request->file('coc_adjunto') != null) {
                $contacto->coc_adjunto = pathinfo($namefile, PATHINFO_BASENAME);
                $contacto->coc_tipoarc = pathinfo($namefile, PATHINFO_EXTENSION);
            }

            $contacto->save();


            if ($request->input('coc_estado') != 5 && $request->input('coc_estado') != 8) {
                $proxContacto = new ContactoProx();
                $proxContacto->comp_fechaprox = $request->input('comp_fechaprox');
                $proxContacto->comp_vendeprox = $request->input('comp_vendeprox') != null ? $request->input('comp_vendeprox') : 1;
                $proxContacto->comp_detalleprox = $request->input('comp_detalleprox');
                $proxContacto->comp_prospecto = $request->input('pro_codigo');
                $proxContacto->comp_contacto = $contacto->coc_codigo;
                $proxContacto->comp_fechacarga = $request->input('fechacarga');
                $proxContacto->comp_usuarioprox = $request->input('comp_usuarioprox');
                $proxContacto->save();
            }   

            return redirect('/agenda')->with('success', 'Se ha cargado el contacto correctamente');

        } else {
            $prospecto = Prospecto::findOrNew($id);
            $prospecto->pro_conces = $request->input('pro_conces');
            $prospecto->pro_categoria = $request->input('pro_categoria');
            $prospecto->pro_clasprod = $request->input('pro_clasprod');
            $prospecto->pro_producto = $request->input('pro_producto');
            $prospecto->pro_detalleprod = $request->input('pro_detalleprod');
            $prospecto->pro_nombrecamp = $request->input('pro_nombrecamp');
            $prospecto->pro_tiporig = $request->input('pro_tiporig');
            $prospecto->pro_nombreorig = $request->input('pro_nombreorig');
            $prospecto->pro_vendedor = $request->input('pro_vendedor');
            $prospecto->pro_fechafac = $request->input('pro_fechafac');
            $prospecto->pro_numfac = $request->input('pro_numfac');
            $prospecto->pro_clientenombre = $request->input('con_nombre');
            $prospecto->pro_fechacarga = $request->input('fechacarga');

            $prospecto->save();


            $contacto = Contacto::where('coc_prospecto', '=', $id)->orderBy('coc_codigo', 'desc')->first();

            $contacto->coc_encuesta = $request->input('coc_encuesta');
            $contacto->coc_estado = $request->input('coc_estado');
            $contacto->coc_probcierre = $request->input('coc_probcierre');
            $contacto->coc_cantdias = $request->input('coc_cantdias');
            $contacto->coc_modprest = $request->input('coc_modprest') != null ? $request->input('coc_modprest') : 1;
            $contacto->coc_cotizapro = floatval($request->input('coc_cotizapro')) != null ? $request->input('coc_cotizapro') : 0;
            $contacto->coc_cotizaserv = floatval($request->input('coc_cotizaserv')) != null ? $request->input('coc_cotizaserv') : 0;
            $contacto->coc_cotizatotal = floatval($request->input('coc_cotizatotal')) != null ? $request->input('coc_cotizatotal') : 0;
            $contacto->coc_canthoras = $request->input('coc_canthoras');
            $contacto->coc_financia = $request->input('coc_financia') != null ? $request->input('coc_financia') : 1;
            $contacto->coc_fechademo = $request->input('coc_fechademo');
            $contacto->coc_feccierre = $request->input('coc_feccierre');
            $contacto->coc_MotCierreNeg = $request->input('coc_MotCierreNeg') != null ? $request->input('coc_MotCierreNeg') : 4;
            $contacto->coc_fecha = $request->input('coc_fecha');
            $contacto->coc_vendedor = $request->input('coc_vendedor') != null ? $request->input('coc_vendedor') : 1;
            $contacto->coc_detallecont = $request->input('coc_detallecont');
            $contacto->coc_fechacarga = $request->input('fechacarga');
            $contacto->coc_fechaplanifica = $request->input('coc_fechaplanifica') != '1900-01-01' ? $request->input('coc_fechaplanifica') : $request->input('comp_fechaprox');
            $contacto->coc_motivo = $request->input('coc_motivo');

            if ($request->file('coc_adjunto') != null) {
                $contacto->coc_adjunto = pathinfo($namefile, PATHINFO_BASENAME);
                $contacto->coc_tipoarc = pathinfo($namefile, PATHINFO_EXTENSION);
            }
            
            $contacto->save();


            $proxContacto = ContactoProx::where('comp_prospecto', '=', $id)->orderBy('comp_codigo', 'desc')->first();
            $proxContacto->comp_fechaprox = $request->input('comp_fechaprox');
            $proxContacto->comp_vendeprox = $request->input('comp_vendeprox') != null ? $request->input('comp_vendeprox') : 1;
            $proxContacto->comp_detalleprox = $request->input('comp_detalleprox');
            $proxContacto->comp_prospecto = $request->input('pro_codigo');
            $proxContacto->comp_contacto = $contacto->coc_codigo;
            $proxContacto->comp_fechacarga = $request->input('fechacarga');
            $proxContacto->comp_usuarioprox = $request->input('comp_usuarioprox');
            $proxContacto->save();

            return redirect('/agenda')->with('success', 'Se ha actualizado el prospecto correctamente');
        }

    }

    public function store(FormRequest $request)
    {
        if ($request->file('coc_adjunto') != null) {
            $file = $request->file('coc_adjunto');
            $namefile = $file->getClientOriginalName();

            \Storage::disk('local')->put($namefile, \File::get($file));
        }

        $prospecto = new Prospecto();
        $prospecto->pro_conces = $request->input('pro_conces');
        $prospecto->pro_categoria = $request->input('pro_categoria');
        $prospecto->pro_clasprod = $request->input('pro_clasprod');
        $prospecto->pro_producto = $request->input('pro_producto');
        $prospecto->pro_detalleprod = $request->input('pro_detalleprod');
        $prospecto->pro_nombrecamp = $request->input('pro_nombrecamp');
        $prospecto->pro_tiporig = $request->input('pro_tiporig');
        $prospecto->pro_nombreorig = $request->input('pro_nombreorig');
        $prospecto->pro_vendedor = $request->input('pro_vendedor');
        $prospecto->pro_fechafac = $request->input('pro_fechafac');
        $prospecto->pro_numfac = $request->input('pro_numfac');
        $prospecto->pro_clientenombre = $request->input('con_nombre');
        $prospecto->pro_fechacarga = $request->input('fechacarga');
        $prospecto->save();

        $maxProspecto = $this->prospectoRepository->getMaxCodigo();

        $contacto = new Contacto();
        $contacto->coc_encuesta = $request->input('coc_encuesta');
        $contacto->coc_estado = $request->input('coc_estado');
        $contacto->coc_probcierre = $request->input('coc_probcierre');
        $contacto->coc_cantdias = floatval($request->input('coc_cantdias'));
        $contacto->coc_modprest = $request->input('coc_modprest') != null ? $request->input('coc_modprest') : 1;
        $contacto->coc_cotizapro = floatval($request->input('coc_cotizapro')) != null ? $request->input('coc_cotizapro') : 0;
        $contacto->coc_cotizaserv = floatval($request->input('coc_cotizaserv')) != null ? $request->input('coc_cotizaserv') : 0;
        $contacto->coc_cotizatotal = floatval($request->input('coc_cotizatotal')) != null ? $request->input('coc_cotizatotal') : 0;
        $contacto->coc_canthoras = floatval($request->input('coc_canthoras'));
        $contacto->coc_financia = $request->input('coc_financia') != null ? $request->input('coc_financia') : 1;
        $contacto->coc_fechademo = $request->input('coc_fechademo');
        $contacto->coc_feccierre = $request->input('coc_feccierre');
        $contacto->coc_MotCierreNeg = $request->input('coc_MotCierreNeg') != null ? $request->input('coc_MotCierreNeg') : 4;
        $contacto->coc_fecha = $request->input('coc_fecha');
        $contacto->coc_modcont = $request->input('coc_modcont');
        $contacto->coc_usuario = $request->input('coc_usuario');
        $contacto->coc_modocontac = $request->input('coc_modocontac');
        $contacto->coc_tipocont = $request->input('coc_tipocont');
        $contacto->coc_vendedor = $request->input('coc_vendedor') != null ? $request->input('coc_vendedor') : 1;
        $contacto->coc_detallecont = $request->input('coc_detallecont');
        $contacto->coc_fechacarga = $request->input('fechacarga');
        
        // Cuando se guarda por primera vez la fecha de planificacion se guarda con la fecha de prox contacto
        $contacto->coc_fechaplanifica = $request->input('comp_fechaprox');
        $contacto->coc_motivo = $request->input('coc_motivo');
        
        if ($request->file('coc_adjunto') != null) {
            $contacto->coc_adjunto = pathinfo($namefile, PATHINFO_BASENAME);
            $contacto->coc_tipoarc = pathinfo($namefile, PATHINFO_EXTENSION);
        }
        $contacto->coc_prospecto = $maxProspecto->maximo;
        $contacto->save();

        $maxContacto = $this->contactoRepository->getMaxCod();

        if ($request->input('coc_estado') != 5 && $request->input('coc_estado') != 8) {
            $proxContacto = new ContactoProx();
            $proxContacto->comp_fechaprox = $request->input('comp_fechaprox');
            $proxContacto->comp_vendeprox = $request->input('comp_vendeprox') != null ? $request->input('comp_vendeprox') : 1;
            $proxContacto->comp_detalleprox = $request->input('comp_detalleprox');
            $proxContacto->comp_prospecto = $maxProspecto->maximo;
            $proxContacto->comp_contacto = $maxContacto->maximo;
            $proxContacto->comp_fechacarga = $request->input('fechacarga');
            $proxContacto->comp_usuarioprox = $request->input('comp_usuarioprox');
            $proxContacto->save();
        }

        return redirect('/agenda')->with('success', 'El prospecto se ha cargado correctamente');
    }

    public function show($id)
    {
        $adjuntos = $this->contactoRepository->getAdjuntos($id);
        $contacto = $this->contactoRepository->getUltimoContacto($id);
        $contactos = $this->contactoRepository->getContactosRealizados($id);

        $histreplanifica = $this->histReplanificaRepository->getHistReplanificaProsConsul($id);
        $modal_empresa = $this->prospectoRepository->getProspModal($id);
        
        return view('form_show', compact('contacto', 'contactos', 'adjuntos','histreplanifica','modal_empresa'));
    }

    public function editProspecto($id)
    {
        $categorias = $this->categoriasRepository->getCategorias();
        $clasesProducto = $this->clasesProductoRepository->getClasesProducto();
        $productos = $this->productosRepository->getProductos();
        $encuestas = $this->encuestaRepository->getEncuesta();
        $campanias = $this->campaniasRepository->getCampanias();
        $tipoOrigen = $this->tipoOrigenRepository->getTipoOrigen();
        $estadoProspecto = $this->estadoProspectoRepository->getEstado();
        $probCierre = $this->probCierreRepository->getProbCierre();
        $vendedores = $this->vendedorRepository->getVendedores();
        $modPrestacion = $this->modPrestacionRepository->getModPrestacion();
        $financiacion = $this->financiacionRepository->getFinanciacion();
        $modContacto = $this->modContactoRepository->getModContacto();
        $modoContac = $this->modoContacRepository->getModoContac();
        $tipoContac = $this->tipoContacRepository->getTipoContacCons();
        $motCierreNeg = $this->motCierreNegRepository->getMotCierreNeg();
        $adjuntos = $this->contactoRepository->getAdjuntos($id);
        $prospectos = $this->contactoRepository->getUltimoContacto($id);
        $contactos = $this->contactoRepository->getContactosRealizados($id);
        $contactoProx = $this->contactoProxRepository->getUltContacto($prospectos->pro_codigo, $prospectos->coc_codigo);

        $histreplanifica = $this->histReplanificaRepository->getHistReplanificaProsConsul($id);
        $modal_empresa = $this->prospectoRepository->getProspModal($id);

        return view('form_prospecto', compact('prospectos', 'categorias', 'clasesProducto', 'productos', 'encuestas', 'campanias',
            'tipoOrigen', 'estadoProspecto', 'probCierre', 'vendedores', 'modPrestacion', 'financiacion', 'modContacto',
            'modoContac', 'tipoContac', 'motCierreNeg', 'adjuntos', 'contactos', 'contactoProx','histreplanifica','modal_empresa'));
    }

    public function autocompleteConces(Request $request)
    {
        $term = $request->input('term');
        $results = array();

        $queries = \DB::table('conces')
            ->where('con_nombre', 'LIKE', '%' . $term . '%')
            ->get();

        foreach ($queries as $query) {
            $results[] = ['id' => $query->con_codigo, 'value' => $query->con_codigo . ' - ' . $query->con_nombre];
        }
        return \Response::json($results);
    }


    public function listado_data()
    {

        $prospectos = $this->prospectoRepository->getProspectos();
        $prospectos= collect($prospectos);
        
        return Datatables::of($prospectos)->make(true);
    }

    public function changefecfact(Request $request)
    {
        $codprospecto = $request->input('codprospecto');

        $prospecto = Prospecto::where('pro_codigo', '=', $codprospecto)->first();
        $prospecto->pro_fechafac = $request->input('fechafact');
        $prospecto->pro_numfac = $request->input('numerofact');
        $prospecto->save();

        return ['created' => true];
    }

}