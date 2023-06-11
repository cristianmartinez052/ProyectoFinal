<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PortadaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PedidoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [InicioController::class, 'index'])->name('inicio');


Route::get('/catalogo/{categoria}',[InicioController::class, 'catalogo'])->name('catalogo');


Route::get('/catalogoGenerico/',[InicioController::class, 'catalogoGenerico'])->name('catalogoGenerico');

//Rutas para el carrito

Route::post('/agregarProducto', [CarritoController::class, 'agregarProducto'])->name('agregarProducto');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/carrito', [CarritoController::class, 'carrito'])->name('carrito');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'middleware' => 'admin'
])->group(function () {
    Route::get('/incrementar/{id}', [CarritoController::class, 'incrementarCantidad'])->name('incrementarCantidad');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'middleware' => 'admin'
])->group(function () {
    Route::get('/decrementar/{id}', [CarritoController::class, 'decrementarCantidad'])->name('decrementarCantidad');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'middleware' => 'admin'
])->group(function () {
    Route::get('/eliminarItem/{id}', [CarritoController::class, 'eliminarItem'])->name('eliminarItem');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'middleware' => 'admin'
])->group(function () {
    Route::get('/eliminarCarrito/', [CarritoController::class, 'eliminarCarrito'])->name('eliminarCarrito');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/confirmarCarrito/', [CarritoController::class, 'confirmarCarrito'])->name('confirmarCarrito');
});



//Rutas para el CRUD, solo administrador

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'middleware' => 'admin'
])->group(function () {
    Route::get('/dashboard', [InicioController::class, 'dashboard'])->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'middleware' => 'admin'
])->group(function () {
    Route::resource('usuarios', UsuarioController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'middleware' => 'admin'
])->group(function () {
    Route::resource('categorias', CategoriaController::class);
});

//Route::get('/productos/{categoria}', 'InicioController@productoporCategoria')->name('productos.categoria');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'middleware' => 'admin'
])->group(function () {
    Route::resource('productos', ProductoController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::resource('pedidos', PedidoController::class);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/mispedidos', [CarritoController::class, 'misPedidos'])->name('mispedidos');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'middleware' => 'admin'
])->group(function () {
    Route::resource('portadas', PortadaController::class);
});

Route::post('/productoinfo/{$id}',[ProductoController::class,'productoinfo'])->name('productoinfo');
