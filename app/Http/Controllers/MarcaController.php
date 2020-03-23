<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Entities\Marca;
use crmcomercial\Repositories\MarcaRepository;
use Illuminate\Http\Request;

use crmcomercial\Http\Requests;

class MarcaController extends Controller
{

    private $marcaRepository;

    /**
     * MarcaController constructor.
     */
    public function __construct(MarcaRepository $marcaRepository)
    {
        $this->middleware('auth');
        $this->marcaRepository = $marcaRepository;
    }


    public function getMarcas()
    {
        return $this->marcaRepository->getMarca();

    }
}
