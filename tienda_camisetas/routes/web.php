<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\PaginacionController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarroController;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('inicio');
});

// Catálogo
Route::get('/catalogo', [PaginacionController::class, 'index'])->name('catalogo');
Route::get('/catalogo/buscar', [CatalogoController::class, 'search_request'])->name('catalogo.buscar');
Route::get('/catalogo/filtrar', [CatalogoController::class, 'filtrarProductos'])->name('catalogo.filtrar');

// Productos
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación
|--------------------------------------------------------------------------
*/

Route::middleware(['guest'])->group(function () {
    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.auth');
    
    // Register - IMPORTANTE: rellena_paises debe ir ANTES que showRegister
    Route::get('/register', [AuthController::class, 'rellena_paises'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

/*
|--------------------------------------------------------------------------
| Rutas Protegidas (Requieren Autenticación)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    
    // Perfil
    Route::get('/perfil', function () {
        return view('perfil');
    })->name('perfil');
    
    // Carrito
    Route::get('/carrito', function () {
        return view('carrito');
    })->name('carrito');
    
    Route::post('/carrito/agregar', [CarroController::class, 'agregar'])->name('carrito.agregar');
});

/*
|--------------------------------------------------------------------------
| Rutas de Administrador
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin:admin'])->prefix('administrador')->group(function() {
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