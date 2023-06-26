<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function asesores()
    {
        $asesores = Asesor::all();
        return view('asesor.index', ['asesores' => $asesores]);
    }
}
