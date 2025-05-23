<nav class="flex items-center text-white space-x-8">
    <a href="/" class="hover:text-orange-500 {{ request()->is('/') ? 'text-orange-500 font-bold' : '' }}">Home</a>
    <span class="text-white">|</span>
    <a href="/personalizar" class="hover:text-orange-500 {{ request()->is('personalizar') ? 'text-orange-500 font-bold' : '' }}">Personalizar</a>
    <span class="text-white">|</span>
    <a href="/catalogo" class="hover:text-orange-500 {{ request()->is('catalogo') ? 'text-orange-500 font-bold' : '' }}">Catálogo</a>
    <span class="text-white">|</span>
    <a href="/contacto" class="hover:text-orange-500 {{ request()->is('contacto') ? 'text-orange-500 font-bold' : '' }}">Contact</a>
</nav>