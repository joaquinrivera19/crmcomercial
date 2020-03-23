<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Entities\Vendedor;
use crmcomercial\Http\Requests\VendedorUpdateRequest;
use crmcomercial\Repositories\VendedorRepository;
use Illuminate\Http\Request;
use crmcomercial\Http\Requests\VendedorCreateRequest;
use crmcomercial\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VendedorController extends Controller
{

    private $vendedorRepository;

    public function __construct(VendedorRepository $vendedorRepository)
    {
        $this->middleware('auth');
        $this->vendedorRepository = $vendedorRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        $vendedor = $this->vendedorRepository->getVendedorAll();
        $vendedores = $this->vendedorRepository->getVendedorAll();
        $editMode = 0;

        return view('vendedor', compact('vendedor', 'vendedores', 'editMode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendedorCreateRequest $request)
    {
//        $namefile = '';
        if (!$request->has('ven_estado')) {
            $request->merge(['ven_estado' => 0]);
        } else {
            $request->merge(['ven_estado' => 1]);
        }

        if ($request->file('ven_foto') != null) {
            $file = $request->file('ven_foto');
            $namefile = $file->getClientOriginalName();

            Storage::disk('local')->put($namefile, \File::get($file));
        }

//        dd($request->file('ven_foto'));
        if ($request->file('ven_foto') != null) {
            Vendedor::create([
                'ven_nombre' => $request->input('ven_nombre'),
                'ven_usuario' => $request->input('username'),
                'username' => $request->input('username'),
                'ven_email' => $request->input('ven_email'),
                'ven_clave' => bcrypt($request->input('password')),
                'ven_estado' => $request->input('ven_estado'),
                'ven_foto' => pathinfo($namefile, PATHINFO_BASENAME)
            ]);
        } else {
            Vendedor::create([
                'ven_nombre' => $request->input('ven_nombre'),
                'ven_usuario' => $request->input('username'),
                'username' => $request->input('username'),
                'ven_email' => $request->input('ven_email'),
                'ven_clave' => bcrypt($request->input('password')),
                'ven_estado' => $request->input('ven_estado')
            ]);
//            dd(DB::getQueryLog());
        }

        return redirect()->route('vendedor.create')->with('success', 'Registro cargado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendedor = Vendedor::find($id);
//        dd($vendedor);
        $vendedores = $this->vendedorRepository->getVendedorAll();
        $editMode = 1;

        return view('vendedor_edit', compact('vendedor', 'vendedores', 'editMode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(VendedorUpdateRequest $request, $id)
    {
//        $namefile = '';
        if (!$request->has('ven_estado')) {
            $request->merge(['ven_estado' => 0]);
        } else {
            $request->merge(['ven_estado' => 1]);
        }

        if ($request->file('ven_foto') != null) {
            $file = $request->file('ven_foto');
            $namefile = $file->getClientOriginalName();

            Storage::disk('local')->put($namefile, \File::get($file));
        }

        $vendedor = Vendedor::find($id);
        $vendedor->ven_nombre = $request->input('ven_nombre');
        $vendedor->username = $request->input('username');
        $vendedor->ven_usuario = $request->input('username');
        $vendedor->ven_estado = $request->input('ven_estado');
        if ($request->input('password')) {
            $vendedor->ven_clave = bcrypt($request->input('password'));
        }
        $vendedor->ven_email = $request->input('ven_email');
        if ($request->file('ven_foto') != null) {
            $vendedor->ven_foto = pathinfo($namefile, PATHINFO_BASENAME);
        }
        $vendedor->save();

        return redirect()->route('vendedor.create')->with('success', 'Registro actualizado correctamente');
    }

    /**
     * Elimina el vendedor seleccionado
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendedor = Vendedor::find($id);

        if ($vendedor->ven_codigo == \Auth::user()->ven_codigo) {
            return redirect()->route('vendedor.create')->with('alert', 'No es posible eliminar el vendedor seleccionado ya que se encuentra logueado');
        }

        $vendedor->ven_eliminado = 1;
        $vendedor->save();
        return redirect()->route('vendedor.create')->with('success', 'Registro eliminado correctamente');

    }
}
