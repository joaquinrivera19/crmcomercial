<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Entities\Sistema;
use crmcomercial\Http\Requests\SistemaRequest;
use crmcomercial\Repositories\SistemaRepository;
use Illuminate\Http\Request;

use crmcomercial\Http\Requests;

class SistemaController extends Controller
{

    private $sistemaRepository;

    /**
     * SistemaController constructor.
     * @param $sistemaRepository
     */
    public function __construct(SistemaRepository $sistemaRepository)
    {
        $this->middleware('auth');
        $this->sistemaRepository = $sistemaRepository;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sistemas = $this->sistemaRepository->getSistemasAll();
        $editMode = 0;

        return view('sistemas',compact('sistemas', 'editMode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SistemaRequest $request)
    {
        Sistema::create($request->all());

        return redirect()->route('sistemas.create')->with('success','El registro se ha cargado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sistema = Sistema::find($id);
        $sistemas = $this->sistemaRepository->getSistemasAll();
        $editMode = 1;

        return view('sistemas_edit', compact('sistema', 'sistemas', 'editMode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SistemaRequest $request, $id)
    {
        $sistema = Sistema::find($id);
        $sistema->sist_nombre = $request->input('sist_nombre');
        $sistema->save();

        return redirect()->route('sistemas.create')->with('success', 'El registro se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sistema = Sistema::find($id);
        $sistema->sist_eliminado = 1;
        $sistema->save();

        return redirect()->route('sistemas.create')->with('success','El registro se ha eliminado correctamente');
    }
}
