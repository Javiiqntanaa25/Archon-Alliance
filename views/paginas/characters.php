<?php
    $id_team = $_GET['id_team'];
    $char = $_GET['character'];
    $data = array (
        array('Elemento','Cantidad'),
        array('Pyro',$elementPyro),
        array('Hydro',$elementHydro),
        array('Cryo',$elementCryo),
        array('Geo',$elementAnemo),
        array('Anemo',$elementAnemo),
        array('Dendro',$elementDendro),
        array('Electro',$elementElectro)
    );
    $json_data = json_encode($data)
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./build/css/index.css">
    <title>Archon Alliance</title>
</head>
<body>

    <div class="background"></div>
    <header>
        <div class="Titulo">
            <a href="index.php"><img class="logopg" width="170px"></a>
        </div>
        <div class="uid_container">
            <label>UID:</label>
            <label class="uid"><?php echo $UID ?></label>
            <a href="/logout" class="cerrar">Cerrar sesión</a>
        </div>
    </header>
    <section class="filtros">
        <div class="menu">
            <div class="elementos">
                <a href="/characters?element=Pyro&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>"class="pyro elemento"><img src="./build/img/elementos/pyro.png" alt="pyro"></a>
                <a href="./characters?element=Hydro&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>"class="hydro elemento" ><img src="./build/img/elementos/hydro.png" alt="hydro"></a>
                <a href="./characters?element=Cryo&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>"class="cryo elemento"><img src="./build/img/elementos/cryo.png" alt="cryo"></a>
                <a href="./characters?element=Electro&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>"class="electro elemento"><img src="./build/img/elementos/electro.png" alt="electro"></a>
                <a href="./characters?element=Anemo&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>"class="anemo elemento"><img src="./build/img/elementos/anemo.png" alt="anemo"></a>
                <a href="./characters?element=Geo&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>"class="geo elemento"><img src="./build/img/elementos/geo.png" alt="geo"></a>
                <a href="./characters?element=Dendro&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>"class="dendro elemento"><img src="./build/img/elementos/dendro.png" alt="dendro"></a>
            </div>
            <div class="rarezas">
                <a href="./characters?rareza=4&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>" class="4 rareza">4<img src="./build/img/estrella.png"></a>
                <a href="./characters?rareza=5&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>" class="5 rareza">5 <img src="./build/img/estrella.png"></a>
            </div>
            <div class="armas">
                <a href="./characters?weapon=espada ligera&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>" class="espada_ligera arma"><img src="./build/img/armas/espada_ligera.png" alt="espada_ligera"></a>
                <a href="./characters?weapon=mandoble&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>" class="mandoble arma"><img src="./build/img/armas/mandoble.png" alt="mandoble"></a>
                <a href="./characters?weapon=arco&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>" class="arco arma"><img src="./build/img/armas/arco.png" alt="arco"></a>
                <a href="./characters?weapon=catalizador&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>" class="catalizador arma"><img src="./build/img/armas/catalizador.png" alt="catalizador"></a>
                <a href="./characters?weapon=lanza&character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>" class="lanza arma"><img src="./build/img/armas/lanza.png" alt="lanza"></a>  
            </div>
            <a href="./characters?character=<?php echo $pj1;?>&id_team=<?php echo $posEquipo?>" class="eliminar"><img src="./build/img/x.png"></a>
        </div>
    </section>
    <main class="contenidos">
        <div class="contenedor-pjs">
            <?php 

                foreach($personajes as $personaje){
                    $rare = $personaje->rareza;
                    if($personaje->rareza == 4){ 
                        if(intval($pj1)==1){
                            ?>
                                <a href="/actPersonaje?character=<?=$char?>&id_team=<?= $id_team?>&nombre=<?=$personaje->name?>" class="personaje personaje4">
                            <?php 
                            }elseif(intval($pj1)==2){
                            ?>
                                <a href="/actPersonaje?character=<?=$char?>&id_team=<?= $id_team?>&nombre=<?=$personaje->name?>" class="personaje personaje4">
                            <?php 
                            }elseif(intval($pj1)==3){
                                ?>
                                    <a href="/actPersonaje?character=<?=$char?>&id_team=<?= $id_team?>&nombre=<?=$personaje->name?>" class="personaje personaje4">
                                <?php 
                            }elseif(intval($pj1)==4){ 
                                ?>
                                    <a href="/actPersonaje?character=<?=$char?>&id_team=<?= $id_team?>&nombre=<?=$personaje->name?>" class="personaje personaje4">
                                <?php 
                                }
                            ?>    
                            <?php 
                            } 
                        else{ 
                            if(intval($pj1)==1){
                            ?>
                                <a href="/actPersonaje?character=<?=$char?>&id_team=<?= $id_team?>&nombre=<?=$personaje->name?>" class="personaje personaje5">
                            <?php 
                            }elseif(intval($pj1)==2){
                            ?>
                                <a href="/actPersonaje?character=<?=$char?>&id_team=<?= $id_team?>&nombre=<?=$personaje->name?>" class="personaje personaje5">
                            <?php 
                            }elseif(intval($pj1)==3){
                                ?>
                                    <a href="/actPersonaje?character=<?=$char?>&id_team=<?= $id_team?>&nombre=<?=$personaje->name?>" class="personaje personaje5">
                                <?php 
                            }elseif(intval($pj1)==4){
                                ?>
                                    <a href="/actPersonaje?character=<?=$char?>&id_team=<?= $id_team?>&nombre=<?=$personaje->name?>" class="personaje personaje5">
                                <?php 
                                }
                            }  ?>
                
                <picture>
                    <source srcset="../build/img/img_icon/<?= $personaje->img?>" type="image/png">
                    <img loading="lazy" src="../build/img/img_icon<?= $personaje->img?>" alt="" >
                </picture>
                <div class="contenido-pj">
                    <h3><?php echo $personaje->name?></h3>
                    <div class="element">
                        <p class="element"><?php echo $personaje->element?></p>
                    </div>
                    <div class="weapon">
                        <p class="weapon"><?php echo $personaje->weapon?></p>
                    </div>
                </div>
            </a>
        <?php } ?>
        </div>
                       
    </main>
    <div id="piechart" style="width: 450px; height: 250px; padding-left: 40%;" ></div>     
</body>


<script src="../../build/js/fondorandom.js"></script>
<script src="../../build/js/logorandom.js"></script>

</html>    

