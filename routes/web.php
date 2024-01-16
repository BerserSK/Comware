<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    //Rutas Usuarios
    Route::resource('usuarios', 'App\Http\Controllers\admin\UsersController');

    //Rutas Admins
    Route::resource('admins', 'App\Http\Controllers\admin\AdminController');

    //Rutas Plantillas Admin
    Route::get('/plantillas', [App\Http\Controllers\admin\TemplateController::class, 'index']);
    Route::get('/plantillas/create', [App\Http\Controllers\admin\TemplateController::class, 'create']);
    Route::get('/plantillas/{template}/edit', [App\Http\Controllers\admin\TemplateController::class, 'edit']);
    Route::post('/plantillas', [App\Http\Controllers\admin\TemplateController::class, 'sendData']);
    Route::put('/plantillas/{template}', [App\Http\Controllers\admin\TemplateController::class, 'update']);
    Route::delete('/plantillas/{template}', [App\Http\Controllers\admin\TemplateController::class, 'destroy']);

});

Route::get('/plantillasInfo', [App\Http\Controllers\InformativeController::class, 'index']);

