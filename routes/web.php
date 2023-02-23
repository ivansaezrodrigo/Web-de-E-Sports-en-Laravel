<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MessageController;

// La ruta de inicio
Route::get('/', function () {
    return view('index');
})->name('inicio');

// Rutas de las páginas estáticas
Route::get('cookies', function(){
    return view('estaticas.cookies');
})->name('cookies');

Route::get('ubicacion', function(){
    return view('estaticas.ubicacion');
})->name('ubicacion');

Route::get('login', function(){
    return view('auth.login');
})->name('login');

Route::get('registro', function(){
    return view('auth.registro');
})->name('registro');


// Ruta para eliminar un usuario
Route::delete('eliminar/{user}', [UserController::class, 'destroy'])->middleware('auth')->name('user.destroy');

// Rutas recurso de los usuarios
Route::resource('users', UserController::class)->only(['index']);
Route::resource('users', UserController::class)->only(['update', 'show', 'destroy', 'edit'])->middleware('auth');

// Ruta para establecer asistenca a un evento
Route::post('asistencia/{event}', [EventController::class, 'toggleAssistance'])->middleware('auth')->name('asistencia.toggle');

// Rutas recurso de los eventos
Route::resource('events', EventController::class)->only(['index']);
Route::resource('events', EventController::class)->only(['create', 'store', 'show', 'edit', 'update', 'destroy'])->middleware('auth');

// Ruta de registro de usuario
Route::post('registro',[AuthController::class,'registerPost'])->name('registroPost');

// Rutas de DEautenticación
Route::get('logout',[AuthController::class,'logout'])->name('logout');

// Rutas de autenticación
Route::post('login',[AuthController::class,'login'])->name('loginPost');

// Rutas recurso de los mensajes
Route::resource('messages', MessageController::class)->only(['create', 'store']);
Route::resource('messages', MessageController::class)->only(['index', 'destroy', 'show'])->middleware('auth');

// Ruta para marcar un mensaje como leído
Route::post('leido/{message}', [MessageController::class, 'toggleReaded'])->middleware('auth')->name('message.toggle');