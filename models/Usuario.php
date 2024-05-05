<?php

namespace Model;

/**
 * Clase para gestionar los usuarios.
 */
class Usuario extends ActiveRecord {
   
    // Base de datos
    protected static $tabla = 'player';
    protected static $columnasDB = ['ID', 'passw', 'usrName', 'lvl', 'WorldLevel', 'PFP', 'usrDescription'];
  
    // Atributos del objeto
    public $ID;
    public $passw;
    public $usrName;
    public $lvl;
    public $WorldLevel;
    public $PFP;
    public $usrDescription;

    /**
     * Constructor de la clase Usuario.
     *
     * @param array $args Los argumentos para inicializar los atributos del objeto.
     */
    public function __construct($args = [])
    {
        $this->ID = $args['ID'] ?? null;
        $this->passw = $args['Password'] ?? null;
        $this->usrName = $args['usrName'] ?? null;
        $this->lvl = $args['lvl'] ?? null;
        $this->WorldLevel = $args['WorldLevel'] ?? null;
        $this->PFP = $args['PFP'] ?? null;
        $this->usrDescription = $args['usrDescription'] ?? null;
    }

    /**
     * Valida los datos del usuario.
     *
     * @return array Los errores encontrados durante la validación.
     */
    public function validar() {
        if(!$this->ID) {
            self::$errores[] = "El ID del usuario es obligatorio";
        }
        if(!$this->passw) {
            self::$errores[] = "La contraseña del usuario es obligatorio";
        }
        return self::$errores;
    }

    /**
     * Valida los datos para el registro de usuario.
     *
     * @return array Los errores encontrados durante la validación.
     */
    public function validarRegistro() {
        if(!$this->ID) {
            self::$errores[] = "El ID del usuario es obligatorio";
        }
        if(!$this->passw) {
            self::$errores[] = "La contraseña del usuario es obligatorio";
        }
        if(!$this->usrName) {
            self::$errores[]="Debes añadir un nombre de usuario";
        }
        if(!$this->lvl) {
            self::$errores[]="Debes añadir un rango de aventura";
        }
        if(!$this->WorldLevel) {
            self::$errores[]="Debes añadir un nivel de mundo";
        }
        if(!$this->usrDescription) {
            self::$errores[]="Debes añadir una descripción";
        }
        return self::$errores;
    }

    /**
     * Comprueba si el usuario existe en la base de datos.
     *
     * @return mixed El resultado de la consulta.
     */
    public function existeUsuario() {
        // Revisar si el usuario existe.
        $query = "SELECT * FROM " . self::$tabla . " WHERE ID = '" . $this->ID . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if(!$resultado->rowCount()) {
            self::$errores[] = 'El Usuario No Existe';
            return;
        }

        return $resultado;
    }

    /**
     * Comprueba si la contraseña proporcionada coincide con la del usuario.
     *
     * @param object $usuario El objeto usuario.
     * @return bool True si la contraseña es correcta, de lo contrario false.
     */
    public function comprobarPassword($usuario) {
        $this->autenticado = password_verify($this->passw, $usuario->passw);

        if(!$this->autenticado) {
            self::$errores[] = 'El Password es Incorrecto';
            return;
        } 
        return true;
    }

    /**
     * Genera el hash de la contraseña.
     *
     * @return string El hash de la contraseña.
     */
    public function hashPass(){
        $resultado = $this->passw = password_hash($this->passw, PASSWORD_DEFAULT);
        return $resultado;
    }

    /**
     * Autentica al usuario y crea una sesión.
     */
    public function autenticar() {
         // El usuario esta autenticado
         session_start();

         // Llenar el arreglo de la sesión
        $_SESSION["usuario"] = $this->ID;
        $_SESSION["login"] = true;
        $_SESSION['nombre']=$this->usrName;
        $_SESSION['desc']=$this->usrDescription;
        $_SESSION['RA']=$this->lvl;
        $_SESSION['NM']=$this->WorldLevel;


         header('Location: /?id_team=0');
    }

    /**
     * Registra un nuevo usuario en la base de datos.
     *
     * @return mixed El resultado de la consulta.
     */
    public function registrar(){
        $query="INSERT INTO player (ID, passw, usrName, lvl, WorldLevel, usrDescription) VALUES 
                ('$this->ID', '$this->passw', '$this->usrName', '$this->lvl','$this->WorldLevel','$this->usrDescription');";

        return self::$db->query($query);
    }
}
