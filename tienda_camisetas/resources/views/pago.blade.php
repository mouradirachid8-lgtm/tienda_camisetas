<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones de Pago</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="bg-gray-50 min-h-screen pb-10">
        @include('layouts.partials.header')

        <div class="container mx-auto px-4 mt-10">
            <div class="flex justify-between items-center">
                <div class="flex-1 flex flex-col items-center">
                    <div class="text-gray-400 font-medium">1. Detalles del carrito</div>
                    <div class="w-full h-1 bg-gray-200 mt-2"></div>
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="text-gray-400 font-medium">2. Información de envío</div>
                    <div class="w-full h-1 bg-gray-200 mt-2"></div>
                </div>
                <div class="flex-1 flex flex-col items-center">
                    <div class="text-gray-700 font-medium">3. Opciones de pago</div>
                    <div class="w-full h-1 bg-gray-700 mt-2"></div>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 mt-8">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="w-full md:w-2/3">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Opciones de Pago</h2>

                    {{-- Mensajes de éxito o error --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert" id="success-alert">
                            <strong class="font-bold">¡Éxito!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="document.getElementById('success-alert').style.display='none'">
                                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.103l-2.651 2.646a1.2 1.2 0 1 1-1.697-1.697L8.303 9.406 5.651 6.751a1.2 1.2 0 0 1 1.697-1.697L10 7.709l2.651-2.651a1.2 1.2 0 0 1 1.697 1.697L11.697 9.406l2.651 2.646a1.2 1.2 0 0 1 0 1.697z"/></svg>
                            </span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert" id="error-alert">
                            <strong class="font-bold">¡Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" onclick="document.getElementById('error-alert').style.display='none'">
                                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.103l-2.651 2.646a1.2 1.2 0 1 1-1.697-1.697L8.303 9.406 5.651 6.751a1.2 1.2 0 0 1 1.697-1.697L10 7.709l2.651-2.651a1.2 1.2 0 0 1 1.697 1.697L11.697 9.406l2.651 2.646a1.2 1.2 0 0 1 0 1.697z"/></svg>
                            </span>
                        </div>
                    @endif

                    <form action="{{ route('checkout.procesarPago') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
                        @csrf
                        <h3 class="text-xl font-semibold text-gray-700 mb-4">Método de Pago</h3>

                        {{-- Opciones de Pago --}}
                        <div class="space-y-4 mb-6">
                            <label class="flex items-center space-x-3 p-4 border rounded-lg cursor-pointer hover:bg-gray-50 payment-option-label">
                                <input type="radio" name="metodo_pago" value="tarjeta" class="form-radio text-blue-600 payment-method" checked>
                                <span class="text-gray-700 flex-1">Tarjeta de Crédito/Débito</span>
                                <div class="flex space-x-2">
                                    <i class="fab fa-cc-visa text-2xl text-blue-600"></i>
                                    <i class="fab fa-cc-mastercard text-2xl text-red-600"></i>
                                    <i class="fab fa-cc-amex text-2xl text-blue-500"></i>
                                </div>
                            </label>

                            <label class="flex items-center space-x-3 p-4 border rounded-lg cursor-pointer hover:bg-gray-50 payment-option-label">
                                <input type="radio" name="metodo_pago" value="paypal" class="form-radio text-blue-600 payment-method">
                                <span class="text-gray-700 flex-1">PayPal</span>
                                <i class="fab fa-paypal text-2xl text-blue-700"></i>
                            </label>

                            <label class="flex items-center space-x-3 p-4 border rounded-lg cursor-pointer hover:bg-gray-50 payment-option-label">
                                <input type="radio" name="metodo_pago" value="transferencia" class="form-radio text-blue-600 payment-method">
                                <span class="text-gray-700 flex-1">Transferencia Bancaria</span>
                                <i class="fas fa-university text-2xl text-gray-600"></i>
                            </label>

                            <label class="flex items-center space-x-3 p-4 border rounded-lg cursor-pointer hover:bg-gray-50 payment-option-label">
                                <input type="radio" name="metodo_pago" value="contra_reembolso" class="form-radio text-blue-600 payment-method">
                                <span class="text-gray-700 flex-1">Contra Reembolso (+2€)</span>
                                <i class="fas fa-hand-holding-usd text-2xl text-green-600"></i>
                            </label>
                        </div>

                        {{-- Formulario de Tarjeta (visible por defecto) --}}
                        <div id="tarjeta-form" class="payment-form">
                            <h4 class="text-lg font-semibold text-gray-700 mb-4">Información de la Tarjeta</h4>
                            
                            {{-- Número de Tarjeta --}}
                            <div class="mb-4">
                                <label for="numero_tarjeta" class="block text-gray-700 text-sm font-bold mb-2">Número de Tarjeta:</label>
                                <input type="text" id="numero_tarjeta" name="numero_tarjeta"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       placeholder="1234 5678 9012 3456" maxlength="19">
                                @error('numero_tarjeta')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Nombre del Titular --}}
                            <div class="mb-4">
                                <label for="nombre_titular" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Titular:</label>
                                <input type="text" id="nombre_titular" name="nombre_titular"
                                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       placeholder="NOMBRE APELLIDOS">
                                @error('nombre_titular')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Fecha de Expiración y CVV --}}
                            <div class="flex gap-4">
                                <div class="mb-4 flex-1">
                                    <label for="fecha_expiracion" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Expiración:</label>
                                    <input type="text" id="fecha_expiracion" name="fecha_expiracion"
                                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                           placeholder="MM/AA" maxlength="5">
                                    @error('fecha_expiracion')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4 w-1/3">
                                    <label for="cvv" class="block text-gray-700 text-sm font-bold mb-2">CVV:</label>
                                    <input type="text" id="cvv" name="cvv"
                                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                           placeholder="123" maxlength="3">
                                    @error('cvv')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Información de PayPal (oculto por defecto) --}}
                        <div id="paypal-form" class="payment-form hidden">
                            <h4 class="text-lg font-semibold text-gray-700 mb-4">Pago con PayPal</h4>
                            <p class="text-gray-600 mb-4">Serás redirigido a PayPal para completar tu pago de forma segura.</p>
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <p class="text-sm text-blue-700">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Al hacer clic en "Finalizar Compra", serás redirigido a PayPal donde podrás iniciar sesión y confirmar tu pago.
                                </p>
                            </div>
                        </div>

                        {{-- Información de Transferencia (oculto por defecto) --}}
                        <div id="transferencia-form" class="payment-form hidden">
                            <h4 class="text-lg font-semibold text-gray-700 mb-4">Transferencia Bancaria</h4>
                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                                <p class="text-gray-700 font-semibold mb-2">Datos bancarios:</p>
                                <p class="text-gray-600">Banco: Banco Ejemplo S.A.</p>
                                <p class="text-gray-600">IBAN: ES12 3456 7890 1234 5678 9012</p>
                                <p class="text-gray-600">Beneficiario: Mi Tienda Online S.L.</p>
                                <p class="text-gray-600 mt-3 text-sm">
                                    <i class="fas fa-info-circle mr-1"></i>
                                    Incluye tu número de pedido como concepto en la transferencia. El pedido se procesará una vez confirmemos el pago (1-2 días hábiles).
                                </p>
                            </div>
                        </div>

                        {{-- Información de Contra Reembolso (oculto por defecto) --}}
                        <div id="contra_reembolso-form" class="payment-form hidden">
                            <h4 class="text-lg font-semibold text-gray-700 mb-4">Pago Contra Reembolso</h4>
                            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                <p class="text-yellow-700">
                                    <i class="fas fa-exclamation-triangle mr-2"></i>
                                    <strong>Cargo adicional:</strong> Se añadirán 2€ al total de tu pedido por el servicio de contra reembolso.
                                </p>
                                <p class="text-gray-600 mt-2">
                                    Pagarás en efectivo al recibir tu pedido. Asegúrate de tener el importe exacto disponible.
                                </p>
                            </div>
                        </div>

                        {{-- Checkbox de términos y condiciones --}}
                        <div class="mt-6 mb-4">
                            <label class="flex items-start">
                                <input type="checkbox" name="terminos" class="mt-1 form-checkbox text-blue-600" required>
                                <span class="ml-2 text-sm text-gray-600">
                                    He leído y acepto los <a href="#" class="text-blue-600 hover:underline">términos y condiciones</a> 
                                    y la <a href="#" class="text-blue-600 hover:underline">política de privacidad</a>.
                                </span>
                            </label>
                            @error('terminos')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex gap-4 mt-8">
                            <button type="submit" class="px-6 bg-green-600 text-white py-3 rounded-lg hover:bg-green-500 hover:scale-105 duration-75 ease-in-out font-bold transition">
                                <i class="fas fa-lock mr-2"></i>Finalizar Compra
                            </button>
                            <a href="{{ route('checkout.envio') }}" class="px-6 bg-gray-400 text-white py-3 rounded-lg hover:bg-gray-500 hover:scale-105 duration-75 ease-in-out font-bold transition flex items-center justify-center">
                                Volver a Envío
                            </a>
                        </div>
                    </form>

                    {{-- Badges de seguridad --}}
                    <div class="mt-8 flex items-center justify-center space-x-4">
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-lock text-green-600 mr-2"></i>
                            <span class="text-sm">Pago 100% Seguro</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-shield-alt text-blue-600 mr-2"></i>
                            <span class="text-sm">Datos Encriptados</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-certificate text-yellow-600 mr-2"></i>
                            <span class="text-sm">Certificado SSL</span>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/3">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Resumen del Pedido</h2>

                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-blue-900">SUBTOTAL</span>
                            <span class="text-orange-600">{{ number_format($subtotal, 2) }}€</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-blue-900">ENVÍO</span>
                            <span class="text-orange-600">
                                @if(session('opcion_envio') == 'express')
                                    5.00€
                                @else
                                    FREE
                                @endif
                            </span>
                        </div>
                        <div class="flex justify-between" id="cargo-contra-reembolso" style="display: none;">
                            <span class="text-blue-900">CONTRA REEMBOLSO</span>
                            <span class="text-orange-600">2.00€</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-blue-900">IMPUESTOS (21%)</span>
                            <span class="text-orange-600">{{ number_format($impuestos, 2) }}€</span>
                        </div>
                        <div class="pt-3 mt-3 border-t border-gray-200">
                            <div class="flex justify-between items-center">
                                <span class="text-blue-900 font-medium text-lg">TOTAL</span>
                                <span class="text-orange-600 font-medium text-lg" id="total-amount">{{ number_format($total, 2) }}€</span>
                            </div>
                        </div>
                    </div>

                    {{-- Información de envío --}}
                    <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                        <h3 class="font-semibold text-gray-700 mb-2">Dirección de Envío</h3>
                        <div class="text-sm text-gray-600">
                            <p>{{ $direccion_envio['nombre'] ?? '' }} {{ $direccion_envio['apellidos'] ?? '' }}</p>
                            <p>{{ $direccion_envio['direccion'] ?? '' }}</p>
                            <p>{{ $direccion_envio['localidad'] ?? '' }}, {{ $direccion_envio['pais'] ?? '' }}</p>
                            <p>Tel: {{ $direccion_envio['telefono'] ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elementos del DOM
            const paymentMethods = document.querySelectorAll('.payment-method');
            const paymentForms = document.querySelectorAll('.payment-form');
            const cargoContraReembolso = document.getElementById('cargo-contra-reembolso');
            const totalAmountElement = document.getElementById('total-amount');
            
            // Valores base desde el servidor
            const subtotal = {{ $subtotal }};
            const impuestos = {{ $impuestos }};
            const envio = {{ session('opcion_envio') == 'express' ? 5 : 0 }};
            const cargoReembolso = 2.00;
            
            // Función para mostrar el formulario correspondiente
            function showPaymentForm(method) {
                // Ocultar todos los formularios
                paymentForms.forEach(form => form.classList.add('hidden'));
                
                // Mostrar el formulario seleccionado
                const selectedForm = document.getElementById(method + '-form');
                if (selectedForm) {
                    selectedForm.classList.remove('hidden');
                }
                
                // Actualizar el total si es contra reembolso
                updateTotal(method === 'contra_reembolso');
            }
            
            // Función para actualizar el total
            function updateTotal(includeReembolso) {
                let total = subtotal + impuestos + envio;
                
                if (includeReembolso) {
                    total += cargoReembolso;
                    cargoContraReembolso.style.display = 'flex';
                } else {
                    cargoContraReembolso.style.display = 'none';
                }
                
                totalAmountElement.textContent = total.toFixed(2) + '€';
            }
            
            // Event listeners para los métodos de pago
            paymentMethods.forEach(method => {
                method.addEventListener('change', function() {
                    showPaymentForm(this.value);
                });
            });
            
            // Formatear número de tarjeta
            const numeroTarjeta = document.getElementById('numero_tarjeta');
            if (numeroTarjeta) {
                numeroTarjeta.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\s/g, '');
                    let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
                    e.target.value = formattedValue;
                });
            }
            
            // Formatear fecha de expiración
            const fechaExpiracion = document.getElementById('fecha_expiracion');
            if (fechaExpiracion) {
                fechaExpiracion.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length >= 2) {
                        value = value.substring(0, 2) + '/' + value.substring(2, 4);
                    }
                    e.target.value = value;
                });
            }
            
            // Solo permitir números en CVV
            const cvv = document.getElementById('cvv');
            if (cvv) {
                cvv.addEventListener('input', function(e) {
                    e.target.value = e.target.value.replace(/\D/g, '');
                });
            }
            
            // Resaltar la opción de pago seleccionada
            const paymentLabels = document.querySelectorAll('.payment-option-label');
            paymentMethods.forEach((method, index) => {
                method.addEventListener('change', function() {
                    paymentLabels.forEach(label => label.classList.remove('border-blue-500', 'bg-blue-50'));
                    if (this.checked) {
                        paymentLabels[index].classList.add('border-blue-500', 'bg-blue-50');
                    }
                });
            });
            
            // Activar la primera opción por defecto
            if (paymentMethods[0]) {
                paymentMethods[0].checked = true;
                paymentLabels[0].classList.add('border-blue-500', 'bg-blue-50');
            }
        });
    </script>
</body>
</html>