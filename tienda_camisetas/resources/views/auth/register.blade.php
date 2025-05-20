<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col items-center justify-center min-h-screen bg-white py-8">
  <!-- Contenedor de la imagen -->
  <div class="w-[300px] h-[200px] bg-[url('/images/logo.jpg')] bg-cover bg-center"></div>

  <!-- Formulario -->
  <div class="w-full max-w-lg bg-white p-10 rounded-[20px] shadow-lg border-t-[5px] border-t-orange-500 mt-6">
    <h1 class="text-4xl font-bold text-center mb-6">Registro de usuario</h1>
    <p class="text-lg text-center mb-6">¿Ya tienes cuenta?
      <a href="/login?" class="text-blue-800 font-semibold hover:underline">Inicia sesión</a>
    </p>

    <!-- Mensajes de error -->
    @if(session('error'))
    <p class="text-red-500 text-center">{{ session('error') }}</p>
  @endif

    <form action="{{ route('register.store') }}" method="POST">
      @csrf
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Nombre -->
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold">Nombre <span class="text-blue-600">*</span></label>
          <input type="text" name="nombre" value="{{ old('nombre') }}"
            class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none"
            placeholder="Nombre" required>
          @error('nombre') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!--Apellidos -->
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold">Apellidos <span class="text-blue-600">*</span></label>
          <input type="text" name="apellidos" value="{{ old('apellidos') }}"
            class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none"
            placeholder="Apellidos" required>
          @error('apellidos') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!--DNI -->
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold">DNI <span class="text-blue-600">*</span></label>
          <input type="text" name="dni" value="{{ old('dni') }}"
            class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none" placeholder="DNI"
            required>
          @error('dni') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!--Pais -->
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold">País <span class="text-blue-600">*</span></label>
          <input type="text" name="pais" value="{{ old('pais') }}"
            class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none" placeholder="país"
            required>
          @error('pais') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!--Localidad -->
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold">Localidad <span class="text-blue-600">*</span></label>
          <input type="text" name="localidad" value="{{ old('localidad') }}"
            class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none"
            placeholder="localidad" required>
          @error('localidad') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!--Dirección -->
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold">Direccion <span class="text-blue-600">*</span></label>
          <input type="text" name="direccion" value="{{ old('direccion') }}"
            class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none"
            placeholder="Dereccion" required>
          @error('direccion') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>
      </div>

      <!-- Teléfono móvil -->
      <div class="mb-6">
        <label class="block text-gray-700 font-semibold">Teléfono móvil <span class="text-blue-600">*</span></label>
        <div class="flex">
          <select name="codigo_pais"
            class="form-control px-4 py-2 border-2 rounded-l-lg bg-white focus:border-blue-400 outline-none">
            @foreach($paises as $pais)
        <option value="{{ $pais['codigo'] }}" {{ old('codigo_pais') == $pais['codigo'] ? 'selected' : '' }}
          title="{{ $pais['nombre'] }}">
          {{ $pais['codigo'] }}
        </option>
      @endforeach
          </select>
          <input type="tel" name="telefono" value="{{ old('telefono') }}"
            class="w-full px-4 py-2 border-2 border-l-0 rounded-r-lg bg-white focus:border-blue-400 outline-none"
            placeholder="Teléfono">
        </div>
        @error('telefono') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
      </div>

      <!-- Correo Electrónico -->
      <div class="mb-6">
        <label class="block text-gray-700 font-semibold">Correo Electrónico <span class="text-blue-600">*</span></label>
        <input type="email" name="email" value="{{ old('email') }}"
          class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none"
          placeholder="Correo Electrónico" required>
        @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
      </div>

      <!-- Contraseña -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold">Contraseña <span class="text-blue-600">*</span></label>
          <input type="password" name="password"
            class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none"
            placeholder="Contraseña" required>
          @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Confirmar contraseña -->
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold">Confirmar contraseña <span
              class="text-blue-600">*</span></label>
          <input type="password" name="password_confirmation"
            class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none"
            placeholder="Contraseña" required>
          @error('password_confirmation') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>
      </div>

      <div class="mt-6">
        <button type="submit"
          class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-500 hover:scale-105 duration-75 ease-in-out font-bold transition">Registrarse</button>
      </div>

      <p class="text-xs text-center mt-4">Los campos marcados con <span class="text-blue-600">*</span> son obligatorios
      </p>
    </form>
  </div>
</body>

</html>