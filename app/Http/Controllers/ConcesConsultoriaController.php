<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Entities\Conces;
use crmcomercial\Repositories\ConcesRepository;
use Illuminate\Http\Request;

use crmcomercial\Http\Requests;
use crmcomercial\Http\Requests\ConcesConsultoriaRequest;
use crmcomercial\Http\Controllers\Controller;

class ConcesConsultoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $concesRepository;
    
    public function __construct(ConcesRepository $concesRepository)
    {

        $this->middleware('auth');
        $this->concesRepository = $concesRepository;
        
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $concesconsultoria = $this->concesRepository->getConcesAll();
        
        $editMode = 0;

        return view('concesconsultoria',compact('concesconsultoria', 'editMode'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConcesConsultoriaRequest $request)
    {

        Conces::create($request->all());

        return  redirect()->route('concesconsultoria.create')->with('success','El registro se ha cargado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concesconsul = Conces::find($id);
        $concesconsultoria = $this->concesRepository->getConcesAll();
        $editMode = 1;

        return view('concesconsultoria_edit', compact('concesconsul', 'concesconsultoria', 'editMode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConcesConsultoriaRequest $request, $id)
    {
        $concesconsul = Conces::find($id);
        $concesconsul->con_nombre = $request->input('con_nombre');
        $concesconsul->save();

        return redirect()->route('concesconsultoria.create')->with('success', 'El registro se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $concesconsul = Conces::find($id);
        $concesconsul->con_eliminado = 1;
        $concesconsul->save();

        return redirect()->route('concesconsultoria.create')->with('success','El registro se ha eliminado correctamente');
    }
}
