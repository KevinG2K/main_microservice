<?php

namespace App\Http\Controllers;

use App\Models\Inmueble;
use App\Models\Transaccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class ApiController extends Controller
{
    const IP = 'http://127.0.0.1:8080';

    public function bussiness()
    {
        return Redirect::to(self::IP . '/bussiness');
    }

    public function regInmueble(Request $request)
    {
        $propietario = $request->propietario;
        $precio = $request->precio;
        $ubicacion = $request->ubicacion;
        $asesor_id = $request->asesor;

        $inmueble = new Inmueble();
        $inmueble->propietario = $propietario;
        $inmueble->precio = $precio;
        $inmueble->ubicacion = $ubicacion;
        $inmueble->asesor_id = $asesor_id;
        $inmueble->save();

        // Redirect::to(self::IP . '/callInmueble');
        return redirect()->route('callInmueble');
    }

    public function callInmueble()
    {
        return Redirect::to(self::IP . '/callInmueble');
    }

    public function getLastInmueble()
    {
        $ultimoInmueble = Inmueble::latest()->first();
        return response()->json($ultimoInmueble);
    }

    public function regTransaccion(Request $request)
    {
        $fecha = $request->fecha;
        $tipo = $request->tipo;
        $estado = $request->estado;
        $inmueble_id = $request->inmueble_id;

        $transaccion = new Transaccion();
        $transaccion->fecha = $fecha;
        $transaccion->tipo = $tipo;
        $transaccion->estado = $estado;
        $transaccion->inmueble_id = $inmueble_id;
        $transaccion->save();

        return Redirect::to(self::IP . '/callTransaccion');
    }

    public function getLastTransaccion()
    {
        $ultimaTransaccion = Transaccion::latest()->first();
        return response()->json($ultimaTransaccion);
    }
}
