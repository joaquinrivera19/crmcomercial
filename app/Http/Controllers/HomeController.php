<?php

namespace crmcomercial\Http\Controllers;

use crmcomercial\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('welcome');
    }
}
