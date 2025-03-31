<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Equipo;
use App\Models\Proveedor;
use App\Models\Talla;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    // Obtener productos y equipos para la vista del administrador
    public function base_data()
    {
        $productos = Producto::all();
        $equipos = Equipo::all();
        $tallas = Talla::all();
        $proveedores = Proveedor::all();
        return view('administrador', compact('productos', 'equipos', 'tallas', 'proveedores'));
    }

    // Método para editar un producto
    public function actualizarProducto(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'color' => 'required|string|max:50',
            'temporada' => 'required|string|max:20',
            'material' => 'required|string|max:100',
            'descuento' => 'nullable|numeric|min:0|max:100',
            'imagen' => 'nullable|image|max:2048', // Imagen opcional
            'equipo_nombre' => 'nullable|string|max:255',
            'proveedor_id' => 'nullable|exists:proveedore,id',
            'talla_id' => 'nullable|exists:talla,id',
        ]);

        // Si se ha ingresado un nombre de equipo, verificar si existe
        if ($request->has('equipo_nombre') && !empty($request->equipo_nombre)) {
            $equipo = Equipo::where('nombre', $request->equipo_nombre)->first();

            // Si el equipo no existe, crear uno nuevo
            if (!$equipo) {
                $equipo = Equipo::create(['nombre' => $request->equipo_nombre]);
            }

            // Asignar el ID del equipo al producto
            $request->merge(['equipo_id' => $equipo->id]);
        }

        // Si se ha ingresado un nombre de equipo, verificar si existe
        if ($request->has('proveedor_nombre') && !empty($request->proveedor_nombre)) {
            $proveedor = Proveedor::where('nombre', $request->equipo_nombre)->first();

            // Si el equipo no existe, crear uno nuevo
            if (!$proveedor) {
                $proveedor = Proveedor::create(['nombre' => $request->proveedor_nombre]);
            }

            // Asignar el ID del equipo al producto
            $request->merge(['equipo_id' => $proveedor->id]);
        }

        $producto->update($request->all());

        return redirect()->back()->with('success', 'Producto actualizado correctamente.');
    }

    // Método para eliminar un producto
    public function eliminarProducto($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->back()->with('success', 'Producto eliminado correctamente.');
    }

    public function crearProducto(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'talla_id' => 'required|exists:talla,id',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'color' => 'required|string|max:100',
            'temporada' => 'required|string|max:100',
            'material' => 'required|string|max:255',
            'descuento' => 'nullable|numeric|min:0|max:100',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'equipo_id' => 'required|exists:equipo,id',
            'proveedor_id' => 'required|exists:proveedor,id',
        ]);

        $rutaImagen = null;

        // Guardar la imagen con su nombre original si se sube
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $nombreArchivo = $file->getClientOriginalName(); // Obtiene el nombre original
            $rutaDestino = 'images/'; // Carpeta dentro de public/

            // Mover el archivo a la carpeta public/productos con su nombre original
            $file->move(public_path($rutaDestino), $nombreArchivo);

            // Guardar la ruta relativa en la base de datos
            $rutaImagen = $rutaDestino . $nombreArchivo;
        }

        // Crear el producto
        Producto::create([
            'nombre' => $request->nombre,
            'talla_id' => $request->talla_id,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'color' => $request->color,
            'temporada' => $request->temporada,
            'material' => $request->material,
            'descuento' => $request->descuento,
            'imagen' => $rutaImagen,
            'equipo_id' => $request->equipo_id,
            'proveedor_id' => $request->proveedor_id,
        ]);

        return redirect()->route('administrador')->with('success', 'Producto añadido exitosamente.');
    }

}