<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center h-screen bg-white">

    <!-- Contenedor de la imagen -->
    <div class="w-[300px] h-[200px] bg-[url('/images/logo.jpg')] bg-cover bg-center"></div>

    <!-- Formulario -->
    <div class="w-full max-w-lg bg-orange-500 p-10 rounded-lg shadow-lg border-4 border-blue-600 mt-6">
        <h1 class="text-4xl font-bold text-center mb-6">Pantalla Inicio</h1>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">LOGIN</label>
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">login</button>
                <label class="block text-gray-700 font-semibold">ADMINISTRADOR</label>
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">administrador</button>
                <label class="block text-gray-700 font-semibold">CATÁLOGO</label>
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">catalogo</button>
    </div>
</body>
</html>
