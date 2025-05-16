<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\PaginacionController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\HomeController;

//Route::get('/', function () {
//  return view('home');
//});
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');


Route::get('/carro', function () {
    return view('carro');
})->name('carro');

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');

Route::get('/', [HomeController::class, 'index']);
Route::get('/administrador', [AdministradorController::class, 'index'])->name('administrador');
Route::put('/administrador/productos/editar/{id}', [AdministradorController::class, 'actualizarProducto'])->name('admin.actualizarProducto');
Route::delete('/administrador/productos/eliminar/{id}', [AdministradorController::class, 'eliminarProducto'])->name('admin.eliminarProducto');
Route::post('/administrador/productos/crear', [AdministradorController::class, 'crearProducto'])->name('admin.crearProducto'); 

Route::post('/administrador/proveedores', [AdministradorController::class, 'crearProveedor'])->name('admin.crearProveedor');
Route::put('/administrador/proveedores/{id}', [AdministradorController::class, 'actualizarProveedor'])->name('admin.actualizarProveedor');
Route::delete('/administrador/proveedores/{id}', [AdministradorController::class, 'eliminarProveedor'])->name('admin.eliminarProveedor');

Route::post('/administrador/equipos', [AdministradorController::class, 'crearEquipo'])->name('admin.crearEquipo');
Route::put('/administrador/equipos/{id}', [AdministradorController::class, 'actualizarEquipo'])->name('admin.actualizarEquipo');
Route::delete('/administrador/equipos/{id}', [AdministradorController::class, 'eliminarEquipo'])->name('admin.eliminarEquipo');

Route::get('/catalogo', [PaginacionController::class, 'index'])->name('catalogo');
Route::get('/catalogo/buscar', [CatalogoController::class, 'search_request'])->name('catalogo.buscar');
Route::get('/catalogo/filtrar', [CatalogoController::class, 'filtrarProductos'])->name('catalogo.filtrar');

//Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
//Route::post('/login', [AuthController::class, 'login'])->name('login.auth');
//Route::post('/logout', [AuthController::class, 'logout'])->name('login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::get('/register', [AuthController::class, 'rellena_paises']);

//Route::post('/carro/agregar', [CarroController::class, 'agregarAlCarrito'])->name('carro.agregar');
//Route::delete('/carro/eliminar/{id}', [CarroController::class, 'eliminarDelCarrito'])->name('carro.eliminar');
//Route::get('/carro', [CarroController::class, 'mostrarCarrito'])->name('carro.mostrar');

/*Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate(); // Invalidar sesión
    session()->regenerateToken(); // Evitar problemas de seguridad
    return redirect('/login'); // Redirigir a la página de inicio
})->name('logout');*/



// Contacto
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/about', function () {
    return view('about');
})->name('about');