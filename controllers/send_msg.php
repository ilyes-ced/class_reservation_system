<?php
require('../pages/connect.php');

$req = $bdd->prepare('INSERT  INTO  contact(sender,content,date,cell,reciever) VALUES(:v1,:v2,:v3,:v4,:v5)');
$req->execute(array(
  'v1' => $_POST['sender'],
  'v2' => $_POST['msg'],
  'v3' => $_POST['date'],
  'v4' => $_POST['cell'],
  'v5' => $_POST['reciever'],
));

require('../pages/disconnect.php');













?>