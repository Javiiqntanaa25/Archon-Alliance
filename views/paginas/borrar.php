<?php 
require "./config/databases.php";
require "./verificator.php";
redirect();
$db=conectarBD();

$posequipo=$_GET['id_team']??null;
$UID= $_SESSION["usuario"];

$query= "DELETE from teams where id_team=$posequipo and player_uid=$UID;";
$result=mysqli_query($db,$query);
 
$queryteam1= "SELECT * FROM teams where id_team=1 and player_uid='$sesion';";
$queryteam2= "SELECT * FROM teams where id_team=2 and player_uid='$sesion';";
$queryteam3= "SELECT * FROM teams where id_team=3 and player_uid='$sesion';";
$queryteam4= "SELECT * FROM teams where id_team=4 and player_uid='$sesion';";

$consteam1=mysqli_query($db, $queryteam1);
$consteam2=mysqli_query($db, $queryteam2);
$consteam3=mysqli_query($db, $queryteam3);
$consteam4=mysqli_query($db, $queryteam4);



if($result){
    if($posequipo==1){
        $_SESSION['equipo']=['IMG/plus.png', 'IMG/plus.png', 'IMG/plus.png', 'IMG/plus.png', 0, 0, 0, 0];
    }
    if($posequipo==2){
        $_SESSION['equipo2']=['IMG/plus.png', 'IMG/plus.png', 'IMG/plus.png', 'IMG/plus.png', 0, 0, 0, 0];
    }
    if($posequipo==3){
        $_SESSION['equipo3']=['IMG/plus.png', 'IMG/plus.png', 'IMG/plus.png', 'IMG/plus.png', 0, 0, 0, 0];
    }
    if($posequipo==4){
        $_SESSION['equipo4']=['IMG/plus.png', 'IMG/plus.png', 'IMG/plus.png', 'IMG/plus.png', 0, 0, 0, 0];
    }
     header("Location: ./index.php?id_team=$posequipo");

}