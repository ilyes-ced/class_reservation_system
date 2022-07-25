<?php
    require('../pages/connect.php');

    



    
    if($_POST['id'][0]=='c'){
      $tname='table_amphi';$rname='reservations1';
    }elseif($_POST['id'][0]=='b'){
      $tname='table_td';$rname='reservations2';
    }elseif($_POST['id'][0]=='s'){
      $tname='table_tp';$rname='reservations3';
    }


    
    $req = $bdd->prepare('INSERT  INTO  '.$rname.' VALUES(:v1,:v2,:v3,:v4,:v5,:v6,:v7)');
    $req->execute(array(
      'v1' =>  $_POST['name'],
      'v2' => $_POST['date'],
      'v3' => $_POST['id'],
      'v4' => $_POST['de1'],
      'v5' => $_POST['de2'],
      'v6' => $_POST['de3'],
      'v7' => $_POST['de4'],
    ));




    $req = $bdd->prepare('UPDATE '.$tname.' SET '.$_POST['id'].'=:v1 WHERE datee= :v0');
    $req->execute(array(
      'v0' => $_POST['date'],
      'v1' => $_POST['name'],
    ));        
    require('../pages/disconnect.php');

    









    





unset($_POST['name']);
unset($_POST['date']);
unset($_POST['id']);
unset($_POST['de1']);
unset($_POST['de2']);
unset($_POST['de3']);
unset($_POST['de4']);



















































?>