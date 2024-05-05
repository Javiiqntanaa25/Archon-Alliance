<?php
    require "./config/databases.php";
    require "./verificator.php";
    redirect(); 
    // require "cerrar_sesion.php";
    $db = conectarBD();
    $UID=$_SESSION['usuario'];
    $posequipo=$_GET['id_team']??null;
    $equipo="";

    if(intval($posequipo)===1){
     $equipo="equipo";
    }elseif(intval($posequipo)===2){
     $equipo= "equipo2";
    }elseif(intval($posequipo)===3){
     $equipo= "equipo3";
    }elseif(intval($posequipo)===4){
     $equipo= "equipo4";
    }

    $per1=preg_split('/[\/]/',$_SESSION[$equipo][0]);
    $bannerpj1 = $per1[2];

    $per2=preg_split('/[\/]/',$_SESSION[$equipo][1]);
    $bannerpj2 = $per2[2];

    $per3=preg_split('/[\/]/',$_SESSION[$equipo][2]);
    $bannerpj3 = $per3[2];

    $per4=preg_split('/[\/]/',$_SESSION[$equipo][3]);
    $bannerpj4 = $per4[2];

    

    $queryactualizar="UPDATE teams SET character1=(SELECT name FROM characters WHERE img_Banner='$bannerpj1'), character2=(SELECT name FROM characters WHERE img_Banner='$bannerpj2'), character3=(SELECT name FROM characters WHERE img_Banner='$bannerpj3'), character4=(SELECT name FROM characters WHERE img_Banner='$bannerpj4') where id_team=$posequipo and player_uid=$UID";
    echo $queryactualizar;
    $queryactualizarequipos=mysqli_query($db, $queryactualizar);
    echo $queryactualizar;
    $ruta1="IMG/img_banner/".$bannerpj1;
    $ruta2="IMG/img_banner/".$bannerpj2;
    $ruta3="IMG/img_banner/".$bannerpj3;
    $ruta4="IMG/img_banner/".$bannerpj4;
    if($queryactualizarequipos){
    if($posequipo==1){
        $_SESSION['equipo']=[$ruta1,$ruta2,$ruta3,$ruta4, 0, 0, 0, 0];
    }
    if($posequipo==2){
        $_SESSION['equipo2']=[$ruta1,$ruta2,$ruta3,$ruta4, 0, 0, 0, 0];
    }
    if($posequipo==3){
        $_SESSION['equipo3']=[$ruta1,$ruta2,$ruta3,$ruta4, 0, 0, 0, 0];
    }
    if($posequipo==4){
        $_SESSION['equipo4']=[$ruta1,$ruta2,$ruta3,$ruta4, 0, 0, 0, 0];
    }
     header("Location: /index.php?id_team=$posequipo");
    }else{
          header("Location: /login.php");
    }

?>