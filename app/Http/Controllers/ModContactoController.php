<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Entities\ModContacto;
use crmcomercial\Http\Requests\ModContactoRequest;
use crmcomercial\Repositories\ModContactoRepository;
use crmcomercial\Http\Requests;

class ModContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $modContactoRepository;

    public function __construct(ModContactoRepository $modContactoRepository)
    {
        $this->middleware('auth');
        $this->modContactoRepository = $modContactoRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        $modcontacto = $this->modContactoRepository->getModContactoall();
        $modcontactos = $this->modContactoRepository->getModContactoall();
        $editMode = 0;

        return view('modcontacto',compact('modcontacto','modcontactos', 'editMode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModContactoRequest $request)
    {
        ModContacto::create($request->all());
        return redirect()->route('modcontacto.create')->with('success', 'Registro cargado correctamente');
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
        $modcontacto=ModContacto::find($id);
        $modcontactos=$this->modContactoRepository->getModContactoall();
        $editMode = 1;

        return view('modcontacto_edit',compact('modcontacto','modcontactos', 'editMode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModContactoRequest $request, $id)
    {
        $modcontacto= ModContacto::find($id);
        $modcontacto->mco_nombre= $request->input('mco_nombre');
        $modcontacto->save();

        return redirect()->route('modcontacto.create')->with('success', 'Se ha actualizado correctamente el registro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modConctacto = ModContacto::find($id);
        $modConctacto->mco_eliminado = 1;
        $modConctacto->save();

        return redirect()->route('modcontacto.create')->with('success', 'Se ha eliminado correctamente el registro');
    }
}
