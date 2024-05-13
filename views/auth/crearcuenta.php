<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./build/css/crearcuenta.css">
    <title>Archon Alliance</title>
</head>
<body>
    <header>
        <div class="Titulo1">
        <img src="./build/img/archon alliance.png" width="400px" alt="logo" class="logo">
        </div>
    </header>
    <main>
    <form method="POST" action="/registrar">
    <div class="contenedor">
            <div class="crear">
                <h3>Crear Cuenta</h3>
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
                        <label>UID: </label> 
                        <input type="text" name="ID" readonly value="<?= $uid ?>">
                    </div>
                    <div class="password">
                        <label>Nombre: </label> <input type="text" id="name" name="usrName">
                    </div>
                    <div class="password">
                        <label>Contraseña: </label> <input type="text" id="password" name="Password">
                    </div>
                </div>
                <div class="datos">
                    <div class="niveles">
                        <div class="RA">
                            <label class="ra">RA:</label> 
                            <input type="number" min="1" max="60" id="ra" name="lvl">
                        </div>
                        <div class="NM">
                            <label class="nm">NM:</label>
                            <input type="number" min="1" max="8" id="nm" name="WorldLevel">
                        </div>
                    </div>
                        <div class="pjprincipal">
                            <label class="Personaje">Personaje:</label>
                            <div class="genero">
                                <div class="femenino">
                                    <label class="Lumine" >Lumine</label>
                                    <input type="radio" name="character" id="lumine" value="lumine.png">
                                </div>
                                <div class="masculino">
                                    <label class="Aether" >Aether</label>
                                    <input type="radio" name="character" id="aether" value="aether.png">
                                </div>
                                
                            </div>
                            
                        </div>
                    
                    
                </div>
                <div class="descripcion">
                    <label class="Desc">Descripción:</label>
                    <input type="text" id="description" name="usrDescription">
                </div>
                <a class="crearboton">
                    <input type="submit" value="Crear Cuenta">
                    <!-- <button type="submit">Crear cuenta</button> -->
                </a>
            </div>
        </form>
    </main>
</body>
</html>