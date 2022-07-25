<?php

require('connect.php');
if(isset($_POST['user'])){


session_start();



$password_hash = password_hash($_POST['pass'], PASSWORD_BCRYPT);

$req = $bdd->prepare('UPDATE users SET username=:v1,email=:v2,password=:v3 WHERE username=:t');
$req->execute(array(
    't' => $_COOKIE['login'],
    'v1' => $_POST['user'],
    'v2' => $_POST['mail'],
    'v3' => $password_hash,
));


 
 $req1 = $bdd->prepare('UPDATE reservations1 SET users=:v1 WHERE users=:v2');
 $req2 = $bdd->prepare('UPDATE reservations2 SET users=:v1 WHERE users=:v2');
 $req3 = $bdd->prepare('UPDATE reservations3 SET users=:v1 WHERE users=:v2');
 $req1->execute(array(
 'v1' => $_POST['user'],
 'v2' => $_COOKIE['login'],
 ));
 $req2->execute(array(
    'v1' => $_POST['user'],
    'v2' => $_COOKIE['login'],
 ));
 $req3->execute(array(
    'v1' => $_POST['user'],
    'v2' => $_COOKIE['login'],
 ));







$req1 = $bdd->query("SELECT number_of_periods FROM time");
$req2 = $bdd->query("SELECT indexes FROM rooms where room='AMPHI ' order by indexes");
$req3 = $bdd->query("SELECT indexes FROM rooms where room='TD ' order by indexes");
$req4 = $bdd->query("SELECT indexes FROM rooms where room='TP ' order by indexes");

$result1 = $req1->fetch();
//$result2 = $req2->fetch();
//$result3 = $req3->fetch();
//$result4 = $req4->fetch();

while($result2=$req2->fetch()){
for($i=1;$i<=$result1['number_of_periods'];$i++){
$gg=$bdd->prepare("UPDATE table_amphi SET cell".($result2['indexes']-1)*$result1['number_of_periods']+$i."=:v1 where cell".($result2['indexes']-1)*$result1['number_of_periods']+$i."=:v2 ");
$gg->execute(array('v1' => $_POST['user'],'v2' => $_COOKIE['login'],));
}
}



while($result2=$req3->fetch()){
for($i=1;$i<=$result1['number_of_periods'];$i++){
$gg=$bdd->prepare("UPDATE table_td SET box".($result2['indexes']-1)*$result1['number_of_periods']+$i."=:v1 where box".($result2['indexes']-1)*$result1['number_of_periods']+$i."=:v2 ");
$gg->execute(array('v1' => $_POST['user'],'v2' => $_COOKIE['login'],));
}
}



while($result2=$req4->fetch()){
for($i=1;$i<=$result1['number_of_periods'];$i++){
$gg=$bdd->prepare("UPDATE table_tp SET square".($result2['indexes']-1)*$result1['number_of_periods']+$i."=:v1 where square".($result2['indexes']-1)*$result1['number_of_periods']+$i."=:v2 ");
$gg->execute(array('v1' => $_POST['user'],'v2' => $_COOKIE['login'],));
}
}






setcookie('login',$_POST['user'],time()+365*24*3600,"/");

$_COOKIE['login']=$_POST['user'];
$_COOKIE['email']=$_POST['mail'];
$_COOKIE['password']=$_POST['pass'];






$this_arr=array();
 $query = $bdd->query("SELECT username,color FROM users");

 while($d=$query->fetch()){
    $this_arr[$d['username']] = $d['color']; 
 }
 setcookie('colors',json_encode($this_arr),time()+365*24*3600,"/");
 $_COOKIE['colors'] = json_encode($this_arr);






unset($_POST['user']);
unset($_POST['pass']);
unset($_POST['mail']);





 require('disconnect.php');

}



if(isset($_POST['but_upload'])){
    $name = $_FILES['file']['name'];
    $target_dir = "../assets/images/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
  
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
    $extensions_arr = array("jpg","jpeg","png","gif");
  
    if( in_array($imageFileType,$extensions_arr) ){
       
       if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
      
  $bdd->query("UPDATE  users SET image='".$target_file."' where username='".$_COOKIE['login']."'");
  
         
       }
  
    }
    require('disconnect.php');

  }
  
header("Refresh:0; url=my_profile_page");
?>