<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
    </style>
</head>

<body class="flex flex-col h-screen bg-white">
    <!-- Header -->
    @include('layouts.partials.header')
    
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

    @include('layouts.partials.footer')
</body>

</html>