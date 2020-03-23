<?php

namespace crmcomercial\Http\Controllers;

use Illuminate\Http\Request;

use crmcomercial\Http\Requests;

class LocalidadController extends Controller
{

    public function getLocalidad(Request $request)
    {
        $term = $request->input('term');
//        dd($term);
        $results = array();

        $queries = \DB::table('ComLocalidad')
            ->where('loc_nombre', 'LIKE', '%' . $term . '%')
            ->orWhere('loc_codigo1', 'LIKE', '%' . $term . '%')
            ->get();

        foreach ($queries as $query) {
            $results[] = ['id' => $query->loc_codigo1, 'value' => $query->loc_codigo1 . ' - ' . $query->loc_codigo2. ' - ' . $query->loc_nombre, 'loc_codigo2' => $query->loc_codigo2];
        }
        return \Response::json($results);
    }

}
