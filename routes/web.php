<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/area-protegida', function () {
    return response()->json(['mensaje' => '¡Bienvenido al área protegida con éxito!']);
})->middleware('clave.acceso');
//---------------------------
Route::get('/', function () {
    return view('welcome');
});

Route::get('/sitio-seguro', function () {
    return response()->json([
        'mensaje' => 'Sitio seguro'
    ]);
})->middleware('cabecera.seguridad');

Route::get('/validar-codigo', function (\Illuminate\Http\Request $request) {
    return response()->json([
        'codigo' => $request->input('codigo')
    ]);
})->middleware('sanitizar');
