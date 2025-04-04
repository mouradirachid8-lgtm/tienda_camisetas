<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSS Champions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --light-color: #ecf0f1;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://via.placeholder.com/1920x600') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 8rem 0;
            text-align: center;
        }
        
        .search-bar {
            max-width: 600px;
            margin: 2rem auto;
        }
        
        .product-card {
            transition: transform 0.3s;
            margin-bottom: 2rem;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .product-card:hover {
            transform: translateY(-5px);
        }
        
        .newsletter-section {
            background-color: var(--light-color);
            padding: 4rem 0;
        }
        
        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 3rem 0;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación (placeholder) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">DSS Champions</a>
            <div class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-3 fw-bold mb-4">Tu equipo, tu estilo</h1>
            <a href="/catalogo" class="btn btn-danger btn-lg px-5">Shop Now</a>
        </div>
    </section>

    <!-- Barra de búsqueda -->
    <div class="search-bar">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Busca tu camiseta favorita...">
            <button class="btn btn-dark" type="button">Buscar</button>
        </div>
    </div>

    <!-- Productos -->
    <section class="container my-5">
        <h2 class="text-center mb-5 fw-bold">Descubre nuestras camisetas</h2>
        <div class="row">
            @for($i = 0; $i < 8; $i++)
            <div class="col-md-3">
                <div class="card product-card">
                    <img src="https://via.placeholder.com/300x300" class="card-img-top" alt="Producto">
                    <div class="card-body text-center">
                        <h5 class="card-title">PRODUCT NAME</h5>
                        <p class="text-danger fw-bold">$300</p>
                        <button class="btn btn-outline-dark btn-sm">Añadir al carrito</button>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter-section">
        <div class="container text-center">
            <h2 class="mb-4 fw-bold">Newsletter</h2>
            <p class="mb-4 lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla quam velit.</p>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Tu email">
                        <button class="btn btn-danger" type="button">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>MAIN MENU</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">About</a></li>
                        <li><a href="#" class="text-white">Shop</a></li>
                        <li><a href="#" class="text-white">Help</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>COMPANY</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">The Company</a></li>
                        <li><a href="#" class="text-white">Careers</a></li>
                        <li><a href="#" class="text-white">Press</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>DISCOVER</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">The Team</a></li>
                        <li><a href="#" class="text-white">Our History</a></li>
                        <li><a href="#" class="text-white">Brand Motto</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>FIND US ON</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Facebook</a></li>
                        <li><a href="#" class="text-white">X / Twitter</a></li>
                        <li><a href="#" class="text-white">Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>