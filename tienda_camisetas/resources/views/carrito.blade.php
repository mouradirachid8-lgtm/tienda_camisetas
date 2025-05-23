<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="bg-gray-50 min-h-screen pb-10">
        @include('layouts.partials.header')

        <div class="container mx-auto px-4 mt-10">
            <div class="flex justify-between items-center">
                <div class="flex-1 flex flex-col items-center">
                    <div class="text-gray-700 font-medium">1. Detalles del carrito</div>
                    <div class="w-full h-1 bg-gray-700 mt-2"></div>
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="text-gray-400 font-medium">2. Información de envío</div>
                    <div class="w-full h-1 bg-gray-200 mt-2"></div>
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
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Carrito</h2>

                    {{-- Mensajes de éxito o error --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert" id="success-alert">
                            <strong class="font-bold">¡Éxito!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                                onclick="document.getElementById('success-alert').style.display='none'">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.103l-2.651 2.646a1.2 1.2 0 1 1-1.697-1.697L8.303 9.406 5.651 6.751a1.2 1.2 0 0 1 1.697-1.697L10 7.709l2.651-2.651a1.2 1.2 0 0 1 1.697 1.697L11.697 9.406l2.651 2.646a1.2 1.2 0 0 1 0 1.697z" />
                                </svg>
                            </span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert" id="error-alert">
                            <strong class="font-bold">¡Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer"
                                onclick="document.getElementById('error-alert').style.display='none'">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.103l-2.651 2.646a1.2 1.2 0 1 1-1.697-1.697L8.303 9.406 5.651 6.751a1.2 1.2 0 0 1 1.697-1.697L10 7.709l2.651-2.651a1.2 1.2 0 0 1 1.697 1.697L11.697 9.406l2.651 2.646a1.2 1.2 0 0 1 0 1.697z" />
                                </svg>
                            </span>
                        </div>
                    @endif

                    @if ($productos->isEmpty())
                        <p class="text-gray-600 text-center text-lg mt-10">Tu carrito está vacío. ¡Añade algunos productos!
                        </p>
                    @else
                        @foreach ($productos as $producto)
                            <div class="border-b border-gray-200 pb-6 mb-6">
                                <div class="flex flex-col sm:flex-row gap-4">
                                    <div
                                        class="w-24 h-24 border border-gray-200 flex items-center justify-center bg-gray-100 overflow-hidden rounded-lg flex-shrink-0">
                                        @if ($producto->imagen)
                                            <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}"
                                                class="object-cover w-full h-full hover:scale-110 transition-transform duration-300">
                                        @else
                                            {{-- Placeholder mejorado cuando no hay imagen --}}
                                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-blue-900">
                                            <a href="{{ route('producto.show', $producto->id) }}"
                                                class="hover:text-blue-700 hover:underline transition-colors duration-200">
                                                {{ $producto->nombre }}
                                            </a>
                                        </h3>
                                        <p class="text-gray-600 text-sm">
                                            @if ($producto->talla)
                                                Talla: {{ $producto->talla->nombre }} |
                                            @endif
                                            Color: {{ $producto->color }} | Material: {{ $producto->material }}
                                        </p>
                                        <div class="mt-2 text-orange-600 font-medium">
                                            {{ number_format($producto->aplicar_descuento(), 2) }}€
                                            @if ($producto->descuento > 0)
                                                <span
                                                    class="text-gray-400 line-through text-sm">{{ number_format($producto->precio, 2) }}€</span>
                                                <span class="text-green-600 text-sm">({{ $producto->descuento }}% Dto.)</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-end gap-2">
                                        <form action="{{ route('carrito.actualizarCantidad', $producto->id) }}" method="POST"
                                            class="flex items-center">
                                            @csrf
                                            @method('PATCH')
                                            <input type="number" name="cantidad" value="{{ $producto->pivot->cantidad }}"
                                                min="1" max="{{ $producto->stock }}"
                                                class="w-16 text-center border border-gray-300 py-1 px-2 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                                            <button type="submit"
                                                class="ml-2 bg-blue-500 text-white py-1 px-3 rounded-md hover:bg-blue-600 text-sm">Actualizar</button>
                                        </form>
                                        <form action="{{ route('carrito.eliminar', $producto->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="mt-2 bg-red-500 text-white py-1 px-4 text-sm rounded hover:bg-red-600 transition">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="flex gap-4 mt-8">
                        <button> <a href='envio'
                                class="px-6 bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-500 hover:scale-105 duration-75 ease-in-out font-bold transition">Continuar</a>
                        </button>
                        <form action="{{ route('carrito.vaciar') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-6 bg-gray-400 text-white py-3 rounded-lg hover:bg-gray-500 hover:scale-105 duration-75 ease-in-out font-bold transition">Vaciar
                                Carrito</button>
                        </form>
                    </div>
                </div>

                <div class="w-full md:w-1/3">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Resumen</h2>

                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-blue-900">SUBTOTAL</span>
                            <span class="text-orange-600">{{ number_format($subtotal, 2) }}€</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-blue-900">ENVÍO</span>
                            <span class="text-orange-600">FREE</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-blue-900">IMPUESTOS (21%)</span>
                            <span class="text-orange-600">{{ number_format($impuestos, 2) }}€</span>
                        </div>
                        <div class="pt-3 mt-3 border-t border-gray-200">
                            <div class="flex justify-between items-center">
                                <span class="text-blue-900 font-medium text-lg">TOTAL</span>
                                <span class="text-orange-600 font-medium text-lg">{{ number_format($total, 2) }}€</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>