<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ciudadcontroller;
use App\Http\Controllers\Nacionalidadcontroller;
use App\Http\Controllers\Becacontroller;
use App\Http\Controllers\Ivacontroller;
use App\Http\Controllers\Cursocontroller;
use App\Http\Controllers\Horariocontroller;
use App\Http\Controllers\Alumnocontroller;
use App\Http\Controllers\welcomeController;
use App\Http\Middleware\SerializarCambiosCrud;

Route::get('/', [welcomeController::class, 'index']);

Route::get('pagina1', function () {
    return view('practica.pagina1');
});

Route::get('pagina2', function () {
    return view('practica.pagina2');
});
Route::get('lista', [Ciudadcontroller::class, 'index']);
Route::resource('ciudad', Ciudadcontroller::class);

Route::resource('nacionalidad', Nacionalidadcontroller::class);
Route::get('lista-nacionalidades', [Nacionalidadcontroller::class, 'index']);

$accionesDeEscritura = ['store', 'update', 'destroy'];

Route::resource('becas', Becacontroller::class)->parameters(['becas' => 'beca'])
    ->middlewareFor($accionesDeEscritura, SerializarCambiosCrud::class);
Route::resource('ivas', Ivacontroller::class)->parameters(['ivas' => 'iva'])
    ->middlewareFor($accionesDeEscritura, SerializarCambiosCrud::class);
Route::resource('cursos', Cursocontroller::class)->parameters(['cursos' => 'curso'])
    ->middlewareFor($accionesDeEscritura, SerializarCambiosCrud::class);
Route::resource('horarios', Horariocontroller::class)->parameters(['horarios' => 'horario'])
    ->middlewareFor($accionesDeEscritura, SerializarCambiosCrud::class);
Route::resource('alumnos', Alumnocontroller::class)->parameters(['alumnos' => 'alumno'])
    ->middlewareFor($accionesDeEscritura, SerializarCambiosCrud::class);

Route::resource('welcome', welcomeController::class);

