<header class="bg-slate-700 shadow-lg px-4 py-7">
    <div class="container mx-auto flex justify-between items-center space-x-6 relative">
        <div class="absolute left-0 top-1/2 -translate-y-1/2">
            <img src="{{ asset('images/logo.jpg') }}" alt="Icono" class="w-12 h-12 rounded-full">
        </div>

        <form class="pl-20 flex-1" action="{{ route('catalogo.buscar') }}" method="GET">
            <div class="relative">
                <input type="text" name="query"
                    class="w-full h-9 bg-transparent text-gray-400 border border-orange-500 rounded-full px-4 focus:outline-none focus:ring-2 focus:ring-orange-500 placeholder-gray-500"
                    placeholder="Buscar productos..." required>
                <button type="submit" class="hidden">Buscar</button>
            </div>
        </form>

        @include('layouts.partials.nav')

        <div class="flex gap-6 items-center ml-auto">
            <a href="carro"
                class="bg-orange-500 px-4 py-2 rounded text-white flex items-center gap-2 transition-transform duration-200 ease-in-out hover:scale-110">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                <span>Tu carro</span>
            </a>
            <a href="/" class="flex items-center space-x-2 text-red-500 hover:text-red-700">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                <span>Cerrar Sesión</span>
            </a>
        </div>
    </div>
</header>