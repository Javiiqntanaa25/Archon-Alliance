<?php

namespace Model;

/**
 * Clase base para los modelos ActiveRecord.
 */
class ActiveRecord{

    // Base de datos
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Errores
    protected static $errores = [];

    /**
     * Establece la conexión a la base de datos.
     *
     * @param object $database Objeto de conexión a la base de datos.
     * @return void
     */
    public static function setDB($database) {
        self::$db = $database;
    }

    /**
     * Devuelve los errores ocurridos durante la validación.
     *
     * @return array Lista de errores.
     */
    public static function getErrores() {
        return static::$errores;
    }

    /**
     * Método de validación de datos.
     *
     * @return array Lista de errores.
     */
    public function validar() {
        static::$errores = [];
        return static::$errores;
    }

    // Registros - CRUD
    /**
     * Guarda el registro en la base de datos.
     *
     * @return mixed Resultado de la operación.
     */
    public function guardar() {
        try {
            $resultado = '';
            if (!is_null($this->id)) {
                // Actualizar
                $resultado = $this->actualizar();
            } else {
                // Crear un nuevo registro
                $resultado = $this->crear();
            }
            return $resultado;
        } catch (\Exception $e) {
            // Manejo de excepciones
            return false;
        }
    }

    /**
     * Obtiene todos los registros de la tabla.
     *
     * @return array Lista de registros.
     */
    public static function all() {
        try {
            $query = "SELECT * FROM " . static::$tabla;
            $resultado = self::consultarSQL($query);
            return $resultado;
        } catch (\Exception $e) {
            // Manejo de excepciones
            return [];
        }
    }

    /**
     * Busca un registro por su ID.
     *
     * @param int $id ID del registro a buscar.
     * @return mixed Registro encontrado.
     */
    public static function find($id) {
        try {
            $query = "SELECT * FROM " . static::$tabla  ." WHERE id = ${id}";
            $resultado = self::consultarSQL($query);
            return array_shift($resultado);
        } catch (\Exception $e) {
            // Manejo de excepciones
            return null;
        }
    }

    /**
     * Obtiene registros con un límite especificado.
     *
     * @param int $limite Límite de registros a obtener.
     * @return array Lista de registros.
     */
    public static function get($limite) {
        try {
            $query = "SELECT * FROM " . static::$tabla . " LIMIT ${limite}";
            $resultado = self::consultarSQL($query);
            return $resultado;
        } catch (\Exception $e) {
            // Manejo de excepciones
            return [];
        }
    }

    /**
     * Crea un nuevo registro en la base de datos.
     *
     * @return mixed Resultado de la operación.
     */
    public function crear() {
        try {
            // Sanitizar los datos
            $atributos = $this->sanitizarAtributos();

            // Insertar en la base de datos
            $query = " INSERT INTO " . static::$tabla . " ( ";
            $query .= join(', ', array_keys($atributos));
            $query .= " ) VALUES (' "; 
            $query .= join("', '", array_values($atributos));
            $query .= " ') ";

            // Resultado de la consulta
            $resultado = self::$db->query($query);

            return $resultado;
        } catch (\Exception $e) {
            // Manejo de excepciones
            return false;
        }
    }

    /**
     * Actualiza un registro en la base de datos.
     *
     * @return mixed Resultado de la operación.
     */
    public function actualizar() {
        try {
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
        } catch (\Exception $e) {
            // Manejo de excepciones
            return false;
        }
    }

    /**
     * Elimina un registro de la base de datos.
     *
     * @return mixed Resultado de la operación.
     */
    public function eliminar() {
        try {
            // Eliminar el registro
            $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
            $resultado = self::$db->query($query);

            if ($resultado) {
                $this->borrarImagen();
            }

            return $resultado;
        } catch (\Exception $e) {
            // Manejo de excepciones
            return false;
        }
    }

    /**
     * Realiza una consulta SQL a la base de datos.
     *
     * @param string $query Consulta SQL a ejecutar.
     * @return array Resultado de la consulta.
     */
    public static function consultarSQL($query) {
        try {
            // Consultar la base de datos
            $resultado = self::$db->query($query);

            // Iterar los resultados
            $array = [];
            while ($registro = $resultado->fetch()) {
                $array[] = static::crearObjeto($registro);
            }

            // Retornar los resultados
            return $array;
        } catch (\Exception $e) {
            // Manejo de excepciones
            return [];
        }
    }
    /**
 * Crea un objeto a partir de un registro de la base de datos.
 *
 * @param array $registro Registro de la base de datos.
 * @return object Objeto creado.
 */
protected static function crearObjeto($registro) {
    try {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    } catch (\Exception $e) {
        // Manejo de excepciones
        return null;
    }
}

/**
 * Obtiene los atributos del objeto.
 *
 * @return array Atributos del objeto.
 */
public function atributos() {
    try {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    } catch (\Exception $e) {
        // Manejo de excepciones
        return [];
    }
}

/**
 * Sanitiza los atributos del objeto para evitar inyección SQL.
 *
 * @return array Atributos sanitizados.
 */
public function sanitizarAtributos() {
    try {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    } catch (\Exception $e) {
        // Manejo de excepciones
        return [];
    }
}

public function sincronizar($args=[]) { 
    try {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    } catch (\Exception $e) {
        // Manejo de excepciones
    }
}

// Subida de archivos
public function setImagen($imagen) {
    try {
        // Elimina la imagen previa
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }
        // Asignar al atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    } catch (\Exception $e) {
        // Manejo de excepciones
    }
}

// Eliminar el archivo
public function borrarImagen() {
    try {
        // Comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    } catch (\Exception $e) {
        // Manejo de excepciones
    }
}
}

