<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Equipo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home', [
            'destacados' => Producto::inRandomOrder()  // <- Cambia solo esta línea
                              ->with('equipo')
                              ->limit(8)
                              ->get(),
            'equipos' => Equipo::all()
        ]);
    }
}
