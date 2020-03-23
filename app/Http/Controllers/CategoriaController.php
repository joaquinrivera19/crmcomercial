<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Entities\Categoria;
use crmcomercial\Http\Requests\CategoriaRequest;
use crmcomercial\Repositories\CategoriasRepository;
use Illuminate\Http\Request;

use crmcomercial\Http\Requests;
use crmcomercial\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $categoriasRepository;


    public function __construct(CategoriasRepository $categoriasRepository)
    {
        $this->middleware('auth');
        $this->categoriasRepository=$categoriasRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getCategorias()
    {
        return $this->categoriasRepository->getCategorias();

    }

    public function create()
    {

//        $categoria = $this->categoriasRepository->getCategoriasAll();
        $categorias = $this->categoriasRepository->getCategoriasAll();
        $editMode = 0;

        return view('categoria',compact('categoria','categorias','editMode'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        Categoria::create($request->all());

        return redirect()->route('categoria.create')->with('success', 'Se ha cargado correctamente el registro');
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
        $categoria=Categoria::find($id);
        $categorias=$this->categoriasRepository->getCategoriasAll();
        $editMode = 1;

        return view('categoria_edit',compact('categoria','categorias', 'editMode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaRequest $request, $id)
    {
        $categoria= Categoria::find($id);

        $categoria->cate_nombre= $request->input('cate_nombre');
        $categoria->cate_abrevia= $request->input('cate_abrevia');
        $categoria->save();

        return redirect()->route('categoria.create')->with('success', 'Se ha actualizado correctamente el registro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        $categoria->cate_eliminado = 1;
        $categoria->save();

        return redirect()->route('categoria.create')->with('success', 'Se ha eliminado correctamente el registro');
    }
}
