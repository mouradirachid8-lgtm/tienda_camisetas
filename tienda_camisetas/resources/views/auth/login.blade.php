<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Login') }} - {{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-white">
    <!-- Contenedor de la imagen -->
    <div class="w-[300px] h-[200px] bg-[url('{{ asset('images/logo.jpg') }}')] bg-cover bg-center"></div>
    
    <!-- Formulario -->
    <div class="w-full max-w-lg bg-white p-10 rounded-[20px] shadow-lg border-t-[5px] border-t-orange-500 mt-6">
        <h1 class="text-4xl font-bold text-center mb-6">{{ __('Login') }}</h1>
        <p class="text-lg text-center mb-6">¿Es tu primera vez? 
            <a href="{{ route('register') }}" class="text-blue-800 font-semibold hover:underline">{{ __('Registro') }}</a>
        </p>
        
        <!-- Mensajes de error de sesión -->
        @if(session('error'))
            <p class="text-red-500 text-center mb-4">{{ session('error') }}</p>
        @endif
        
        @if(session('status'))
            <p class="text-green-500 text-center mb-4">{{ session('status') }}</p>
        @endif
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">
                    {{ __('Correo elctrónico') }} <span class="text-blue-600">*</span>
                </label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none @error('email') border-red-500 @enderror" 
                    placeholder="{{ __('Correo elctrónico') }}" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="email" 
                    autofocus
                >
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold">
                    {{ __('Contraseña') }} <span class="text-blue-600">*</span>
                </label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    class="w-full px-4 py-2 border-2 rounded-lg bg-white focus:border-blue-400 outline-none @error('password') border-red-500 @enderror" 
                    placeholder="{{ __('Contraseña') }}" 
                    required 
                    autocomplete="current-password"
                >
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Remember Me -->
            <div class="mb-4">
                <label class="flex items-center">
                    <input 
                        class="mr-2 leading-tight" 
                        type="checkbox" 
                        name="remember" 
                        id="remember" 
                        {{ old('remember') ? 'checked' : '' }}
                    >
                    <span class="text-gray-700">{{ __('Recuérdame') }}</span>
                </label>
            </div>
            
            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-500 hover:scale-105 duration-75 ease-in-out font-bold transition">
                    {{ __('Login') }}
                </button>
            </div>
            
            <!-- Forgot Password Link -->
            @if (Route::has('password.request'))
                <div class="mt-4 text-center">
                    <a class="text-blue-600 hover:text-blue-800 text-sm" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                </div>
            @endif
        </form>
    </div>
</body>
</html>