@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="inicio" class="hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 hero-content">
                    <h1>Vive la Pasión del Fútbol</h1>
                    <a href="#servicios" class="btn-hero"id="verMasBtn">Ver más</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de Carrusel de Servicios -->
    <section id="servicios" class="services-carousel py-5 bg-light">
        <div class="container">
            <!-- Encabezado -->
            <!-- Encabezado -->
            <div class="section-header text-center mb-4">
                <h2 class="section-title h4 fw-semibold text-dark mb-0">Nuestros Servicios</h2>
            </div>



            <!-- Carrusel personalizado -->
            <div class="custom-carousel">
                <!-- Contenedor de slides -->
                <div class="carousel-container">
                    
                    <!-- Slide 1 - Paseo de perros -->
                    <div class="carousel-slide active">
                        <img src="{{ asset('images/ofi.jpg') }}">
                        <div class="carousel-caption">
                            <h3>Autenticidad Garantizada</h3>
                            <p>Productos oficiales</p>
                        </div>
                    </div>
                    
                    <!-- Slide 2 - Adopción -->
                    <div class="carousel-slide">
                        <img src="{{ asset('images/nar.jpg') }}">
                        <div class="carousel-caption">
                            <h3>Camisetas personalizadas</h3>
                            <p>Personaliza tu camiseta</p>
                        </div>
                    </div>
                    
                    <!-- Slide 3 - Tienda -->
                    <div class="carousel-slide">
                        <img src="{{ asset('images/de3.jpg') }}" class = "full-image" >
                        <div class="carousel-caption express-text">
                            <h3>Envío Express 24/48h</h3>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Controles -->
                <button class="carousel-control prev" onclick="moveSlide(-1)">&#10094;</button>
                <button class="carousel-control next" onclick="moveSlide(1)">&#10095;</button>
                
                <!-- Indicadores -->
                <div class="carousel-indicators">
                    <span class="indicator active" onclick="goToSlide(0)"></span>
                    <span class="indicator" onclick="goToSlide(1)"></span>
                    <span class="indicator" onclick="goToSlide(2)"></span>
                    <span class="indicator" onclick="goToSlide(3)"></span>
                </div>
            </div>
            
            
            <!-- CTA Final mejorado -->
            <div class="text-center mt-5">
                <a href="{{ route('catalogo') }}" class="btn btn-danger btn-sm px-4 py-2 fw-bold">
                    <i class="fas fa-chevron-right me-2"></i> VER TODO EL CATÁLOGO
                </a>
            </div>
        </div>
    </section>

    <!-- Contacto Section -->
    <section id="contacto" class="contact-section">
        <div class="container">
            <h2 class="text-center mb-5">Contáctanos</h2>
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="h-100 w-100 rounded overflow-hidden shadow">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12573.016274839955!2d-0.5123524!3d38.383315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6236c6a66f9d8b%3A0x3c2eef26b5a844e6!2sEstadio%20de%20Mestalla!5e0!3m2!1ses!2ses!4v1620000000000!5m2!1ses!2ses" 
                            width="100%" 
                            height="100%" 
                            style="min-height: 400px; border:0;" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info">
                        <div class="d-flex align-items-start mb-4">
                            <i class="fas fa-map-marker-alt mt-1"></i>
                            <div>
                                <h4>Dirección</h4>
                                <p>Escuela Politécnica Superior ,</br >
                                    03690 San Vicente del Raspeig</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-4">
                            <i class="fas fa-phone mt-1"></i>
                            <div>
                                <h4>Teléfono</h4>
                                <p>+34 634 336 246</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-4">
                            <i class="fas fa-envelope mt-1"></i>
                            <div>
                                <h4>Email</h4>
                                <p>info@dsschampions.com</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <i class="fas fa-clock mt-1"></i>
                            <div>
                                <h4>Horario</h4>
                                <p>Lunes a Sábado: 9:00 - 20:00<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Estilos para el carrusel personalizado */
        .custom-carousel {
            position: relative;
            max-width: 100%;
            margin: auto;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .carousel-container {
            display: flex;
            transition: transform 0.5s ease;
            height: 400px; /* Ajusta según necesites */
        }
        
        .carousel-slide {
            min-width: 100%;
            position: relative;
        }
        
        .carousel-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .carousel-caption {
            position: absolute;
            bottom: 20%;
            left: 0;
            right: 0;
            background-color: rgba(0,0,0,0.5);
            color: white;
            padding: 15px;
            text-align: center;
        }
        
        .carousel-control {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0,0,0,0.5);
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 18px;
            z-index: 10;
        }
        
        .carousel-control.prev {
            left: 10px;
        }
        
        .carousel-control.next {
            right: 10px;
        }
        
        .carousel-indicators {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
        }
        
        .indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.5);
            margin: 0 5px;
            cursor: pointer;
        }
        
        .indicator.active {
            background-color: white;
        }
        /* Estilo específico para el texto de envío express */
        .carousel-caption.express-text {
            left: 20px; /* Posición desde la izquierda */
            transform: none; /* Elimina el centrado anterior */
            right: auto; /* Anula cualquier valor right heredado */
            width: auto; /* Ancho automático según contenido */
            max-width: 60%; /* Máximo ancho permitido */
            text-align: left; /* Alineación del texto a la izquierda */
            padding: 15px 20px;
            background-color: rgba(0,0,0,0.7);
            border-radius: 0 5px 5px 0; /* Bordes redondeados solo a la derecha */
        }

        /* Opcional: ajustar posición vertical si es necesario */
        .carousel-caption.express-text {
            bottom: 20%; /* Ajusta este valor según necesites */
        }
    </style>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-slide');
        const indicators = document.querySelectorAll('.indicator');
        const container = document.querySelector('.carousel-container');
        
        // Función para mover el carrusel
        function moveSlide(direction) {
            currentSlide += direction;
            
            if (currentSlide < 0) {
                currentSlide = slides.length - 1;
            } else if (currentSlide >= slides.length) {
                currentSlide = 0;
            }
            
            updateCarousel();
        }
        
        // Función para ir a un slide específico
        function goToSlide(index) {
            currentSlide = index;
            updateCarousel();
        }
        
        // Actualizar el carrusel
        function updateCarousel() {
            container.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            // Actualizar indicadores
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentSlide);
            });
            
            // Actualizar slides
            slides.forEach((slide, index) => {
                slide.classList.toggle('active', index === currentSlide);
            });
        }
        
        // Auto-play opcional
        let autoPlay = setInterval(() => {
            moveSlide(1);
        }, 5000);
        
        // Pausar auto-play al interactuar
        document.querySelector('.custom-carousel').addEventListener('mouseenter', () => {
            clearInterval(autoPlay);
        });
        
        document.querySelector('.custom-carousel').addEventListener('mouseleave', () => {
            autoPlay = setInterval(() => {
                moveSlide(1);
            }, 5000);
        });


        // Función para scroll suave
        document.getElementById('verMasBtn').addEventListener('click', function(e) {
            e.preventDefault();
            const serviciosSection = document.getElementById('servicios');
            const headerHeight = document.querySelector('header').offsetHeight || 80; // Altura del header o 80px por defecto
            const sectionPosition = serviciosSection.getBoundingClientRect().top;
            const offsetPosition = sectionPosition + window.pageYOffset - headerHeight;

            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        });
    </script>
@endsection