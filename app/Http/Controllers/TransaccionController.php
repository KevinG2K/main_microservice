<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    public function transacciones()
    {
        $transacciones = Transaccion::all();
        return view('transaccion.index', ['transacciones' => $transacciones]);
    }

    public function index()
    {
        $transacciones = Transaccion::all();
        return response()->json($transacciones);
    }

}
