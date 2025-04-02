<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    @vite('resources/css/app.css') 
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
                    class="w-full h-9 bg-transparent text-gray-400 border border-orange-500 rounded-full px-4 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Buscar productos..." required>
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
                <a href="" class="bg-orange-500 px-4 py-2 rounded p-4 text-white flex items-center gap-2 transform transition-transform duration-200 hover:scale-110">
                    <i class="fas fa-shopping-cart text-white"></i> 
                    <span>Tu carro</span>
                </a>
                @if (session('usuarioGlobal'))
                    <!-- Si está autenticado, mostrar Cerrar Sesión -->
                    <a href="{{ route('logout') }}" class="flex items-center space-x-2 text-red-500 hover:text-red-700">
                        <i class="fa fa-sign-out-alt"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                @else
                    <!-- Si no ha iniciado sesión, mostrar "Iniciar Sesión" -->
                    <a href="{{ route('login') }}" class="flex items-center space-x-2 text-orange-500 hover:text-orange-700">
                        <i class="fa fa-sign-in-alt"></i>
                        <span>Iniciar Sesión</span>
                    </a>
                @endif
            </div>
        </div>
    </header>

     <!-- Filtros -->
     <div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Filtrar productos</h2>
        <form action="{{ route('catalogo.filtrar') }}" method="GET" class="space-y-4">

            <!-- Filtro de Equipo -->
            <div class="border border-gray-300 rounded-md p-3">
                <button type="button" class="w-full text-left font-semibold text-gray-700 flex justify-between items-center"
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
                <button type="button" class="w-full text-left font-semibold text-gray-700 flex justify-between items-center"
                    onclick="toggleFilter('precio')">
                    Precio <span>▼</span>
                </button>
                <div id="precio" class="hidden mt-2 space-y-2">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="precio[]" value="0-50" class="hidden-checkbox">
                        <span class="checkbox"></span> $0 - $50
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="precio[]" value="50-100" class="hidden-checkbox">
                        <span class="checkbox"></span> $50 - $100
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="precio[]" value="100-200" class="hidden-checkbox">
                        <span class="checkbox"></span> $100 - $200
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="precio[]" value="200+" class="hidden-checkbox">
                        <span class="checkbox"></span> $200+
                    </label>
                </div>
            </div>

            <!-- Filtro de Color -->
            <div class="border border-gray-300 rounded-md p-3">
                <button type="button" class="w-full text-left font-semibold text-gray-700 flex justify-between items-center"
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
                <button type="button" class="w-full text-left font-semibold text-gray-700 flex justify-between items-center"
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
    
    <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 md:grid-cols-4 gap-6 mt-6" id="product-list">
        @foreach ($productos as $index => $producto)
            <a href="producto/{{ $producto->id }}" class="product-container product-item bg-blue-20" > <!--style="display: {{ $index < 20 ? 'block' : 'none' }};"> -->
                <img class="w-full rounded-lg" src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}">
                <h2 class="text-xl font-bold text-blue-50 mt-2">{{ $producto->nombre }}</h2>
                <p class="text-lg font-semibold text-red-600 bg-yellow-200 p-2 inline-block rounded-lg">${{ $producto->precio }}</p>
                <p class="text-sm text-gray-600">Descuento: <span class="font-semibold">{{ $producto->descuento }}%</span></p>
                    @csrf
                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                    <button type="submit" class="mt-4 w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700">
                        Agregar al carro
                    </button>
            </a>
        @endforeach
    </div>

    @if (!request()->has('query') && !request()->has('equipo') && !request()->has('precio') && !request()->has('color') && !request()->has('orden'))
    <div class="mt-6 flex justify-center">
        {{ $productos->links() }}
    </div>
    @endif
</body>
