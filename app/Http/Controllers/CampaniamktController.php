<?php

namespace crmcomercial\Http\Controllers;

use Yajra\Datatables\Facades\Datatables;
use crmcomercial\Entities\Campaniamkt;
use crmcomercial\Repositories\CampaniamktExportacionRepository;
use crmcomercial\Repositories\CampaniamktRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

use crmcomercial\Http\Requests;



class CampaniamktController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $campaniamktRepository, $campaniamktExportacionRepository;
    
    public function __construct(CampaniamktRepository $campaniamktRepository, CampaniamktExportacionRepository $campaniamktExportacionRepository)
    {
        $this->middleware('auth');
        $this->campaniamktRepository = $campaniamktRepository;
        $this->campaniamktExportacionRepository = $campaniamktExportacionRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campaniasmkt=$this->campaniamktRepository->getCampaniamkt();
        $sigcodigo = $this->campaniamktRepository->getSigCod();

        return view('campaniamkt',compact('campaniasmkt','sigcodigo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $campaniasmkt = New Campaniamkt();

        $sigcod = $request->input('sigcodigo');
        $campaniasmkt->camk_descripcion = $request->input('camk_descripcion');
        $campaniasmkt->camk_feccarga = $request->input('camk_feccarga');
        $campaniasmkt->camk_abrevia = $request->input('camk_abrevia');
        $campaniasmkt->camk_url = $request->input('camk_url');

        $url = $request->input('camk_url_img');

        $file = $request->file('camk_foto');

        if ($file) {

            $nameext = $file->getClientOriginalExtension();

            $namecomp = $sigcod. '.' .$nameext;
            $namecompurl = $url. '.' .$nameext;
            $campaniasmkt->camk_url_img = $namecompurl;
            Storage::disk('ftp')->put('actualizar/BannerSIAC/ImagenesMkt/'.$namecomp, \File::get($file));
            $campaniasmkt->camk_foto = pathinfo($namecomp, PATHINFO_BASENAME);
        }



        if ($request->camk_estado) {
            $campaniasmkt->camk_estado = 1;
        } else {
            $campaniasmkt->camk_estado = 0;
        }

        $campaniasmkt->save();

        $this->subir();

        return redirect()->route('campaniamkt.create')->with('success', 'El registro se ha cargado correctamente');
    }

    public function subir()
    {

        $campaniasmktt = $this->campaniamktRepository->getCampaniamktlist();
        $myName = "campañas.txt";

        Storage::disk('ftp')->put('actualizar/BannerSIAC/'.$myName, $campaniasmktt);

        return redirect()->route('campaniamkt.create')->with('success', 'El TXT se actualizó correctamente');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaniamkt=Campaniamkt::find($id);
        return view('campaniamkt_edit',compact('campaniamkt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$request->has('camk_estado')) {
            $request->merge(['camk_estado' => 0]);
        } else {
            $request->merge(['camk_estado' => 1]);
        }

        $campaniamkt= Campaniamkt::find($id);

        $campaniamkt->camk_descripcion= $request->input('camk_descripcion');
        $campaniamkt->camk_url= $request->input('camk_url');
        $campaniamkt->camk_feccarga= $request->input('camk_feccarga');
        $campaniamkt->camk_estado= $request->input('camk_estado');
        $campaniamkt->camk_abrevia= $request->input('camk_abrevia');
        $campaniamkt->save();

        $this->subir();

        return redirect()->route('campaniamkt.create')->with('success', 'El registro se ha actualizado correctamente ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function campaniamkt_resultado()
    {

        $campaniaexp = $this->campaniamktExportacionRepository->getCampaniamktExportacion();
        $campaniaexp= collect($campaniaexp);

        return Datatables::of($campaniaexp)->make(true);
    }

    public function getcampaniamkt_resultado()
    {
        return view('campaniamkt_estado');
    }
    
}
