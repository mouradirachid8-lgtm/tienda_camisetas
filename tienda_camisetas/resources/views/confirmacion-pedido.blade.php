<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Confirmado</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="bg-gray-50 min-h-screen pb-10">
        @include('layouts.partials.header')

        <div class="container mx-auto px-4 mt-10">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                    {{-- Icono de éxito --}}
                    <div class="mb-6">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full">
                            <i class="fas fa-check text-4xl text-green-600"></i>
                        </div>
                    </div>

                    {{-- Mensaje de confirmación --}}
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">¡Pedido Confirmado!</h1>
                    
                    <p class="text-lg text-gray-600 mb-6">
                        Gracias por tu compra. Tu pedido ha sido procesado exitosamente.
                    </p>

                    {{-- Número de pedido --}}
                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <p class="text-sm text-gray-600">Número de pedido:</p>
                        <p class="text-2xl font-bold text-blue-600">{{ session('numero_pedido', '#' . str_pad(rand(1000, 9999), 8, '0', STR_PAD_LEFT)) }}</p>
                    </div>

                    {{-- Información adicional --}}
                    <div class="text-left bg-blue-50 rounded-lg p-6 mb-6">
                        <h3 class="font-semibold text-gray-700 mb-3">¿Qué sigue?</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-start">
                                <i class="fas fa-envelope text-blue-600 mt-1 mr-3"></i>
                                <span>Recibirás un email de confirmación con los detalles de tu pedido.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-truck text-blue-600 mt-1 mr-3"></i>
                                <span>Te notificaremos cuando tu pedido sea enviado.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-box text-blue-600 mt-1 mr-3"></i>
                                <span>El tiempo estimado de entrega es de 
                                    @if(session('opcion_envio') == 'express')
                                        1-2 días hábiles
                                    @else
                                        3-5 días hábiles
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>

                    {{-- Botones de acción --}}
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('perfil') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 font-medium">
                            <i class="fas fa-user mr-2"></i>Ver Mis Pedidos
                        </a>
                        <a href="{{ route('catalogo') }}" class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-200 font-medium">
                            <i class="fas fa-shopping-bag mr-2"></i>Seguir Comprando
                        </a>
                    </div>

                    {{-- Información de contacto --}}
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <p class="text-sm text-gray-600">
                            ¿Tienes alguna pregunta? Contáctanos en 
                            <a href="mailto:soporte@mitienda.com" class="text-blue-600 hover:underline">soporte@mitienda.com</a>
                            o llámanos al <span class="font-medium">900 123 456</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>