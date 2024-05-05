<?php

namespace MVC;

/**
 * Clase que gestiona las rutas y las renderizaciones de vistas.
 */
class Router
{
    /** @var array Arreglo de rutas GET */
    public array $getRoutes = [];
    
    /** @var array Arreglo de rutas POST */
    public array $postRoutes = [];

    /**
     * Registra una ruta GET.
     *
     * @param string $url La URL de la ruta.
     * @param callable $fn La función a ejecutar.
     */
    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    /**
     * Registra una ruta POST.
     *
     * @param string $url La URL de la ruta.
     * @param callable $fn La función a ejecutar.
     */
    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    /**
     * Comprueba y ejecuta la ruta correspondiente.
     */
    public function comprobarRutas() {
        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if ( $fn ) {
            // Llama a la función correspondiente
            call_user_func($fn, $this); // "This" se utiliza para pasar argumentos
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    /**
     * Renderiza una vista con datos opcionales.
     *
     * @param string $view La vista a renderizar.
     * @param array $datos Los datos para pasar a la vista.
     */
    public function render($view, $datos = []) {
        // Itera sobre los datos y crea variables dinámicas
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        // Almacena el contenido de la vista en el buffer
        ob_start();

        // Incluye la vista dentro del layout
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); // Limpia el Buffer

        // Incluye el layout y muestra el contenido de la vista
        include_once __DIR__ . '/views/layout.php';
    }
}
