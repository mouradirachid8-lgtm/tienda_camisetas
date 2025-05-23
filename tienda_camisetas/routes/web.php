<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\PaginacionController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarroController;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');


Route::get('/carrito', function () {
    return view('carrito');
})->name('carrito');

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');

Route::middleware(['admin:admin'])->prefix('administrador')->group(function() {
    Route::get('/', [AdministradorController::class, 'index'])->name('administrador');
    
    // Productos
    Route::put('/productos/editar/{id}', [AdministradorController::class, 'actualizarProducto'])->name('admin.actualizarProducto');
    Route::delete('/productos/eliminar/{id}', [AdministradorController::class, 'eliminarProducto'])->name('admin.eliminarProducto');
    Route::post('/productos/crear', [AdministradorController::class, 'crearProducto'])->name('admin.crearProducto');
    
    // Proveedores
    Route::post('/proveedores', [AdministradorController::class, 'crearProveedor'])->name('admin.crearProveedor');
    Route::put('/proveedores/{id}', [AdministradorController::class, 'actualizarProveedor'])->name('admin.actualizarProveedor');
    Route::delete('/proveedores/{id}', [AdministradorController::class, 'eliminarProveedor'])->name('admin.eliminarProveedor');
    
    // Equipos
    Route::post('/equipos', [AdministradorController::class, 'crearEquipo'])->name('admin.crearEquipo');
    Route::put('/equipos/{id}', [AdministradorController::class, 'actualizarEquipo'])->name('admin.actualizarEquipo');
    Route::delete('/equipos/{id}', [AdministradorController::class, 'eliminarEquipo'])->name('admin.eliminarEquipo');
});

Route::get('/catalogo', [PaginacionController::class, 'index'])->name('catalogo');
Route::get('/catalogo/buscar', [CatalogoController::class, 'search_request'])->name('catalogo.buscar');
Route::get('/catalogo/filtrar', [CatalogoController::class, 'filtrarProductos'])->name('catalogo.filtrar');

// Rutas para los productos
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');

// Ruta para agregar al carrito (complementaria a la vista del producto)
Route::post('/carrito/agregar', [CarroController::class, 'agregar'])->name('carrito.agregar');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::get('/register', [AuthController::class, 'rellena_paises']);

//Route::post('/carro/agregar', [CarroController::class, 'agregarAlCarrito'])->name('carro.agregar');
//Route::delete('/carro/eliminar/{id}', [CarroController::class, 'eliminarDelCarrito'])->name('carro.eliminar');
//Route::get('/carro', [CarroController::class, 'mostrarCarrito'])->name('carro.mostrar');

Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate(); // Invalidar sesión
    session()->regenerateToken(); // Evitar problemas de seguridad
    return redirect('/login'); // Redirigir a la página de inicio
})->name('logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
