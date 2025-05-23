<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contacto;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function enviar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'nullable|string|max:20',
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string',
            'archivo' => 'nullable|file|max:4096|mimes:pdf,jpg,jpeg,png,docx,txt',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $contacto = new Contacto();
            $contacto->nombre = $request->nombre;
            $contacto->email = $request->email;
            $contacto->telefono = $request->telefono;
            $contacto->asunto = $request->asunto;
            $contacto->mensaje = $request->mensaje;
            
            // Guardar archivo si existe
            if ($request->hasFile('archivo')) {
                $archivo = $request->file('archivo');
                $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
                $archivo->move(public_path('uploads/contacto'), $nombreArchivo);
                $contacto->archivo = $nombreArchivo;
            }
            
            $contacto->save();

            return response()->json([
                'success' => true,
                'message' => 'Mensaje enviado correctamente. Te responderemos pronto.'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al enviar el mensaje. Inténtalo de nuevo.'
            ], 500);
        }
    }

    // Método para ver los mensajes (opcional - para administración)
    public function admin()
    {
        $mensajes = Contacto::orderBy('created_at', 'desc')->paginate(10);
        return view('contacto.admin', compact('mensajes'));
    }
}