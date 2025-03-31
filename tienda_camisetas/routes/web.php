<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\PaginacionController;
use App\Http\Controllers\AdministradorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/carro', function () {
    return view('carro');
})->name('carro');

Route::get('/administrador', [AdministradorController::class, 'base_data'])->name('administrador');

Route::post('/administrador/productos/editar/{id}', [AdministradorController::class, 'actualizarProducto'])->name('admin.actualizarProducto');

Route::delete('/administrador/productos/eliminar/{id}', [AdministradorController::class, 'eliminarProducto'])->name('admin.eliminarProducto');

Route::post('/administrador/productos/crear', [AdministradorController::class, 'crearProducto'])->name('admin.crearProducto'); // Cambié DELETE a POST

Route::get('/catalogo', [CatalogoController::class, 'base_data'])->name('catalogo.base');

Route::get('/catalogo/paginacion', [PaginacionController::class, 'index'])->name('catalogo.paginacion'); // Evita conflicto de rutas

Route::get('/catalogo/buscar', [CatalogoController::class, 'search_request'])->name('catalogo.buscar');

Route::get('/catalogo/filtrar', [CatalogoController::class, 'filtrarProductos'])->name('catalogo.filtrar');
