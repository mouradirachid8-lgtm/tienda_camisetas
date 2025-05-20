<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Validator;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function enviar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from' => 'required|email',
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|max:4096|mimes:pdf,jpg,jpeg,png,docx,txt',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $request->only(['from', 'to', 'subject', 'message']);
            
            if ($request->hasFile('attachment')) {
                $data['attachment'] = $request->file('attachment');
            }

            Mail::to($data['to'])->send(new ContactoMailable($data));

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}