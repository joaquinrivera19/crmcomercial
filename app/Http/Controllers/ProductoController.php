<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Entities\Producto;
use crmcomercial\Http\Requests\ProductoRequest;
use crmcomercial\Repositories\ClasesProductoRepository;
use crmcomercial\Repositories\ProductoRepository;
use Illuminate\Http\Request;

use crmcomercial\Http\Requests;
use crmcomercial\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProductoController extends Controller
{

    private $productoRepository, $clasesProductoRepository;


    public function __construct(ProductoRepository $productoRepository,ClasesProductoRepository $clasesProductoRepository )
    {
        $this->middleware('auth');
        $this->productoRepository = $productoRepository;
        $this->clasesProductoRepository = $clasesProductoRepository;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $producto = $this->productoRepository->getProductoAll();
        $productos = $this->productoRepository->getProductoAll();
        $clasesproducto = $this->clasesProductoRepository->getClasesProducto();
        $editMode = 0;

        return view('producto',compact('producto','productos','clasesproducto', 'editMode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        Producto::create($request->all());

        return redirect()->route('producto.create')->with('success', 'Registro cargado correctamente');
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
        $producto= Producto::find($id);
        $productos = $this->productoRepository->getProductoAll();
        $clasesproducto = $this->clasesProductoRepository->getClasesProducto();
        $editMode = 1;
        return view('producto_edit',compact('producto','productos','clasesproducto', 'editMode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        $producto= Producto::find($id);

        $producto->prod_clasprod= $request->input('prod_clasprod');
        $producto->prod_nombre= $request->input('prod_nombre');
        $producto->prod_tipo= $request->input('prod_tipo');
        $producto->prod_abrevia= $request->input('prod_abrevia');
        $producto->save();

        return redirect()->route('producto.create')->with('success', 'Se ha actualizado correctamente el registro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);

        $producto->prod_eliminado = 1;
        $producto->save();

        return redirect()->route('producto.create')->with('success', 'Se ha eliminado correctamente el registro');
    }

    public function getProductos($clase)
    {

//        dd($clase);
        $productos = $this->productoRepository->getProductosPorClase($clase);
//        dd(\Response::json($productos));
        return $productos;
    }

    public function getProductosEditProsp($id, $clase)
    {

//        dd($clase);
//        if ($clase != undefined) {
        $productos = $this->productoRepository->getProductosPorClase($clase);
//        }
//        dd(\Response::json($productos));
        return $productos;
    }

 /*   public function getProductosPros($clase)
    {
        dd($clase);
        $productos = $this->productoRepository->getProductosPorClase($clase);
//        dd(\Response::json($productos));
        return $productos;
    }*/
}
