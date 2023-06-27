<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function uploadPDF(Request $request)
    {
        // Verificar si se recibió un archivo PDF
        if ($request->hasFile('pdfData')) {
            // Guardar el archivo en una ubicación deseada
            $pdfFile = $request->file('pdfData');
            $pdfPath = 'ruta_de_almacenamiento/' . $pdfFile->getClientOriginalName();
            $pdfFile->move(public_path('ruta_de_almacenamiento'), $pdfPath);

            // Puedes realizar cualquier otro procesamiento adicional necesario

            return response()->json(['success' => true, 'message' => 'Archivo PDF recibido y guardado correctamente']);
        }

        return response()->json(['success' => false, 'message' => 'No se recibió ningún archivo PDF']);
    }
}
