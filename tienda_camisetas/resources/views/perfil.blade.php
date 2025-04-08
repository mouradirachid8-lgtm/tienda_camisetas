<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="bg-gray-50 min-h-screen pb-10">
    <!-- Navbar principal -->
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
                <a href="/" class="flex items-center space-x-2 text-red-500 hover:text-red-700">
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Cerrar Sesión</span>
                </a>
            </div>
        </div>
    </header>
    
    <!-- Contenido principal -->
    <div class="container mx-auto px-4 mt-10">
        <h1 class="text-2xl font-bold text-orange-500 mb-4">Tu perfil</h1>
        
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <!-- Pestañas -->
            <div class="flex border-b border-gray-200">
                <a href="perfil" class="py-3 px-6 bg-white text-gray-500 hover:text-orange-500 border-b-2 border-orange-500 font-medium">Información personal</a>
                <a href="#" class="py-3 px-6 text-gray-500 hover:text-orange-500">Historial de pedidos</a>
                <a href="administrador" class="py-3 px-6 text-gray-500 hover:text-orange-500">Administración</a>
            </div>
            
            <!-- Contenido del perfil -->
            <div class="p-6">
                <div class="flex justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Datos personales</h2>
                        <p class="text-sm text-blue-800 mb-4">Actualiza tu información personal y preferencias</p>
                        <div class="font-medium text-gray-800">Información personal</div>
                    </div>
                    <div>
                        <div class="w-20 h-20 bg-gray-300 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                </div>
                
                <!-- Formulario -->
                <div class="border-l-4 border-orange-500 pl-4 mt-6">
                    <form class="mt-6 grid grid-cols-2 gap-6">
                        <div>
                            <label for="nombre" class="block font-semibold text-sm text-gray-700 mb-2">Nombre</label>
                            <input type="text" id="nombre" name="nombre" value="John" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="apellidos" class="block text-sm font-semibold text-gray-700 mb-2">Apellidos</label>
                            <input type="text" id="apellidos" name="apellidos" value="Doe Does" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Correo electrónico</label>
                            <input type="email" id="email" name="email" value="johndoedoes@gmail.com" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <div>
                            <label for="telefono" class="block text-sm font-semibold text-gray-700 mb-2">Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" value="+34 123 456 789" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <p class="text-xs text-gray-500 mt-1">Te notificaremos del envío de tus pedidos</p>
                        </div>
                        
                        <div>
                            <label for="fecha_nacimiento" class="block text-sm font-semibold text-gray-700 mb-2">Fecha de nacimiento</label>
                            <div class="relative">
                                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="1980-03-03" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        {{-- <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /> --}}
                                    </svg>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label for="genero" class="block text-sm font-semibold text-gray-700 mb-2">Género</label>
                            <div class="relative">
                                <select id="genero" name="genero" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none">
                                    <option>Masculino</option>
                                    <option>Femenino</option>
                                    <option>Otro</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>