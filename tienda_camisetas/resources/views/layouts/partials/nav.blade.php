<ul class="navmenu">
    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
    
    <li class="nav-item"><a class="nav-link" href="{{ route('catalogo') }}">Catálogo</a></li>
    
    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
    
    <li class="nav-item"><a class="nav-link" href="{{ route('contacto') }}">Contacto</a></li>
    
    <!-- Carrito -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('carro') }}">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </li>
</ul>
