<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Tienda de Camisetas de Fútbol</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;  /* Azul claro que querías */
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #27ae60;
        }
        
        .contact-hero {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        
        .info-card {
            transition: all 0.3s;
            border-top: 4px solid var(--secondary-color);
        }
        
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .section-title {
            border-bottom: 2px solid var(--secondary-color);
        }
    </style>
</head>
<body class="bg-gray-50">
    @include('layouts.partials.header')

    <!-- Hero Section -->
    <section class="contact-hero py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold text-[#2c3e50] mb-4">Contáctanos</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Estamos aquí para ayudarte. Visítanos o contáctanos a través de los siguientes medios.</p>
        </div>
    </section>

    <!-- Mapa y Horario -->
    <section class="py-12 max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Mapa -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3105.0791642771266!2d-0.5112375!3d38.3868132!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6236ba2a07b50f%3A0x161c6e192605005b!2sEdificio%2016%20-%20Escuela%20Politecnica%20Superior%201%2C%2003690%20San%20Vicente%20del%20Raspeig%2C%20Alicante!5e0!3m2!1ses!2ses!4v1621321137058!5m2!1ses!2ses" 
                        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            
            <!-- Horario -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-[#2c3e50] mb-6 section-title pb-2">Horario de Atención</h2>
                
                <div class="space-y-4">
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium">Lunes - Viernes</span>
                        <span>9:00 - 22:00</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium">Sábados</span>
                        <span>09:00 - 16:00</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium">Domingos</span>
                        <span class="text-red-500">Cerrado</span>
                    </div>
                </div>
                
                <div class="mt-8">
                    <h3 class="text-xl font-semibold text-[#3498db] mb-4">¿Necesitas ayuda fuera de horario?</h3>
                    <p class="text-gray-600">Puedes enviarnos un email a <span class="text-[#3498db] hover:underline">dsschampions@gmail.com</span>  y te responderemos lo antes posible.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Info contacto -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-[#2c3e50] mb-12">Nuestros Canales de Contacto</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Email -->
                <div class="info-card bg-white p-8 rounded-lg shadow-md text-center">
                    <div class="bg-[#3498db] text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Email</h3>
                    <p class="text-gray-600 mb-4">Escríbenos directamente a nuestro correo</p>
                    <a href="mailto:dsschampions@gmail.com" class="text-[#3498db] font-medium hover:underline">dsschampions@gmail.com</a>
                </div>

                <!-- Teléfono -->
                <div class="info-card bg-white p-8 rounded-lg shadow-md text-center">
                    <div class="bg-[#3498db] text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Teléfono</h3>
                    <p class="text-gray-600 mb-4">Llama a nuestro equipo de atención</p>
                    <p class="text-[#3498db] font-medium">623 457 999</p>
                    <p class="text-gray-500 text-sm mt-1">Fax: 613 789 909</p>
                </div>

                <!-- Dirección -->
                <div class="info-card bg-white p-8 rounded-lg shadow-md text-center">
                    <div class="bg-[#3498db] text-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Visítanos</h3>
                    <p class="text-gray-600">
                        Escuela Politécnica Superior<br>
                        Universidad de Alicante<br>
                        03690 San Vicente del Raspeig
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-12 max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-[#2c3e50] mb-12">Preguntas Frecuentes</h2>
        
        <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-4xl mx-auto">
            <div class="divide-y divide-gray-200">
                <!-- FAQ Item 1 -->
                <div class="p-6">
                    <button class="flex justify-between items-center w-full text-left">
                        <h3 class="text-lg font-semibold text-[#3498db]">¿Dónde se encuentran ubicados?</h3>
                        <i class="fas fa-chevron-down text-[#3498db]"></i>
                    </button>
                    <p class="mt-2 text-gray-600">Nuestra tienda física está ubicada en la Escuela Politécnica Superior de la Universidad de Alicante, en San Vicente del Raspeig.</p>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="p-6">
                    <button class="flex justify-between items-center w-full text-left">
                        <h3 class="text-lg font-semibold text-[#3498db]">¿Hacen envíos a domicilio?</h3>
                        <i class="fas fa-chevron-down text-[#3498db]"></i>
                    </button>
                    <p class="mt-2 text-gray-600">Sí, realizamos envíos a toda España peninsular en un plazo de 24-48 horas. Para Baleares, Canarias y envíos internacionales, consulta disponibilidad.</p>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="p-6">
                    <button class="flex justify-between items-center w-full text-left">
                        <h3 class="text-lg font-semibold text-[#3498db]">¿Puedo personalizar mi camiseta?</h3>
                        <i class="fas fa-chevron-down text-[#3498db]"></i>
                    </button>
                    <p class="mt-2 text-gray-600">¡Claro! Visita nuestro <a href="/personalizar" class="text-[#3498db] hover:underline">diseñador de camisetas</a> para crear tu diseño personalizado con nombre, número y detalles únicos.</p>
                </div>
            </div>
        </div>
    </section>

    
    @include('layouts.partials.footer')
    <script>
        // Simple FAQ toggle functionality
        document.querySelectorAll('.faq button').forEach(button => {
            button.addEventListener('click', () => {
                const answer = button.nextElementSibling;
                const icon = button.querySelector('i');
                
                answer.classList.toggle('hidden');
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
            });
        });
    </script>
</body>
</html>