<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Model\Equipo;

/**
 * Controlador para la gestión de la autenticación de usuarios.
 */
class LoginController {
    /**
     * Método para manejar el inicio de sesión.
     *
     * @param Router $router El enrutador utilizado para renderizar vistas.
     */
    public static function login(Router $router) {
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $errores = $auth->validar();
        
            if (empty($errores)) {
                $resultado = $auth->existeUsuario();
     
                if (!$resultado) {
                    $errores = Usuario::getErrores();
                } else {
                    $usuario = $resultado->fetchObject(); 
                    $autenticado = $auth->comprobarPassword($usuario);
                    
                    if ($autenticado) {
                        $user = Usuario::find($usuario->ID);
                        $user->autenticar();
                    } else {
                        $errores = Usuario::getErrores();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]); 
    }

    /**
     * Método para manejar el cierre de sesión.
     */
    public static function logout() {
        session_start();
        $_SESSION = [];
        session_destroy();
        header('Location: /login');
    }

    /**
     * Método para manejar el registro de nuevos usuarios.
     *
     * @param Router $router El enrutador utilizado para renderizar vistas.
     */
    public static function registro(Router $router) {
        $errores = [];

        // Generar un número aleatorio de 8 dígitos
        $numeroAleatorio = mt_rand(100000000, 999999999);
        // Agregar un 7 al principio del número
        $uid = "7" . substr($numeroAleatorio, 1);
        
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $usuario = new Usuario($_POST);
            $usuario->validarRegistro();

            // Ahora es donde realmente insertamos los valores en la BD. Solo se introduce el campo si el array de errores está vacío
            if (empty($errores)) {
                if ($usuario->hashPass($usuario->passw)) {
                    $resultado = $usuario->registrar();   
                    if ($resultado) {
                        $res = Equipo::crearEquipos($usuario->ID);
                    }
                    header('Location: /login');
                }
            }
        }
        
        $router->render('auth/crearcuenta', [
            'errores' => $errores,
            'uid' => $uid,
        ]); 
    }
}