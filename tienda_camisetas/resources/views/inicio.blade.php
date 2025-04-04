<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="flex flex-col items-center justify-center h-screen bg-white">

    <!-- Contenedor de la imagen -->
    <div class="w-[300px] h-[200px] bg-[url('/images/logo.jpg')] bg-cover bg-center"></div>

    <!-- Formulario -->
    <div class="md:w-full w-[80%] max-w-lg mb-[190px] md:mb-0 bg-white p-10 rounded-[20px] shadow-lg border-t-[5px] border-t-orange-500 mt-6">
        <h1 class="text-4xl font-bold text-center mb-6">INICIO</h1>
            <a href="/catalogo" class="block text-center w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-500 hover:scale-105 duration-75 ease-in-out font-bold transition p-7 my-2">Catálogo</a>
            <a href="/administrador" class="block text-center w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-500 hover:scale-105 duration-75 ease-in-out font-bold transition p-7 my-2">Administrador</a>
            <a href="/perfil" class="block text-center w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-500 hover:scale-105 duration-75 ease-in-out font-bold transition p-7 my-2">Perfil</a>
            <p class="mt-5 md:relative md:transform md:translate-x-1/4"> Accesos rápidos para debuggear </p>
        </div>

        
</body>
</html>
