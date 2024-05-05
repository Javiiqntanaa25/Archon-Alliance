<?php

namespace Model;

/**
 * Clase para gestionar los equipos.
 */
class Equipo extends ActiveRecord {

    // Definir la tabla y columnas de la base de datos
    protected static $tabla = 'teams';
    protected static $columnasDB = ['id','id_team','player_uid','character1','character2','character3', 'character4'];

    // Atributos del objeto
    public $id;
    public $id_team;
    public $player_uid;
    public $character1;
    public $character2;
    public $character3;
    public $character4;

    /**
     * Constructor de la clase Equipo.
     *
     * @param array $args Los argumentos para sincronizar con los atributos del objeto.
     */
    public function __construct($args = []) {
        $this->sincronizar($args);
    }

    /**
     * Obtiene todos los equipos.
     */
    public static function all(){
        $query = "SELECT * FROM teams";
        $resultado = self::$db->query($query);
        debugear($resultado->fetch_assoc());
    }
    
    /**
     * Selecciona un equipo por su jugador.
     *
     * @param int $player_uid El ID del jugador.
     */
    public static function teamSelector($player_uid){
        $query = "SELECT * FROM teams WHERE player_uid = $player_uid";
        $resultado = self::$db->query($query);
        // debugear($resultado->fetch_assoc());
    }

    /**
     * Selecciona un equipo por su jugador y un desplazamiento.
     *
     * @param int $player_uid El ID del jugador.
     * @param int $offset El desplazamiento para la consulta.
     * @return mixed El resultado de la consulta.
     */
    public static function teamSelectorOffset($player_uid, $offset){
        $query = "SELECT * FROM teams WHERE player_uid = $player_uid LIMIT 1 OFFSET $offset";
        $resultado = self::$db->query($query);
        return $resultado;
        // debugear($resultado->fetch_assoc());
    }

    /**
     * Actualiza el equipo.
     *
     * @return mixed El resultado de la actualización.
     */
    public function actualizar(){
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE " . static::$tabla ." SET ";
        $query .=  join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 "; 

        $resultado = self::$db->query($query);

        return $resultado;
    }

    /**
     * Crea equipos para un usuario.
     *
     * @param int $uid El ID del usuario.
     */
    public static function crearEquipos($uid){
        $query = "INSERT INTO `teams`(id_team, player_uid, character1, character2, character3, character4) VALUES (1,'$uid',null,null,null,null), (2,'$uid',null,null,null,null),
        (3,'$uid',null,null,null,null), (4,'$uid',null,null,null,null)";
        $resultado = self::$db->query($query);
    }

    /**
     * Borra un equipo por su ID de equipo.
     *
     * @param int $id_team El ID del equipo a borrar.
     */
    public static function borrar($id_team){
        $query = "DELETE FROM teams WHERE id_team = $id_team";
        $resultado = self::$db->query($query);
    }
}
