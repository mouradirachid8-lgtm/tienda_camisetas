<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carro</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <div class="bg-gray-50 min-h-screen pb-10">
        <!-- Navbar principal -->
        <header class="bg-blue-900 shadow-lg shadow-blue-500/50 px-4 py-7">
            <div class="max-w-7xl mx-auto flex justify-between items-center space-x-6 relative">
                
                <!-- Icono a la izquierda -->
                <div class="absolute left-0 top-1/2 transform -translate-y-1/2">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Icono" class="w-12 h-12 rounded-full">
                </div>
    
                <!-- Barra de búsqueda -->
                <form class="pl-20" action="{{ route('catalogo.buscar') }}" method="GET" class="flex-1 mx-auto">
                    <input type="text" name="query" 
                        class="w-full h-9 bg-transparent text-gray-400 border border-orange-500 rounded-full px-4 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Buscar productos..." required>
                    <button type="submit" class="hidden">Buscar</button>
                </form>
    
                <!-- Menú de navegación -->
                <nav class="flex items-center text-white space-x-8">
                    <a href="/" class="hover:text-orange-500">Home</a>
                    <span class="text-white">|</span>
                    <a href="/about" class="hover:text-orange-500">About</a>
                    <span class="text-white">|</span>
                    <a href="/shop" class="hover:text-orange-500">Shop</a>
                    <span class="text-white">|</span>
                    <a href="/help" class="hover:text-orange-500">Help</a>
                </nav>
                
                <!-- Sección de inicio de sesión y carrito -->
                <div class="flex gap-6 items-center ml-auto">
                    <!-- Icono de carrito -->
                    <a href="" class="bg-orange-500 px-4 py-2 rounded p-4 text-white flex items-center gap-2 transform transition-transform duration-200 hover:scale-110">
                        <i class="fas fa-shopping-cart text-white"></i> 
                        <span>Tu carro</span>
                    </a>
                    <a href="/" class="flex items-center space-x-2 text-red-500 hover:text-red-700">
                        <i class="fa fa-sign-out-alt"></i>
                        <span>Cerrar Sesión</span>
                    </a>
                </div>
            </div>
        </header>

        <!-- Paso a paso del checkout -->
        <div class="container mx-auto px-4 mt-10">
            <div class="flex justify-between items-center">
                <div class="flex-1 flex flex-col items-center">
                    <div class="text-gray-700 font-medium">1. Shopping Cart</div>
                    <div class="w-full h-1 bg-gray-700 mt-2"></div>
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="text-gray-400 font-medium">2. Shipping Details</div>
                    <div class="w-full h-1 bg-gray-200 mt-2"></div>
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="text-gray-400 font-medium">3. Payment Options</div>
                    <div class="w-full h-1 bg-gray-200 mt-2"></div>
                </div>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="container mx-auto px-4 mt-8">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Carrito de compras -->
                <div class="w-full md:w-2/3">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Shopping Cart</h2>

                    <!-- Producto 1 -->
                    <div class="border-b border-gray-200 pb-6 mb-6">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="w-24 h-24 border border-gray-200 flex items-center justify-center bg-gray-100">
                                <svg class="w-12 h-12 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 13H5v-2h14v2z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-blue-900">PRODUCT NAME</h3>
                                <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit, sed do eiusmod.</p>
                                <div class="mt-2 text-orange-600 font-medium">$300</div>
                            </div>
                            <div class="flex flex-col items-end gap-2">
                                <div class="flex items-center">
                                    <input type="text" value="1 pcs"
                                        class="w-16 text-center border border-gray-300 py-1 px-2">
                                    <div class="flex flex-col ml-1">
                                        <button class="border border-gray-300 px-2 text-xs">+</button>
                                        <button class="border border-gray-300 px-2 text-xs">-</button>
                                    </div>
                                </div>
                                <button
                                    class="mt-2 bg-gray-200 text-gray-700 py-1 px-4 text-sm rounded">Eliminar</button>
                            </div>
                        </div>
                    </div>

                    <!-- Producto 2 -->
                    <div class="border-b border-gray-200 pb-6 mb-6">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="w-24 h-24 border border-gray-200 flex items-center justify-center bg-gray-100">
                                <svg class="w-12 h-12 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 13H5v-2h14v2z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-blue-900">PRODUCT NAME</h3>
                                <p class="text-gray-600 text-sm">Cras auctor tortor in augue ultrices, ut viverra urna
                                    accumsan. Quisque euismod est.</p>
                                <div class="mt-2 text-orange-600 font-medium">$200</div>
                            </div>
                            <div class="flex flex-col items-end gap-2">
                                <div class="flex items-center">
                                    <input type="text" value="1 pcs"
                                        class="w-16 text-center border border-gray-300 py-1 px-2">
                                    <div class="flex flex-col ml-1">
                                        <button class="border border-gray-300 px-2 text-xs">+</button>
                                        <button class="border border-gray-300 px-2 text-xs">-</button>
                                    </div>
                                </div>
                                <button
                                    class="mt-2 bg-gray-200 text-gray-700 py-1 px-4 text-sm rounded">Eliminar</button>
                            </div>
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="flex gap-4 mt-8">
                        <button class="px-6 bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-500 hover:scale-105 duration-75 ease-in-out font-bold transition">Next</button>
                        <button class="px-6 bg-gray-400 text-white py-3 rounded-lg hover:bg-gray-500 hover:scale-105 duration-75 ease-in-out font-bold transition">Cancel</button>
                    </div>
                </div>

                <!-- Resumen del pedido -->
                <div class="w-full md:w-1/3">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Summary</h2>

                    <!-- Código de cupón -->
                    <div class="mb-6">
                        <input type="text" placeholder="ENTER COUPON CODE"
                            class="w-full border-t-0 border-r-0 border-l-0 border-b border-gray-300 pb-2 focus:outline-none focus:border-blue-500 text-sm uppercase">
                    </div>

                    <!-- Resumen de precios -->
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-blue-900">SUBTOTAL</span>
                            <span class="text-orange-600">$600</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-blue-900">SHIPPING</span>
                            <span class="text-orange-600">FREE</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-blue-900">TAXES</span>
                            <span class="text-orange-600">$13</span>
                        </div>
                        <div class="pt-3 mt-3 border-t border-gray-200">
                            <div class="flex justify-between items-center">
                                <span class="text-blue-900 font-medium text-lg">TOTAL</span>
                                <span class="text-orange-600 font-medium text-lg">$613</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>