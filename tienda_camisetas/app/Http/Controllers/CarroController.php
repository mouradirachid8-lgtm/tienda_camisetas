<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection; // Importa la clase Collection

class CarroController extends Controller
{
    public function mostrarCarrito()
    {
        $user = Auth::user();

        // Si no hay usuario autenticado, redirigir al login o mostrar carrito vacío
        // Aunque tus rutas ya lo protegen con middleware 'auth', es buena práctica
        // manejarlo aquí también si el middleware no fuera global para esta acción.
        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu carrito.');
        }

        $carrito = Carrito::where('user_dni', $user->dni)->first();

        $productos = new Collection(); // Inicializa como colección vacía
        $subtotal = 0;
        $impuestos = 0;
        $total = 0;

        if ($carrito) {
            $productos = $carrito->productos; // Esto ya es una colección de Eloquent
            $subtotal = $carrito->calcularTotal(); // Esto ya calcula el total de productos con descuento
            
            // Calcular impuestos (21% del subtotal)
            $impuestos = $subtotal * 0.21;
            
            // Calcular total final (subtotal + impuestos + envío (que es 0 en tu caso))
            $total = $subtotal + $impuestos;
        }

        return view('carrito', [
            'productos' => $productos,
            'subtotal' => $subtotal, // Pasa el subtotal
            'impuestos' => $impuestos, // Pasa los impuestos
            'total' => $total // Pasa el total final
        ]);
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

        // Ahora podemos acceder a $user->dni con seguridad
        $carrito = Carrito::firstOrCreate(['user_dni' => $user->dni]);
        $producto = Producto::findOrFail($producto_id);

        // Verificar si el producto está disponible
        if (!$producto->es_disponible()) {
            return redirect()->route('carrito.mostrar')->with('error', 'El producto no está disponible.');
        }

        // Verificar si hay suficiente stock para la cantidad solicitada
        if ($producto->stock < $cantidad) {
            return redirect()->route('carrito.mostrar')->with('error', 'No hay suficiente stock disponible. Stock actual: ' . $producto->stock);
        }

        // Verificar si el producto ya existe en el carrito
        $itemExistente = $carrito->productos()->where('producto_id', $producto_id)->first();

        if ($itemExistente) {
            // Si ya existe, actualizar la cantidad
            $nuevaCantidad = $itemExistente->pivot->cantidad + $cantidad;

            if ($nuevaCantidad > $producto->stock) {
                return redirect()->route('carrito.mostrar')->with('error', 'La cantidad total excedería el stock disponible.');
            }

            $carrito->productos()->updateExistingPivot($producto_id, [
                'cantidad' => $nuevaCantidad
            ]);
        } else {
            // Si no existe, añadirlo con la cantidad especificada
            $carrito->productos()->attach($producto_id, ['cantidad' => $cantidad]);
        }

        return redirect()->route('carrito.mostrar')->with('success', 'Producto añadido al carrito');
    }

    public function eliminarDelCarrito($producto_id)
    {
        $user = Auth::user();

        $carrito = Carrito::where('user_dni', $user->dni)->first();

        if ($carrito) {
            $carrito->productos()->detach($producto_id);
        }

        return redirect()->route('carrito.mostrar')->with('success', 'Producto eliminado del carrito');
    }

    public function actualizarCantidad(Request $request, $producto_id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $cantidad = $request->input('cantidad');
        $user = Auth::user();
        $carrito = Carrito::where('user_dni', $user->dni)->firstOrFail();
        $producto = Producto::findOrFail($producto_id);

        if ($cantidad > $producto->stock) {
            return redirect()->route('carrito.mostrar')->with('error', 'La cantidad excede el stock disponible.');
        }

        $carrito->productos()->updateExistingPivot($producto_id, [
            'cantidad' => $cantidad
        ]);

        return redirect()->route('carrito.mostrar')->with('success', 'Cantidad actualizada.');
    }

    public function vaciarCarrito()
    {
        $user = Auth::user();
        $carrito = Carrito::where('user_dni', $user->dni)->first();

        if ($carrito) {
            $carrito->vaciar();
        }

        return redirect()->route('carrito.mostrar')->with('success', 'Carrito vaciado correctamente');
    }

    // Métodos adicionales para el la dirección de envío
     public function mostrarInfoEnvio()
    {
        $user = Auth::user();

        // Si no hay usuario autenticado, redirigir al login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para continuar el proceso de compra.');
        }

        $carrito = Carrito::where('user_dni', $user->dni)->first();

        // Si el carrito está vacío, no debería avanzar a envío
        if (!$carrito || $carrito->productos->isEmpty()) {
            return redirect()->route('carrito.mostrar')->with('error', 'Tu carrito está vacío. Añade productos antes de proceder al pago.');
        }

        // Calcula los totales como lo haces en mostrarCarrito
        $subtotal = $carrito->calcularTotal();
        $impuestos = $subtotal * 0.21;
        $total = $subtotal + $impuestos;

        return view('envio', [
            'user' => $user, // Pasamos el usuario para precargar los campos
            'subtotal' => $subtotal,
            'impuestos' => $impuestos,
            'total' => $total,
            // Aquí podrías pasar también las opciones de envío si fueran dinámicas de la DB
        ]);
    }

    public function procesarInfoEnvio(Request $request)
    {
        // Validar los datos de envío
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'opcion_envio' => 'required|in:standard,express',
        ]);

        $user = Auth::user();

        // Actualizar los datos del usuario con la nueva información de envío
        // Esto es opcional, pero útil si quieres que los cambios persistan en el perfil del usuario.
        $user->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'direccion' => $request->direccion,
            'localidad' => $request->localidad,
            'pais' => $request->pais,
            'telefono' => $request->telefono,
            // 'modo_pago' se actualizaría en el siguiente paso
        ]);

        // Guardar la opción de envío en la sesión para usarla en el siguiente paso (Opciones de Pago)
        session()->put('opcion_envio', $request->opcion_envio);

        // Aquí podrías guardar la información de envío en una tabla 'pedidos' o 'envios'
        // Por ahora, solo redirigimos a la siguiente página.

        // Redirigir a la página de opciones de pago
        return redirect()->route('checkout.opcionesPago')->with('success', 'Información de envío guardada. Continúa con el pago.');
    }
    // Añadir estos métodos al final de la clase CarroController

    public function mostrarOpcionesPago()
    {
        $user = Auth::user();

        // Si no hay usuario autenticado, redirigir al login
        if (!$user) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para continuar el proceso de compra.');
        }

        $carrito = Carrito::where('user_dni', $user->dni)->first();

        // Si el carrito está vacío, no debería avanzar a pago
        if (!$carrito || $carrito->productos->isEmpty()) {
            return redirect()->route('carrito.mostrar')->with('error', 'Tu carrito está vacío. Añade productos antes de proceder al pago.');
        }

        // Verificar que se haya pasado por la página de envío
        if (!session()->has('opcion_envio')) {
            return redirect()->route('checkout.envio')->with('error', 'Por favor, completa la información de envío antes de proceder al pago.');
        }

        // Calcula los totales
        $subtotal = $carrito->calcularTotal();
        $impuestos = $subtotal * 0.21;
        
        // Calcular costo de envío basado en la opción seleccionada
        $costoEnvio = session('opcion_envio') == 'express' ? 5.00 : 0.00;
        
        $total = $subtotal + $impuestos + $costoEnvio;

        // Obtener la información de envío del usuario (puede venir de la sesión o de la BD)
        $direccion_envio = [
            'nombre' => $user->nombre,
            'apellidos' => $user->apellidos,
            'direccion' => $user->direccion,
            'localidad' => $user->localidad,
            'pais' => $user->pais,
            'telefono' => $user->telefono,
        ];

        return view('pago', [
            'user' => $user,
            'subtotal' => $subtotal,
            'impuestos' => $impuestos,
            'total' => $total,
            'direccion_envio' => $direccion_envio,
        ]);
    }

    public function procesarPago(Request $request)
    {
        $user = Auth::user();
        $carrito = Carrito::where('user_dni', $user->dni)->first();

        // Validación básica solo para asegurar que se seleccionó un método y se aceptaron términos
        $request->validate([
            'metodo_pago' => 'required|in:tarjeta,paypal,transferencia,contra_reembolso',
            'terminos' => 'required|accepted',
        ]);

        // Simulamos que el pago SIEMPRE es exitoso
        
        // Actualizar el stock de los productos
        foreach ($carrito->productos as $producto) {
            $producto->stock -= $producto->pivot->cantidad;
            $producto->save();
        }

        // Actualizar el modo de pago del usuario
        $user->update(['modo_pago' => $request->metodo_pago]);

        // Vaciar el carrito
        $carrito->vaciar();

        // Limpiar la sesión
        session()->forget(['opcion_envio', 'producto_pendiente', 'cantidad_pendiente']);

        // Generar un número de pedido simulado
        $numeroPedido = 'ORD-' . date('Ymd') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        session()->flash('numero_pedido', $numeroPedido);

        // Redirigir a página de confirmación con mensaje de éxito
        return redirect()->route('pedido.confirmacion')->with('success', 'Tu pedido ha sido procesado exitosamente.');
    }

    // Método opcional para mostrar la confirmación del pedido
    public function mostrarConfirmacionPedido()
    {
        // Verificar que venga de un pedido exitoso
        if (!session()->has('success')) {
            return redirect()->route('catalogo');
        }

        return view('confirmacion-pedido');
    }
}