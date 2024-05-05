<?php

namespace Controllers;

use MVC\Router;
use Model\Personaje;

/**
 * Controlador para la gestión de personajes.
 */
class PersonajeController {

    /**
     * Método para ver y filtrar personajes.
     *
     * @param Router $router El enrutador utilizado para renderizar vistas.
     */
    public static function verPersonajes(Router $router){
        validarLogin();
        $UID=$_SESSION['usuario'];
        $arma=$_GET["weapon"] ?? NULL;
        $elemento=$_GET["element"] ?? NULL;
        $rareza=$_GET["rareza"] ?? null;
        $pj1=$_GET["character"] ?? NULL;
        $posEquipo=$_GET['id_team'] ?? NULL;

        // Filtros
        // TODOS
        if ($elemento) {
            $personajes = Personaje::elementoFiltro($elemento);
        } elseif ($arma) {
            $personajes = Personaje::armasFiltro($arma);
        } elseif ($rareza) {
            $personajes = Personaje::rarezaFiltro($rareza);
        } else {
            $personajes = Personaje::all();
        }

        $elementpyro= Personaje::countPyro();
        $elementhydro= Personaje::countHydro();
        $elementcryo= Personaje::countCryo();
        $elementgeo= Personaje::countGeo();
        $elementanemo= Personaje::countanemo();
        $elementdendro= Personaje::countDendro();
        $elementelectro= Personaje::countElectro();

        // Renderizado de la vista con los datos necesarios
        $router->render('paginas/characters', [
            'personajes' => $personajes,
            'UID'=> $UID,
            'arma' => $arma,
            'elemento'=>$elemento,
            'rareza'=>$rareza,
            'pj1'=> $pj1,
            'posEquipo' => $posEquipo,
            'elementPyro' =>$elementpyro,
            'elementHydro' =>$elementhydro,
            'elementCryo' => $elementcryo,
            'elementGeo' =>$elementgeo,
            'elementAnemo' =>$elementanemo,
            'elementDendro' =>$elementdendro,
            'elementElectro' =>$elementelectro,
        ]);
    }
}
