<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Model\Equipo;
use Model\Personaje;

/**
 * Controlador para manejar las páginas de la aplicación.
 */
class PaginasController {
    /**
     * Método para mostrar la página de inicio.
     *
     * @param Router $router El enrutador utilizado para renderizar vistas.
     */
    public static function index(Router $router) {
        validarLogin(); // Se asume que validarLogin() es una función definida en otro lugar
        $user = $_SESSION["usuario"];
        $usuario = Usuario::find($user);
        $equipos = [];
        for ($i = 0; $i < 4; $i++) {
            $resultado = Equipo::teamSelectorOffset($user, $i);
            $equipo = $resultado->fetchObject();
            $equipos[] = $equipo;
        }

        $res = [];
        foreach ($equipos as $equipo) {
            $per1 = Personaje::imagenChar($equipo->character1);
            $per2 = Personaje::imagenChar($equipo->character2);
            $per3 = Personaje::imagenChar($equipo->character3);
            $per4 = Personaje::imagenChar($equipo->character4);
            $personaje1 = $per1->fetchObject();
            $personaje2 = $per2->fetchObject();
            $personaje3 = $per3->fetchObject();
            $personaje4 = $per4->fetchObject();
            $resPer = [$personaje1, $personaje2, $personaje3, $personaje4];
            $res[] = $resPer;
        }

        $router->render('paginas/index', [
            'res' => $res,
            'equipos' => $equipos,
            'usuario' => $usuario
        ]);
    }

    /**
     * Método para actualizar un personaje.
     */
    public static function actPersonaje() {
        session_start();
        $team = $_GET['id_team'];
        $char = $_GET['character'];
        $name = $_GET['nombre'];

        $resultado = Personaje::select($name);
        $usuario = Usuario::find($_SESSION['usuario']);
        $res = Personaje::actualizarPer($team, $char, $name, $usuario->ID);
        if ($res) {
            header("Location: /?id_team=" . ($team - 1));
        }
    }

    /**
     * Método para borrar un equipo.
     */
    public static function borrar() {
        session_start();
        $team = $_GET['id_team'];
        $uid = $_SESSION['usuario'];
        $user = Usuario::find($uid);
        $res = Personaje::borrarTeam($team, $user->ID);
        if ($res) {
            header("Location: /?id_team=" . ($team - 1));
        }
    }
}
