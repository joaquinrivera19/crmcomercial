<?php

namespace crmcomercial\Http\Controllers;

use Illuminate\Http\Request;

use crmcomercial\Http\Requests;
use crmcomercial\Http\Controllers\Controller;
use crmcomercial\User;

class UserController extends Controller
{
    public function getUsuarios()
    {
        $output = [];
        $output['usuarios'] = [];

        //Busco todos los incidentes del SIAC
        $allUsuarios = User::all();
        foreach ($allUsuarios as $usuario) {
            $output['usuarios'][] = [
                "usu_nombre" => $usuario->usu_nombre,
                "usu_login" => $usuario->usu_login,
                "usu_clave" => $usuario->usu_clave
            ];
        }
        dump($output);
        dd();
        return $allUsuarios;
    }
}
