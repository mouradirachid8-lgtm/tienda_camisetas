<header class="bg-[#2c3e50] shadow-lg px-4 py-7">
    <div class="max-w-7xl mx-auto flex justify-between items-center space-x-6 relative">
        <div class="absolute left-0 top-1/2 transform -translate-y-1/2">
            <img src="{{ asset('images/logo.jpg') }}" alt="Icono" class="w-12 h-12 rounded-full">
        </div>

        <form class="pl-20" action="{{ route('catalogo.buscar') }}" method="GET" class="flex-1 mx-auto">
            <input type="text" name="query" 
                class="w-full h-9 bg-transparent text-gray-400 border border-orange-500 rounded-full px-4 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Buscar productos..." required>
            <button type="submit" class="hidden">Buscar</button>
        </form>

        @include('layouts.partials.nav')
        
        <div class="flex gap-6 items-center ml-auto">
            <a href="carro" class="bg-orange-500 px-4 py-2 rounded p-4 text-white flex items-center gap-2 transform transition-transform duration-200 hover:scale-110">
                <i class="fas fa-shopping-cart text-white"></i> 
                <span>Tu carro</span>
            </a>
            @auth
                <a href="/" class="flex items-center space-x-2 text-red-500 hover:text-red-700">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Cerrar Sesión</span>
                </a>
            @endauth
            @guest
                <a href="/login" class="flex items-center space-x-2 text-red-500 hover:text-red-700">
                    <i class="fa fa-sign-in-alt"></i>
                    <span>Iniciar Sesión</span>
                </a>
            @endguest
        </div>
    </div>
</header>