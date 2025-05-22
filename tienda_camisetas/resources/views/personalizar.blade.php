<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diseñador de Camisetas de Fútbol</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #27ae60;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --border-radius: 8px;
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
            color: var(--dark-color);
            line-height: 1.6;
        }
        
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 30px;
        }
        
        header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 10px;
            font-weight: 700;
        }
        
        .subtitle {
            font-size: 1.2rem;
            color: #7f8c8d;
            margin-bottom: 20px;
        }
        
        .designer-container {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 30px;
        }
        
        .jerseys-section {
            padding: 30px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        
        .jerseys-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 40px;
            margin: 30px 0;
        }
        
        .jersey-view {
            text-align: center;
            flex: 1;
            min-width: 350px;
            background-color: white;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            transition: transform 0.3s ease;
        }
        
        .jersey-view:hover {
            transform: translateY(-5px);
        }
        
        .jersey-view h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--secondary-color);
        }
        
        .jersey-container {
            position: relative;
            width: 350px;
            height: 450px;
            margin: 0 auto 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
        }
        
        .jersey-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            filter: drop-shadow(2px 4px 6px rgba(0,0,0,0.2));
        }
        
        .jersey-number {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 120px;
            font-weight: bold;
            font-family: 'Montserrat', sans-serif;
            color: black;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .jersey-name {
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 28px;
            font-weight: bold;
            font-family: 'Montserrat', sans-serif;
            color: black;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .jersey-logo {
            position: absolute;
            width: 80px;
            height: 80px;
            object-fit: contain;
            filter: drop-shadow(1px 2px 3px rgba(0,0,0,0.3));
        }
        
        .jersey-badge {
            position: absolute;
            width: 60px;
            height: 60px;
            object-fit: contain;
            filter: drop-shadow(1px 2px 3px rgba(0,0,0,0.3));
        }
        
        .controls-section {
            padding: 30px;
            background-color: white;
        }
        
        .controls-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 20px;
        }
        
        .controls {
            flex: 1;
            min-width: 350px;
            padding: 25px;
            border-radius: var(--border-radius);
            background-color: var(--light-color);
            box-shadow: var(--shadow);
        }
        
        .controls h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--secondary-color);
        }
        
        .control-group {
            margin-bottom: 20px;
        }
        
        .control-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--dark-color);
            font-size: 1rem;
        }
        
        .control-group input, 
        .control-group select {
            width: 100%;
            padding: 12px 15px;
            border-radius: var(--border-radius);
            border: 2px solid #ddd;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        
        .control-group input:focus, 
        .control-group select:focus {
            border-color: var(--secondary-color);
            outline: none;
        }
        
        .color-options {
            display: flex;
            gap: 12px;
            margin-top: 12px;
            flex-wrap: wrap;
        }
        
        .color-option {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            cursor: pointer;
            border: 3px solid transparent;
            transition: transform 0.2s;
        }
        
        .color-option:hover {
            transform: scale(1.1);
        }
        
        .color-option.selected {
            border-color: var(--dark-color);
            transform: scale(1.1);
        }
        
        .logo-options {
            display: flex;
            gap: 12px;
            margin-top: 12px;
            flex-wrap: wrap;
        }
        
        .logo-option {
            width: 50px;
            height: 50px;
            cursor: pointer;
            border: 3px solid transparent;
            object-fit: contain;
            background-color: white;
            padding: 5px;
            border-radius: 8px;
            transition: all 0.2s;
        }
        
        .logo-option:hover {
            transform: scale(1.05);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .logo-option.selected {
            border-color: var(--success-color);
            transform: scale(1.05);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .position-control {
            display: flex;
            gap: 12px;
            margin-top: 12px;
        }
        
        .position-btn {
            flex: 1;
            padding: 10px 15px;
            background: #ddd;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s;
            text-align: center;
        }
        
        .position-btn:hover {
            background: #ccc;
        }
        
        .position-btn.active {
            background: var(--success-color);
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .dual-position-control {
            display: flex;
            gap: 20px;
        }
        
        .position-group {
            flex: 1;
        }
        
        .save-section {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
        }
        
        #saveBtn {
            background-color: var(--success-color);
            color: white;
            font-weight: bold;
            font-size: 1.1rem;
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        #saveBtn:hover {
            background-color: #219653;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
        
        .tabs {
            display: flex;
            border-bottom: 2px solid #ddd;
            margin-bottom: 20px;
        }
        
        .tab {
            padding: 12px 20px;
            cursor: pointer;
            font-weight: 600;
            color: #7f8c8d;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
        }
        
        .tab.active {
            color: var(--secondary-color);
            border-bottom: 3px solid var(--secondary-color);
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        @media (max-width: 768px) {
            .jerseys-container, .controls-container {
                flex-direction: column;
                align-items: center;
            }
            
            .jersey-container {
                width: 280px;
                height: 380px;
            }
            
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <header>
            <h1>Diseñador de Camisetas de Fútbol</h1>
            <p class="subtitle">Personaliza tu camiseta de fútbol ideal con nuestro editor interactivo</p>
        </header>
        
        <div class="designer-container">
            <div class="jerseys-section">
                <div class="jerseys-container">
                    <div class="jersey-view">
                        <h2>Vista Frontal</h2>
                        <div class="jersey-container">
                            <img src="{{ asset('escudos/blanca.png') }}" alt="Camiseta frontal" class="jersey-image" id="jerseyFrontImage">
                            <!-- Elementos personalizables frontales -->
                            <img src="" class="jersey-logo" id="frontLogo" style="display: none;">
                            <img src="" class="jersey-badge" id="frontBadge" style="display: none;">
                        </div>
                    </div>
                    
                    <div class="jersey-view">
                        <h2>Vista Trasera</h2>
                        <div class="jersey-container">
                            <img src="{{ asset('escudos/camiseta-blanca-atras.png') }}" alt="Camiseta trasera" class="jersey-image" id="jerseyBackImage">
                            <div class="jersey-number" id="jerseyBackNumber">7</div>
                            <div class="jersey-name" id="jerseyBackName">TRASERO</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="controls-section">
                <div class="tabs">
                    <div class="tab active" data-tab="front">Personalización Frontal</div>
                    <div class="tab" data-tab="back">Personalización Trasera</div>
                </div>
                
                <div class="tab-content active" id="front-tab">
                    <div class="controls-container">
                        <div class="controls">
                            <h3>Marca Deportiva</h3>
                            
                            <div class="control-group">
                                <label>Selecciona la marca:</label>
                                <div class="logo-options marca-options">
                                    <img src="{{ asset('logos/nike.png') }}" class="logo-option" data-logo="nike" data-type="marca" title="Nike">
                                    <img src="{{ asset('logos/adidas.png') }}" class="logo-option" data-logo="adidas" data-type="marca" title="Adidas">
                                    <img src="{{ asset('logos/puma.png') }}" class="logo-option" data-logo="puma" data-type="marca" title="Puma">
                                    <img src="{{ asset('logos/emirates.png') }}" class="logo-option" data-logo="emirates" data-type="marca" title="Emirates">
                                    <img src="{{ asset('logos/umbro.png') }}" class="logo-option" data-logo="umbro" data-type="marca" title="Umbro">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label>Posición de la marca:</label>
                                <div class="position-control">
                                    <button class="position-btn active" data-position="left" data-element="logo">Izquierda</button>
                                    <button class="position-btn" data-position="center" data-element="logo">Centro</button>
                                    <button class="position-btn" data-position="right" data-element="logo">Derecha</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="controls">
                            <h3>Escudo del Equipo</h3>
                            
                            <div class="control-group">
                                <label>Selecciona el escudo:</label>
                                <div class="logo-options escudo-options">
                                    <img src="{{ asset('escudos/madrid.png') }}" class="logo-option" data-logo="madrid" data-type="escudo" title="Real Madrid">
                                    <img src="{{ asset('escudos/bar.png') }}" class="logo-option" data-logo="barca" data-type="escudo" title="Barcelona">
                                    <img src="{{ asset('escudos/arse.png') }}" class="logo-option" data-logo="arsenal" data-type="escudo" title="Arsenal">
                                    <img src="{{ asset('escudos/aston.png') }}" class="logo-option" data-logo="astonvilla" data-type="escudo" title="Aston Villa">
                                    <img src="{{ asset('escudos/8.png') }}" class="logo-option" data-logo="bayern" data-type="escudo" title="Bayern Munich">
                                    <img src="{{ asset('escudos/dor.png') }}" class="logo-option" data-logo="dortmund" data-type="escudo" title="Borussia Dortmund">
                                    <img src="{{ asset('escudos/pa.png') }}" class="logo-option" data-logo="psg" data-type="escudo" title="PSG">
                                    <img src="{{ asset('escudos/int.png') }}" class="logo-option" data-logo="inter" data-type="escudo" title="Inter de Milán">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label>Posición del escudo:</label>
                                <div class="position-control">
                                    <button class="position-btn active" data-position="left" data-element="badge">Izquierda</button>
                                    <button class="position-btn" data-position="center" data-element="badge">Centro</button>
                                    <button class="position-btn" data-position="right" data-element="badge">Derecha</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content" id="back-tab">
                    <div class="controls-container">
                        <div class="controls">
                            <h3>Personalización Trasera</h3>
                            
                            <div class="control-group">
                                <label for="backNameInput">Nombre del Jugador:</label>
                                <input type="text" id="backNameInput" placeholder="Ingresa el nombre" value="TRASERO">
                            </div>
                            
                            <div class="control-group">
                                <label for="backNumberInput">Número:</label>
                                <input type="number" id="backNumberInput" min="1" max="99" placeholder="Número (1-99)" value="7">
                            </div>
                        </div>
                        
                        <div class="controls">
                            <h3>Estilo del Texto</h3>
                            
                            <div class="control-group">
                                <label>Color del texto:</label>
                                <div class="color-options back-colors">
                                    <div class="color-option selected" style="background-color: white;" data-color="white" title="Blanco"></div>
                                    <div class="color-option" style="background-color: gold;" data-color="gold" title="Dorado"></div>
                                    <div class="color-option" style="background-color: black;" data-color="black" title="Negro"></div>
                                    <div class="color-option" style="background-color: blue;" data-color="blue" title="Azul"></div>
                                    <div class="color-option" style="background-color: red;" data-color="red" title="Rojo"></div>
                                    <div class="color-option" style="background-color: green;" data-color="green" title="Verde"></div>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label>Estilo de fuente:</label>
                                <select id="fontStyleSelect">
                                    <option value="normal">Normal</option>
                                    <option value="italic">Itálica</option>
                                    <option value="bold">Negrita</option>
                                    <option value="bold italic">Negrita e Itálica</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="save-section">
                <button id="saveBtn">Guardar Diseño</button>
            </div>
        </div>
    </div>

    <script>
        // Elementos frontales
        const frontLogo = document.getElementById('frontLogo');
        const frontBadge = document.getElementById('frontBadge');
        const positionButtons = document.querySelectorAll('.position-btn');

        // Elementos traseros
        const backNameInput = document.getElementById('backNameInput');
        const backNumberInput = document.getElementById('backNumberInput');
        const backName = document.getElementById('jerseyBackName');
        const backNumber = document.getElementById('jerseyBackNumber');
        const backColorOptions = document.querySelectorAll('.back-colors .color-option');
        const fontStyleSelect = document.getElementById('fontStyleSelect');

        // Botón de guardado
        const saveBtn = document.getElementById('saveBtn');
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        // Selección de marca
        document.querySelectorAll('.marca-options .logo-option').forEach(option => {
            option.addEventListener('click', function() {
                // Quitar selección de otras marcas
                document.querySelectorAll('.marca-options .logo-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                
                this.classList.add('selected');
                
                // Mostrar la marca seleccionada
                const logoPath = this.getAttribute('src');
                frontLogo.src = logoPath;
                frontLogo.style.display = 'block';
                
                // Actualizar posición
                const activeBtn = document.querySelector('.position-btn.active[data-element="logo"]');
                updateLogoPosition(frontLogo, activeBtn.getAttribute('data-position'));
            });
        });

        // Selección de escudo
        document.querySelectorAll('.escudo-options .logo-option').forEach(option => {
            option.addEventListener('click', function() {
                // Quitar selección de otros escudos
                document.querySelectorAll('.escudo-options .logo-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                
                this.classList.add('selected');
                
                // Mostrar el escudo seleccionado
                const logoPath = this.getAttribute('src');
                frontBadge.src = logoPath;
                frontBadge.style.display = 'block';
                
                // Actualizar posición
                const activeBtn = document.querySelector('.position-btn.active[data-element="badge"]');
                updateLogoPosition(frontBadge, activeBtn.getAttribute('data-position'));
            });
        });

        // Cambiar posición de los elementos
        positionButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const elementType = this.getAttribute('data-element');
                
                document.querySelectorAll(`.position-btn[data-element="${elementType}"]`).forEach(b => {
                    b.classList.remove('active');
                });
                
                this.classList.add('active');
                
                const position = this.getAttribute('data-position');
                
                if(elementType === 'logo' && frontLogo.style.display === 'block') {
                    updateLogoPosition(frontLogo, position);
                } else if(elementType === 'badge' && frontBadge.style.display === 'block') {
                    updateLogoPosition(frontBadge, position);
                }
            });
        });

        function updateLogoPosition(element, position) {
            element.style.left = '';
            element.style.right = '';
            element.style.top = '20%';
            element.style.transform = '';
            
            if(position === 'left') {
                element.style.left = '20%';
                element.style.right = '';
            } else if(position === 'center') {
                element.style.left = '50%';
                element.style.transform = 'translateX(-50%)';
            } else if(position === 'right') {
                element.style.left = '';
                element.style.right = '20%';
            }
        }

        // Actualizar nombre trasero
        backNameInput.addEventListener('input', function() {
            const name = this.value.toUpperCase().substring(0, 8);
            backName.textContent = name;
        });

        // Actualizar número trasero
        backNumberInput.addEventListener('input', function() {
            let num = parseInt(this.value);
            if(isNaN(num)) num = 0;
            if(num > 99) num = 99;
            if(num < 0) num = 0;
            
            this.value = num;
            backNumber.textContent = num;
        });

        // Cambiar colores traseros
        document.querySelectorAll('.back-colors .color-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.back-colors .color-option').forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                const color = this.getAttribute('data-color');
                backName.style.color = color;
                backNumber.style.color = color;
            });
        });

        // diferentes estilo de fuente
        fontStyleSelect.addEventListener('change', function() {
            backName.style.fontStyle = this.value.includes('italic') ? 'italic' : 'normal';
            backName.style.fontWeight = this.value.includes('bold') ? 'bold' : 'normal';
            backNumber.style.fontStyle = this.value.includes('italic') ? 'italic' : 'normal';
            backNumber.style.fontWeight = this.value.includes('bold') ? 'bold' : 'normal';
        });

        // Tabs functionality
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                
                // Update tabs
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                
                // Update tab contents
                tabContents.forEach(content => content.classList.remove('active'));
                document.getElementById(`${tabId}-tab`).classList.add('active');
            });
        });

        // Guardar diseño
        saveBtn.addEventListener('click', function() {
            const designData = {
                front: {
                    logo: frontLogo.style.display === 'block' ? frontLogo.src : null,
                    logoPosition: document.querySelector('.position-btn.active[data-element="logo"]').getAttribute('data-position'),
                    badge: frontBadge.style.display === 'block' ? frontBadge.src : null,
                    badgePosition: document.querySelector('.position-btn.active[data-element="badge"]').getAttribute('data-position')
                },
                back: {
                    name: backName.textContent,
                    number: backNumber.textContent,
                    color: backName.style.color,
                    fontStyle: fontStyleSelect.value
                }
            };
            
            console.log('Diseño a guardar:', designData);
            
            // Animación de confirmación
            this.textContent = '¡Diseño Guardado!';
            this.style.backgroundColor = '#2ecc71';
            
            setTimeout(() => {
                this.textContent = 'Guardar Diseño';
                this.style.backgroundColor = '#27ae60';
            }, 2000);
        });
    </script>
</body>
</html>