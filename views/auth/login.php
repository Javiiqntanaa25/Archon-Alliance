<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./build/css/login.css">
    <title>Archon Alliance</title>
</head>
<body>
    <header>
        <div class="Titulo1">
            <img src="./build/img/archon alliance.png" width="400px" alt="logo" class="logo">
        </div>
    </header>
    <main>
    
    <form method="POST" class="formulario">
        <div class="contenedor">
            <div class="Iniciar">
                <h3>Iniciar sesión</h3>
            </div>
            <div class="bloque-contenedor">
                <?php 
                foreach($errores as $error){ ?>
                    <div class="error">
                        <?php echo $error;?>
                    </div>
                <?php
                }
            ?>
                <div class="uid">
                <label for="uid">UID:</label>
                <input type="text" id="uid" name="ID" required>
                </div>
                <div class="password">
                    <label>Password: </label>
                    <input type="text" id="password" name="Password" required>
                </div>
            </div>
            <a href="" class="boton">
                <button type="submit" class="boton">Iniciar sesión</button>
            </a>
            <label class="noacc">¿No tienes cuenta?<a href="/registrar" class="crear">Crear cuenta</a></label>
            
        </div>
    </form>    
    </main>
</body>
</html>