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
    <div class="w-full max-w-lg bg-white p-10 rounded-[20px] shadow-lg border-t-[5px] border-t-orange-500 mt-6">
        <h1 class="text-4xl font-bold text-center mb-6">Iniciar Sesión</h1>
        <p class="text-lg text-center mb-6">¿Es tu primera vez? 
            <a href="" class="text-blue-800 font-semibold hover:underline">Regístrate</a>
        </p>

        <!-- Mensajes de error -->
        @if(session('error'))
            <p class="text-red-500 text-center">{{ session('error') }}</p>
        @endif

        <form action="{{ route('login.auth') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Correo Electrónico <span class="text-blue-600">*</span></label>
                <input type="email" name="email" class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none" placeholder="Correo Electrónico" required>
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold">Contraseña <span class="text-blue-600">*</span></label>
                <input type="password" name="password" class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none" placeholder="Contraseña" required>
                @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full bg-orange-600 text-white py-3 rounded-lg hover:bg-blue-700 font-bold transition">Ingresar</button>
            </div>
        </form>
    </div>

</body>
</html>

