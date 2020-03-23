<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Repositories\ProvinciaRepository;
use Illuminate\Http\Request;

use crmcomercial\Http\Requests;

class ProvinciaController extends Controller
{

    private $provinciaRepository;

    /**
     * ProvinciaController constructor.
     */
    public function __construct(ProvinciaRepository $provinciaRepository)
    {
        $this->middleware('auth');
        $this->provinciaRepository = $provinciaRepository;
    }

    public function getProvincias($pais)
    {
        return $this->provinciaRepository->getProvinciasAll($pais);
    }

    public function getProvinciass()
    {
        return $this->provinciaRepository->getProvinciassAll();
    }
}
