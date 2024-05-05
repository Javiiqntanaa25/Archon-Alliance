# ProjectG (PHP)

# Tabla de contenidos

1. [Descripción](#descripción)
2. [Diagramas](#diagramas)
   1. [Diagrama de casos de uso](#diagrama-de-casos-de-uso)
   2. [Diagrama de clases](#diagrama-de-clases)
   3. [Diagrama de entidad-relación](#diagrama-de-entidad-relación)
3. [Estructura del Proyecto](#estructura-del-proyecto)
   1. [Estructura general](#estructura-general)
   2. [Controllers](#controllers)
   3. [Includes](#includes)
   4. [Models](#models)
   5. [Public](#public)
   6. [Views](#views)
4. [Instrucciones de Uso](#instrucciones-de-uso)
   1. [Requisitos Previos](#requisitos-previos)
   2. [Configuración de la Base de Datos](#configuración-de-la-base-de-datos)
   3. [Explicación de la Base de Datos](#explicación-de-la-base-de-datos)
5. [Autoría](#autoría)
6. [Licencia](#licencia)

## Descripción

¡Bienvenido a "ProjectG", tu plataforma definitiva para crear los equipos perfectos en el fascinante mundo de Genshin Impact! Nuestra herramienta intuitiva te permite experimentar con personajes para construir el equipo ideal que se adapte a tu estilo de juego.

Explora una amplia gama de personajes. Con la capacidad de probar diferentes combinaciones, podrás descubrir sinergias poderosas y desbloquear el potencial máximo de tus personajes favoritos. 

## Diagramas

### Diagrama de casos de uso

![diagrama clases de uso ](https://github.com/Javiiqntanaa25/Project-G/assets/117390402/59741f01-69a8-4823-8aba-543832ddae17)

### Diagrama de entidad-relación

![diagrama entidad relación](https://github.com/Javiiqntanaa25/Project-G/assets/117390402/26f6daf7-0d8f-4370-9d78-06f1ca8f1f87)


## Estructura del proyecto

El desarrollo del proyecto de PHP ha seguido los principios de la **Programación Orientada a Objetos** (POO), empleando patrones de diseño como **Active Record** y el **Modelo Vista Controlador** (MVC) para asegurar una estructura clara y mantenible del código. La gestión de dependencias y la carga automática de clases son manejadas mediante **Composer**, simplificando la integración de bibliotecas externas y mejorando la organización del proyecto a través de la utilización de namespaces. Esto conlleva a una reducción del código y un aumento de la eficiencia en el desarrollo, pues elimina la necesidad de incluir manualmente los archivos de clases y permite una estructura de proyecto más escalable y modular.

### Estructura general

#### Controllers

Funcionan como intermediarios entre los modelos y las vistas para recibir las peticiones del usuario y procesarlas con el fin de enviar los datos a las vistas que desplegarán la información especificada por el usuario.

Entre estos, podemos hallar el perteneciente a la **clase Usuario**, abarcando igualmente los procedimientos de registro e inicio de sesión en la plataforma:



-  **`LoginController.php`**

  

El de la página principal, para la que hace falta loguearse previamente comenzar a crear, modificar o borrar equipos, haciendo uso de la **clase Equipo**:



- **`PaginasController.php`**

  

Y, por último, el controller de la página de selección de personajes, que utilizando la **clase Personaje**, permite filtrar por elemento, rareza o arma utilizada por un personaje:



- **`PersonajeController.php`**



#### Includes

El directorio includes incluye:

1. **/config/database.php**: Configuración de la conexión a la base de datos en PDO (Objetos de Datos de PHP, define un interfaz ligera para poder acceder a bases de datos en PHP).
2. **funciones.php**: Archivo que contiene funciones utilizadas en varias partes del proyecto para mejorar la modularidad y el mantenimiento del código.
3. **app.php**: Inicia la aplicación cargando las dependencias mediante **Composer**, estableciendo la conexión a la base de datos a través de la función **conectarDB()** y configurando el patrón Active Record para el manejo de modelos con la base de datos. Esto facilita la integración de bibliotecas y la gestión de la base de datos, simplificando el desarrollo, conectando componentes clave y preparando el entorno de ejecución.

#### Models

Equivalentes a las clases en la POO, los **modelos** en el patrón MVC gestionan la lógica de la aplicación y el acceso a datos, sirviendo como puente entre la base de datos y el controlador.

**Clase Router**: Gestiona las rutas de la aplicación, diferenciando entre solicitudes GET y POST a través de los arrays `$getRoutes` y `$postRoutes`. Con `comprobarRutas`, se determina la ruta actual y el método de solicitud, ejecutando la función asociada en caso de coincidencia. Por otro lado, `render` se encarga de la presentación, extrayendo los datos enviados a la vista y los encapsula dentro del layout especificado. Con esta estructura de enrutamiento se facilita la organización del flujo de navegación y la separación clara entre la lógica de procesamiento y la presentación visual en la aplicación.

**ActiveRecord**: implementa el patrón de diseño Active Record en PHP, facilitando la interacción con la base de datos mediante operaciones CRUD de manera orientada a objetos. Principales características:

- **Conexión a la Base de Datos**: Utiliza `setDB` para compartir una conexión a la base de datos entre todas las instancias de clases derivadas de `ActiveRecord`.

- **Manejo de Errores**: A través de `getErrores`, gestiona y proporciona acceso a los errores de validación.

- **Operaciones CRUD**: Incluye métodos para crear (`crear`), leer (`all`, `find`, `get`), actualizar (`actualizar`), y eliminar (`eliminar`) registros, adaptándose automáticamente a las especificaciones de las clases hijas.

- **Validación**: El método `validar` permite la implementación de validaciones personalizadas para asegurar la integridad de los datos.

- **Consulta y Manipulación de Datos**: Métodos como `consultarSQL` y `crearObjeto` facilitan la ejecución de consultas personalizadas y la instanciación de objetos a partir de resultados de consultas, respectivamente.

- **Sanitización de Atributos**: Previene inyecciones SQL y otros problemas de seguridad sanitizando atributos antes de cualquier operación en la base de datos.

- **Sincronización de Datos**: `sincronizar` actualiza los atributos del objeto con nuevos valores, facilitando la gestión de formularios y actualizaciones de datos.

#### Descripción General de los modelos específicos

Todos los modelos (`Equipo`, `Personaje`,`Usuario`) heredan de `ActiveRecord`, compartiendo funcionalidades como conexión a la base de datos y operaciones CRUD. Representan tablas en la base, con `protected static $tabla` y `protected static $columnasDB` definiendo su estructura en la base de datos, facilitando la manipulación de datos.

##### Diferencias Clave

- **Usuario**: Se encarga de la gestión de usuarios, incluye autenticación, registro, login y métodos para el manejo de validaciones de datos de usuario.
- **Equipo**: Gestiona los datos del equipo de cada usuario. Incluye métodos para crear, actualizar y ver equipos (no existe un borrar equipo que elimine equipos de la tabla, **explicación en Personaje**).
- **Personaje**: Permite materializar los datos de todos los personajes. Se diferencian métodos para filtrar los personajes (elemento, rareza o arma), actualizar personajes o borrar un equipo (hace un set de todos los personajes a NULL).

#### Public

La carpeta `public` de nuestro proyecto actúa como el punto de entrada para los usuarios, conteniendo el archivo `index.php` que inicializa la aplicación y un directorio `build` para el front-end. Dentro de `build`, se organizan los archivos estáticos como CSS, JavaScript e imágenes, esenciales para el diseño y funcionalidad de la interfaz de usuario. El `index.php`, por otro lado, configura las dependencias, inicia el enrutador (`Router`) y define las rutas hacia distintos controladores (`Controllers`), gestionando así las solicitudes y respuestas dentro del patrón MVC. Este diseño separa claramente la lógica de presentación del manejo de la lógica de la aplicación web, promoviendo una estructura organizada y modular para el desarrollo web.

#### Views

Incluye todas las vistas a la que tiene acceso el usuario. Deberás **iniciar sesión o registrarte** si no existe una cuenta para, tras verificar si el usuario está autenticado, mostrar contenido personalizado. La estructura incluye una **página principal** que muestra los detalles del usuario logueado junto a las imágenes de los personajes que conforman los equipos creados (o vacíos según como el usuario haya determinado). 

Si el usuario desea crear un equipo o actualizar personajes de un equipo, basta con hacer click sobre la ranura de personaje deseada, pues esta te llevará a la página de personajes, donde podrás seleccionar el nuevo personaje que se guardará/actualizará automáticamente en el equipo, redirigiéndote a la página principal una vez finalizado el proceso .

Los recursos estáticos para el estilo y la funcionalidad (CSS y JavaScript) se cargan desde la carpeta `build`, asegurando una experiencia de usuario coherente y atractiva.

La subdivisión de las vistas se realiza en función de los siguientes apartados:

### Páginas generales

- **index.php:** Página principal del sitio web (index). En esta página, se muestra información principal sobre el usuario y los equipos realizados por este mismo. Al hacer click sobre una ranura de equipo, muestra las imágenes de los personajes del equipo seleccionado; en caso de que los datos de un personaje del equipo estén vacíos, se muestra una imagen con el símbolo `+` en lugar del personaje.   Si existe un equipo en la ranura de equipo seleccionada, se mostrará un botón de `borrar equipo`.       Al hacer click sobre una ranura de personaje, esté vacía o no, te redirige a la página characters.php.
- **characters.php**: Página que muestra la imagen, nombre y rareza del personaje. Una barra horizontal se sitúa al principio de la página, mostrando una sección de filtros para los personajes (totalmente opcional). Se puede filtrar por elementos, rareza y armas, además de un botón para eliminar dichos filtros. Al hacer click en un personaje, este se guarda en la ranura previamente seleccionada por el usuario para guardar el nuevo personaje en la base de datos y, tras realizar el add/update del personaje correctamente, te redirige a la página principal (index.php), mostrando ahora en la ranura de personaje seleccionada la imagen del personaje deseado.

### Auth: crear cuenta e iniciar sesión

- **crearcuenta.php:** Formulario de registro de nuevos usuarios con validación de datos para garantizar la integridad de la información ingresada.
- **login.php:** Página para realizar el inicio de sesión del usuario. En esta página, se procesa el formulario de inicio de sesión, se verifica la identidad del usuario y se manejan los errores. Se conecta a la base de datos y genera mensajes de error si es necesario. Finalmente, si los datos son correctos, redirige a la página principal (index.php).





## Instrucciones de Uso

### Requisitos Previos:

1. Asegúrate de tener un servidor web configurado con soporte para PHP y una base de datos MySQL. En este sentido, se recomienda utilizar [XAMPP], que proporciona un entorno de desarrollo local que incluye Apache, MySQL, PHP y phpMyAdmin, facilitando la configuración y gestión del entorno de desarrollo.
2. Importa la estructura de la base de datos desde el archivo SQL proporcionado en la carpeta **files** (`projectg.sql`).
3. Para visualizar las páginas, hay que ejecutar `php -S localhost:<puerto>` desde el directorio public    (`cd public`) del proyecto, reemplazando `<puerto>` con el número de puerto que se desea utilizar. Por ejemplo, para usar el puerto 3000, el comando sería `php -S localhost:3000`.

### Configuración de la Base de Datos:

1. Descargar e Instalar XAMPP:

- Asegúrate de tener XAMPP instalado en tu sistema y, tras abrirlo, iniciar `Apache` y `MySQL`.

2. Importar la Base de Datos:

- Desde el panel de control de XAMPP, click en el botón `Admin` de `MySQL` (http://localhost/phpmyadmin)

- Haz click en la pestaña "Importar".

- Sube el archivo SQL proporcionado (projectg.sql) para importar la estructura y los datos.

  

### Explicación de la base de datos

#### Usuarios - Usuarios registrados

En la base de datos hay 1 usuario (puedes crear más usuarios en la página del login al hacer click en "**crear Cuenta**"):

- **ID** (ID generado automáticamente al crear una cuenta): `700040802`  `(PRIMARY KEY)`.

- **usrName** (Nombre): `Javii`.
- **passw** (Contraseña): `12345`.
- **lvl** (Nivel de la cuenta, 1-60): `60`.
- **WorldLevel** (Nivel del mundo 1-8): `8`.
- **PFP** (Siempre NULL de momento): `NULL`.
- **usrDescription** (Descripción): `Yelan step on`.

#### Equipos - Creados por usuarios, formados por personajes

- **id**: id auto incremental `(PRIMARY KEY)`.

- **id_team**: id del 1 al 4 que refleja el número de equipo.

- **player_uid**: ID del usuario dueño del equipo.

- **character1**:  Personaje en la posición 1 del equipo.

- **character2** : Personaje en la posición 2 del equipo.

- **character3**: Personaje en la posición 3 del equipo.

- **character4**: Personaje en la posición 4 del equipo.

  

#### Personajes - Información de todos los personajes

- **name**: Nombre del personaje `(PRIMARY KEY)`.

- **element**: Elemento del personaje `(enum: Pyro, Hydro, Cryo, Electro, Dendro, Geo, Anemo)`.
- **img**: Imagen del personaje (Icono pequeño, se muestra en la **página de characters**).
- **imgBanner**:  Imagen del personaje (Icono grande, se muestra en la **página principal**).
- **weapon** : Arma utilizada por el personaje `(enum: Espada ligera, Mandoble, Arco, Catalizador, Lanza)`.
- **rareza**: Rareza del personaje. Un personaje solo puede ser 4 o 5 estrellas.



## Autoría

Este proyecto fue desarrollado por [@oscaarrc](https://github.com/oscaarrc) y [@Javiiqntanaa25](https://github.com/Javiiqntanaa25)

## Licencia

Proyecto elaborado para fines educativos para la asignatura Desarrollo Web en Entorno Servidor de segundo del CFGS de Desarrollo de Aplicaciones Web en el IES Ana Luisa Benítez.	
