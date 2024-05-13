<?php

/**
 * Función para conectar a la base de datos.
 *
 * @return PDO|false Retorna el objeto PDO de la conexión establecida o false en caso de error.
 */
function conectarDB(){
    $dns = 'mysql:host=roundhouse.proxy.rlwy.net;port=51212;dbname=railway';
    $user = 'root'; 
    $password = 'DgjimlismCYHrsbwZkbEVzptwYveHMww'; 

    try {
        // Intenta establecer la conexión
        $db = new PDO($dns, $user, $password);
        
        // Verifica si la conexión fue exitosa
        if(!$db) {
            echo "Error: No se pudo conectar a MySQL.";
            exit;
        } 
        
        // Retorna el objeto PDO de la conexión establecida.
        return $db;
    } catch (PDOException $e) {
        // Captura y maneja cualquier excepción que pueda ocurrir durante la conexión
        echo "Error: " . $e->getMessage();
        return false;
    }
}



