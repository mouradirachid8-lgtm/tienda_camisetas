<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iniciar Sesión</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-white px-4 py-8">
  <!-- Contenedor de la imagen -->
  <div class="w-full max-w-[300px] h-[150px] md:h-[200px] bg-[url('/api/placeholder/300/200')] bg-cover bg-center mb-6"></div>
  
  <!-- Formulario -->
  <div class="w-full max-w-sm md:max-w-lg bg-white p-6 md:p-10 rounded-[20px] shadow-lg border-t-[5px] border-t-orange-500">
    <h1 class="text-3xl md:text-4xl font-bold text-center mb-4 md:mb-6">Iniciar Sesión</h1>
    <p class="text-base md:text-lg text-center mb-6">¿Es tu primera vez?
      <a href="/register" class="text-blue-800 font-semibold hover:underline">Regístrate</a>
    </p>
    
    <!-- Mensajes de error -->
    <p class="text-red-500 text-center hidden">Mensaje de error</p>
    
    <form action="login.auth" method="POST">
      <div class="mb-4">
        <label class="block text-gray-700 font-semibold">Correo Electrónico <span class="text-blue-600">*</span></label>
        <input type="email" name="email" class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none" placeholder="Correo Electrónico" required>
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 font-semibold">Contraseña <span class="text-blue-600">*</span></label>
        <input type="password" name="password" class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none" placeholder="Contraseña" required>
      </div>
      <div class="mt-6">
        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-500 hover:scale-105 duration-75 ease-in-out font-bold transition">Ingresar</button>
      </div>
    </form>
  </div>
</body>
</html>