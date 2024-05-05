<?php

namespace Model;

/**
 * Clase para gestionar los personajes.
 */
class Personaje extends ActiveRecord {
    // Definir la tabla y columnas de la base de datos
    protected static $tabla = 'characters';
    protected static $columnasDB = ['name','element','img','img_Banner','weapon','rareza'];

    // Atributos del objeto
    public $name;
    public $element;
    public $img;
    public $img_Banner;
    public $weapon;
    public $rareza;

    /**
     * Constructor de la clase Personaje.
     *
     * @param array $args Los argumentos para sincronizar con los atributos del objeto.
     */
    public function __construct($args = []) {
        $this->sincronizar($args);
    }

    /**
     * Obtiene todos los personajes.
     */
    public static function all(){
        $query = "SELECT * FROM " . self::$tabla;
        return self::consultarSQL($query);
    }

    /**
     * Selecciona un personaje por su nombre.
     *
     * @param string $dato El nombre del personaje.
     * @return mixed El resultado de la consulta.
     */
    public static function select($dato){
        $query = "SELECT * FROM " . self::$tabla . " WHERE name = '$dato'";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    /**
     * Filtra personajes por arma.
     *
     * @param string $weapon El arma del personaje.
     * @return mixed El resultado de la consulta.
     */
    public static function armasFiltro($weapon){
        $query = "SELECT * FROM " . self::$tabla . " WHERE weapon = '$weapon' ";
        return self::consultarSQL($query);
    }

    /**
     * Filtra personajes por rareza.
     *
     * @param string $rare La rareza del personaje.
     * @return mixed El resultado de la consulta.
     */
    public static function rarezaFiltro($rare){
        $query = "SELECT * FROM " . self::$tabla . " WHERE rareza = '$rare' ";
        return self::consultarSQL($query);
    }

    /**
     * Filtra personajes por elemento.
     *
     * @param string $element El elemento del personaje.
     * @return mixed El resultado de la consulta.
     */
    public static function elementoFiltro($element){
        $query = "SELECT * FROM " . self::$tabla . " WHERE element = '$element' ";
        return self::consultarSQL($query);
    }

    /**
     * Obtiene la imagen de un personaje por su nombre.
     *
     * @param string $name El nombre del personaje.
     * @return mixed El resultado de la consulta.
     */
    public static function imagenChar($name){
        $query = "SELECT * FROM " . self::$tabla . " WHERE name = '$name' ";
        return self::$db->query($query);
    }

    /**
     * Actualiza el personaje en un equipo.
     *
     * @param int $team El ID del equipo.
     * @param int $char El número del personaje en el equipo.
     * @param string $name El nombre del personaje a actualizar.
     * @param string $uid El ID del usuario.
     * @return mixed El resultado de la actualización.
     */
    public static function actualizarPer($team, $char, $name, $uid){
        switch((int)$char){
            case 1:
                $per = "character1";
                break;
            case 2:
                $per = "character2";
                break;
            case 3:
                $per = "character3";
                break;
            case 4:
                $per = "character4";
                break;
        }
        $query = "UPDATE teams SET $per = '$name' WHERE id_team = $team AND player_uid = '$uid'";
        return self::$db->query($query);
    }

    /**
     * Borra todos los personajes de un equipo.
     *
     * @param int $team El ID del equipo.
     * @param string $uid El ID del usuario.
     * @return mixed El resultado de la eliminación.
     */
    public static function borrarTeam($team, $uid){
        $query = "UPDATE teams SET character1 = null, character2 = null, character3 = null, character4 = null WHERE id_team = $team AND player_uid = '$uid'";
        return self::$db->query($query);
    }

    /**
     * Realiza una búsqueda de personajes por nombre.
     *
     * @param string $nombre El nombre del personaje a buscar.
     */
    public function busqueda($nombre){
        // Implementa la lógica de búsqueda
    }

    public static function countPyro(){
        $querypyro= "SELECT count(*) as pyro FROM characters WHERE element='Pyro'";
        $resultado = self::$db->query($querypyro);
        $fila = $resultado->fetch();
        return $fila['pyro'];
    }
    public static function countHydro(){
        $queryhydro= "SELECT count(*) as hydro FROM characters WHERE element='Hydro'";
        $resultado = self::$db->query($queryhydro);
        $fila = $resultado->fetch();
        return $fila['hydro'];
    }
    public static function countCryo(){
        $querycryo= "SELECT count(*)as cryo FROM characters WHERE element='Cryo'";
        $resultado = self::$db->query($querycryo);
        $fila = $resultado->fetch();
        return $fila['cryo'];
    }
    public static function countAnemo(){
        $queryanemo= "SELECT count(*) as anemo FROM characters WHERE element='Anemo'";
        $resultado = self::$db->query($queryanemo);
        $fila = $resultado->fetch();
        return $fila['anemo'];
    }
    public static function countGeo(){
        $querygeo= "SELECT count(*) as geo FROM characters WHERE element='Geo'";
        $resultado = self::$db->query($querygeo);
        $fila = $resultado->fetch();
        return $fila['geo'];
    }
    public static function countDendro(){
        $querydendro= "SELECT count(*) as dendro FROM characters WHERE element='Dendro'";
        $resultado = self::$db->query($querydendro);
        $fila = $resultado->fetch();
        return $fila['dendro'];
    }
    public static function countElectro(){
        $queryelectro= "SELECT count(*) as electro FROM characters WHERE element='Electro'";  
        $resultado = self::$db->query($queryelectro);
        $fila = $resultado->fetch();
        return $fila['electro'];
    }

}
