<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
    </style>
</head>
<body class="flex flex-col h-screen bg-white">
    <!-- Header -->
    <header class="bg-blue-900 shadow-lg shadow-blue-500/50 px-4 py-7 w-full">
        <div class="flex justify-between items-center max-w-7xl mx-auto">
            <!-- Logo a la izquierda -->
            <div class="flex-shrink-0">
                <img src="{{ asset('images/logo.jpg') }}" alt="Icono" class="w-12 h-12 rounded-full">
            </div>
            
            <!-- Sección de inicio de sesión y carrito a la derecha -->
            <div class="flex gap-6 items-center">
                <!-- Icono de carrito -->
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
        </div>
    </header>
    
    <!-- Banner "Compra Ahora" - Ocupa el espacio restante -->
    <div class="flex-grow w-full bg-gradient-to-r from-blue-600 to-blue-800 flex items-center justify-center">
        <a href="catalogo" class="inline-block text-center">
            <h2 class="text-4xl font-bold text-white hover:text-orange-300 transition-colors duration-300">
                <span class="animate-pulse">¡COMPRA AHORA!</span>
                <i class="fas fa-arrow-right ml-4 text-orange-300 animate-bounce"></i>
            </h2>
            <p class="text-white mt-2 text-lg">Descubre nuestras ofertas</p>
        </a>
    </div>
</body>
</html>