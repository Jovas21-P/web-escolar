<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{
    public function mostrarUsuarios()
    {
        $modeloUser = new Usuarios();
        $usuarios = $modeloUser->devolverUsuariosBD();
        return response()->json($usuarios);
    }

    public function crearUsuario(Request $request)
    {   
        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $correo = $request->input('correo');
        $contrasena = $request->input('contrasena');
        $rol = $request->input('rol');

        $validate = Validator::make($request->all(), [
            'nombres' => 'required|string',
            'apellidos' => 'required|string',
            'correo' => 'required|email',
            'contrasena' => 'required|min:6',
            'rol' => 'required|in:admin,estudiante,profesor'
        ], [
            'nombres.required' => 'El campo nombres es obligatorio',
            'apellidos.required' => 'El campo apellidos es obligatorio',
            'correo.required' => 'El campo correo es obligatorio',
            'correo.email' => 'El correo no es valido',
            'contrasena.required' => 'El campo contraseña es obligatorio',
            'contrasena.min' => 'La contraseña debe tener al menos 6 caracteres',
            'rol.required' => 'El campo rol es obligatorio',
            'rol.in' => 'El rol no es valido'
        ]);

        if ($validate->fails()) {
            return [
                'status' => 'error',
                'errores' => $validate->errors()
            ];
        }

        $datosUsuario = [
            'nombres' => $nombres,
            'apellidos' => $apellidos,
            'correo' => $correo,
            'contrasena' => $contrasena,
            'rol' => $rol
        ];



        $modeloUser = new Usuarios();
        $nuevoUsuario = $modeloUser->crearUsuarioBD($datosUsuario);
        if($nuevoUsuario){
            $data = [
                'status' => 'ok',
                'mensaje' => 'El usuario se creo correctamente'
            ];
            return response()->json($data);
        } else {
            $data = [
                'status' => "error",
                'mensaje' => 'Error al crear el usuario'
            ];
            return response()->json($data);
        }
        
    }

    public function inciarSesion() {
        try {
        $correo = request()->input('correo');
        $contrasena = request()->input('contrasena');

        $modeloUser = new Usuarios();
        $encontrado = $modeloUser->buscarUsuarioBD($correo, $contrasena);
        if($encontrado){

            $token = $encontrado->createToken('token_webs')->plainTextToken;

            $data = [
                'status' => 'ok',
                'mensaje' => "BIenvenido $encontrado->nombres",
                "token" => $token
            ];
            return response()->json($data);
        } else {
            $data = [
                'status' => "error",
                'mensaje' => 'Credneciales incorrectas'
            ];
            return response()->json($data);
        }
        } catch (\Throwable $th) {
            $data = [
                'status' => "error",
                'mensaje' => "Error de servidor",
                'error' => $th
            ];
            return response()->json($data);
        }
    }

    public function cerrarSesion(Request $request) {
    try {
        // Eliminar solo el token que se usó en esta petición (logout del dispositivo actual)
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'ok',
            'mensaje' => 'Sesión cerrada correctamente'
        ]);
    } catch (\Throwable $th) {
        return response()->json([
            'status' => 'error',
            'mensaje' => 'Error de servidor',
            'error' => $th->getMessage()
        ]);
    }
}



}
