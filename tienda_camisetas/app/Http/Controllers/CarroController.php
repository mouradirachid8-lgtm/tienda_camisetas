<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class CarroController extends Controller
{
    public function mostrarCarrito()
    {
        $user = Auth::user();
        
        $carrito = Carrito::where('user_dni', $user->dni)->first();
        
        if (!$carrito) {
            return view('carrito', ['productos' => []]);
        }
        
        return view('carrito', ['productos' => $carrito->productos]);
    }

    public function agregarAlCarrito(Request $request, $producto_id)
    {
        $user = Auth::user();
        
        $carrito = Carrito::firstOrCreate(['user_dni' => $user->dni]);
        
        $producto = Producto::findOrFail($producto_id);
        
        $carrito->productos()->syncWithoutDetaching([$producto_id => ['cantidad' => 1]]);
        
        return back()->with('success', 'Producto añadido al carrito');
    }

    public function eliminarDelCarrito($producto_id)
    {
        $user = Auth::user();
        
        $carrito = Carrito::where('user_dni', $user->dni)->first();
        
        if ($carrito) {
            $carrito->productos()->detach($producto_id);
        }
        
        return back()->with('success', 'Producto eliminado del carrito');
    }
}
