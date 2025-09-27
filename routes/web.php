<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FormaPagoController;
use App\Http\Controllers\DetalleMovimientoController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoTerminadoController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\TipoDescuentoController;
use App\Http\Controllers\Auth\LoginController;



Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard_cliente', function () {
    return view('dashboard_cliente');
});

Route::get('/promociones', function () {
    return view('promociones');
});

Route::get('/productos', function () {
    return view('productos');
});


// Rutas protegidas por rol
Route::get('/dashboard', function () {
   return view('dashboard');
})->name('dashboard');

Route::get('/dashboard_cliente', function () {
    return view('dashboard_cliente');
})->name('dashboard_cliente');


Route::resource('categoria_producto', CategoriaProductoController::class);
Route::resource('usuario', UsuarioController::class);
Route::resource('producto', ProductoController::class);
Route::resource('producto_terminado', ProductoTerminadoController::class);
Route::resource('unidad_medida', UnidadMedidaController::class);
Route::resource('movimiento', MovimientoController::class);
Route::resource('detalle_movimiento', DetalleMovimientoController::class);
Route::resource('cliente', ClienteController::class);
Route::resource('pedido', PedidoController::class);
Route::resource('venta', VentaController::class);
Route::resource('detalle_venta', DetalleVentaController::class);
Route::resource('forma_pago', FormaPagoController::class);
Route::resource('tipo_descuento', controller: TipoDescuentoController::class);
Route::resource('proveedor', ProveedorController::class);
Route::resource('promocion', PromocionController::class);
