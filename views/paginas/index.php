<?php
if(isset($_GET['id_team'])){
    $equipo = $_GET['id_team'];
} else{
    $equipo = 0;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../build/css/index.css">
    <title>Archon Alliance</title>
</head>
<body>
    <div class="background"></div>
    <header>
        <div class="Titulo">
            <img class="logopg" width="170px" href="/">
        </div>
        <div class="uid_container">
            <label>UID:</label>
            <label class="uid"><?= $usuario->ID?></label>
            <a href="/logout" class="cerrar">Cerrar sesión</a>
        </div>
    </header>
    <section class="info">
        <div class="contenedor-info">
        <div class="foto">
            <img src="./img/placeholder.png" alt="">
        </div>
        <div class="informacion">
            <h3 class="NombreJugador"><?= $usuario->usrName;?></h3>
            <div class="nivel">
                <div class="RA">
                    <h4>RA:</h4>
                    <h4><?= $usuario->lvl?></h4>
                </div>
                <div class="NM">
                    <h4>NM:</h4>
                    <h4><?= $usuario->WorldLevel?></h4>
                </div>
            </div>
            <h3><?= $usuario->usrDescription;?></h3>
        </div>
        </div>
    </section>
    <div class="icon-teams">
        <div class="container-teams">
            <a href="./index.php?id_team=0" class="team1 iconoteam icon-team1">
                <?php
                    if($equipo==0){
                        if($res[$equipo][0] != null){
                    ?> 
                    <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][0]->img;}?>" class="<?php if($res[$equipo][0]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][0]->rareza==5){ echo "g5 iconoequipo";}?>">
                    <?php 
                        }elseif($res[$equipo][1] != null){
                    ?>
                    <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][1]->img;}?>" class="<?php if($res[$equipo][1]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][1]->rareza==5){ echo "g5 iconoequipo";}?>">
                    <?php
                        }elseif($res[$equipo][2] != null){
                            ?>
                            <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][2]->img;}?>" class="<?php if($res[$equipo][2]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][2]->rareza==5){ echo "g5 iconoequipo";}?>">
                    <?php
                        }elseif($res[$equipo][3] != null){
                            ?>
                            <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][3]->img;}?>" class="<?php if($res[$equipo][3]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][3]->rareza==5){ echo "g5 iconoequipo";}?>">
                    <?php
                    }}else{?>
                        <img src="../../build/img/plus.png"> 
                    <?php
                    }
                ?>
            </a>
            <a href="./index.php?id_team=1" class="team2 iconoteam icon-team2">
                    <?php
                        if($equipo==1){
                            if($res[$equipo][0] != null){
                        ?> 
                        <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][0]->img;}?>" class="<?php if($res[$equipo][0]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][0]->rareza==5){ echo "g5 iconoequipo";}?>">>
                        <?php 
                            }elseif($res[$equipo][1] != null){
                        ?>
                        <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][1]->img;}?>" class="<?php if($res[$equipo][1]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][1]->rareza==5){ echo "g5 iconoequipo";}?>">
                        <?php
                            }elseif($res[$equipo][2] != null){
                                ?>
                                <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][2]->img;}?>" class="<?php if($res[$equipo][2]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][2]->rareza==5){ echo "g5 iconoequipo";}?>">
                        <?php
                            }elseif($res[$equipo][3] != null){
                                ?>
                                <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][3]->img;}?>" class="<?php if($res[$equipo][3]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][3]->rareza==5){ echo "g5 iconoequipo";}?>">
                        <?php
                        }}else{?>
                            <img src="../../build/img/plus.png"> 
                        <?php
                        }
                    ?>
            </a>
            <a href="./index.php?id_team=2" class="team3 iconoteam icon-team3">
                    <?php
                        if($equipo==2){
                            if($res[$equipo][0] != null){
                        ?> 
                        <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][0]->img;}?>" class="<?php if($res[$equipo][0]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][0]->rareza==5){ echo "g5 iconoequipo";}?>">
                        <?php 
                            }elseif($res[$equipo][1] != null){
                        ?>
                        <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][1]->img;}?>" class="<?php if($res[$equipo][1]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][1]->rareza==5){ echo "g5 iconoequipo";}?>">
                        <?php
                            }elseif($res[$equipo][2] != null){
                                ?>
                                <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][2]->img;}?>" class="<?php if($res[$equipo][2]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][2]->rareza==5){ echo "g5 iconoequipo";}?>">
                        <?php
                            }elseif($res[$equipo][3] != null){
                                ?>
                                <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][3]->img;}?>" class="<?php if($res[$equipo][3]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][3]->rareza==5){ echo "g5 iconoequipo";}?>">
                        <?php
                        }}else{?>
                            <img src="../../build/img/plus.png"> 
                        <?php
                        }
                    ?>
            </a>
            <a href="./index.php?id_team=3" class="team4 iconoteam icon-team4">
                    <?php
                        if($equipo==3){
                            if($res[$equipo][0] != null){
                        ?> 
                        <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][0]->img;}?>" class="<?php if($res[$equipo][0]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][0]->rareza==5){ echo "g5 iconoequipo";}?>">
                        <?php 
                            }elseif($res[$equipo][1] != null){
                        ?>
                        <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][1]->img;}?>" class="<?php if($res[$equipo][1]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][1]->rareza==5){ echo "g5 iconoequipo";}?>">
                        <?php
                            }elseif($res[$equipo][2] != null){
                                ?>
                                <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][2]->img;}?>" class="<?php if($res[$equipo][2]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][2]->rareza==5){ echo "g5 iconoequipo";}?>">
                        <?php
                            }elseif($res[$equipo][3] != null){
                                ?>
                                <img src="../../build/img/img_icon/<?php if($res[$equipo]){ echo $res[$equipo][3]->img;}?>" class="<?php if($res[$equipo][3]->rareza==4){ echo "g4 iconoequipo";} else if($res[$equipo][3]->rareza==5){ echo "g5 iconoequipo";}?>">
                        <?php
                        }}else{?>
                            <img src="../../build/img/plus.png"> 
                        <?php
                        }
                    ?>
                        
            </a>
        </div>
    </div>
    <main>
        <div class="containerpjs">
            <div class="cont">
                <div class="pj1 pj">
                    <a href="characters?character=1&id_team=<?=$equipo+1?>" class="add">
                    <?php
                        if($res[$equipo][0] == null){
                    ?> 
                    <img src="../../build/img/plus.png" class="plus">
                    <?php 
                        }else{

                            ?>
                     <img src="../../build/img/img_banner/<?php if($res[$equipo]){ echo $res[$equipo][0]->img_Banner;} else{echo "plus.png";}?>" class="<?php if($res[$equipo][0]->rareza==4){ echo "gacha4";} else if($res[$equipo][0]->rareza==5){ echo "gacha5";}?>">
                    <?php
                    } ?>
                    </a>
                </div>
                <div class="pj2 pj">
                    <a href="characters?character=2&id_team=<?=$equipo+1?>" class="add">
                    <?php
                        if($res[$equipo][1] == null){
                    ?> 
                    <img src="../../build/img/plus.png" class="plus">
                    <?php 
                        }else{

                            ?>
                     <img src="../../build/img/img_banner/<?php if($res[$equipo]){ echo $res[$equipo][1]->img_Banner;} else{echo "plus.png";}?>" class="<?php if($res[$equipo][1]->rareza==4){ echo "gacha4";} else if($res[$equipo][1]->rareza==5){ echo "gacha5";}?>">
                    <?php
                    } ?>
                    </a>
                </div>
                <div class="pj3 pj">
                    <a href="characters?character=3&id_team=<?=$equipo+1?>" class="add">
                    <?php
                        if($res[$equipo][2] == null){
                    ?> 
                    <img src="../../build/img/plus.png" class="plus">
                    <?php 
                        }else{

                            ?>
                     <img src="../../build/img/img_banner/<?php if($res[$equipo]){ echo $res[$equipo][2]->img_Banner;} else{echo "plus.png";}?>" class="<?php if($res[$equipo][2]->rareza==4){ echo "gacha4";} else if($res[$equipo][2]->rareza==5){ echo "gacha5";}?>">
                    <?php
                    } ?>
                    </a>
                </div>
                <div class="pj4 pj">
                    <a href="characters?character=4&id_team=<?=$equipo+1?>" class="add">
                    <?php
                        if($res[$equipo][3] == null){
                    ?> 
                    <img src="../../build/img/plus.png" class="plus">
                    <?php 
                        }else{

                            ?>
                     <img src="../../build/img/img_banner/<?php if($res[$equipo]){ echo $res[$equipo][3]->img_Banner;} else{echo "plus.png";}?>" class="<?php if($res[$equipo][3]->rareza==4){ echo "gacha4";} else if($res[$equipo][3]->rareza==5){ echo "gacha5";}?>">
                    <?php
                    } ?>
                    </a>
                </div>
            </div>
        </div>
        <form method="POST"  class="botones">
        <?php if($equipos[0]!=null && $equipos[1]!=null && $equipos[2]!=null && $equipos[3]!=null){?>
            <div class="Borrarequipo">
                <a href="./borrar?id_team=<?= $equipo+1?>" type="submit">Borrar Equipo</a>
            </div>
    <?php } ?>
        </form>

    </main>
    <script src="../../build/js/fondorandom.js"></script>
    <script src="../../build/js/logorandom.js"></script>
</body>
</html>
