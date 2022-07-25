<?php
  
  


require('../pages/connect.php');
   














if($_POST['id'][0]=='c'){
    $req = $bdd->query('UPDATE table_amphi SET '.$_POST['id'].'="/" WHERE datee="'.$_POST['date'].'"');

    $req = $bdd->prepare('DELETE FROM reservations1 WHERE users=:v1 and datee=:v2 and cell=:v3');
    $req->execute(array(
     'v1'=>$_COOKIE['login'],
     'v2'=>$_POST['date'],
     'v3'=>$_POST['id'],
    ));
}elseif($_POST['id'][0]=='b'){
    $req = $bdd->query('UPDATE table_td SET '.$_POST['id'].'="/" WHERE datee="'.$_POST['date'].'"');

    $req = $bdd->prepare('DELETE FROM reservations2 WHERE users=:v1 and datee=:v2 and box=:v3');
    $req->execute(array(
     'v1'=>$_COOKIE['login'],
     'v2'=>$_POST['date'],
     'v3'=>$_POST['id'],
    ));
}elseif($_POST['id'][0]=='s'){
    $req = $bdd->query('UPDATE table_tp SET '.$_POST['id'].'="/" WHERE datee="'.$_POST['date'].'"');

    $req = $bdd->prepare('DELETE FROM reservations3 WHERE users=:v1 and datee=:v2 and square=:v3');
    $req->execute(array(
     'v1'=>$_COOKIE['login'],
     'v2'=>$_POST['date'],
     'v3'=>$_POST['id'],
    ));
}













  

















?>