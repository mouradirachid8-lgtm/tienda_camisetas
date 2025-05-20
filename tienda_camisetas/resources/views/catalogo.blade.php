<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- JavaScript para mostrar/ocultar filtros -->
    <script>
        function toggleFilter(id) {
            const filter = document.getElementById(id);
            filter.classList.toggle('hidden');
        }
    </script>
</head>

<body>
    <!--<p>Bienvenido, {{ session('usuarioGlobal')->email ?? 'Invitado' }}</p>-->
    <header class="bg-blue-900 shadow-lg shadow-blue-500/50 px-4 py-7">
        <div class="max-w-7xl mx-auto flex justify-between items-center space-x-6 relative">
            <!-- Icono a la izquierda -->
            <div class="absolute left-0 top-1/2 transform -translate-y-1/2">
                <img src="{{ asset('images/logo.jpg') }}" alt="Icono" class="w-12 h-12 rounded-full">
            </div>
            <!-- Barra de búsqueda -->
            <form class="pl-20" action="{{ route('catalogo.buscar') }}" method="GET" class="flex-1 mx-auto">
                <input type="text" name="query"
                    class="w-full h-9 bg-transparent text-gray-400 border border-orange-500 rounded-full px-4 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    placeholder="Buscar productos..." required>
                <button type="submit" class="hidden">Buscar</button>
            </form>
            <!-- Menú de navegación -->
            <nav class="flex items-center text-white space-x-8">
                <a href="/" class="hover:text-orange-500">Home</a>
                <span class="text-white">|</span>
                <a href="/about" class="hover:text-orange-500">About</a>
                <span class="text-white">|</span>
                <a href="/shop" class="hover:text-orange-500">Shop</a>
                <span class="text-white">|</span>
                <a href="/help" class="hover:text-orange-500">Help</a>
            </nav>
            <!-- Sección de inicio de sesión y carrito -->
            <div class="flex gap-6 items-center ml-auto">
                <!-- Icono de carrito -->
                <a href="carro"
                    class="bg-orange-500 px-4 py-2 rounded p-4 text-white flex items-center gap-2 transform transition-transform duration-200 hover:scale-110">
                    <i class="fas fa-shopping-cart text-white"></i>
                    <span>Tu carro</span>
                </a>
                <a href="/" class="flex items-center space-x-2 text-red-500 hover:text-red-700">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Cerrar Sesión</span>
                </a>
            </div>
        </div>
    </header>
    <!-- Filtros -->
    <div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Filtrar productos</h2>
        <form action="{{ route('catalogo.filtrar') }}" method="GET" class="space-y-4">
            <!-- Filtro de Equipo -->
            <div class="border border-gray-300 rounded-md p-3">
                <button type="button"
                    class="w-full text-left font-semibold text-gray-700 flex justify-between items-center"
                    onclick="toggleFilter('equipo')">
                    Equipo <span>▼</span>
                </button>
                <div id="equipo" class="hidden mt-2 space-y-2">
                    @foreach ($equipos as $equipo)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="equipo[]" value="{{ $equipo->id }}" class="hidden-checkbox">
                            <span class="checkbox"></span> {{ $equipo->nombre }}
                        </label>
                    @endforeach
                </div>
            </div>
            <!-- Filtro de Precio -->
            <div class="border border-gray-300 rounded-md p-3">
                <button type="button"
                    class="w-full text-left font-semibold text-gray-700 flex justify-between items-center"
                    onclick="toggleFilter('precio')">
                    Precio <span>▼</span>
                </button>
                <div id="precio" class="hidden mt-2 space-y-2">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="precio[]" value="0-50" class="hidden-checkbox">
                        <span class="checkbox"></span> 0 - 50€
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="precio[]" value="50-100" class="hidden-checkbox">
                        <span class="checkbox"></span> 50 - 100€
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="precio[]" value="100-200" class="hidden-checkbox">
                        <span class="checkbox"></span> 100 - 200€
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="precio[]" value="200+" class="hidden-checkbox">
                        <span class="checkbox"></span> 200€+
                    </label>
                </div>
            </div>
            <!-- Filtro de Color -->
            <div class="border border-gray-300 rounded-md p-3">
                <button type="button"
                    class="w-full text-left font-semibold text-gray-700 flex justify-between items-center"
                    onclick="toggleFilter('color')">
                    Color <span>▼</span>
                </button>
                <div id="color" class="hidden mt-2 space-y-2">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="color[]" value="rojo" class="hidden-checkbox">
                        <span class="checkbox"></span> Rojo
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="color[]" value="azul" class="hidden-checkbox">
                        <span class="checkbox"></span> Azul
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="color[]" value="verde" class="hidden-checkbox">
                        <span class="checkbox"></span> Amarillo
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="color[]" value="negro" class="hidden-checkbox">
                        <span class="checkbox"></span> Negro
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="color[]" value="blanco" class="hidden-checkbox">
                        <span class="checkbox"></span> Blanco
                    </label>
                </div>
            </div>
            <!-- Ordenar por -->
            <div class="border border-gray-300 rounded-md p-3">
                <button type="button"
                    class="w-full text-left font-semibold text-gray-700 flex justify-between items-center"
                    onclick="toggleFilter('ordenar')">
                    Ordenar por <span>▼</span>
                </button>
                <div id="ordenar" class="hidden mt-2 space-y-2">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="orden" value="asc" class="hidden-checkbox">
                        <span class="checkbox"></span> Menor a mayor precio
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="orden" value="desc" class="hidden-checkbox">
                        <span class="checkbox"></span> Mayor a menor precio
                    </label>
                </div>
            </div>
            <!-- Botón de aplicar filtros -->
            <button type="submit"
                class="w-full bg-orange-500 text-white py-2 px-4 rounded-md hover:bg-orange-600 transition">
                Aplicar
            </button>
        </form>
    </div>
    <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6"
        id="product-list">
        @foreach ($productos as $index => $producto)
            <div
                class="group relative rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300 bg-white flex flex-col h-full">
                <!-- Etiqueta de descuento -->
                @if($producto->descuento > 0)
                    <div class="absolute top-0 right-0 z-10 bg-red-500 text-white text-sm font-bold px-3 py-1 rounded-bl-lg">
                        -{{ $producto->descuento }}%
                    </div>
                @endif
                <!-- Imagen con efecto hover y overlay -->
                <a href="producto/{{ $producto->id }}" class="relative overflow-hidden">
                    <div class="aspect-square overflow-hidden">
                        <img class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500"
                            src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>
                    </div>
                    <div
                        class="absolute bottom-0 left-0 w-full p-3 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="font-medium">Ver detalles</span>
                    </div>
                </a>
                <!-- Contenido de la tarjeta -->
                <div class="flex-1 p-4 flex flex-col">
                    <!-- Nombre del equipo si está disponible -->
                    @if(isset($producto->equipo))
                        <p class="text-xs text-blue-600 font-medium uppercase tracking-wider mb-1">
                            {{ $producto->equipo->nombre }}
                        </p>
                    @endif
                    <!-- Nombre del producto -->
                    <h2
                        class="text-lg font-bold text-gray-800 group-hover:text-blue-600 transition-colors duration-300 line-clamp-2 mb-2">
                        {{ $producto->nombre }}
                    </h2>
                    <!-- Precios -->
                    <div class="mt-auto">
                        <div class="flex items-baseline space-x-2 mb-3">
                            @if($producto->descuento > 0)
                                <span
                                    class="text-gray-400 line-through text-sm">{{ number_format($producto->precio, 2) }}€</span>
                                <span
                                    class="text-lg font-bold text-red-600">{{ number_format($producto->precio * (1 - $producto->descuento / 100), 2) }}€</span>
                            @else
                                <span class="text-lg font-bold text-gray-800">{{ number_format($producto->precio, 2) }}€</span>
                            @endif
                        </div>
                        <!-- Botón y acciones -->
                        <div class="flex space-x-2">
                            <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST" class="w-full">
                                @csrf
                                <input type="hidden" name="cantidad" value="1">
                                <button type="submit"
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors duration-300 flex items-center justify-center">
                                    <i class="fas fa-shopping-cart mr-2"></i> Añadir
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if (!request()->has('query') && !request()->has('equipo') && !request()->has('precio') && !request()->has('color') && !request()->has('orden'))
        <div class="mt-6 flex justify-center">
            {{ $productos->links() }}
        </div>
    @endif
</body>

</html>