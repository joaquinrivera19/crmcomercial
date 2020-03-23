<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Entities\Campania;
use crmcomercial\Http\Requests\CampaniaRequest;
use crmcomercial\Http\Requests;
use crmcomercial\Repositories\CampaniasRepository;
use Illuminate\Support\Facades\Redirect;

class CampaniaController extends Controller
{

    private $campaniasRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CampaniasRepository $campaniasRepository)
    {
        $this->middleware('auth');
        $this->campaniasRepository = $campaniasRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $campania = $this->campaniasRepository->getCampaniaAll();
        $campanias=$this->campaniasRepository->getCampaniaAll();
        $editMode = 0;

        return view('campania',compact('campania','campanias', 'editMode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampaniaRequest $request)
    {
        if (!$request->has('cam_estado')) {
            $request->merge(['cam_estado' => 0]);
        } else {
            $request->merge(['cam_estado' => 1]);
        }

        Campania::create($request->all());

        return redirect()->route('campania.create')->with('success', 'El registro se ha cargado correctamente');
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
        $campania=Campania::find($id);
        $campanias=$this->campaniasRepository->getCampaniaAll();
        $editMode = 1;

        return view('campania_edit',compact('campania','campanias', 'editMode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CampaniaRequest $request,$id)
    {

        if (!$request->has('cam_estado')) {
            $request->merge(['cam_estado' => 0]);
        } else {
            $request->merge(['cam_estado' => 1]);
        }

        $campania= Campania::find($id);

        $campania->cam_nombre= $request->input('cam_nombre');
        $campania->cam_fecini= $request->input('cam_fecini');
        $campania->cam_fecfin= $request->input('cam_fecfin');
        $campania->cam_estado= $request->input('cam_estado');
        $campania->cam_abrevia= $request->input('cam_abrevia');
        $campania->save();

        return redirect()->route('campania.create')->with('success', 'El registro se ha actualizado correctamente ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $campania = Campania::find($id);

        $campania->cam_eliminado = 1;
        $campania->save();

        return redirect()->route('campania.create')->with('success','El registro se ha eliminado correctamente');
    }
}
