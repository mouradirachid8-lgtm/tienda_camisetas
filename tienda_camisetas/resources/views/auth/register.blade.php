<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registro de Usuario - {{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-white py-8">
    <!-- Contenedor de la imagen -->
    <div class="w-[300px] h-[200px] bg-[url('{{ asset('images/logo.jpg') }}')] bg-cover bg-center"></div>

    <!-- Formulario -->
    <div class="w-full max-w-lg bg-white p-10 rounded-[20px] shadow-lg border-t-[5px] border-t-orange-500 mt-6">
        <h1 class="text-4xl font-bold text-center mb-6">Registro de usuario</h1>
        <p class="text-lg text-center mb-6">¿Ya tienes cuenta?
            <a href="{{ route('login') }}" class="text-blue-800 font-semibold hover:underline">Inicia sesión</a>
        </p>

        <!-- Mensajes de error -->
        @if(session('error'))
            <p class="text-red-500 text-center mb-4">{{ session('error') }}</p>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nombre -->
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 font-semibold">Nombre <span class="text-blue-600">*</span></label>
                    <input 
                        id="nombre"
                        type="text" 
                        name="nombre" 
                        value="{{ old('nombre') }}"
                        class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none @error('nombre') border-red-500 @enderror"
                        placeholder="Nombre" 
                        required
                        autocomplete="given-name"
                        autofocus
                    >
                    @error('nombre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Apellidos -->
                <div class="mb-4">
                    <label for="apellidos" class="block text-gray-700 font-semibold">Apellidos <span class="text-blue-600">*</span></label>
                    <input 
                        id="apellidos"
                        type="text" 
                        name="apellidos" 
                        value="{{ old('apellidos') }}"
                        class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none @error('apellidos') border-red-500 @enderror"
                        placeholder="Apellidos" 
                        required
                        autocomplete="family-name"
                    >
                    @error('apellidos')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- DNI -->
                <div class="mb-4">
                    <label for="dni" class="block text-gray-700 font-semibold">DNI <span class="text-blue-600">*</span></label>
                    <input 
                        id="dni"
                        type="text" 
                        name="dni" 
                        value="{{ old('dni') }}"
                        class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none @error('dni') border-red-500 @enderror" 
                        placeholder="12345678A"
                        required
                        pattern="[0-9]{8}[A-Za-z]"
                        title="Formato: 8 números seguidos de una letra"
                    >
                    @error('dni')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- País -->
                <div class="mb-4">
                    <label for="pais" class="block text-gray-700 font-semibold">País <span class="text-blue-600">*</span></label>
                    <input 
                        id="pais"
                        type="text" 
                        name="pais" 
                        value="{{ old('pais') }}"
                        class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none @error('pais') border-red-500 @enderror" 
                        placeholder="España"
                        required
                        autocomplete="country"
                    >
                    @error('pais')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Localidad -->
                <div class="mb-4">
                    <label for="localidad" class="block text-gray-700 font-semibold">Localidad <span class="text-blue-600">*</span></label>
                    <input 
                        id="localidad"
                        type="text" 
                        name="localidad" 
                        value="{{ old('localidad') }}"
                        class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none @error('localidad') border-red-500 @enderror"
                        placeholder="Ciudad" 
                        required
                        autocomplete="address-level2"
                    >
                    @error('localidad')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Dirección -->
                <div class="mb-4">
                    <label for="direccion" class="block text-gray-700 font-semibold">Dirección <span class="text-blue-600">*</span></label>
                    <input 
                        id="direccion"
                        type="text" 
                        name="direccion" 
                        value="{{ old('direccion') }}"
                        class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none @error('direccion') border-red-500 @enderror"
                        placeholder="Calle, número, piso..." 
                        required
                        autocomplete="street-address"
                    >
                    @error('direccion')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Teléfono móvil -->
            <div class="mb-6">
                <label for="telefono" class="block text-gray-700 font-semibold">Teléfono móvil <span class="text-blue-600">*</span></label>
                <div class="flex">
                    @if(isset($paises))
                        <select 
                            name="codigo_pais"
                            class="px-4 py-2 border-2 rounded-l-lg bg-white focus:border-blue-400 outline-none"
                        >
                            @foreach($paises as $pais)
                                <option value="{{ $pais['codigo'] }}" {{ old('codigo_pais', '+34') == $pais['codigo'] ? 'selected' : '' }}
                                    title="{{ $pais['nombre'] }}">
                                    {{ $pais['codigo'] }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <select 
                            name="codigo_pais"
                            class="px-4 py-2 border-2 rounded-l-lg bg-white focus:border-blue-400 outline-none"
                        >
                            <option value="+34" {{ old('codigo_pais', '+34') == '+34' ? 'selected' : '' }}>+34</option>
                            <option value="+1" {{ old('codigo_pais') == '+1' ? 'selected' : '' }}>+1</option>
                            <option value="+44" {{ old('codigo_pais') == '+44' ? 'selected' : '' }}>+44</option>
                            <option value="+33" {{ old('codigo_pais') == '+33' ? 'selected' : '' }}>+33</option>
                            <option value="+49" {{ old('codigo_pais') == '+49' ? 'selected' : '' }}>+49</option>
                            <option value="+39" {{ old('codigo_pais') == '+39' ? 'selected' : '' }}>+39</option>
                            <option value="+52" {{ old('codigo_pais') == '+52' ? 'selected' : '' }}>+52</option>
                        </select>
                    @endif
                    <input 
                        id="telefono"
                        type="tel" 
                        name="telefono" 
                        value="{{ old('telefono') }}"
                        class="w-full px-4 py-2 border-2 border-l-0 rounded-r-lg bg-white focus:border-blue-400 outline-none @error('telefono') border-red-500 @enderror"
                        placeholder="123456789"
                        required
                        autocomplete="tel"
                        pattern="[0-9]{9}"
                    >
                </div>
                @error('telefono')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                @error('codigo_pais')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Correo Electrónico -->
            <div class="mb-6">
                <label for="email" class="block text-gray-700 font-semibold">Correo Electrónico <span class="text-blue-600">*</span></label>
                <input 
                    id="email"
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none @error('email') border-red-500 @enderror"
                    placeholder="correo@ejemplo.com" 
                    required
                    autocomplete="email"
                >
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contraseña -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold">Contraseña <span class="text-blue-600">*</span></label>
                    <input 
                        id="password"
                        type="password" 
                        name="password"
                        class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none @error('password') border-red-500 @enderror"
                        placeholder="Mínimo 8 caracteres" 
                        required
                        autocomplete="new-password"
                        minlength="8"
                    >
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmar contraseña -->
                <div class="mb-4">
                    <label for="password-confirm" class="block text-gray-700 font-semibold">Confirmar contraseña <span class="text-blue-600">*</span></label>
                    <input 
                        id="password-confirm"
                        type="password" 
                        name="password_confirmation"
                        class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none"
                        placeholder="Repetir contraseña" 
                        required
                        autocomplete="new-password"
                        minlength="8"
                    >
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-500 hover:scale-105 duration-75 ease-in-out font-bold transition">
                    Registrarse
                </button>
            </div>

            <p class="text-xs text-center mt-4">
                Los campos marcados con <span class="text-blue-600">*</span> son obligatorios
            </p>
        </form>
    </div>
</body>
</html>