<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UsuariosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/probar-conexion', function () {
    try {
        DB::connection()->getPdo();
        return '✅ Conexión exitosa a la base de datos: ' . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return '❌ Error al conectar: ' . $e->getMessage();
    }
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/cerrar-sesion', [UsuariosController::class, 'cerrarSesion']);
    // otras rutas protegidas
});

// rutas/api.php
Route::middleware('auth:sanctum')->get('/auth/check', function (Request $request) {
    return response()->json([
        'authenticated' => true,
        'user' => $request->user()
    ]);
});


    Route::get('/mostrar-usuarios', [UsuariosController::class, 'mostrarUsuarios']);
    Route::post('/crear-usuario', [UsuariosController::class, 'crearUsuario']);
    Route::post('/iniciar-sesion', [UsuariosController::class, 'inciarSesion']);
