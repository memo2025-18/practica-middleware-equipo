<?php

use Illuminate\Support\Facades\Route;

Route::get('/area-protegida', function () {
    return response()->json(['mensaje' => '¡Bienvenido al área protegida con éxito!']);
})->middleware('clave.acceso');
//---------------------------
Route::get('/', function () {
    return view('welcome');
});
