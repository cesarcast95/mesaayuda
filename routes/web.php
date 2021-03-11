<?php

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

// Rutas de sistema de login

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/vista', 'CustomerController@index')->name('vista');
Route::get('/customer/print-pdf', 'CustomerController@printPDF')->name('imprimir_pdf');


// Rutas de personal data
Route::resource('personal-data', 'PersonalData\PersonalDataController');


// Rutas de Dependencia

Route::group(['middleware' => 'auth'], function () {

//Rutas de las notificaciones
Route::get('markAsRead', 'NotificationController@markAsRead')->name('markRead');

    //RUTAS DE USUARIOS
    Route::get('admin/usuario', 'Admin\RegisterUserController@index')->name('usuario');
    Route::get('admin/usuario/crear', 'Admin\RegisterUserController@create')->name('crear_usuario');
    Route::post('admin/usuario', 'Admin\RegisterUserController@store')->name('guardar_usuario');
    Route::get('admin/usuario/{id}/editar', 'Admin\RegisterUserController@edit')->name('editar_usuario');
    Route::put('admin/usuario/{id}', 'Admin\RegisterUserController@update')->name('actualizar_usuario');
    Route::delete('admin/usuario/{id}', 'Admin\RegisterUserController@destroy')->name('eliminar_usuario');

Route::resource('device', 'Device\DeviceController');
Route::resource('brand', 'Brand\BrandController');
Route::resource('incidence', 'Incidence\IncidenceController');
Route::get('incidence/attend/{id}', 'Incidence\IncidenceController@attend')->name('incidence.attend');
Route::patch('incidence/attend/{id}', 'Incidence\IncidenceController@close')->name('incidence.close');
// Rutas para generar pdfs
Route::get('incidence/{id}/generar-pdf', 'Pdf\GeneratePdfController@pdfIncidence')->name('pdf.incidence');
Route::resource('cat-hardware', 'CategoryHardware\CategoryHardwareController');
Route::resource('position', 'Position\PositionController');
Route::resource('dependence', 'Dependencia\DependenceController');
Route::delete('dependence/{id}', 'Dependencia\DependenceController@destroy')->name('eliminar_dependencia');

});

// GRUPO DE RUTAS ADMINISTRACION
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function () {

    //RUTAS DE PERMISOS
    Route::get('permiso', 'PermisoController@index')->name('permiso');
    Route::get('permiso/crear', 'PermisoController@create')->name('crear_permiso');
    Route::post('permiso', 'PermisoController@store')->name('guardar_permiso');
    Route::get('permiso/{id}/editar', 'PermisoController@edit')->name('editar_permiso');
    Route::put('permiso/{id}', 'PermisoController@update')->name('actualizar_permiso');
    Route::delete('permiso/{id}', 'PermisoController@destroy')->name('eliminar_permiso');
    // RUTAS DEL MENU
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('menu/crear', 'MenuController@create')->name('crear_menu');
    Route::post('menu', 'MenuController@store')->name('guardar_menu');
    Route::get('menu/{id}/editar', 'MenuController@edit')->name('editar_menu');
    Route::put('menu/{id}', 'MenuController@update')->name('actualizar_menu');
    Route::get('menu/{id}/eliminar', 'MenuController@destroy')->name('eliminar_menu');
    Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');
    // RUTAS ROL
    Route::get('rol', 'RolController@index')->name('rol');
    Route::get('rol/crear', 'RolController@create')->name('crear_rol');
    Route::post('rol', 'RolController@store')->name('guardar_rol');
    Route::get('rol/{id}/editar', 'RolController@edit')->name('editar_rol');
    Route::put('rol/{id}', 'RolController@update')->name('actualizar_rol');
    Route::delete('rol/{id}', 'RolController@destroy')->name('eliminar_rol');
    //  RUTAS MENU_ROL
    Route::get('menu-rol', 'MenuRolController@index')->name('menu_rol');
    Route::post('menu-rol', 'MenuRolController@store')->name('guardar_menu_rol');
     /*RUTAS PERMISO_ROL*/
     Route::get('permiso-rol', 'PermisoRolController@index')->name('permiso_rol');
     Route::post('permiso-rol', 'PermisoRolController@store')->name('guardar_permiso_rol');
});
