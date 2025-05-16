<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Equipo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home', [
            'destacados' => Producto::with('equipo')
                              ->inRandomOrder()
                              ->limit(8)
                              ->get(),
            'equipos' => Equipo::inRandomOrder()  // 🔥 ¡En vez de orderBy!
                          ->limit(8)
                          ->get()
        ]);
    }
    
    
}