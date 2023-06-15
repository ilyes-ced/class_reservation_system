<?php
  $mm=array();

  $date1=$_POST['date'];

  require('../pages/connect.php');
  $device11='';
  $device22='';
  $device33='';
  $device44='';
   



   array_push($mm,$_POST['de1'],$_POST['de2'],$_POST['de3'],$_POST['de4']);
   $dev=implode('|',$mm); 
  $req = $bdd->prepare('INSERT  INTO  demands(sender,devices,date,cell) VALUES(:v1,:v2,:v3,:v4)');
  $req->execute(array(
    'v1' => $_COOKIE['login'],
    'v2' => $dev,
    'v3' => $_POST['date'],
    'v4' => $_POST['cell'],
  ));
  require('../pages/disconnect.php');





?>