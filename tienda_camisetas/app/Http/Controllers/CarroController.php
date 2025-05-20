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

        $carrito = Carrito::where('user_dni', $user->DNI)->first();

        if (!$carrito) {
            return view('carrito', ['productos' => [], 'total' => 0]);
        }

        $total = $carrito->calcularTotal();
        return view('carrito', ['productos' => $carrito->productos, 'total' => $total]);
    }

    public function agregarAlCarrito(Request $request, $producto_id)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            // Guardar el producto en la sesión y redirigir al login
            session()->put('producto_pendiente', $producto_id);
            session()->put('cantidad_pendiente', $request->input('cantidad', 1));
            session()->put('url_anterior', url()->previous());

            return redirect()->route('login')
                ->with('message', 'Para añadir productos al carrito, primero debes iniciar sesión');
        }

        // Validar la cantidad
        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $cantidad = $request->input('cantidad', 1);
        $user = Auth::user();

        // Ahora podemos acceder a $user->DNI con seguridad
        $carrito = Carrito::firstOrCreate(['user_dni' => $user->DNI]);
        $producto = Producto::findOrFail($producto_id);

        // Verificar si el producto está disponible
        if (!$producto->es_disponible()) {
            return back()->with('error', 'El producto no está disponible.');
        }

        // Verificar si hay suficiente stock para la cantidad solicitada
        if ($producto->stock < $cantidad) {
            return back()->with('error', 'No hay suficiente stock disponible. Stock actual: ' . $producto->stock);
        }

        // Verificar si el producto ya existe en el carrito
        $itemExistente = $carrito->productos()->where('producto_id', $producto_id)->first();

        if ($itemExistente) {
            // Si ya existe, actualizar la cantidad
            $nuevaCantidad = $itemExistente->pivot->cantidad + $cantidad;

            if ($nuevaCantidad > $producto->stock) {
                return back()->with('error', 'La cantidad total excedería el stock disponible.');
            }

            $carrito->productos()->updateExistingPivot($producto_id, [
                'cantidad' => $nuevaCantidad
            ]);
        } else {
            // Si no existe, añadirlo con la cantidad especificada
            $carrito->productos()->attach($producto_id, ['cantidad' => $cantidad]);
        }

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

    public function actualizarCantidad(Request $request, $producto_id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $cantidad = $request->input('cantidad');
        $user = Auth::user();
        $carrito = Carrito::where('user_dni', $user->DNI)->firstOrFail();
        $producto = Producto::findOrFail($producto_id);

        if ($cantidad > $producto->stock) {
            return back()->with('error', 'La cantidad excede el stock disponible.');
        }

        $carrito->productos()->updateExistingPivot($producto_id, [
            'cantidad' => $cantidad
        ]);

        return back()->with('success', 'Cantidad actualizada.');
    }

    public function vaciarCarrito()
    {
        $user = Auth::user();
        $carrito = Carrito::where('user_dni', $user->DNI)->first();

        if ($carrito) {
            $carrito->vaciar();
        }

        return back()->with('success', 'Carrito vaciado correctamente');
    }
}
