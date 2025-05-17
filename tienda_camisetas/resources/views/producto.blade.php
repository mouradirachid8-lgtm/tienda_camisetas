<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $producto->nombre }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">
  <div class="container mx-auto px-4 py-12 max-w-6xl">
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
      <div class="flex flex-col md:flex-row">
        <div class="w-full md:w-1/2 p-4 md:p-8">
          @if($producto->imagen)
            <div class="overflow-hidden rounded-xl">
              <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="w-full h-auto object-cover transition duration-500 hover:scale-105">
            </div>
          @else
            <div class="bg-gradient-to-r from-gray-400 to-gray-500 text-white p-12 rounded-xl text-center shadow-inner flex items-center justify-center h-full">
              <div>
                <i class="fas fa-image text-4xl mb-4 opacity-75"></i>
                <h3 class="text-xl font-semibold">Sin imagen disponible</h3>
              </div>
            </div>
          @endif
        </div>

        <div class="w-full md:w-1/2 p-4 md:p-8 md:border-l border-gray-100">
          <h1 class="text-3xl font-bold mb-2 text-gray-800">{{ $producto->nombre }}</h1>
          
          @if($producto->equipo)
            <p class="mb-4 flex items-center">
              <span class="font-medium text-gray-600 mr-2">Equipo:</span>
              <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">{{ $producto->equipo->nombre }}</span>
            </p>
          @endif
          
          <div class="flex items-center mb-6 border-b border-gray-100 pb-4">
            @if($producto->descuento > 0)
              <h3 class="text-3xl font-bold text-red-600 mr-3">€{{ $producto->aplicar_descuento() }}</h3>
              <h5 class="text-lg text-gray-400 line-through">€{{ $producto->precio }}</h5>
              <span class="ml-3 bg-red-600 text-white px-3 py-1 text-xs font-bold rounded-full">-{{ $producto->descuento }}%</span>
            @else
              <h3 class="text-3xl font-bold text-gray-800">€{{ $producto->precio }}</h3>
            @endif
          </div>
          
          <div class="mb-6">
            @if($producto->es_disponible())
              <span class="inline-flex items-center bg-green-100 text-green-800 px-3 py-1 text-sm font-medium rounded-full">
                <i class="fas fa-check-circle mr-1"></i> En stock ({{ $producto->stock }} disponibles)
              </span>
            @else
              <span class="inline-flex items-center bg-red-100 text-red-800 px-3 py-1 text-sm font-medium rounded-full">
                <i class="fas fa-times-circle mr-1"></i> Agotado
              </span>
            @endif
          </div>
          
          <div class="grid grid-cols-2 gap-x-6 gap-y-2 mb-6">
            <div class="flex items-center">
              <span class="text-gray-600 font-medium w-24">Talla:</span>
              <span class="text-gray-800">{{ $producto->talla ? $producto->talla->nombre : 'N/A' }}</span>
            </div>
            <div class="flex items-center">
              <span class="text-gray-600 font-medium w-24">Color:</span>
              <span class="text-gray-800">{{ $producto->color }}</span>
            </div>
            <div class="flex items-center">
              <span class="text-gray-600 font-medium w-24">Material:</span>
              <span class="text-gray-800">{{ $producto->material }}</span>
            </div>
            <div class="flex items-center">
              <span class="text-gray-600 font-medium w-24">Temporada:</span>
              <span class="text-gray-800">{{ $producto->temporada }}</span>
            </div>
            @if($producto->proveedor)
              <div class="flex items-center col-span-2">
                <span class="text-gray-600 font-medium w-24">Proveedor:</span>
                <span class="text-gray-800">{{ $producto->proveedor->nombre }}</span>
              </div>
            @endif
          </div>
          
          @if($producto->es_disponible())
            <form action="{{ route('carrito.agregar') }}" method="POST" class="mt-6">
              @csrf
              <input type="hidden" name="producto_id" value="{{ $producto->id }}">
              <div class="flex items-end gap-4 mb-6">
                <div>
                  <label for="cantidad" class="block text-sm font-medium text-gray-700 mb-1">Cantidad</label>
                  <div class="relative">
                    <input type="number" name="cantidad" id="cantidad" 
                          class="w-24 border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                          value="1" min="1" max="{{ $producto->stock }}">
                  </div>
                </div>
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300 flex items-center justify-center">
                  <i class="fas fa-shopping-cart mr-2"></i> Añadir al carrito
                </button>
              </div>
            </form>
            <!--<div class="flex flex-wrap gap-2">
              <button class="text-gray-700 hover:text-blue-600 text-sm border border-gray-200 rounded-lg py-2 px-4 transition flex items-center">
                <i class="far fa-heart mr-2"></i> Añadir a favoritos
              </button>
              <button class="text-gray-700 hover:text-blue-600 text-sm border border-gray-200 rounded-lg py-2 px-4 transition flex items-center">
                <i class="fas fa-share-alt mr-2"></i> Compartir
              </button>
            </div>-->
          @else
            <div class="mt-6">
              <button type="button" class="w-full bg-gray-200 text-gray-500 font-medium py-3 px-6 rounded-lg cursor-not-allowed">
                Producto no disponible
              </button>
              <p class="text-sm text-gray-500 mt-2">Este producto está temporalmente agotado. Puedes añadirlo a tu lista de deseos para recibir una notificación cuando esté disponible.</p>
            </div>
          @endif
        </div>
      </div>
      
      <!-- Información adicional -->
      <div class="border-t border-gray-100">
        <div class="p-6 md:p-8">
          <h3 class="text-xl font-bold mb-4 text-gray-800">Información adicional</h3>
          <div class="prose max-w-none text-gray-600">
            {{ $producto->mostrar_info() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>