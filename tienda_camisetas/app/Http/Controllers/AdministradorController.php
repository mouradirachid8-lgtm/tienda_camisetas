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
    public function index()
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
            'color' => 'nullable|string|max:50',
            'temporada' => 'nullable|string|max:20',
            'material' => 'required|string|max:100',
            'descuento' => 'nullable|numeric|min:0|max:100',
            'imagen' => 'nullable|image|max:2048', 
            'equipo_nombre' => 'required|string|max:255',
            'proveedor_nombre' => 'required|string|max:255',
            'talla_id' => 'required|exists:talla,id',
        ], [
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'imagen.image' => 'La imagen debe ser un archivo de imagen válido.',
            'equipo_nombre.required' => 'El nombre del equipo es obligatorio.',
            'proveedor_nombre.required' => 'El nombre del proveedor es obligatorio.',
            'talla_id.exists' => 'La talla seleccionada no es válida.',
            'material.required' => 'El material del producto es obligatorio',
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
            $proveedor = Proveedor::where('nombre', $request->proveedor_nombre)->first();

            // Si el equipo no existe, crear uno nuevo
            if (!$proveedor) {
                $proveedor = Proveedor::create(['nombre' => $request->proveedor_nombre]);
            }

            // Asignar el ID del equipo al producto
            $request->merge(['proveedor_id' => $proveedor->id]);
        }

        $producto->update($request->all());

        return redirect()->to('/administrador?seccion=productos')->with('success', 'Producto actualizado correctamente.');
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
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'color' => 'nullable|string|max:50',
            'temporada' => 'nullable|string|max:20',
            'material' => 'required|string|max:100',
            'descuento' => 'nullable|numeric|min:0|max:100',
            'imagen' => 'required|image|max:2048',
            'talla_id' => 'required|exists:talla,id',
            'equipo_id' => 'required|exists:equipo,id',
            'proveedor_id' => 'required|exists:proveedor,id',
        ], [
            'nombre.required' => 'El nombre del producto es obligatorio.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un número.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'imagen.image' => 'La imagen debe ser un archivo de imagen válido.',
            'imagen.required' => 'La imagen del producto es obligatoria.',
            'material.required' => 'El material del producto es obligatorio.',
            'talla_id.required' => 'La talla es obligatoria.',
            'talla_id.exists' => 'La talla seleccionada no es válida.',
            'equipo_id.required' => 'El equipo es obligatorio.',
            'equipo_id.exists' => 'El equipo seleccionado no es válido.',
            'proveedor_id.required' => 'El proveedor es obligatorio.',
            'proveedor_id.exists' => 'El proveedor seleccionado no es válido.',
        ]);
        
        
        // Asignar valores predeterminados si no se proporcionan
        $validatedData['stock'] = $validatedData['stock'] ?? 0;
        $validatedData['descuento'] = $validatedData['descuento'] ?? 0;
        $validatedData['temporada'] = $validatedData['temporada'] ?? '2025-2024';

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

    public function crearProveedor(Request $request)
    {
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Crear nuevo proveedor
        $proveedor = new Proveedor();
        $proveedor->nombre = $request->nombre;
        $proveedor->save();

        // Redireccionar con mensaje
        return redirect()->route('administrador')->with('success', 'Proveedor creado correctamente');
    }

    public function actualizarProveedor(Request $request, $id)
    {
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Buscar y actualizar proveedor
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->nombre = $request->nombre;
        $proveedor->save();

        // Redireccionar con mensaje
        return redirect()->route('administrador')->with('success', 'Proveedor actualizado correctamente');
    }

    public function eliminarProveedor($id)
    {
        // Buscar y eliminar proveedor
        $proveedor = Proveedor::findOrFail($id);
        
        // Verificar si tiene productos asociados
        $productosAsociados = Producto::where('proveedor_id', $id)->count();
        
        if ($productosAsociados > 0) {
            return redirect()->back()->with('error', 'No se puede eliminar este proveedor porque tiene productos asociados');
        }
        
        $proveedor->delete();

        // Redireccionar con mensaje
        return redirect()->back()->with('success', 'Proveedor eliminado correctamente');
    }

    public function crearEquipo(Request $request)
    {
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Crear nuevo proveedor
        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->save();

        // Redireccionar con mensaje
        return redirect()->route('administrador')->with('success', 'Equipo creado correctamente');
    }

    public function actualizarEquipo(Request $request, $id)
    {
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Buscar y actualizar proveedor
        $equipo = Equipo::findOrFail($id);
        $equipo->nombre = $request->nombre;
        $equipo->save();

        // Redireccionar con mensaje
        return redirect()->route('administrador')->with('success', 'Equipo actualizado correctamente');
    }

    public function eliminarEquipo($id)
    {
        // Buscar y eliminar proveedor
        $equipo = Equipo::findOrFail($id);
        
        // Verificar si tiene productos asociados
        $productosAsociados = Producto::where('equipo_id', $id)->count();
        
        if ($productosAsociados > 0) {
            return redirect()->back()->with('error', 'No se puede eliminar este equipo porque tiene productos asociados');
        }
        
        $equipo->delete();

        // Redireccionar con mensaje
        return redirect()->back()->with('success', 'Equipo eliminado correctamente');
    }
}