<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Entities\Actividad;
use crmcomercial\Http\Requests\ActividadRequest;
use crmcomercial\Repositories\ActividadRepository;
use Illuminate\Http\Request;

use crmcomercial\Http\Requests;
use crmcomercial\Http\Controllers\Controller;

class ActividadController extends Controller
{

    private $actividadRepository;

    /**
     * SistemaController constructor.
     * @param $sistemaRepository
     */
    public function __construct(ActividadRepository $actividadRepository)
    {

        $this->middleware('auth');
        $this->actividadRepository = $actividadRepository;

    }

    public function getActividadAll() {
        return Actividad::all();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actividades = $this->actividadRepository->getActividadAll();
        $editMode = 0;

        return view('actividad',compact('actividades', 'editMode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActividadRequest $request)
    {
        Actividad::create($request->all());

        return  redirect()->route('actividad.create')->with('success','El registro se ha cargado correctamente');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividad = Actividad::find($id);
        $actividades = $this->actividadRepository->getActividadAll();
        $editMode = 1;

        return view('actividad_edit', compact('actividad', 'actividades', 'editMode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActividadRequest $request, $id)
    {
        $actividad = Actividad::find($id);
        $actividad->act_nombre = $request->input('act_nombre');
        $actividad->act_abrevia = $request->input('act_abrevia');
        $actividad->save();

        return redirect()->route('actividad.create')->with('success', 'El registro se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $actividad = Actividad::find($id);
        $actividad->act_eliminado = 1;
        $actividad->save();

        return redirect()->route('actividad.create')->with('success','El registro se ha eliminado correctamente');
    }


}
