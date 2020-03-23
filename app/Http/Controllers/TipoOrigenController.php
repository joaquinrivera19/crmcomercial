<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Entities\TipoOrigen;
use crmcomercial\Repositories\TipoOrigenRepository;
use Illuminate\Http\Request;

use crmcomercial\Http\Requests;
use crmcomercial\Http\Controllers\Controller;

class TipoOrigenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $tipoOrigenRepository;

    public function __construct(TipoOrigenRepository $tipoOrigenRepository)
    {
        $this->middleware('auth');
        $this->tipoOrigenRepository = $tipoOrigenRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $tipoorigen = $this->tipoOrigenRepository->getTipoOrigenAll();
        $tipoorigenes = $this->tipoOrigenRepository->getTipoOrigenAll();
        $editMode = 0;

        return view('tipoorigen',compact('tipoorigenes', 'editMode'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
          'to_nombre' => 'required'
        ];

        $this->validate($request, $rules);

        TipoOrigen::create($request->all());
        return redirect()->route('tipoorigen.create')->with('success', 'Registro cargado correctamente');
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
        $tipoorigen=TipoOrigen::find($id);
        $tipoorigenes=$this->tipoOrigenRepository->getTipoOrigenAll();
        $editMode = 1;

        return view('tipoorigen_edit',compact('tipoorigen','tipoorigenes', 'editMode'));
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
        $tipoorigen= TipoOrigen::find($id);

        $rules = [
            'to_nombre' => 'required'
        ];

        $this->validate($request, $rules);

        $tipoorigen->to_nombre= $request->input('to_nombre');
        $tipoorigen->save();
        return redirect()->route('tipoorigen.create')->with('success', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoOrigen = TipoOrigen::find($id);
        $tipoOrigen->to_eliminado = 1;
        $tipoOrigen->save();
        return redirect()->route('tipoorigen.create')->with('success', 'Registro eliminado correctamente');
    }
}
