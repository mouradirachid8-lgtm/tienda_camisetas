<?php
$seccion = $_GET['seccion'] ?? 'usuarios'; // Sección por defecto
$panelAcciones = in_array($seccion, ['usuarios', 'productos', 'pedidos', 'proveedores']);
$editarId = $_GET['editar'] ?? null;
$productoEditar = null;

if ($seccion == 'productos' && $editarId) {
    // Simula la búsqueda del producto en la base de datos
    foreach ($productos as $producto) {
        if ($producto->id == $editarId) {
            $productoEditar = $producto;
            break;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white p-4">
            <div class="text-center mb-6">
                <img src="/images/logo.jpg" alt="Logo" class="w-24 h-24 mx-auto rounded-full">
                <h2 class="text-xl font-bold mt-2">Administrador</h2>
            </div>
            <nav>
                <ul>
                    <li class="mb-3"><a href="?seccion=usuarios" class="block py-2 px-4 rounded bg-gray-700 hover:bg-gray-600">Usuarios</a></li>
                    <li class="mb-3"><a href="?seccion=proveedores" class="block py-2 px-4 rounded bg-gray-700 hover:bg-gray-600">Proveedores</a></li>
                    <li class="mb-3"><a href="?seccion=equipos" class="block py-2 px-4 rounded bg-gray-700 hover:bg-gray-600">Equipos</a></li>
                    <li class="mb-3"><a href="?seccion=productos" class="block py-2 px-4 rounded bg-gray-700 hover:bg-gray-600">Productos</a></li>
                    <li class="mb-3"><a href="?seccion=carritos" class="block py-2 px-4 rounded bg-gray-700 hover:bg-gray-600">Carritos</a></li>
                    <li class="mb-3"><a href="?seccion=configuracion" class="block py-2 px-4 rounded bg-gray-700 hover:bg-gray-600">Configuración</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            <div class="mb-6 p-4 bg-white shadow rounded">
                <h1 class="text-2xl font-bold">Bienvenido, Administrador</h1>
                <p class="text-gray-600">Panel de administración.</p>
            </div>

            <?php if ($seccion == 'productos'): ?>
                <?php if ($productoEditar): ?>
                    <!-- Formulario de Edición -->
                    <div class="max-w-3xl mx-auto bg-white p-6 shadow rounded">
                        <h2 class="text-xl font-bold mb-4">Editar Producto</h2>
                        <form action="<?= route('admin.actualizarProducto', $productoEditar->id) ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                            <input type="hidden" name="_method" value="PUT">
                            
                            <label class="block mb-2 font-bold">Nombre del Producto</label>
                            <input type="text" name="nombre" value="<?= $productoEditar->nombre ?>" class="w-full px-4 py-2 border rounded mb-4">
                            
                            <label class="block mb-2 font-bold">Talla</label>
                            <select name="talla_id" class="w-full px-4 py-2 border rounded mb-4">
                                <option value="">Selecciona una talla</option>
                                <?php foreach ($tallas as $talla): ?>
                                    <option value="<?= $talla->id ?>" <?= $productoEditar->talla_id == $talla->id ? 'selected' : '' ?>>
                                        <?= $talla->nombre ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                            <label class="block mb-2 font-bold">Precio</label>
                            <input type="number" name="precio" value="<?= $productoEditar->getPrecio() ?>" class="w-full px-4 py-2 border rounded mb-4">
                            
                            <label class="block mb-2 font-bold">Stock</label>
                            <input type="number" name="stock" value="<?= $productoEditar->getStock() ?>" class="w-full px-4 py-2 border rounded mb-4">
                            
                            <label class="block mb-2 font-bold">Color</label>
                            <input type="text" name="color" value="<?= $productoEditar->color ?>" class="w-full px-4 py-2 border rounded mb-4">
                            
                            <label class="block mb-2 font-bold">Temporada</label>
                            <input type="text" name="temporada" value="<?= $productoEditar->temporada ?>" class="w-full px-4 py-2 border rounded mb-4">
                            
                            <label class="block mb-2 font-bold">Material</label>
                            <input type="text" name="material" value="<?= $productoEditar->materiaL?>" class="w-full px-4 py-2 border rounded mb-4">
                            
                            <label class="block mb-2 font-bold">Descuento (%)</label>
                            <input type="number" name="descuento" value="<?= $productoEditar->getDescuento() ?>" class="w-full px-4 py-2 border rounded mb-4">
                            
                            <label class="block mb-2 font-bold">Imagen Actual</label>
                            <img src="<?= asset($productoEditar->imagen) ?>" alt="Imagen del producto" class="w-32 h-32 object-cover rounded mb-4">
                            
                            <label class="block mb-2 font-bold">Cambiar Imagen</label>
                            <input type="file" name="imagen" class="w-full px-4 py-2 border rounded mb-4">
                            
                            <label class="block mb-2 font-bold">Equipo</label>
                            <input type="text" name="equipo_nombre" value="<?= $productoEditar->equipo->getNombre() ?? '' ?>" class="w-full px-4 py-2 border rounded mb-4">

                            <label class="block mb-2 font-bold">Proveedor</label>
                            <input type="text" name="proveedor_nombre" value="<?= $productoEditar->proveedor->getNombre() ?? '' ?>" class="w-full px-4 py-2 border rounded mb-4">
                            
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar Cambios</button>
                            <a href="?seccion=productos" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancelar</a>
                        </form>
                    </div>

                <?php else: ?>
                    <!-- Formulario para añadir un producto -->
                    <div class="max-w-3xl mx-auto bg-white p-6 shadow rounded mb-6">
                        <h2 class="text-xl font-bold mb-4">Añadir Producto</h2>
                        <form action="<?= route('admin.crearProducto') ?>" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?= csrf_token() ?>">

                            <label class="block mb-2 font-bold">Nombre del Producto</label>
                            <input type="text" name="nombre" class="w-full px-4 py-2 border rounded mb-4" required>

                            <label class="block mb-2 font-bold">Precio</label>
                            <input type="number" name="precio" step="0.01" class="w-full px-4 py-2 border rounded mb-4" required>

                            <label class="block mb-2 font-bold">Stock</label>
                            <input type="number" name="stock" class="w-full px-4 py-2 border rounded mb-4" required>

                            <label class="block mb-2 font-bold">Color</label>
                            <input type="text" name="color" class="w-full px-4 py-2 border rounded mb-4">

                            <label class="block mb-2 font-bold">Temporada</label>
                            <input type="text" name="temporada" class="w-full px-4 py-2 border rounded mb-4">

                            <label class="block mb-2 font-bold">Material</label>
                            <input type="text" name="material" class="w-full px-4 py-2 border rounded mb-4">

                            <label class="block mb-2 font-bold">Descuento (%)</label>
                            <input type="number" name="descuento" min="0" max="100" class="w-full px-4 py-2 border rounded mb-4">

                            <label class="block mb-2 font-bold">Imagen</label>
                            <input type="file" name="imagen" class="w-full px-4 py-2 border rounded mb-4">

                            <label class="block mb-2 font-bold">Equipo</label>
                            <select name="equipo_id" class="w-full px-4 py-2 border rounded mb-4">
                                <option value="">Selecciona un equipo</option>
                                <?php foreach ($equipos as $equipo): ?>
                                    <option value="<?= $equipo->id ?>"><?= $equipo->nombre ?></option>
                                <?php endforeach; ?>
                            </select>

                            <label class="block mb-2 font-bold">Proveedor</label>
                            <select name="proveedor_id" class="w-full px-4 py-2 border rounded mb-4">
                                <option value="">Selecciona un proveedor</option>
                                <?php foreach ($proveedores as $proveedor): ?>
                                    <option value="<?= $proveedor->id ?>"><?= $proveedor->nombre ?></option>
                                <?php endforeach; ?>
                            </select>

                            <label class="block mb-2 font-bold">Talla</label>
                            <select name="talla_id" class="w-full px-4 py-2 border rounded mb-4">
                                <option value="">Selecciona una talla</option>
                                <?php foreach ($tallas as $talla): ?>
                                    <option value="<?= $talla->id ?>"><?= $talla->nombre ?></option>
                                <?php endforeach; ?>
                            </select>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Añadir Producto</button>
                        </form>
                    </div>

                    <!-- Listado de productos -->
                    <div class="max-w-7xl mx-auto p-6 space-y-4">
                        <?php foreach ($productos as $producto): ?>
                            <div class="flex items-center bg-white p-4 shadow rounded-lg">
                                <img class="w-20 h-20 object-cover rounded-lg" src="<?= asset($producto->imagen) ?>" alt="<?= $producto->nombre ?>">
                                <h2 class="text-xl font-bold ml-4"><?= $producto->getNombre() ?></h2>
                                <div class="ml-auto flex space-x-2">
                                    <a href="?seccion=productos&editar=<?= $producto->getID() ?>" class="bg-green-500 text-white px-4 py-2 rounded">Editar</a>

                                    <!-- Formulario para eliminar -->
                                    <form action="<?= route('admin.eliminarProducto', $producto->getID()) ?>" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                                        <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            <?php elseif ($seccion == 'usuarios'): ?>
                <h2 class="text-2xl font-bold mb-4">Gestión de Usuarios</h2>
                <p>Aquí puedes administrar los usuarios.</p>

            <?php elseif ($seccion == 'carritos'): ?>
                <h2 class="text-2xl font-bold mb-4">Gestión de Carritos</h2>
                <p>Aquí puedes administrar los pedidos.</p>

            <?php elseif ($seccion == 'proveedores'): ?>
                <?php $proveedorEditar = null;
                if ($editarId) {
                    // Simula la búsqueda del proveedor en la base de datos
                    foreach ($proveedores as $proveedor) {
                        if ($proveedor->id == $editarId) {
                            $proveedorEditar = $proveedor;
                            break;
                        }
                    }
                }
                ?>

                <?php if ($proveedorEditar): ?>
                    <!-- Formulario de Edición de Proveedor -->
                    <div class="max-w-3xl mx-auto bg-white p-6 shadow rounded">
                        <h2 class="text-xl font-bold mb-4">Editar Proveedor</h2>
                        <form action="<?= route('admin.actualizarProveedor', $proveedorEditar->id) ?>" method="POST">
                            <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                            <input type="hidden" name="_method" value="PUT">
                            
                            <label class="block mb-2 font-bold">Nombre del Proveedor</label>
                            <input type="text" name="nombre" value="<?= $proveedorEditar->nombre ?>" class="w-full px-4 py-2 border rounded mb-4" required>
                            
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar Cambios</button>
                            <a href="?seccion=proveedores" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancelar</a>
                        </form>
                    </div>
                <?php else: ?>
                    <!-- Formulario para añadir un proveedor -->
                    <div class="max-w-3xl mx-auto bg-white p-6 shadow rounded mb-6">
                        <h2 class="text-xl font-bold mb-4">Añadir Proveedor</h2>
                        <form action="<?= route('admin.crearProveedor') ?>" method="POST">
                            <input type="hidden" name="_token" value="<?= csrf_token() ?>">

                            <label class="block mb-2 font-bold">Nombre del Proveedor</label>
                            <input type="text" name="nombre" class="w-full px-4 py-2 border rounded mb-4" required>

                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Añadir Proveedor</button>
                        </form>
                    </div>

                    <!-- Listado de proveedores -->
                    <div class="max-w-7xl mx-auto p-6 space-y-4">
                        <h2 class="text-2xl font-bold mb-4">Listado de Proveedores</h2>
                        <?php foreach ($proveedores as $proveedor): ?>
                            <div class="flex items-center bg-white p-4 shadow rounded-lg">
                                <h2 class="text-xl font-bold"><?= $proveedor->nombre ?></h2>
                                <div class="ml-auto flex space-x-2">
                                    <a href="?seccion=proveedores&editar=<?= $proveedor->id ?>" class="bg-green-500 text-white px-4 py-2 rounded">Editar</a>

                                    <!-- Formulario para eliminar -->
                                    <form action="<?= route('admin.eliminarProveedor', $proveedor->id) ?>" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este proveedor?');">
                                        <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            <?php elseif ($seccion == 'configuracion'): ?>
                <h2 class="text-2xl font-bold mb-4">Configuración</h2>
                <button class="bg-red-500 text-white px-4 py-2 rounded">Guardar Cambios</button>

            <?php else: ?>
                <h2 class="text-2xl font-bold mb-4">Página no encontrada {{$seccion}}</h2>
            <?php endif; ?>
        </main>
    </div>
</body>
</html>
