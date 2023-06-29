<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use Illuminate\Http\Request;

class InmuebleController extends Controller
{
    public function inmuebles()
    {
        $inmuebles = Inmueble::all();
        return view('inmueble.index', ['inmuebles' => $inmuebles]);
    }

    public function index()
    {
        $inmuebles = Inmueble::all();
        return response()->json($inmuebles);
    }

}
