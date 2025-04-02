<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Equipo;

use Illuminate\Http\Request;

class PaginacionController extends Controller
{
    public function index(Request $request)
    {
        $productos = Producto::paginate(24);
        $equipos = Equipo::all();
        return view('catalogo', compact('productos', 'equipos'));
    }
}
