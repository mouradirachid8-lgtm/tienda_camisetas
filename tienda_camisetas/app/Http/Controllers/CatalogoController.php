<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Equipo;

use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); 
        $equipos = Equipo::all();

        // Pasar los productos a la vista
        return view('catalogo', compact('productos', 'equipos'));
    }

    public function search_request(Request $request)
    {
        // Obtener el término de búsqueda
        $query = $request->input('query');

        // Buscar todos los productos que coincidan con el nombre
        $productos = Producto::where('nombre', 'LIKE', "%$query%")->get();
        $equipos = Equipo::all();

        // Si no hay resultados, mostrar un mensaje
        if ($productos->isEmpty()) {
            return redirect()->route('catalogo')->with('message', 'No se encontraron productos.');
        }

        // Retornar la vista de la tienda con los productos filtrados
        return view('catalogo', compact('productos', 'equipos'));
    }

    public function filtrarProductos(Request $request)
    {
        $query = Producto::query();

        // Filtro por equipo
        if ($request->has('equipo')) {
            $query->whereIn('equipo_id', $request->equipo);
        }

        // Filtro por Precio
        if ($request->has('precio')) {
            $rangos = [
                '0-50' => [0, 50],
                '50-100' => [50, 100],
                '100-200' => [100, 200],
                '200+' => [200, null]
            ];

            $query->where(function ($q) use ($request, $rangos) {
                foreach ($request->precio as $precio) {
                    if ($precio === '200+') {
                        $q->orWhere('precio', '>=', 200);
                    } else {
                        $q->orWhereBetween('precio', $rangos[$precio]);
                    }
                }
            });
        }

        // Filtro por Color
        if ($request->has('color')) {
            $query->whereIn('color', $request->color);
        }

        //Ordenar
        if ($request->filled('orden')) {
            $orden = $request->input('orden');
            if (in_array($orden, ['asc', 'desc'])) {
                $query->orderBy('precio', $orden);
            }
        }
        // Obtener productos filtrados
        $productos = $query->paginate(24); 

        // Obtener lista de equipos para los checkboxes
        $equipos = Equipo::all();

        // Retornar vista con los productos filtrados y la lista de equipos
        return view('catalogo', compact('productos', 'equipos'));
    }
}
