<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Envío</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="bg-gray-50 min-h-screen pb-10">
        @include('layouts.partials.header')

        <div class="container mx-auto px-4 mt-10">
            <div class="flex justify-between items-center">
                <div class="flex-1 flex flex-col items-center">
                    <div class="text-gray-400 font-medium">1. Detalles del carrito</div>
                    <div class="w-full h-1 bg-gray-200 mt-2"></div>
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="text-gray-700 font-medium">2. Información de envío</div>
                    <div class="w-full h-1 bg-gray-700 mt-2"></div>
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="text-gray-400 font-medium">3. Opciones de pago</div>
                    <div class="w-full h-1 bg-gray-200 mt-2"></div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 mt-8">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="w-full md:w-2/3">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Información de Envío</h2>

                    {{-- Mensajes de éxito o error --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert" id="success-alert">
                            <strong class="font-bold">¡Éxito!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="document.getElementById('success-alert').style.display='none'">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.103l-2.651 2.646a1.2 1.2 0 1 1-1.697-1.697L8.303 9.406 5.651 6.751a1.2 1.2 0 0 1 1.697-1.697L10 7.709l2.651-2.651a1.2 1.2 0 0 1 1.697 1.697L11.697 9.406l2.651 2.646a1.2 1.2 0 0 1 0 1.697z"/></svg>
                            </span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert" id="error-alert">
                            <strong class="font-bold">¡Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="document.getElementById('error-alert').style.display='none'">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.103l-2.651 2.646a1.2 1.2 0 1 1-1.697-1.697L8.303 9.406 5.651 6.751a1.2 1.2 0 0 1 1.697-1.697L10 7.709l2.651-2.651a1.2 1.2 0 0 1 1.697 1.697L11.697 9.406l2.651 2.646a1.2 1.2 0 0 1 0 1.697z"/></svg>
                            </span>
                        </div>
                    @endif

                    <form action="{{ route('checkout.procesarEnvio') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                        @csrf
                        <h3 class="text-xl font-semibold text-gray-700 mb-4">Dirección de Envío</h3>

                        {{-- Nombre --}}
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                            <input type="text" id="nombre" name="nombre"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('nombre', $user->nombre ?? '') }}" required>
                            @error('nombre')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Apellidos --}}
                        <div class="mb-4">
                            <label for="apellidos" class="block text-gray-700 text-sm font-bold mb-2">Apellidos:</label>
                            <input type="text" id="apellidos" name="apellidos"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('apellidos', $user->apellidos ?? '') }}" required>
                            @error('apellidos')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        {{-- Dirección --}}
                        <div class="mb-4">
                            <label for="direccion" class="block text-gray-700 text-sm font-bold mb-2">Dirección:</label>
                            <input type="text" id="direccion" name="direccion"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('direccion', $user->direccion ?? '') }}" required>
                            @error('direccion')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Localidad --}}
                        <div class="mb-4">
                            <label for="localidad" class="block text-gray-700 text-sm font-bold mb-2">Localidad:</label>
                            <input type="text" id="localidad" name="localidad"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('localidad', $user->localidad ?? '') }}" required>
                            @error('localidad')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- País --}}
                        <div class="mb-4">
                            <label for="pais" class="block text-gray-700 text-sm font-bold mb-2">País:</label>
                            <input type="text" id="pais" name="pais"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('pais', $user->pais ?? '') }}" required>
                            @error('pais')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Teléfono --}}
                        <div class="mb-4">
                            <label for="telefono" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                            <input type="text" id="telefono" name="telefono"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   value="{{ old('telefono', $user->telefono ?? '') }}" required>
                            @error('telefono')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <h3 class="text-xl font-semibold text-gray-700 mt-8 mb-4">Opciones de Envío</h3>
                        <div class="space-y-4">
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="opcion_envio" value="standard" class="form-radio text-blue-600 shipping-option" checked>
                                <span class="text-gray-700">Envío Estándar (3-5 días hábiles) - Gratis</span>
                            </label>
                            <label class="flex items-center space-x-3">
                                <input type="radio" name="opcion_envio" value="express" class="form-radio text-blue-600 shipping-option">
                                <span class="text-gray-700">Envío Express (1-2 días hábiles) - 5.00€</span>
                            </label>
                        </div>

                        <div class="flex gap-4 mt-8">
                            <button type="submit" class="px-6 bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-500 hover:scale-105 duration-75 ease-in-out font-bold transition">Continuar al Pago</button>
                            <a href="{{ route('carrito.mostrar') }}" class="px-6 bg-gray-400 text-white py-3 rounded-lg hover:bg-gray-500 hover:scale-105 duration-75 ease-in-out font-bold transition flex items-center justify-center">Volver al Carrito</a>
                        </div>
                    </form>
                </div>

                <div class="w-full md:w-1/3">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Resumen del Pedido</h2>

                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-blue-900">SUBTOTAL</span>
                            <span class="text-orange-600">{{ number_format($subtotal, 2) }}€</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-blue-900">ENVÍO</span>
                            <span class="text-orange-600" id="shipping-cost">FREE</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-blue-900">IMPUESTOS (21%)</span>
                            <span class="text-orange-600">{{ number_format($impuestos, 2) }}€</span>
                        </div>
                        <div class="pt-3 mt-3 border-t border-gray-200">
                            <div class="flex justify-between items-center">
                                <span class="text-blue-900 font-medium text-lg">TOTAL</span>
                                <span class="text-orange-600 font-medium text-lg" id="total-amount">{{ number_format($total, 2) }}€</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript para manejar el cambio dinámico del costo de envío
        document.addEventListener('DOMContentLoaded', function() {
            const shippingOptions = document.querySelectorAll('.shipping-option');
            const shippingCostElement = document.getElementById('shipping-cost');
            const totalAmountElement = document.getElementById('total-amount');
            
            // Valores base desde el servidor
            const subtotal = {{ $subtotal }};
            const impuestos = {{ $impuestos }};
            const expressCost = 5.00;
            
            // Función para actualizar el resumen de precios
            function updatePriceSummary() {
                const selectedShipping = document.querySelector('.shipping-option:checked').value;
                let shippingCost = 0;
                let shippingText = 'FREE';
                
                if (selectedShipping === 'express') {
                    shippingCost = expressCost;
                    shippingText = expressCost.toFixed(2) + '€';
                }
                
                const newTotal = subtotal + impuestos + shippingCost;
                
                // Actualizar el DOM
                shippingCostElement.textContent = shippingText;
                totalAmountElement.textContent = newTotal.toFixed(2) + '€';
            }
            
            // Agregar event listeners a todos los radio buttons de envío
            shippingOptions.forEach(option => {
                option.addEventListener('change', updatePriceSummary);
            });
        });
    </script>
</body>
</html>