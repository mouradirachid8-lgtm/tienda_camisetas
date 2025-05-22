<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Contacto - Tienda de Camisetas de Fútbol</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .contact-container {
            background: #fff;
            padding: 3rem;
            margin: 2rem auto;
            max-width: 1200px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }
        .map iframe {
            width: 100%;
            height: 400px;
            border: none;
        }
        .btn-send {
            background: #0056b3;
            color: #fff;
            border: none;
            padding: 0.75rem 2rem;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-send:hover {
            background: #003d7a;
            transform: translateY(-2px);
        }
        .btn-send:disabled {
            background: #ccc;
            cursor: not-allowed;
            transform: none;
        }
        .info-card {
            transition: all 0.3s;
        }
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header (consistente con tu catálogo) -->
    <header class="bg-blue-900 shadow-lg shadow-blue-500/50 px-4 py-7">
        <div class="max-w-7xl mx-auto flex justify-between items-center space-x-6 relative">
            <div class="absolute left-0 top-1/2 transform -translate-y-1/2">
                <img src="{{ asset('images/logo.jpg') }}" alt="Icono" class="w-12 h-12 rounded-full">
            </div>

            <form class="pl-20" action="{{ route('catalogo.buscar') }}" method="GET" class="flex-1 mx-auto">
                <input type="text" name="query" 
                    class="w-full h-9 bg-transparent text-gray-400 border border-orange-500 rounded-full px-4 focus:outline-none focus:ring-2 focus:ring-orange-500" placeholder="Buscar productos..." required>
                <button type="submit" class="hidden">Buscar</button>
            </form>

            <nav class="flex items-center text-white space-x-8">
                <a href="/" class="hover:text-orange-500">Home</a>
                <span class="text-white">|</span>
                <a href="/about" class="hover:text-orange-500">About</a>
                <span class="text-white">|</span>
                <a href="/shop" class="hover:text-orange-500">Shop</a>
                <span class="text-white">|</span>
                <a href="/contact" class="text-orange-500 font-bold">Contact</a>
            </nav>
            
            <div class="flex gap-6 items-center ml-auto">
                <a href="carro" class="bg-orange-500 px-4 py-2 rounded p-4 text-white flex items-center gap-2 transform transition-transform duration-200 hover:scale-110">
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

    <!-- Contenido principal -->
    <main class="py-8">
        <div class="contact-container">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Mapa -->
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3105.0791642771266!2d-0.5112375!3d38.3868132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6236ba2a07b50f%3A0x161c6e192605005b!2sEdificio%2016%20-%20Escuela%20Politecnica%20Superior%201%2C%2003690%20San%20Vicente%20del%20Raspeig%2C%20Alicante!5e0!3m2!1ses!2ses!4v1621321137058!5m2!1ses!2ses" allowfullscreen></iframe>
                </div>

                <!-- Formulario -->
                <div class="contact-form">
                    <h1 class="text-3xl font-bold text-blue-800 mb-2">Contáctanos</h1>
                    <h2 class="text-lg text-gray-600 mb-6">Estamos aquí para ayudarte.</h2>

                    <form id="contactForm" action="{{ route('contacto.enviar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre Completo:</label>
                            <input type="text" id="nombre" name="nombre" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Correo Electrónico:</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="telefono" class="block text-gray-700 font-medium mb-2">Teléfono (opcional):</label>
                            <input type="tel" id="telefono" name="telefono"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="asunto" class="block text-gray-700 font-medium mb-2">Asunto:</label>
                            <input type="text" id="asunto" name="asunto" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label for="mensaje" class="block text-gray-700 font-medium mb-2">Mensaje:</label>
                            <textarea id="mensaje" name="mensaje" rows="5" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="archivo" class="block text-gray-700 font-medium mb-2">Adjuntar Archivo (opcional):</label>
                            <input type="file" id="archivo" name="archivo"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <p class="text-sm text-gray-500 mt-1">Formatos permitidos: PDF, JPG, PNG, DOCX, TXT (máx. 4MB)</p>
                        </div>

                        <button type="submit" class="btn-send" id="btnEnviar">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Enviar Mensaje
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Info contacto -->
        <div class="max-w-7xl mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Email -->
                <div class="info-card bg-white p-6 rounded-lg shadow-md text-center h-full">
                    <i class="fas fa-envelope fa-3x text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Email</h3>
                    <p class="text-gray-600">dsschampions@gmail.com</p>
                </div>

                <!-- Teléfono -->
                <div class="info-card bg-white p-6 rounded-lg shadow-md text-center h-full">
                    <i class="fas fa-phone fa-3x text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Teléfono</h3>
                    <p class="text-gray-600">Tel. 623 457 999</p>
                    <p class="text-gray-600">Fax 613 789 909</p>
                </div>

                <!-- Dirección -->
                <div class="info-card bg-white p-6 rounded-lg shadow-md text-center h-full">
                    <i class="fas fa-map-marker-alt fa-3x text-blue-600 mb-4"></i>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Dirección</h3>
                    <p class="text-gray-600">
                        Escuela Politécnica Superior<br>
                        Universidad de Alicante<br>
                        03690 San Vicente del Raspeig
                    </p>
                </div>
            </div>
        </div>
    </main>

    <!-- Incluir el footer desde otro fichero -->
    @include('layouts.partials.footer') 

    <script>
        // Manejo del formulario con AJAX
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = e.target;
            const formData = new FormData(form);
            const btnEnviar = document.getElementById('btnEnviar');
            
            // Deshabilitar botón mientras se envía
            btnEnviar.disabled = true;
            btnEnviar.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Enviando...';
            
            // Validar archivo adjunto si existe
            const fileInput = document.getElementById('archivo');
            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                const validExtensions = ['pdf', 'jpg', 'jpeg', 'png', 'docx', 'txt'];
                const fileExtension = file.name.split('.').pop().toLowerCase();
                
                if (!validExtensions.includes(fileExtension)) {
                    Swal.fire('Archivo no permitido', 'Solo se permiten PDF, JPG, PNG, DOCX y TXT.', 'warning');
                    resetButton();
                    return;
                }
                
                if (file.size > 4 * 1024 * 1024) {
                    Swal.fire('Archivo muy grande', 'El archivo debe ser menor a 4 MB.', 'warning');
                    resetButton();
                    return;
                }
            }
            
            // Enviar formulario
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: '¡Mensaje Enviado!',
                        text: data.message || 'Tu mensaje fue enviado correctamente. Te responderemos pronto.',
                        icon: 'success',
                        confirmButtonColor: '#0056b3'
                    });
                    form.reset();
                } else {
                    let errorMessage = 'Hubo un problema al enviar el mensaje.';
                    if (data.errors) {
                        errorMessage = Object.values(data.errors).flat().join('\n');
                    }
                    Swal.fire('Error', errorMessage, 'error');
                }
                resetButton();
            })
            .catch(error => {
                Swal.fire('Error', 'Hubo un problema al enviar el mensaje. Inténtalo de nuevo.', 'error');
                console.error('Error:', error);
                resetButton();
            });
            
            function resetButton() {
                btnEnviar.disabled = false;
                btnEnviar.innerHTML = '<i class="fas fa-paper-plane mr-2"></i>Enviar Mensaje';
            }
        });
    </script>
</body>
</html>