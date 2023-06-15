<?php

require("../pages/connect.php");

$foto=$bdd->query('select * from users where username="'.$_POST['name2'].'"');

$fotoo=$foto->fetch();
$link=$fotoo['image'];
$mail=$fotoo['email'];


if($link=='none'){
  $image_src='../assets/images/avatar.png';
}else{
  $image_src = "../assets/".$link;
}
        

echo '
  <div class="msg_modal">
  <img   src="'.$image_src.'" />
      <p class="p1">'. $_POST['name2'].'</p>

      <p class="p2">'. $mail.'</p>
  </div>
  <textarea class="msg_box" placeholder="enter message" name="Text1" cols="40" rows="5" autofocus></textarea>
  <button id="send_the_mesg" style="width:100%;" id="send" type="button"  class="btn btn-secondary mt-3">SEND</button>
';

?>