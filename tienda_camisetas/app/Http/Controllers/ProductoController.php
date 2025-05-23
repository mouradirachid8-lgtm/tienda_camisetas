<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Equipo;
use App\Models\Talla;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Mostrar un listado de los productos
     */
    public function index()
    {
        $productos = Producto::with(['talla', 'equipo'])->paginate(12);
        return view('producto.index', compact('productos'));
    }

    /**
     * Mostrar el formulario para crear un nuevo producto
     */
    public function create()
    {
        $equipos = Equipo::all();
        $tallas = Talla::all();
        $proveedores = Proveedor::all();
        return view('productos.create', compact('equipos', 'tallas', 'proveedores'));
    }

    /**
     * Almacenar un nuevo producto en la base de datos
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'talla_id' => 'required|exists:talla,id',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'color' => 'required|string|max:50',
            'temporada' => 'required|string|max:50',
            'material' => 'required|string|max:100',
            'descuento' => 'required|integer|min:0|max:100',
            'equipo_id' => 'required|exists:equipo,id',
            'proveedor_id' => 'required|exists:proveedor,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->talla_id = $request->talla_id;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->color = $request->color;
        $producto->temporada = $request->temporada;
        $producto->material = $request->material;
        $producto->descuento = $request->descuento;
        $producto->equipo_id = $request->equipo_id;
        $producto->proveedor_id = $request->proveedor_id;

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('productos', 'public');
            $producto->imagen = $path;
        }

        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Mostrar información completa de un producto específico por ID
     * incluyendo sus relaciones con Talla, Equipo y Proveedor
     */
    public function show($id)
    {
        // Cargamos el producto con todas sus relaciones
        $producto = Producto::with(['talla', 'equipo', 'proveedor'])->findOrFail($id);
        
        // Ahora $producto contiene toda la información:
        // - $producto->id, $producto->nombre, $producto->precio, etc.
        // - $producto->talla->nombre (o cualquier campo de la tabla Talla)
        // - $producto->equipo->nombre (o cualquier campo de la tabla Equipo)
        // - $producto->proveedor->nombre (o cualquier campo de la tabla Proveedor)
        
        return view('producto', compact('producto'));
    }

    /**
     * Mostrar el formulario para editar un producto existente
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $equipos = Equipo::all();
        $tallas = Talla::all();
        $proveedores = Proveedor::all();
        
        return view('producto.edit', compact('producto', 'equipos', 'tallas', 'proveedores'));
    }

    /**
     * Actualizar un producto específico en la base de datos
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'talla_id' => 'required|exists:talla,id',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'color' => 'required|string|max:50',
            'temporada' => 'required|string|max:50',
            'material' => 'required|string|max:100',
            'descuento' => 'required|integer|min:0|max:100',
            'equipo_id' => 'required|exists:equipo,id',
            'proveedor_id' => 'required|exists:proveedor,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->nombre;
        $producto->talla_id = $request->talla_id;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->color = $request->color;
        $producto->temporada = $request->temporada;
        $producto->material = $request->material;
        $producto->descuento = $request->descuento;
        $producto->equipo_id = $request->equipo_id;
        $producto->proveedor_id = $request->proveedor_id;

        if ($request->hasFile('imagen')) {
            // Eliminar imagen anterior si existe
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
            
            // Guardar nueva imagen
            $path = $request->file('imagen')->store('productos', 'public');
            $producto->imagen = $path;
        }

        $producto->save();

        return redirect()->route('productos.show', $producto->id)
            ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Eliminar un producto específico de la base de datos
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        
        // Eliminar imagen si existe
        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }
        
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto eliminado exitosamente.');
    }
}