@extends('layouts.app')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #1a3e72;  /* Azul oscuro principal */
            --accent-orange: #ff6b35;  /* Naranja de acento */
            --dark-black: #2d2d2d;    /* Negro para texto */
            --light-gray: #f5f5f5;     /* Fondo claro */
            --pure-white: #ffffff;    /* Blanco puro */
        }
        
        
        
        .hero-banner {
            background: var(--primary-blue);
            height: 150px; /* Reducido de 200px */
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 30px; /* Espacio después del banner */
        }

        .hero-banner::before {
            content: '';
            position: absolute;
            top: -30%; /* Ajustado de -50% */
            left: -30%; /* Ajustado de -50% */
            width: 160%; /* Reducido de 200% */
            height: 160%; /* Reducido de 200% */
            background: radial-gradient(circle, var(--accent-orange) 0%, transparent 70%);
            opacity: 0.3;
            animation: rotate 15s linear infinite;
        }

        .hero-banner h1 {
            font-size: 2rem; /* Reducido de 2.5rem */
            font-weight: 600; /* Reducido de 700 */
            color: var(--pure-white);
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            padding: 0 20px;
            text-align: center;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @media (max-width: 768px) {
            .hero-banner {
                height: 120px; /* Más compacto en móvil */
            }
            
            .hero-banner h1 {
                font-size: 1.5rem; /* Tamaño más pequeño en móvil */
            }
        }


       
        .about-section {
            padding: 80px 0;
            background-color: var(--pure-white);
        }

        .section-title {
            font-weight: 800;
            color: var(--primary-blue);
            position: relative;
            margin-bottom: 30px;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--accent-orange);
        }

        .about-section h2 {
            font-size: 2.5rem;
        }

        .about-section h3 {
            font-size: 1.8rem;
            margin-top: 50px;
        }

        .about-section h5 {
            font-size: 1.3rem;
            margin-top: 20px;
            color: var(--primary-blue);
        }

        .about-section p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--dark-black);
            margin-bottom: 20px;
        }

        .about-img {
            max-width: 100%;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: 3px solid var(--primary-blue);
            transition: transform 0.3s ease;
        }

        .about-img:hover {
            transform: scale(1.02);
        }

        .icon-feature {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--accent-orange);
            background: var(--light-gray);
            width: 80px;
            height: 80px;
            line-height: 80px;
            border-radius: 50%;
            display: inline-block;
        }

        .btn-cta {
            font-size: 1.1rem;
            padding: 12px 35px;
            border-radius: 30px;
            font-weight: 600;
            background-color: var(--accent-orange);
            border: none;
            color: white;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-cta:hover {
            background-color: var(--primary-blue);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255,107,53,0.4);
            color: white;
        }

        .feature-box {
            background: var(--pure-white);
            padding: 30px;
            border-radius: 10px;
            height: 100%;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            border: 1px solid rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-color: var(--accent-orange);
        }

        .highlight-text {
            color: var(--accent-orange);
            font-weight: 600;
        }

        .mission-section {
            background-color: var(--light-gray);
            padding: 60px 0;
            margin: 60px 0;
        }

        .commitment-section {
            background-color: var(--primary-blue);
            color: white;
            padding: 60px 0;
            margin: 60px 0;
        }

        .commitment-section h3 {
            color: white;
        }

        .commitment-section .section-title::after {
            background: var(--accent-orange);
        }

        @media (max-width: 768px) {
            .hero-banner h1 {
                font-size: 2rem;
            }

            .about-section h2 {
                font-size: 1.8rem;
            }

            .about-section h3 {
                font-size: 1.5rem;
            }
            
            .feature-box {
                margin-bottom: 20px;
            }
        }
    </style>

    <!-- Hero Banner -->
    <div class="hero-banner">
        <h1>NUESTRA PASIÓN POR EL FÚTBOL</h1>
    </div>

    <!-- Main About Section -->
    <section class="about-section">
        <div class="container">

            <!-- ¿Quiénes somos? -->
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <img src="{{ asset('images/about-team.jpg') }}" alt="Sobre Fútbol Passion" class="about-img" />
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title"><i class="fas fa-users me-3"></i>¿Quiénes somos?</h2>
                    <p>
                        En <span class="highlight-text">Fútbol Passion</span> vivimos y respiramos fútbol. Somos especialistas en equipamiento futbolístico de <strong>alta calidad</strong> para jugadores y aficionados. Ofrecemos camisetas, pantalones y accesorios tanto de equipos como selecciones nacionales, además de un servicio exclusivo de personalización.
                    </p>
                    <p>
                        Nuestro catálogo incluye equipaciones oficiales, réplicas de alta calidad y productos personalizados para hombres, mujeres y niños. Trabajamos directamente con los <strong>mejores proveedores</strong> para garantizar autenticidad y calidad.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Nuestra misión -->
    <section class="mission-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-1 mb-4 mb-lg-0">
                    <img src="{{ asset('images/mission-football.jpg') }}" alt="Nuestra misión" class="about-img" />
                </div>
                <div class="col-lg-6 order-lg-2">
                    <h3 class="section-title"><i class="fas fa-bullseye me-3"></i>Nuestra Misión</h3>
                    <p>
                        Llevar la <span class="highlight-text">pasión por el fútbol</span> a cada rincón a través de equipaciones de calidad que permitan a los aficionados mostrar su amor por el deporte rey. Nos comprometemos con la <strong>autenticidad</strong>, la <strong>variedad</strong> y un <strong>servicio personalizado</strong> que entiende las necesidades de cada futbolista.
                    </p>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Fortalezas destacadas -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h3 class="section-title">¿Por qué elegirnos?</h3>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-box text-center">
                        <i class="fas fa-star icon-feature"></i>
                        <h5>Autenticidad Garantizada</h5>
                        <p>Productos oficiales con certificación y réplicas premium con todos los detalles originales que buscas.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box text-center">
                        <i class="fas fa-tshirt icon-feature"></i>
                        <h5>Personalización Premium</h5>
                        <p>Crea diseños únicos con nombres, números y detalles personalizados con nuestra tecnología avanzada.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box text-center">
                        <i class="fas fa-truck icon-feature"></i>
                        <h5>Envío Express 24/48h</h5>
                        <p>Recibe tu equipación en tiempo récord para que no te pierdas ningún partido importante.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nuestro Compromiso -->
    <section class="commitment-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h3 class="section-title"><i class="fas fa-futbol me-3"></i>Nuestro Compromiso</h3>
                    <p class="lead">
                        Ofrecemos una experiencia de compra <strong>sin complicaciones</strong> con envíos rápidos, cambios fáciles y atención al cliente especializada. Trabajamos directamente con proveedores oficiales para garantizar los mejores precios en equipaciones nuevas.
                    </p>
                    <p>
                        Nuestro taller de personalización cuenta con los <strong>mejores técnicos</strong> para crear diseños únicos que reflejen tu personalidad en el campo.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA final -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="section-title mb-4">¿Listo para vestir tu pasión?</h3>
                    <p class="mb-4">Descubre nuestra colección y encuentra la equipación perfecta para ti</p>
                    <a href="{{ route('catalogo') }}" class="btn btn-cta">Explorar Catálogo</a>
                </div>
            </div>
        </div>
    </section>
@endsection