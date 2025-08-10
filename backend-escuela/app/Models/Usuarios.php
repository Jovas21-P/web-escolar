<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';
    public $timestamps = false;

    protected $primaryKey = 'matricula';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'matricula', 
        'nombres', 
        'apellidos', 
        'correo', 
        'contrasena', 
        'rol'
    ];

    // Retorna la contraseña personalizada (usado por Laravel internamente)

    public function devolverUsuariosBD()
    {
        return Usuarios::all();
    }

    public function crearUsuarioBD($usuario)
    {
        return Usuarios::create($usuario);
    }

    public function buscarUsuarioBD($correo, $contrasena)
    {
        return Usuarios::where([
            ['correo', '=', $correo],
            ['contrasena', '=', $contrasena] 
        ])->first();
    }
}
