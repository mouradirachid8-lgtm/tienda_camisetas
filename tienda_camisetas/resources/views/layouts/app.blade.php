<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSS Champions</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap + Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #1a3e72;
            --secondary-color: #d62828;
            --accent-color: #f77f00;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        body {
            font-family: 'Raleway', sans-serif;
            padding-top: 70px; /* Para el header fijo */
        }
        
        /* HEADER */
        .header {
            background-color: white;
            padding: 15px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .logo h1 {
            font-weight: 700;
            font-size: 24px;
            margin: 0;
            color: var(--primary-color);
        }
        
        /* NAV */
        .navmenu {
            display: flex;
            gap: 30px;
            list-style: none;
            padding-left: 0;
            margin: 0;
        }
        
        .navmenu .nav-link {
            text-decoration: none;
            font-weight: 600;
            color: var(--dark-color);
            padding: 6px 10px;
            display: inline-block;
            transition: 0.3s;
        }
        
        .navmenu .nav-link:hover,
        .navmenu .nav-selected {
            color: var(--secondary-color);
            border-bottom: 2px solid var(--secondary-color);
        }
        
        /* Menú de íconos */
        .menu-icons {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        
        .menu-icons a {
            font-size: 18px;
            color: var(--dark-color);
            text-decoration: none;
            transition: 0.3s;
        }
        
        .menu-icons a:hover {
            color: var(--secondary-color);
        }
        
        /* HERO SECTION */
        .hero-section {
            height: 100vh; 
            min-height: 300px;
            background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('/images/port4.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            color: white;
            text-align: center;
        }
                
        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .hero-content p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .btn-hero {
            background-color: var(--secondary-color);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }
        
        .btn-hero:hover {
            background-color: #b51f1f;
            color: white;
            transform: translateY(-3px);
        }
        
        /* SERVICIOS */
        .services-section {
            padding: 5rem 0;
            background-color: var(--light-color);
        }
        
        .service-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            height: 100%;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .service-icon {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
        }
        
        /* CONTACTO */
        .contact-section {
            padding: 5rem 0;
            background-color: white;
        }
        
        .contact-info i {
            font-size: 1.5rem;
            color: var(--secondary-color);
            margin-right: 1rem;
        }
        
        /* FOOTER */
        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 3rem 0;
        }
        
        .social-links a {
            color: white;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: 0.3s;
        }
        
        .social-links a:hover {
            color: var(--accent-color);
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-content p {
                font-size: 1.2rem;
            }
            
            .navmenu {
                flex-direction: column;
                gap: 10px;
                padding: 15px 0;
            }
        }
    </style>
</head>
<body>
    @include('layouts.partials.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('layouts.partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('scripts')
</body>
</html>