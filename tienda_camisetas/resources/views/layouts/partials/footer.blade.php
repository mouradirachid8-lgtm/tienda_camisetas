<footer class="bg-[#2c3e50] text-white py-8">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="h-12 w-12 rounded-full">
                <p class="mt-2 text-gray-300">La mejor tienda de camisetas de fútbol</p>
            </div>

            <!-- Enlaces rápidos -->
            <div class="mt-6 md:mt-0 text-center md:text-left">
                <h3 class="text-lg font-bold text-orange-400 mb-3">Enlaces rápidos</h3>
                <div class="flex flex-col md:flex-row md:space-x-6 text-base font-semibold text-gray-300">
                    <a href="/" class="hover:text-white transition mb-2 md:mb-0">Inicio</a>
                    <a href="/catalogo" class="hover:text-white transition mb-2 md:mb-0">Tienda</a>
                    <a href="/personalizar" class="hover:text-white transition">Personalización</a>
                </div>
            </div>

            <div class="flex space-x-6">
                <a href="#" class="text-gray-300 hover:text-white">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-gray-300 hover:text-white">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-300 hover:text-white">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-gray-300 hover:text-white">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>
        
        <div class="border-t border-gray-700 mt-6 pt-6 text-center text-gray-400">
            <p>&copy; {{ now()->year }} DSS Champions. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>