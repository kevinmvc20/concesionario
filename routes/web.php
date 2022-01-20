<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//Insertar usuario
Route::get('/test3',function (){
    $user = new App\Models\User();//son los datos de la tabla users.
    //$user->name = 'admin';
    $user->email = 'admin@gmail.com';
    $user->password = bcrypt('123123');//encripta contraseñas
    $user->id_persona = 1;
    $user->save();
    return $user;
});
//fin


Route::get('/','App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/','App\Http\Controllers\Auth\LoginController@login');//validando datos
Route::get('/home','App\Http\Controllers\HomeController@index')->name('home');
Route::get('logout','App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::get('/usuario','App\Http\Controllers\UsuarioController@index')->name('usuarios.index');
Route::get('/usuario/create','App\Http\Controllers\UsuarioController@create')->name('usuarios.create');
Route::post('/usuario/store','App\Http\Controllers\UsuarioController@store')->name('usuarios.store');
Route::get('/usuario/{id}/destroy','App\Http\Controllers\UsuarioController@destroy')->name('usuarios.destroy');

//Marca
Route::get('/marca','App\Http\Controllers\MarcaController@index')->name('marcas.index');
Route::get('/marca/create','App\Http\Controllers\MarcaController@create')->name('marcas.create');
Route::post('/marca/store','App\Http\Controllers\MarcaController@store')->name('marcas.store');
Route::get('/marca/{id}/edit','App\Http\Controllers\MarcaController@edit')->name('marcas.edit');
Route::get('/marca/{id}/destroy','App\Http\Controllers\MarcaController@destroy')->name('marcas.destroy');
Route::put('/marca/{id}/update','App\Http\Controllers\MarcaController@update')->name('marcas.update');


//Categoria

Route::get('/categoria','App\Http\Controllers\CategoriaController@index')->name('categorias.index');
Route::get('/categoria/create','App\Http\Controllers\CategoriaController@create')->name('categorias.create');
Route::post('/categoria/store','App\Http\Controllers\CategoriaController@store')->name('categorias.store');
Route::get('/categoria/{id}/edit','App\Http\Controllers\CategoriaController@edit')->name('categorias.edit');
Route::get('/categoria/{id}/destroy','App\Http\Controllers\CategoriaController@destroy')->name('categorias.destroy');
Route::put('/categoria/{id}/update','App\Http\Controllers\CategoriaController@update')->name('categorias.update');

//Vehiculo
Route::get('/vehiculo','App\Http\Controllers\VehiculoController@index')->name('vehiculos.index');
Route::get('/vehiculo/create','App\Http\Controllers\VehiculoController@create')->name('vehiculos.create');
Route::post('/vehiculo/store','App\Http\Controllers\VehiculoController@store')->name('vehiculos.store');
Route::get('/vehiculo/{id}/edit','App\Http\Controllers\VehiculoController@edit')->name('vehiculos.edit');
Route::get('/vehiculo/{id}/destroy','App\Http\Controllers\VehiculoController@destroy')->name('vehiculos.destroy');
Route::get('/vehiculo/{id}/show','App\Http\Controllers\VehiculoController@show')->name('vehiculos.show');
Route::put('/vehiculo/{id}/update','App\Http\Controllers\VehiculoController@update')->name('vehiculos.update');

//proveedor


Route::get('/proveedor','App\Http\Controllers\ProveedorController@index')->name('proveedores.index');
Route::get('/proveedor/create','App\Http\Controllers\ProveedorController@create')->name('proveedores.create');
Route::post('/proveedor/store','App\Http\Controllers\ProveedorController@store')->name('proveedores.store');
Route::get('/proveedor/{id}/edit','App\Http\Controllers\ProveedorController@edit')->name('proveedores.edit');
Route::get('/proveedor/{id}/destroy','App\Http\Controllers\ProveedorController@destroy')->name('proveedores.destroy');
Route::put('/proveedor/{id}/update','App\Http\Controllers\ProveedorController@update')->name('proveedores.update');


//Compras

Route::get('/compra','App\Http\Controllers\CompraController@index')->name('compras.index');
Route::get('/compra/create','App\Http\Controllers\CompraController@create')->name('compras.create');
Route::post('/compra/store','App\Http\Controllers\CompraController@store')->name('compras.store');
//Route::get('/compra/{id}/edit','App\Http\Controllers\CompraController@edit')->name('compras.edit');
Route::get('/compra/{id}/destroy','App\Http\Controllers\CompraController@destroy')->name('compras.destroy');
Route::get('/compra/{id}/show','App\Http\Controllers\CompraController@show')->name('compras.show');
//Route::put('/compra/{id}/update','App\Http\Controllers\CompraController@update')->name('compras.update');

//almacen
Route::get('/almacen','App\Http\Controllers\AlmacenController@index')->name('almacenes.index');
Route::get('/almacen/create','App\Http\Controllers\AlmacenController@create')->name('almacenes.create');
Route::post('/almacen/store','App\Http\Controllers\AlmacenController@store')->name('almacenes.store');
Route::get('/almacen/{id}/destroy','App\Http\Controllers\AlmacenController@destroy')->name('almacenes.destroy');




//Tipo_Almacen

Route::get('/tipoAlmacen', 'App\Http\Controllers\Tipo_almacenController@index')->name('tipoalmacenes.index');
Route::get('/tipoAlmacen/create', 'App\Http\Controllers\Tipo_almacenController@create')->name('tipoalmacenes.create');
Route::post('/tipoAlmacen/store', 'App\Http\Controllers\Tipo_almacenController@store')->name('tipoalmacenes.store');
Route::get('/tipoAlmacen/{id}/destroy}', 'App\Http\Controllers\Tipo_almacenController@destroy')->name('tipoalmacenes.destroy');




//Venta 

Route::get('/venta','App\Http\Controllers\VentaController@index')->name('ventas.index');
Route::get('/venta/create','App\Http\Controllers\VentaController@create')->name('ventas.create');
Route::post('/venta/store','App\Http\Controllers\VentaController@store')->name('ventas.store');
Route::get('/venta/{id}/destroy','App\Http\Controllers\VentaController@destroy')->name('ventas.destroy');
Route::get('/venta/{id}/show','App\Http\Controllers\VentaController@show')->name('ventas.show');


//TipoContrato

Route::get('/tipocontrato', 'App\Http\Controllers\Tipo_contratoController@index')->name('tipocontratos.index');
Route::get('/tipocontrato/create', 'App\Http\Controllers\Tipo_contratoController@create')->name('tipocontratos.create');
Route::post('/tipocontrato/store', 'App\Http\Controllers\Tipo_contratoController@store')->name('tipocontratos.store');
Route::get('/tipocontrato/{id}/destroy}', 'App\Http\Controllers\Tipo_contratoController@destroy')->name('tipocontratos.destroy');



//Contrato

Route::get('/contrato','App\Http\Controllers\ContratoController@index')->name('contratos.index');
Route::get('/contrato/create','App\Http\Controllers\ContratoController@create')->name('contratos.create');
Route::post('/contrato/store','App\Http\Controllers\ContratoController@store')->name('contratos.store');
Route::get('/contrato/{id}/destroy','App\Http\Controllers\ContratoController@destroy')->name('contratos.destroy');
Route::get('/contrato/{id}/show','App\Http\Controllers\ContratoController@show')->name('contratos.show');


//Credito

Route::get('/credito','App\Http\Controllers\CreditoController@index')->name('creditos.index');
Route::get('/credito/create','App\Http\Controllers\CreditoController@create')->name('creditos.create');
Route::post('/credito/store','App\Http\Controllers\CreditoController@store')->name('creditos.store');
Route::get('/credito/{id}/destroy','App\Http\Controllers\CreditoController@destroy')->name('creditos.destroy');
Route::get('/credito/{id}/show','App\Http\Controllers\CreditoController@show')->name('creditos.show');

//Cliente
Route::get('/cliente','App\Http\Controllers\ClienteController@index')->name('clientes.index');
Route::get('/cliente/create','App\Http\Controllers\ClienteController@create')->name('clientes.create');
Route::post('/cliente/store','App\Http\Controllers\ClienteController@store')->name('clientes.store');
Route::get('/cliente/{id}/edit','App\Http\Controllers\ClienteController@edit')->name('clientes.edit');
Route::get('/cliente/{id}/destroy','App\Http\Controllers\ClienteController@destroy')->name('clientes.destroy');
Route::put('/cliente/{id}/update','App\Http\Controllers\ClienteController@update')->name('clientes.update');
Route::get('/cliente/{id}/show','App\Http\Controllers\ClienteController@show')->name('clientes.show');



//Roles y permisos
Route::get('/roles','App\Http\Controllers\RoleController@index')->name('roles.index');
Route::get('/roles/asignar','App\Http\Controllers\RoleController@asignar')->name('roles.asignar');
Route::put('/roles/{id}/asignar','App\Http\Controllers\RoleController@storeRolPermiso')->name('roles.storeRolPermiso');
Route::get('/roles/asignarRol','App\Http\Controllers\RoleController@asignarRol')->name('roles.asignarRol');
Route::put('/roles/guardarRol','App\Http\Controllers\RoleController@guardarRol')->name('roles.guardarRol');
Route::get('/roles/crearRol','App\Http\Controllers\RoleController@crearRol')->name('roles.crear');
Route::post('/roles/guardar','App\Http\Controllers\RoleController@guardarNuevoRol')->name('roles.guardarNuevoRol');


//bitacora
Route::get('/bitacoras','App\Http\Controllers\BitacoraController@index')->name('bitacoras.index');
Route::get('/downloadPDF','App\Http\Controllers\BitacoraController@downloadPDF')->name('bitacoras.pdf');


//cuota
Route::get('/cuota','App\Http\Controllers\CuotaController@index')->name('cuotas.index');
Route::get('/cuota/create','App\Http\Controllers\CuotaController@create')->name('cuotas.create');
Route::get('/cuota/{id}/destroy','App\Http\Controllers\CuotaController@destroy')->name('cuotas.destroy');
Route::post('/cuota/store','App\Http\Controllers\CuotaController@store')->name('cuotas.store');
//Route::get('/cuota/{id}/edit','App\Http\Controllers\CuotaController@edit')->name('cuotas.edit');
Route::get('/cuota/{id}/show','App\Http\Controllers\CuotaController@show')->name('cuotas.show');


//movimientos almacen
Route::get('/movimientoAlmacen','App\Http\Controllers\MovimientoAlmacenController@index')->name('movimientoAlmacen.index');
Route::get('/movimientoAlmacen/create','App\Http\Controllers\MovimientoAlmacenController@create')->name('movimientoAlmacen.create');
Route::post('/movimientoAlmacen/store','App\Http\Controllers\MovimientoAlmacenController@store')->name('movimientoAlmacen.store');
Route::get('/movimientoAlmacen/{id}/show','App\Http\Controllers\MovimientoAlmacenController@show')->name('movimientoAlmacen.show');
Route::get('/movimientoAlmacen/{id}/conf','App\Http\Controllers\MovimientoAlmacenController@confirmar')->name('movimientoAlmacen.confirmar');


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
