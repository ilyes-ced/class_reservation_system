<?php
$user =  $_COOKIE['login'];


error_reporting(0);
ini_set('display_errors', 0);



if(isset($_POST['change_mode'])){

  
  if($_COOKIE['mode']=='light'){
    setcookie('mode','dark',time()+365*24*3600,'/');
    $_COOKIE['mode']='dark';
  }elseif($_COOKIE['mode']=='dark'){
    setcookie('mode','light',time()+365*24*3600,'/');
    $_COOKIE['mode']='light';
  }else{
    setcookie('mode','dark',time()+365*24*3600,'/');
    $_COOKIE['mode']='dark';
  }
}
if(isset($_COOKIE['mode'])){}else{$_COOKIE['mode']='dark';}







if($_COOKIE['mode']=='dark'){
  $colorcolor='rgb(32,33,37)';

  $txt='white';
}else{
  $colorcolor='rgb(240,240,240)';
  $txt='black';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/fafa.png">

    <link rel="stylesheet" href="../assets/css/bootstrap-icons.css" >


    

<script src="../assets/js/chart.min.js"></script>  


<script src="../assets/js/jquery-3.6.0.min.js"></script>


    <link rel="stylesheet" href="../assets/styles/style_stats.php" >
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="../assets/css/bootstrap.css" >
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">





</head>

<body class="light">


  <nav class="navbar navbar-expand-lg navbar-light">
    <div class=" container">
    <img src="../assets/images/logo-black.png" class="navbar-brand"  href="hero_page.html"></img>
    <button  style="border:  0px solid;"  class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <?php 
if($_COOKIE['mode']=='light'){
  echo '<i class="bi bi-list " style="font-size:30px; margin:0px !important;"></i>';
}else{
  echo '<i class="bi bi-list" style="font-size:30px;color:rgb(200,200,200);text-align:center !important;margin:0px !important;"></i>';
}
    ?>     </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <?php
        if(isset($_COOKIE['admin'])){
          echo'<a class="nav-link active" aria-current="page" href="all_reservation_admin">Home</a>';
        }else{
          echo'<a class="nav-link active" aria-current="page" href="all_reservation_page">Home</a>';
        }
        ?>           </li>
       
        
        <li class="nav-item">
            <a class="nav-link" href="my_reservation_page">My Reservations</a>
        </li>
      
        
       
        
      <li class="nav-item">
    
      <?php
     require('connect.php');
       if(isset($_COOKIE['admin'])){
      
        
        
        $req = $bdd->query('SELECT * FROM demands');
      
        $number_of_rows = $req->Rowcount(); 
        if($number_of_rows==0){
               echo '<li class="nav-item">
                    <a class="nav-link" href="demande">DEMANDS</a>
                </li>';}else{echo '<li class="nav-item">
                  <a style="color: rgb(248,72,56) !important;" class="nav-link" href="demande">DEMANDS<span style="background-color:rgb(248,72,56) !important;" class="badge rounded-circle bg-danger">'.$number_of_rows.'</span></a>
              </li>';}
            }
        
$req = $bdd->prepare('SELECT * FROM contact WHERE reciever=:v');
$req->execute(array(
 'v'=>$_COOKIE['login'],
));

$number_of_rows = $req->Rowcount(); 
if($number_of_rows==0){
       echo '<li class="nav-item">
            <a class="nav-link" href="msg">REQUESTS</a>
        </li>';}else{echo '<li class="nav-item">
          <a style="color: rgb(248,72,56) !important;" class="nav-link" href="msg">REQUESTS<span style="background-color:rgb(248,72,56) !important;" class="badge rounded-circle bg-danger">'.$number_of_rows.'</span></a>
      </li>';}
      
     


        $req = $bdd->query("select image from users where username='".$_COOKIE['login']."'");


$row = $req->fetch();

if($row['image']=='none'){
  $image_src='images/avatar.png';
}else{
$image_src = $row['image'];}
require('disconnect.php');


?>
<script>
  
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

  </script>

<li class="nav-item jj">
        
        <img   class="ll cir nav-link" src='../assets/<?php echo $image_src;  ?>' />
      
       
        
      </li>
      <li class="nav-item jj">
        
        <a   href='' class="mm nav-link active "><?php echo $_COOKIE['login'];?> </a>
      
    
      </li>
   <li class="nav-item jj">
 

<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">
  <?php
if($_COOKIE['mode']=='light'){
  echo ' <svg id="hhjj" width="24px" height="24px" fill="black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <g>
      <path fill="none" d="M0 0h24v24H0z"/>
      <path d="M12 14l-4-4h8z"/>
  </g>
</svg>';
}else{
  echo ' <svg id="hhjj" width="24px" height="24px" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <g>
      <path fill="none" d="M0 0h24v24H0z"/>
      <path d="M12 14l-4-4h8z"/>
  </g>
</svg>';
}
?></button>
  <div id="myDropdown" class="dropdown-content">

  <?php
if($_COOKIE['mode']=='light'){

   echo'<a href="#" id="change_the_mode"><i class="bi bi-moon"></i>dark mode</a>';
  }else{
    echo'<a href="#" id="change_the_mode"><i class="bi bi-sun"></i>light mode</a>';

  }
  ?> 
  <span class="devider"></span>
  <a class="nav-link" href="my_profile_page"><i class="bi bi-person"></i>profile</a>
  <span class="devider"></span>

<a class="nav-link ww" href="stats"><i class="bi bi-graph-up"></i>
statistics</a>

  <span class="devider"></span>
  
  <?php
   if(isset($_COOKIE['admin'])){
     echo '          <a class="nav-link" href="settings2"><i class="bi bi-gear"></i>settings</a>
     <span class="devider"></span> ';
   }?>
  <form id='logout_form' action='delete_user_info' id="ninja" method="post" >
          <a id='logout' class="nav-link" href="#" onclick="document.getElementById('logout_form').submit()"><i class="bi bi-box-arrow-right"></i>logout</a>
          </form>
   
  </div>
</div>



      </li>
        </ul>
        
    </div>
    </div>
</nav>





<form action='stats' id="mode_hidden_form" method="post">
  <input type="hidden" id="some_some" name="change_mode" required/>

</form>

















<div class="container mt-5">
  







<?php
$my_res=array();

require('connect.php');

$time=$bdd->query('SELECT * from time');
$time=$time->fetch();
$my_amphis=$bdd->query('SELECT * from reservations1 where users="'.$_COOKIE['login'].'"');
$my_tds=$bdd->query('SELECT * from reservations2 where users="'.$_COOKIE['login'].'"');
$my_tps=$bdd->query('SELECT * from reservations3 where users="'.$_COOKIE['login'].'"');



$n_amphi=0;
$n_td=0;
$n_tp=0;

while($f=$my_amphis->fetch()){
  $ind= (int) filter_var($f['cell'], FILTER_SANITIZE_NUMBER_INT);  

  $room='CLASS TD '.ceil(($ind/$time['number_of_periods']));

  array_push($my_res,$room);

  $n_amphi++;
  
}
while($f=$my_tds->fetch()){
  $ind= (int) filter_var($f['box'], FILTER_SANITIZE_NUMBER_INT);  

  $room='CLASS TD '.ceil(($ind/$time['number_of_periods']));

  array_push($my_res,$room);

  $n_td++;
}
while($f=$my_tps->fetch()){
  $ind= (int) filter_var($f['square'], FILTER_SANITIZE_NUMBER_INT);  

  $room='CLASS TD '.ceil(($ind/$time['number_of_periods']));

  array_push($my_res,$room);

  $n_tp++;
}

$mine_types[]=$n_amphi;
$mine_types[]=$n_td;
$mine_types[]=$n_tp;
$mine_types2[]='amphis';
$mine_types2[]='td classes';
$mine_types2[]='tp classes';




































































































































function hex2rgb( $color ) {

  if ($color[0] == '#') {
      $color = substr($color, 1);
  }
  list($r, $g, $b) = array_map("hexdec", str_split($color, (strlen( $color ) / 3)));
  return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}




$array_us2=array();
$array_us3=array();
$cols_q=$bdd->query('SELECT * from users ');

while($rr=$cols_q->fetch()){
$array_us2[$rr['username']]='rgb('.hex2rgb($rr['color'])['red'].','.hex2rgb($rr['color'])['green'].','.hex2rgb($rr['color'])['blue'].')';
$array_us3[$rr['username']]='rgb('.hex2rgb($rr['color'])['red'].','.hex2rgb($rr['color'])['green'].','.hex2rgb($rr['color'])['blue'].')';
$array_us30[$rr['username']]='rgb('.hex2rgb($rr['color'])['red'].','.hex2rgb($rr['color'])['green'].','.hex2rgb($rr['color'])['blue'].',0.5)';

}





$n_amphi=0;
$n_td=0;
$n_tp=0;


$array_us=array();
$array_ppl_am=array();
$array_ppl_td=array();
$array_ppl_tp=array();

$kk=$bdd->query('SELECT username from users');

$us1=$bdd->query('SELECT users from reservations1');
$us2=$bdd->query('SELECT users from reservations2');
$us3=$bdd->query('SELECT users from reservations3');


$all_amphis2=$bdd->query('SELECT * from reservations1');
$all_tds2=$bdd->query('SELECT * from reservations2');
$all_tps2=$bdd->query('SELECT * from reservations3');


while($f=$kk->fetch()){
$array_us[$f['username']]=0;
$array_ppl_am[$f['username']]=0;
$array_ppl_td[$f['username']]=0;
$array_ppl_tp[$f['username']]=0;


}





while($f=$all_amphis2->fetch()){
  $array_us[$f['users']]++;
  $array_ppl_am[$f['users']]++;
}
while($f=$all_tds2->fetch()){
  $array_us[$f['users']]++;
  $array_ppl_td[$f['users']]++;
}
while($f=$all_tps2->fetch()){

  $array_us[$f['users']]++;
  $array_ppl_tp[$f['users']]++;

 
}








foreach($array_us as $key => $value) {

  $all_types[]=$value;
  $all_types2[]=$key;
  $all_types3[]=$array_us2[$key];
  $all_types4[]=$array_us3[$key];
  $all_types5[]=$array_us30[$key];

}





foreach($array_ppl_am as $key => $value) {
//echo $key." ".$value.'a<br/>';
  $arar[]=$value;
 
}
foreach($array_ppl_td as $key => $value) {
  //echo $key." ".$value.'d<br/>';
  $arar2[]=$value;
  
}
foreach($array_ppl_tp as $key => $value) {
// echo $key." ".$value.'p<br/>';
 
  $arar3[]=$value;

  
}

$lbl =array();
$psg =array();
$colis =array();
$colis2 =array();
for($i=0;$i<count($arar);$i++){

  array_push($psg,$arar[$i],$arar2[$i],$arar3[$i]);
  array_push($lbl,'amphi','td','tp');
  array_push($colis, 'rgb(255,127,80,0.1) ','rgb(019,112,214,0.1)','rgb(218,112,214, 0.1)');

  //array_push($colis, 'rgb(255,127,80)','rgb(019,112,214)','rgb(218,112,214)');
  array_push($colis2, 'rgb(255,127,80) ','rgb(019,112,214)','rgb(218,112,214)');

}


//for back solid and biorders none
/*

  array_push($psg,$arar[$i],$arar2[$i],$arar3[$i]);
  array_push($lbl,'amphi','td','tp');
  array_push($colis, $colorcolor,$colorcolor,$colorcolor);

  //array_push($colis, 'rgb(255,127,80)','rgb(019,112,214)','rgb(218,112,214)');
  array_push($colis2, 'rgb(255,127,80) ','rgb(019,112,214)','rgb(218,112,214)');
  */



/*

  array_push($psg,$arar[$i],$arar2[$i],$arar3[$i]);
  array_push($lbl,'amphi','td','tp');
  array_push($colis, 'rgb(255,127,80,0.1) ','rgb(019,112,214,0.1)','rgb(218,112,214, 0.1)');

  //array_push($colis, 'rgb(255,127,80)','rgb(019,112,214)','rgb(218,112,214)');
  array_push($colis2, 'rgb(255,127,80,0.1) ','rgb(019,112,214,0.1)','rgb(218,112,214, 0.1)');

*/































































































$rooms_res1=array();
$rooms_res2=array();
$rooms_res3=array();
$ll=$bdd->query('SELECT * from time');
$result=$ll->fetch();
$rooms=$bdd->query('SELECT * from rooms order by room,indexes');
$ress=$bdd->query('SELECT * from reservations1 union SELECT * from reservations2 union SELECT * from reservations3');
while($gg=$rooms->fetch()){


if($gg['room']=='AMPHI '){
  $rooms_res1[$gg['room'].$gg['indexes']]=0;

}elseif($gg['room']=='TD '){
  $rooms_res2[$gg['room'].$gg['indexes']]=0;

}elseif($gg['room']=='TP '){
  $rooms_res3[$gg['room'].$gg['indexes']]=0;

}


}


while($gg=$ress->fetch()){



  if(isset($gg['cell'])){
    $cell= $gg['cell'];
    }
    if(isset($gg['box'])){
    $cell= $gg['box'];
    }
    if(isset($gg['square'])){
    $cell= $gg['square'];
    }



  $ind= (int) filter_var($cell, FILTER_SANITIZE_NUMBER_INT);  

   
  if($ind%$result['number_of_periods']==0){
   $time=$result['period'.$result['number_of_periods']];
 }else{ 
   $time=$result['period'.$ind%$result['number_of_periods']];
 }
 
 
 if($cell[0]=='c'){
   $room='AMPHI '.ceil(($ind/$result['number_of_periods']));

   $rooms_res1[$room]++;
 }elseif($cell[0]=='b'){
   $room='TD '.ceil(($ind/$result['number_of_periods']));

   $rooms_res2[$room]++;
 }elseif($cell[0]=='s'){
   $room='TP '.ceil(($ind/$result['number_of_periods']));

   $rooms_res3[$room]++;
 }










}






foreach($rooms_res1 as $key => $value) {
  $lm3=str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);;
 $lm= 'rgb('.hex2rgb($lm3)['red'].','.hex2rgb($lm3)['green'].','.hex2rgb($lm3)['blue'].')';
 $lm2= 'rgb('.hex2rgb($lm3)['red'].','.hex2rgb($lm3)['green'].','.hex2rgb($lm3)['blue'].')';


  $room_res1f[]=$key;
  $room_res2[]=$value;
  $room_res3[]=$lm;
  $room_res4[]=$lm2;
  //echo $key ."=>". $value."<br/>";


}



foreach($rooms_res2 as $key => $value) {
  $lm3=str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);;
 $lm= 'rgb('.hex2rgb($lm3)['red'].','.hex2rgb($lm3)['green'].','.hex2rgb($lm3)['blue'].')';
 $lm2= 'rgb('.hex2rgb($lm3)['red'].','.hex2rgb($lm3)['green'].','.hex2rgb($lm3)['blue'].')';


  $room_res11f[]=$key;
  $room_res22[]=$value;
  $room_res33[]=$lm;
  $room_res44[]=$lm2;
  //echo $key ."=>". $value."<br/>";


}








foreach($rooms_res3 as $key => $value) {
  $lm3=str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);;
 $lm= 'rgb('.hex2rgb($lm3)['red'].','.hex2rgb($lm3)['green'].','.hex2rgb($lm3)['blue'].')';
 $lm2= 'rgb('.hex2rgb($lm3)['red'].','.hex2rgb($lm3)['green'].','.hex2rgb($lm3)['blue'].')';
 $room_res333[]=$lm;
  $room_res444[]=$lm2;

  $room_res111f[]=$key;
  $room_res222[]=$value;
 
  //echo $key ."=>". $value."<br/>";


}






























$array_users_amphi=array();
$array_users_td=array();
$array_users_atp=array();

$users=$bdd->query('SELECT * from users');

while($fgh=$users->fetch()){
  $array_users_amphi[$fgh['username']]=0;
  $array_users_td[$fgh['username']]=0;
  $array_users_atp[$fgh['username']]=0;
}





$res_types=$bdd->query('SELECT * from reservations1 union SELECT * from reservations2 union SELECT * from reservations3');






while($fgh=$ress->fetch()){



  if(isset($fgh['cell'])){
    $cell= $fgh['cell'];
    }
    if(isset($fgh['box'])){
    $cell= $fgh['box'];
    }
    if(isset($fgh['square'])){
    $cell= $fgh['square'];
    }



  $ind= (int) filter_var($cell, FILTER_SANITIZE_NUMBER_INT);  

   

 
 if($cell[0]=='c'){
   $room='AMPHI '.ceil(($ind/$result['number_of_periods']));
 }elseif($cell[0]=='b'){
   $room='TD '.ceil(($ind/$result['number_of_periods']));
 }elseif($cell[0]=='s'){
   $room='TP '.ceil(($ind/$result['number_of_periods']));
 }









  

}













































$krkr=array();



$tt=$bdd->query('SELECT * from time');
$time_pers=$tt->fetch();


if(isset($time_pers['period1'])){$krkr[$time_pers['period1']]=0;}
if(isset($time_pers['period2'])){$krkr[$time_pers['period2']]=0;}
if(isset($time_pers['period3'])){$krkr[$time_pers['period3']]=0;}
if(isset($time_pers['period4'])){$krkr[$time_pers['period4']]=0;}
if(isset($time_pers['period5'])){$krkr[$time_pers['period5']]=0;}
if(isset($time_pers['period6'])){$krkr[$time_pers['period6']]=0;}
if(isset($time_pers['period7'])){$krkr[$time_pers['period7']]=0;}
if(isset($time_pers['period8'])){$krkr[$time_pers['period8']]=0;}



$resres=$bdd->query('SELECT * from reservations1 union SELECT * from reservations2 union SELECT * from reservations3');



while($ghj=$resres->fetch()){





  if(isset($ghj['cell'])){
    $cell= $ghj['cell'];
    }
    if(isset($ghj['box'])){
    $cell= $ghj['box'];
    }
    if(isset($ghj['square'])){
    $cell= $ghj['square'];
    }



  $ind= (int) filter_var($cell, FILTER_SANITIZE_NUMBER_INT);  



  if($ind%$time_pers['number_of_periods']==0){
    $time=$time_pers['period'.$time_pers['number_of_periods']];
  }else{ 
    $time=$time_pers['period'.$ind%$time_pers['number_of_periods']];
  }


//echo $time;

if(isset($time_pers['period1'])){if($time==$time_pers['period1']){$krkr[$time_pers['period1']]++;}}
if(isset($time_pers['period2'])){if($time==$time_pers['period2']){$krkr[$time_pers['period2']]++;}}
if(isset($time_pers['period3'])){if($time==$time_pers['period3']){$krkr[$time_pers['period3']]++;}}
if(isset($time_pers['period4'])){if($time==$time_pers['period4']){$krkr[$time_pers['period4']]++;}}
if(isset($time_pers['period5'])){if($time==$time_pers['period5']){$krkr[$time_pers['period5']]++;}}
if(isset($time_pers['period6'])){if($time==$time_pers['period6']){$krkr[$time_pers['period6']]++;}}
if(isset($time_pers['period7'])){if($time==$time_pers['period7']){$krkr[$time_pers['period7']]++;}}
if(isset($time_pers['period8'])){if($time==$time_pers['period8']){$krkr[$time_pers['period8']]++;}}



}


foreach($krkr as $key => $value) {
  $kk1=str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);;
  $kk= 'rgb('.hex2rgb($kk1)['red'].','.hex2rgb($kk1)['green'].','.hex2rgb($kk1)['blue'].')';
  $kk2= 'rgb('.hex2rgb($kk1)['red'].','.hex2rgb($kk1)['green'].','.hex2rgb($kk1)['blue'].')';
  $kmkm[]=$kk;
   $kmkm2[]=$kk2;



  $srsr[]=$key;
  $srsr2[]=$value;

 // echo $key ."=>". $value."<br/>";


 
}










































$krkr=array();



$tt=$bdd->query('SELECT * from time');
$time_pers=$tt->fetch();


if(isset($time_pers['period1'])){$krkr[$time_pers['period1']]=0;}
if(isset($time_pers['period2'])){$krkr[$time_pers['period2']]=0;}
if(isset($time_pers['period3'])){$krkr[$time_pers['period3']]=0;}
if(isset($time_pers['period4'])){$krkr[$time_pers['period4']]=0;}
if(isset($time_pers['period5'])){$krkr[$time_pers['period5']]=0;}
if(isset($time_pers['period6'])){$krkr[$time_pers['period6']]=0;}
if(isset($time_pers['period7'])){$krkr[$time_pers['period7']]=0;}
if(isset($time_pers['period8'])){$krkr[$time_pers['period8']]=0;}



$resres=$bdd->query('SELECT * from reservations1 where users="'.$_COOKIE['login'].'" union SELECT * from reservations2 where users="'.$_COOKIE['login'].'" union SELECT * from reservations3 where users="'.$_COOKIE['login'].'"');



while($ghj=$resres->fetch()){





  if(isset($ghj['cell'])){
    $cell= $ghj['cell'];
    }
    if(isset($ghj['box'])){
    $cell= $ghj['box'];
    }
    if(isset($ghj['square'])){
    $cell= $ghj['square'];
    }



  $ind= (int) filter_var($cell, FILTER_SANITIZE_NUMBER_INT);  



  if($ind%$time_pers['number_of_periods']==0){
    $time=$time_pers['period'.$time_pers['number_of_periods']];
  }else{ 
    $time=$time_pers['period'.$ind%$time_pers['number_of_periods']];
  }


//echo $time;


if(isset($time_pers['period1'])){if($time==$time_pers['period1']){$krkr[$time_pers['period1']]++;}}
if(isset($time_pers['period2'])){if($time==$time_pers['period2']){$krkr[$time_pers['period2']]++;}}
if(isset($time_pers['period3'])){if($time==$time_pers['period3']){$krkr[$time_pers['period3']]++;}}
if(isset($time_pers['period4'])){if($time==$time_pers['period4']){$krkr[$time_pers['period4']]++;}}
if(isset($time_pers['period5'])){if($time==$time_pers['period5']){$krkr[$time_pers['period5']]++;}}
if(isset($time_pers['period6'])){if($time==$time_pers['period6']){$krkr[$time_pers['period6']]++;}}
if(isset($time_pers['period7'])){if($time==$time_pers['period7']){$krkr[$time_pers['period7']]++;}}
if(isset($time_pers['period8'])){if($time==$time_pers['period8']){$krkr[$time_pers['period8']]++;}}



}


foreach($krkr as $key => $value) {
  $kk1=str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);;
  $kk= 'rgb('.hex2rgb($kk1)['red'].','.hex2rgb($kk1)['green'].','.hex2rgb($kk1)['blue'].',0.1)';
  $kk2= 'rgb('.hex2rgb($kk1)['red'].','.hex2rgb($kk1)['green'].','.hex2rgb($kk1)['blue'].')';
  $kmkm[]=$kk;
   $kmkm2[]=$kk2;



  $srsrff[]=$key;
  $srsr2ff[]=$value;

 // echo $key ."=>". $value."<br/>";


 
}




















































$days_ar['Sunday']=0;
$days_ar['Monday']=0;
$days_ar['Tuesday']=0;
$days_ar['Wednesday']=0;
$days_ar['Thursday']=0;
$days_ar['Friday']=0;
$days_ar['Saturday']=0;



$resvs=$bdd->query('SELECT * from reservations1  union SELECT * from reservations2 union SELECT * from reservations3');

while($lll=$resvs->fetch()){

  $timestamp = strtotime($lll['datee']);

 $days_ar[date('l', $timestamp )]++;

 

 

}









foreach($days_ar as $key => $value) {


  $rrr1=str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);;
 // $rrr= 'rgb('.hex2rgb($rrr1)['red'].','.hex2rgb($rrr1)['green'].','.hex2rgb($rrr1)['blue'].',0.1)';
  $rrr2= 'rgb('.hex2rgb($rrr1)['red'].','.hex2rgb($rrr1)['green'].','.hex2rgb($rrr1)['blue'].')';
 
 
  //$re1=[' rgb(113, 105, 190)','rgb(241, 231, 1) ','rgb(168, 18, 165,0.3)','rgb(58, 192, 106,0.3) ','rgb(69, 126, 21,0.3)  ','rgb(55, 163, 241,0.3)','rgb(80, 26, 177,0.3)'];
   /*$re2=['','','','','','',''];*/



  $klm[]=$key;
  $klm2[]=$value;
  $re1[]=$rrr2;
 // echo $key ."=>". $value."<br/>";


 
}










































$days_ar11['Sunday']=0;
$days_ar11['Monday']=0;
$days_ar11['Tuesday']=0;
$days_ar11['Wednesday']=0;
$days_ar11['Thursday']=0;
$days_ar11['Friday']=0;
$days_ar11['Saturday']=0;



$resvs11=$bdd->query('SELECT * from reservations1  where users="'.$_COOKIE['login'].'" union SELECT * from reservations2  where users="'.$_COOKIE['login'].'" union SELECT * from reservations3  where users="'.$_COOKIE['login'].'"');

while($lll=$resvs11->fetch()){

  $timestamp = strtotime($lll['datee']);

 $days_ar11[date('l', $timestamp )]++;

 
 


}









foreach($days_ar11 as $key => $value) {

/*
  $rrr1=str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);;
  $rrr= 'rgb('.hex2rgb($rrr1)['red'].','.hex2rgb($rrr1)['green'].','.hex2rgb($rrr1)['blue'].',0.1)';
  $rrr2= 'rgb('.hex2rgb($rrr1)['red'].','.hex2rgb($rrr1)['green'].','.hex2rgb($rrr1)['blue'].')';
 */
 
  //$re111=[' rgb(113, 105, 190)','rgb(241, 231, 1) ','rgb(168, 18, 165)','rgb(58, 192, 106) ','rgb(69, 126, 21)  ','rgb(55, 163, 241)','rgb(80, 26, 177)'];
   /*$re2=['','','','','','',''];*/



  $klm11[]=$key;
  $klm211[]=$value;
  $re111=$re1;
 // echo $key ."=>". $value."<br/>";


 
}






































































$ffd= date('Y-m-d');


$before_year = date('Y-m-d', strtotime($ffd . ' -1 year'));
$before_month = date('Y-m-d', strtotime($ffd . ' -1 month'));
$before_week = date('Y-m-d', strtotime($ffd . ' -7 day'));








$resvs=$bdd->query('SELECT * from reservations1 where datee<="'.$ffd.'"  union SELECT * from reservations2 where datee<="'.$ffd.'"  union SELECT * from reservations3 where datee<="'.$ffd.'" order by datee ');




while($lll=$resvs->fetch()){
  
  $array_date[$lll['datee']]=0;
  $array_a[$lll['datee']]=0;
  $array_d[$lll['datee']]=0;
  $array_p[$lll['datee']]=0;


}

$resvs=$bdd->query('SELECT * from reservations1 where datee<="'.$ffd.'" order by datee');
$resvs2=$bdd->query('SELECT * from reservations2 where datee<="'.$ffd.'" order by datee');
$resvs3=$bdd->query('SELECT * from reservations3 where datee<="'.$ffd.'" order by datee');





while($gge=$resvs->fetch()){
/*
  echo $gge['cell'];
  echo $gge['box'];
  echo $gge['square'];
*/

  $array_date[$gge['datee']]++;


  
    $cell= $gge['cell'];
    $array_a[$gge['datee']]++;

}





while($gge=$resvs2->fetch()){

    $array_date[$gge['datee']]++;
 
    
$cell= $gge['box'];
$array_d[$gge['datee']]++;


  }
  
  
  while($gge=$resvs3->fetch()){
   
    
      $array_date[$gge['datee']]++;
    



      $cell= $gge['square'];
      $array_p[$gge['datee']]++;
      
      
    }
    
    
foreach($array_date as $key => $value) {
$dte[]=$key;
$dte2[]=$value;

  //echo $key ."=>". $value."<br/>";
}
//echo '<br/>';
foreach($array_a as $key => $value) {
  $amp[]=$key;
  $amp2[]=$value;
 // echo $key ."=>". $value."<br/>";
}
//echo '<br/>';
foreach($array_d as $key => $value) {
  $td[]=$key;
  $td2[]=$value;

  //echo $key ."=>". $value."<br/>";
}
//echo '<br/>';
foreach($array_p as $key => $value) {
  $tp[]=$key;
  $tp2[]=$value;

 // echo $key ."=>". $value."<br/>";
}


$dayss=[


  date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -11 month')),) ),
  date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -10 month')),) ),
  date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -9 month')),) ),
  date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -8 month')),) ),
  date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -7 month')),) ),
  date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -6 month')),) ),
  date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -5 month')),) ),
  date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -4 month')),) ),
  date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -3 month')),) ),
  date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -2 month')),) ),
  date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -1 month')),) ),
  date('m',strtotime($ffd) ),
    ];
    
  





$resvs=$bdd->query('SELECT * from reservations1  where datee>="'.$before_year.'" and  datee<="'.$ffd.'" union SELECT * from reservations2  where datee>"'.$before_year.'" and  datee<="'.$ffd.'"  union SELECT * from reservations3 where datee>"'.$before_year.'" and  datee<="'.$ffd.'" ');




for($i=0;$i<count($dayss);$i++){
  

  $array_date2[$dayss[$i]]=0;
  $array_a2[$dayss[$i]]=0;
  $array_d2[$dayss[$i]]=0;
  $array_p2[$dayss[$i]]=0;


}
$resvs=$bdd->query('SELECT * from reservations1 where datee>="'.$before_year.'" and  datee<="'.$ffd.'"  order by datee');
$resvs2=$bdd->query('SELECT * from reservations2 where datee>="'.$before_year.'" and  datee<="'.$ffd.'"  order by datee');
$resvs3=$bdd->query('SELECT * from reservations3 where datee>="'.$before_year.'" and   datee<="'.$ffd.'"  order by datee');





while($gge=$resvs->fetch()){
/*
  echo $gge['cell'];
  echo $gge['box'];
  echo $gge['square'];
*/

  $array_date2[date('m',strtotime($gge['datee']) )]++;


  
    $cell= $gge['cell'];
    $array_a2[date('m',strtotime($gge['datee']) )]++;

}





while($gge=$resvs2->fetch()){

    $array_date2[date('m',strtotime($gge['datee']) )]++;
 
    
$cell= $gge['box'];
$array_d2[date('m',strtotime($gge['datee']) )]++;


  }
  
  
  while($gge=$resvs3->fetch()){
   
    
      $array_date2[date('m',strtotime($gge['datee']) )]++;
    



      $cell= $gge['square'];
      $array_p2[date('m',strtotime($gge['datee']) )]++;
      
      
    }
    
    









    $dtedte=[
      


        date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -11 month')),) ),
        date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -10 month')),) ),
        date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -9 month')),) ),
        date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -8 month')),) ),
        date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -7 month')),) ),
        date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -6 month')),) ),
        date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -5 month')),) ),
        date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -4 month')),) ),
        date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -3 month')),) ),
        date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -2 month')),) ),
        date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -1 month')),) ),
        date('F',strtotime($ffd) ),
      ];
      
  


foreach($array_date2 as $key => $value) {
//$dtedte[]=$key;
$dte2dte2[]=$value;

  //echo $key ."=>". $value."<br/>";
}
//echo '<br/>';
foreach($array_a2 as $key => $value) {
  $ampamp[]=$key;
  $amp2amp2[]=$value;
 // echo $key ."=>". $value."<br/>";
}
//echo '<br/>';
foreach($array_d2 as $key => $value) {
  $tdtd[]=$key;
  $td2td2[]=$value;

  //echo $key ."=>". $value."<br/>";
}
//echo '<br/>';
foreach($array_p2 as $key => $value) {
  $tptp[]=$key;
  $tp2tp2[]=$value;

 // echo $key ."=>". $value."<br/>";
}



$resvs=$bdd->query('SELECT * from reservations1  where datee>="'.$before_month.'" and  datee<="'.$ffd.'" union SELECT * from reservations2  where datee>"'.$before_month.'" and  datee<="'.$ffd.'" union SELECT * from reservations3 where datee>"'.$before_month.'"  and  datee<="'.$ffd.'"');




$dayss=[

  date('Y-m-d', strtotime($ffd . ' -31 day')),
  date('Y-m-d', strtotime($ffd . ' -30 day')),
  date('Y-m-d', strtotime($ffd . ' -29 day')),
  date('Y-m-d', strtotime($ffd . ' -28 day')),
  date('Y-m-d', strtotime($ffd . ' -27 day')),
  date('Y-m-d', strtotime($ffd . ' -26 day')),
  date('Y-m-d', strtotime($ffd . ' -25 day')),
  date('Y-m-d', strtotime($ffd . ' -24 day')),
  date('Y-m-d', strtotime($ffd . ' -23 day')),
  date('Y-m-d', strtotime($ffd . ' -22 day')),
  date('Y-m-d', strtotime($ffd . ' -21 day')),
  date('Y-m-d', strtotime($ffd . ' -20 day')),
  date('Y-m-d', strtotime($ffd . ' -19 day')),
  date('Y-m-d', strtotime($ffd . ' -18 day')),
  date('Y-m-d', strtotime($ffd . ' -17 day')),
  date('Y-m-d', strtotime($ffd . ' -16 day')),
  date('Y-m-d', strtotime($ffd . ' -15 day')),
  date('Y-m-d', strtotime($ffd . ' -14 day')),
  date('Y-m-d', strtotime($ffd . ' -13 day')),
  date('Y-m-d', strtotime($ffd . ' -12 day')),
  date('Y-m-d', strtotime($ffd . ' -11 day')),
  date('Y-m-d', strtotime($ffd . ' -10 day')),
  date('Y-m-d', strtotime($ffd . ' -9 day')),
  date('Y-m-d', strtotime($ffd . ' -8 day')),
  date('Y-m-d', strtotime($ffd . ' -7 day')),
  date('Y-m-d', strtotime($ffd . ' -6 day')),
  date('Y-m-d', strtotime($ffd . ' -5 day')),
  date('Y-m-d', strtotime($ffd . ' -4 day')),
  date('Y-m-d', strtotime($ffd . ' -3 day')),
  date('Y-m-d', strtotime($ffd . ' -2 day')),
  date('Y-m-d', strtotime($ffd . ' -1 day')),
  $ffd,
  ];
  

  for($i=0;$i<count($dayss);$i++){


  $array_date3[$dayss[$i]]=0;
  $array_a3[$dayss[$i]]=0;
  $array_d3[$dayss[$i]]=0;
  $array_p3[$dayss[$i]]=0;


}

$resvs=$bdd->query('SELECT * from reservations1 where datee>="'.$before_month.'" and  datee<="'.$ffd.'" order by datee');
$resvs2=$bdd->query('SELECT * from reservations2 where datee>="'.$before_month.'" and  datee<="'.$ffd.'" order by datee');
$resvs3=$bdd->query('SELECT * from reservations3 where datee>="'.$before_month.'" and  datee<="'.$ffd.'" order by datee');




while($gge=$resvs->fetch()){
/*
  echo $gge['cell'];
  echo $gge['box'];
  echo $gge['square'];
*/

  $array_date3[$gge['datee']]++;


  
    $cell= $gge['cell'];
    $array_a3[$gge['datee']]++;

}





while($gge=$resvs2->fetch()){

    $array_date3[$gge['datee']]++;
 
    
$cell= $gge['box'];
$array_d3[$gge['datee']]++;


  }
  
  
  while($gge=$resvs3->fetch()){
   
    
      $array_date3[$gge['datee']]++;
    



      $cell= $gge['square'];
      $array_p3[$gge['datee']]++;
      
      
    }
    
    
      




//fro days label use this
    $dtedtedte=[
      
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -31 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -30 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -29 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -28 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -27 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -26 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -25 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -24 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -23 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -22 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -21 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -20 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -19 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -18 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -17 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -16 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -15 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -14 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -13 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -12 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -11 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -10 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -9 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -8 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -7 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -6 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -5 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -4 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -3 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -2 day')),) ),
      date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -1 day')),) ),
      date('l',strtotime($ffd) ),
    ];
    





foreach($array_date3 as $key => $value) {
  
  //for dates label use this
//$dtedtedte[]=$key;
$dte2dte2dte2[]=$value;

  //echo $key ."=>". $value."<br/>";
}
//echo '<br/>';
foreach($array_a3 as $key => $value) {
  $ampampamp[]=$key;
  $amp2amp2amp2[]=$value;
 // echo $key ."=>". $value."<br/>";
}
//echo '<br/>';
foreach($array_d3 as $key => $value) {
  $tdtdtd[]=$key;
  $td2td2td2[]=$value;

  //echo $key ."=>". $value."<br/>";
}
//echo '<br/>';
foreach($array_p3 as $key => $value) {
  $tptptp[]=$key;
  $tp2tp2tp2[]=$value;

 // echo $key ."=>". $value."<br/>";
}


$resvs=$bdd->query('SELECT * from reservations1  where datee>="'.$before_week.'"  and  datee<="'.$ffd.'" union SELECT * from reservations2  where datee>"'.$before_week.'"  and  datee<="'.$ffd.'" union SELECT * from reservations3 where datee>"'.$before_week.'"  and  datee<="'.$ffd.'"');


$dayss=[

date('Y-m-d', strtotime($ffd . ' -7 day')),
date('Y-m-d', strtotime($ffd . ' -6 day')),
date('Y-m-d', strtotime($ffd . ' -5 day')),
date('Y-m-d', strtotime($ffd . ' -4 day')),
date('Y-m-d', strtotime($ffd . ' -3 day')),
date('Y-m-d', strtotime($ffd . ' -2 day')),
date('Y-m-d', strtotime($ffd . ' -1 day')),
$ffd,
];





for($i=0;$i<count($dayss);$i++){
  
  $array_date4[$dayss[$i]]=0;
  $array_a4[$dayss[$i]]=0;
  $array_d4[$dayss[$i]]=0;
  $array_p4[$dayss[$i]]=0;


}


$resvs=$bdd->query('SELECT * from reservations1 where datee>="'.$before_week.'"  and  datee<="'.$ffd.'" order by datee');
$resvs2=$bdd->query('SELECT * from reservations2 where datee>="'.$before_week.'"  and  datee<="'.$ffd.'" order by datee');
$resvs3=$bdd->query('SELECT * from reservations3 where datee>="'.$before_week.'"  and  datee<="'.$ffd.'" order by datee');





while($gge=$resvs->fetch()){
/*
  echo $gge['cell'];
  echo $gge['box'];
  echo $gge['square'];
*/

  $array_date4[$gge['datee']]++;


  
    $cell= $gge['cell'];
    $array_a4[$gge['datee']]++;

}





while($gge=$resvs2->fetch()){

    $array_date4[$gge['datee']]++;
 
    
$cell= $gge['box'];
$array_d4[$gge['datee']]++;


  }
  
  
  while($gge=$resvs3->fetch()){
   
    
      $array_date4[$gge['datee']]++;
    



      $cell= $gge['square'];
      $array_p4[$gge['datee']]++;
      
      
    }
    
    
      




$dtedtedtedte=[
  date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -7 day')),) ),
  date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -6 day')),) ),
  date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -5 day')),) ),
  date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -4 day')),) ),
  date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -3 day')),) ),
  date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -2 day')),) ),
  date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -1 day')),) ),
  date('l',strtotime($ffd) ),
];



foreach($array_date4 as $key => $value) {
  //$dtedtedtedte[]=$key;
$dte2dte2dte2dte2[]=$value;

  //echo $key ."=>". $value."<br/>";
}
//echo '<br/>';
foreach($array_a4 as $key => $value) {
  $ampampampamp[]=$key;
  $amp2amp2amp2amp2[]=$value;
 // echo $key ."=>". $value."<br/>";
}
//echo '<br/>';
foreach($array_d4 as $key => $value) {
  $tdtdtdtd[]=$key;
  $td2td2td2td2[]=$value;

  //echo $key ."=>". $value."<br/>";
}
//echo '<br/>';
foreach($array_p4 as $key => $value) {
  $tptptptp[]=$key;
  $tp2tp2tp2tp2[]=$value;

 // echo $key ."=>". $value."<br/>";
}


























































































































        
        
 
        
        $ffd= date('Y-m-d');
        
        
        $before_year = date('Y-m-d', strtotime($ffd . ' -1 year'));
        $before_month = date('Y-m-d', strtotime($ffd . ' -1 month'));
        $before_week = date('Y-m-d', strtotime($ffd . ' -7 day'));
        
        
        
        
        
        
        
        
        $resvs1=$bdd->query('SELECT * from reservations1 where datee<="'.$ffd.'" and  users="'.$_COOKIE['login'].'" union SELECT * from reservations2 where datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'"  union SELECT * from reservations3 where datee<="'.$ffd.'"and users="'.$_COOKIE['login'].'"  order by datee');
        
        
        
        while($lll=$resvs1->fetch()){
        
          $array_date1[$lll['datee']]=0;
          $array_a1[$lll['datee']]=0;
          $array_d1[$lll['datee']]=0;
          $array_p1[$lll['datee']]=0;
        
        
        }
        
        $resvs1=$bdd->query('SELECT * from reservations1 where datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" order by datee');
        $resvs21=$bdd->query('SELECT * from reservations2 where datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" order by datee');
        $resvs31=$bdd->query('SELECT * from reservations3 where datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" order by datee');
        
        
        
        
        
        while($gge=$resvs1->fetch()){
        /*
          echo $gge['cell'];
          echo $gge['box'];
          echo $gge['square'];
        */
        
          $array_date1[$gge['datee']]++;
        
        
        
            $cell= $gge['cell'];
            $array_a1[$gge['datee']]++;
        
        }
        
        
        
        
        
        while($gge=$resvs21->fetch()){
        
            $array_date1[$gge['datee']]++;
        
            
        $cell= $gge['box'];
        $array_d1[$gge['datee']]++;
        
        
          }
          
          
          while($gge=$resvs31->fetch()){
        
            
              $array_date1[$gge['datee']]++;
            
        
        
        
              $cell= $gge['square'];
              $array_p1[$gge['datee']]++;
              
              
            }
            
            
        foreach($array_date1 as $key => $value) {
        $dte1[]=$key;
        $dte21[]=$value;
        
          //echo $key ."=>". $value."<br/>";
        }
        //echo '<br/>';
        foreach($array_a1 as $key => $value) {
          $amp1[]=$key;
          $amp21[]=$value;
         // echo $key ."=>". $value."<br/>";
        }
        //echo '<br/>';
        foreach($array_d1 as $key => $value) {
          $td1[]=$key;
          $td21[]=$value;
        
          //echo $key ."=>". $value."<br/>";
        }
        //echo '<br/>';
        foreach($array_p1 as $key => $value) {
          $tp1[]=$key;
          $tp21[]=$value;
        
         // echo $key ."=>". $value."<br/>";
        }
        
        
        
        $dayss=[
        
        
          date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -11 month')),) ),
          date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -10 month')),) ),
          date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -9 month')),) ),
          date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -8 month')),) ),
          date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -7 month')),) ),
          date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -6 month')),) ),
          date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -5 month')),) ),
          date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -4 month')),) ),
          date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -3 month')),) ),
          date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -2 month')),) ),
          date('m',strtotime(date('Y-m-d', strtotime($ffd . ' -1 month')),) ),
          date('m',strtotime($ffd) ),
            ];
            
        
        
        
        
        
        
        $resvs1=$bdd->query('SELECT * from reservations1  where datee>="'.$before_year.'" and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" union SELECT * from reservations2  where datee>"'.$before_year.'" and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'"  union SELECT * from reservations3 where datee>"'.$before_year.'" and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" ');
        
        
        
        
        for($i=0;$i<count($dayss);$i++){
        
        
          $array_date21[$dayss[$i]]=0;
          $array_a21[$dayss[$i]]=0;
          $array_d21[$dayss[$i]]=0;
          $array_p21[$dayss[$i]]=0;
        
        
        }
        $resvs1=$bdd->query('SELECT * from reservations1 where datee>="'.$before_year.'" and  datee<="'.$ffd.'"  and users="'.$_COOKIE['login'].'" order by datee');
        $resvs21=$bdd->query('SELECT * from reservations2 where datee>="'.$before_year.'" and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" order by datee');
        $resvs31=$bdd->query('SELECT * from reservations3 where datee>="'.$before_year.'" and   datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" order by datee');
        
        
        
        
        
        while($gge=$resvs1->fetch()){
        /*
          echo $gge['cell'];
          echo $gge['box'];
          echo $gge['square'];
        */
        
          $array_date21[date('m',strtotime($gge['datee']) )]++;
        
        
        
            $cell= $gge['cell'];
            $array_a21[date('m',strtotime($gge['datee']) )]++;
        
        }
        
        
        
        
        
        while($gge=$resvs21->fetch()){
        
            $array_date21[date('m',strtotime($gge['datee']) )]++;
        
            
        $cell= $gge['box'];
        $array_d21[date('m',strtotime($gge['datee']) )]++;
        
        
          }
          
          
          while($gge=$resvs31->fetch()){
        
            
              $array_date21[date('m',strtotime($gge['datee']) )]++;
            
        
        
        
              $cell= $gge['square'];
              $array_p21[date('m',strtotime($gge['datee']) )]++;
              
              
            }
            
            
        
            $dtedte1=[
            
            
            
                date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -11 month')),) ),
                date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -10 month')),) ),
                date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -9 month')),) ),
                date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -8 month')),) ),
                date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -7 month')),) ),
                date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -6 month')),) ),
                date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -5 month')),) ),
                date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -4 month')),) ),
                date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -3 month')),) ),
                date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -2 month')),) ),
                date('F',strtotime(date('Y-m-d', strtotime($ffd . ' -1 month')),) ),
                date('F',strtotime($ffd) ),
              ];
              
          
          
          
        foreach($array_date21 as $key => $value) {
        //$dtedte[]=$key;
        $dte2dte21[]=$value;
        
          //echo $key ."=>". $value."<br/>";
        }
        //echo '<br/>';
        foreach($array_a21 as $key => $value) {
          $ampamp1[]=$key;
          $amp2amp21[]=$value;
         // echo $key ."=>". $value."<br/>";
        }
        //echo '<br/>';
        foreach($array_d21 as $key => $value) {
          $tdtd1[]=$key;
          $td2td21[]=$value;
        
          //echo $key ."=>". $value."<br/>";
        }
        //echo '<br/>';
        foreach($array_p21 as $key => $value) {
          $tptp1[]=$key;
          $tp2tp21[]=$value;
        
         // echo $key ."=>". $value."<br/>";
        }
        
        
        $resvs1=$bdd->query('SELECT * from reservations1  where datee>="'.$before_month.'" and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" union SELECT * from reservations2  where datee>"'.$before_month.'" and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" union SELECT * from reservations3 where datee>"'.$before_month.'"  and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'"');
        
        
        
        
        $dayss=[
        
          date('Y-m-d', strtotime($ffd . ' -31 day')),
          date('Y-m-d', strtotime($ffd . ' -30 day')),
          date('Y-m-d', strtotime($ffd . ' -29 day')),
          date('Y-m-d', strtotime($ffd . ' -28 day')),
          date('Y-m-d', strtotime($ffd . ' -27 day')),
          date('Y-m-d', strtotime($ffd . ' -26 day')),
          date('Y-m-d', strtotime($ffd . ' -25 day')),
          date('Y-m-d', strtotime($ffd . ' -24 day')),
          date('Y-m-d', strtotime($ffd . ' -23 day')),
          date('Y-m-d', strtotime($ffd . ' -22 day')),
          date('Y-m-d', strtotime($ffd . ' -21 day')),
          date('Y-m-d', strtotime($ffd . ' -20 day')),
          date('Y-m-d', strtotime($ffd . ' -19 day')),
          date('Y-m-d', strtotime($ffd . ' -18 day')),
          date('Y-m-d', strtotime($ffd . ' -17 day')),
          date('Y-m-d', strtotime($ffd . ' -16 day')),
          date('Y-m-d', strtotime($ffd . ' -15 day')),
          date('Y-m-d', strtotime($ffd . ' -14 day')),
          date('Y-m-d', strtotime($ffd . ' -13 day')),
          date('Y-m-d', strtotime($ffd . ' -12 day')),
          date('Y-m-d', strtotime($ffd . ' -11 day')),
          date('Y-m-d', strtotime($ffd . ' -10 day')),
          date('Y-m-d', strtotime($ffd . ' -9 day')),
          date('Y-m-d', strtotime($ffd . ' -8 day')),
          date('Y-m-d', strtotime($ffd . ' -7 day')),
          date('Y-m-d', strtotime($ffd . ' -6 day')),
          date('Y-m-d', strtotime($ffd . ' -5 day')),
          date('Y-m-d', strtotime($ffd . ' -4 day')),
          date('Y-m-d', strtotime($ffd . ' -3 day')),
          date('Y-m-d', strtotime($ffd . ' -2 day')),
          date('Y-m-d', strtotime($ffd . ' -1 day')),
          $ffd,
          ];
          
    
          for($i=0;$i<count($dayss);$i++){
        
        
          $array_date31[$dayss[$i]]=0;
          $array_a31[$dayss[$i]]=0;
          $array_d31[$dayss[$i]]=0;
          $array_p31[$dayss[$i]]=0;
        
        
        }
        
        
        
        $resvs1=$bdd->query('SELECT * from reservations1 where datee>="'.$before_month.'" and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" order by datee');
        $resvs21=$bdd->query('SELECT * from reservations2 where datee>="'.$before_month.'" and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" order by datee');
        $resvs31=$bdd->query('SELECT * from reservations3 where datee>="'.$before_month.'" and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" order by datee');
        
        
        
        
        while($gge=$resvs1->fetch()){
        /*
          echo $gge['cell'];
          echo $gge['box'];
          echo $gge['square'];
        */
        
          $array_date31[$gge['datee']]++;
        
        
        
            $cell= $gge['cell'];
            $array_a31[$gge['datee']]++;
        
        }
        
        
        
        
        
        while($gge=$resvs21->fetch()){
        
            $array_date3[$gge['datee']]++;
        
            
        $cell= $gge['box'];
        $array_d31[$gge['datee']]++;
        
        
          }
          
          
          while($gge=$resvs31->fetch()){
        
            
              $array_date31[$gge['datee']]++;
            
        
        
        
              $cell= $gge['square'];
              $array_p31[$gge['datee']]++;
              
              
            }
            
            
              
        
        
        
        
        //fro days label use this
            $dtedtedte1=[
            
            date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -31 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -30 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -29 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -28 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -27 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -26 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -25 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -24 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -23 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -22 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -21 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -20 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -19 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -18 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -17 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -16 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -15 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -14 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -13 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -12 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -11 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -10 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -9 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -8 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -7 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -6 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -5 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -4 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -3 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -2 day')),) ),
              date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -1 day')),) ),
              date('l',strtotime($ffd) ),
            ];
            
        
        
        
        
        
        foreach($array_date31 as $key => $value) {
        
          //for dates label use this
        //$dtedtedte[]=$key;
        $dte2dte2dte21[]=$value;
        
          //echo $key ."=>". $value."<br/>";
        }
        //echo '<br/>';
        foreach($array_a31 as $key => $value) {
          $ampampamp1[]=$key;
          $amp2amp2amp21[]=$value;
         // echo $key ."=>". $value."<br/>";
        }
        //echo '<br/>';
        foreach($array_d31 as $key => $value) {
          $tdtdtd1[]=$key;
          $td2td2td21[]=$value;
        
          //echo $key ."=>". $value."<br/>";
        }
        //echo '<br/>';
        foreach($array_p31 as $key => $value) {
          $tptptp1[]=$key;
          $tp2tp2tp21[]=$value;
        
         // echo $key ."=>". $value."<br/>";
        }
        
        
        
        
        $resvs1=$bdd->query('SELECT * from reservations1  where datee>="'.$before_week.'"  and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" union SELECT * from reservations2  where datee>"'.$before_week.'"  and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" union SELECT * from reservations3 where datee>"'.$before_week.'"  and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'"');
        
        
        $dayss=[
        
        date('Y-m-d', strtotime($ffd . ' -7 day')),
        date('Y-m-d', strtotime($ffd . ' -6 day')),
        date('Y-m-d', strtotime($ffd . ' -5 day')),
        date('Y-m-d', strtotime($ffd . ' -4 day')),
        date('Y-m-d', strtotime($ffd . ' -3 day')),
        date('Y-m-d', strtotime($ffd . ' -2 day')),
        date('Y-m-d', strtotime($ffd . ' -1 day')),
        $ffd,
        ];
        
        
        
        
        
        for($i=0;$i<count($dayss);$i++){
        
          $array_date41[$dayss[$i]]=0;
          $array_a41[$dayss[$i]]=0;
          $array_d41[$dayss[$i]]=0;
          $array_p41[$dayss[$i]]=0;
        
        
        }
        
        
        $resvs1=$bdd->query('SELECT * from reservations1 where datee>="'.$before_week.'"  and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" order by datee');
        $resvs21=$bdd->query('SELECT * from reservations2 where datee>="'.$before_week.'"  and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" order by datee');
        $resvs31=$bdd->query('SELECT * from reservations3 where datee>="'.$before_week.'"  and  datee<="'.$ffd.'" and users="'.$_COOKIE['login'].'" order by datee');
        
        
        
        
        
        while($gge=$resvs1->fetch()){
        /*
          echo $gge['cell'];
          echo $gge['box'];
          echo $gge['square'];
        */
        
          $array_date41[$gge['datee']]++;
        
        
        
            $cell= $gge['cell'];
            $array_a41[$gge['datee']]++;
        
        }
        
        
        
        
        
        while($gge=$resvs21->fetch()){
        
            $array_date41[$gge['datee']]++;
        
            
        $cell= $gge['box'];
        $array_d41[$gge['datee']]++;
        
        
          }
          
          
          while($gge=$resvs31->fetch()){
        
            
              $array_date41[$gge['datee']]++;
            
        
        
        
              $cell= $gge['square'];
              $array_p41[$gge['datee']]++;
              
              
            }
            
            
              
        
        
        
        
        $dtedtedtedte1=[
          date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -7 day')),) ),
          date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -6 day')),) ),
          date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -5 day')),) ),
          date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -4 day')),) ),
          date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -3 day')),) ),
          date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -2 day')),) ),
          date('l',strtotime(date('Y-m-d', strtotime($ffd . ' -1 day')),) ),
          date('l',strtotime($ffd) ),
        ];
        
        
        
        foreach($array_date41 as $key => $value) {
          //$dtedtedtedte[]=$key;
        $dte2dte2dte2dte21[]=$value;
        
          //echo $key ."=>". $value."<br/>";
        }
        //echo '<br/>';
        foreach($array_a41 as $key => $value) {
          $ampampampamp1[]=$key;
          $amp2amp2amp2amp21[]=$value;
         // echo $key ."=>". $value."<br/>";
        }
        //echo '<br/>';
        foreach($array_d41 as $key => $value) {
          $tdtdtdtd1[]=$key;
          $td2td2td2td21[]=$value;
        
          //echo $key ."=>". $value."<br/>";
        }
        //echo '<br/>';
        foreach($array_p41 as $key => $value) {
          $tptptptp1[]=$key;
          $tp2tp2tp2tp21[]=$value;
        
         // echo $key ."=>". $value."<br/>";
        }
        



































$fzefzef=$bdd->query('SELECT * from reservations1  where  users="'.$_COOKIE['login'].'" union SELECT * from reservations2  where  users="'.$_COOKIE['login'].'" union SELECT * from reservations3 where  users="'.$_COOKIE['login'].'"');
$count1=$fzefzef->Rowcount(); 



$fzefzef2=$bdd->query('SELECT * from reservations1  union SELECT * from reservations2   union SELECT * from reservations3');
$count2=$fzefzef2->Rowcount(); 















 $rrr1=str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);;
  $rrr= 'rgb('.hex2rgb($rrr1)['red'].','.hex2rgb($rrr1)['green'].','.hex2rgb($rrr1)['blue'].',0.1)';
  $rrr2= 'rgb('.hex2rgb($rrr1)['red'].','.hex2rgb($rrr1)['green'].','.hex2rgb($rrr1)['blue'].')';
  $re1[]=$rrr;
   $re2[]=$rrr2;







   
?>







    


<div class='bar'>


<div class='select_it1'>
<h5 class='cheems'>general</h5>
</div>


<div class='select_it2'>
<h5 class='cheems'>users</h5>
</div>


<div class='select_it3'>
<h5 class='cheems'>classes</h5>
</div>


</div>































<div class='bar'>


<div class='person_container'>

<div class='all' data-toggle="tooltip" data-placement="top" title="all">
<i class="bi bi-people"></i>
</div>

<div class='me' data-toggle="tooltip" data-placement="top" title="me">
<i class="bi bi-person"></i>
</div>

</div>





<div class='graph_container'>

<div class='line' data-toggle="tooltip" data-placement="top" title="lines">
<i class="bi bi-graph-up"></i>

</div>

<div class='bars' data-toggle="tooltip" data-placement="top" title="bars">
  <i class="bi bi-bar-chart-line"></i>

</div>
</div>






<div class='graph_container2'>

<div class='pie' data-toggle="tooltip" data-placement="top" title="pie">
<i class="bi bi-pie-chart-fill"></i>
</div>

<div class='donut' data-toggle="tooltip" data-placement="top" title="donut">
<i class="bi bi-pie-chart"></i>
</div>

</div>






<div class='duration_container'>



<div class='year all_time' data-toggle="tooltip" data-placement="top" title="all time"> 
  
<i class="bi bi-table"></i>
</div>

<div class='year ggh' data-toggle="tooltip" data-placement="top" title="last year">
<i class="bi bi-table"></i>
</div>



<div class='month' data-toggle="tooltip" data-placement="top" title="last month">
<i class="bi bi-calendar-month"></i>
</div>




<div class='week' data-toggle="tooltip" data-placement="top" title="last week">
<i class="bi bi-calendar4-week"></i>
</div>




</div>


</div>








<div class='block1'>









<div class='info_cont ss'>
<h5 clas='fg'><i class="bi bi-calendar2-check"></i>my reservations : <?php echo $count1; ?></h5>

</div>


<div class='info_cont'>

<h5><i class="bi bi-calendar2-check"></i>total reservations : <?php echo $count2; ?></h5>
</div>




<div class='main_diag' id='id1'>


<canvas id="lines_types_all2" ></canvas>

</div>

<div style='display:none' class='main_diag' id='id2'>


<canvas id="lines_types_year2" ></canvas>

</div>

<div style='display:none' class='main_diag' id='id3'>


<canvas id="lines_types_month2" ></canvas>

</div>


<div  style='display:none' class='main_diag' id='id4'>
<canvas id="lines_types_week2" ></canvas>



</div>


<div class='main_diag2'>


<canvas  id="time_per2" width="0"></canvas>

</div>



<div class='main_diag3'>


<canvas  id="days2"  width="0"></canvas>

</div>














</div>
















<div class='block12' >






<!--
<div class='bar'>


<div class='person_container'>

<div class='all'>
<i class="bi bi-people"></i>
</div>

<div class='me'>
<i class="bi bi-person"></i>
</div>

</div>





<div class='graph_container'>

<div class='line'>
<i class="bi bi-graph-up"></i>

</div>

<div class='bars'>
  <i class="bi bi-bar-chart-line"></i>

</div>
</div>






<div class='graph_container2'>

<div class='pie'>
<i class="bi bi-pie-chart-fill"></i>
</div>

<div class='donut'>
<i class="bi bi-pie-chart"></i>
</div>

</div>






<div class='duration_container'>
<div class='year all_time'>
<i class="bi bi-table"></i>
</div>

<div class='year ggh'>
<i class="bi bi-table"></i>
</div>



<div class='month'>
<i class="bi bi-calendar-month"></i>
</div>




<div class='week'>
<i class="bi bi-calendar4-week"></i>
</div>



</div>


</div>
 -->


<div class='info_cont ss'>
<h5 clas='fg'><i class="bi bi-calendar2-check"></i>my reservations : <?php echo $count1; ?></h5>

</div>


<div class='info_cont'>

<h5><i class="bi bi-calendar2-check"></i>total reservations : <?php echo $count2; ?></h5>
</div>




<div class='main_diag' id='id11'>


<canvas id="lines_types_all" ></canvas>

</div>

<div style='display:none' class='main_diag' id='id22'>


<canvas id="lines_types_year" ></canvas>

</div>

<div style='display:none' class='main_diag' id='id33'>


<canvas id="lines_types_month" ></canvas>

</div>


<div  style='display:none' class='main_diag' id='id44'>
<canvas id="lines_types_week" ></canvas>



</div>


<div class='main_diag2'>


<canvas  id="time_per" width="0"></canvas>

</div>



<div class='main_diag3'>


<canvas  id="days"  width="0"></canvas>

</div>


</div>
































<div class='block2' >






<!--

<div  class='dig1'>
<canvas  id="res_me_bars"  ></canvas>
</div>





      -->

      <div class='dig3'>
<canvas  id="stacked" ></canvas>
</div>






<div  class='dig2 v2'>
  <?php
  $list='';
  $list2='';
  $list3='';
    for($i=0;$i<count($all_types2);$i+=3){
   
      
      
     
      //$list1.='<a style="background-color:'.$all_types5[$i].';border: solid 2px '.$all_types4[$i].'">'.$all_types2[$i].'</a>';
      $list.='<li style="color:'.$txt.' !important;background-color:transparent !important;border:none;color:white" class="list-group-item"><div style="margin-top:8px;margin-right:8px;float:left;background-color:'.$all_types4[$i].';height:10px;width:30px;border:2px solid '.$all_types4[$i].'"></div>'.$all_types2[$i].'</li>';
   
      if(isset($all_types2[$i+1])){
        $list2.='<li style="color:'.$txt.' !important;background-color:transparent !important;border:none;color:white" class="list-group-item"><div style="margin-right:8px;margin-top:8px;float:left;background-color:'.$all_types4[$i+1].';height:10px;width:30px;border:2px solid '.$all_types4[$i+1].'"></div>'.$all_types2[$i+1].'</li>';

   }
   if(isset($all_types2[$i+2])){
    $list3.='<li style="color:'.$txt.' !important;background-color:transparent !important;border:none;color:white" class="list-group-item"><div style="margin-right:8px;margin-top:8px;float:left;background-color:'.$all_types4[$i+2].';height:10px;width:30px;border:2px solid '.$all_types4[$i+2].'"></div>'.$all_types2[$i+2].'</li>';

}
   
   
    }

    
    
  
  ?>
<ul class="list-group" style="width:33%;float:left;">

  <?php
  echo $list;

  ?>
<li style="color:<?php echo $txt;?> !important;background-color:transparent !important;border:none;color:white" class="list-group-item"><div style="margin-right:8px;margin-top:8px;float:left;background-color:coral;height:10px;width:30px;border:2px solid coral"></div>AMPHI</li>

</ul>
<ul class="list-group" style="width:33%;float:left; ">
<?php
echo $list2;
?>
<li style="color:<?php echo $txt;?> !important;background-color:transparent !important;border:none;color:white" class="list-group-item"><div style="margin-right:8px;margin-top:8px;float:left;background-color:rgb(19,112,214);height:10px;width:30px;border:2px solid rgb(19,112,214)"></div>TD classes</li>

</ul>
<ul class="list-group" style="width:33%;float:left; ">
<?php
echo $list3;
?>
<li style="color:<?php echo $txt;?> !important;background-color:transparent !important;border:none;color:white" class="list-group-item"><div style="margin-right:8px;margin-top:8px;float:left;background-color:orchid;height:10px;width:30px;border:2px solid orchid"></div>TP classes</li>

</ul>

<!--
<a style="background-color:coral">amphi</a>
<a style="background-color:blue">td</a>
<a style="background-color:orchid">tp</a>
  -->


<canvas  id="res_all_pie" ></canvas>
</div>




</div>


















<div class='block3' >




<div class='dima2' style='height:800px;'>
<canvas id="res_rooms_bars1" height="600" width="0"></canvas>
</div>


<div class='dima3' style='height:800px'>
<canvas id="res_rooms_bars2" height="600" width="0"></canvas>
</div>




<div class='dima4' style='height:800px'>
<canvas id="res_rooms_bars3" height="600" width="0"></canvas>
</div>











<div  class='dima1'>

<?php
     
     $ffeeef=array_merge($room_res1f,$room_res11f,$room_res111f);
     $ffeeef2=array_merge($room_res2,$room_res22,$room_res222);
     $ffeeef3=array_merge($room_res3,$room_res33,$room_res333);
     $ffeeef4=array_merge($room_res4,$room_res44,$room_res444);

     
 
  $list='';
  $list2='';
  $list3='';
    for($i=0;$i<count($ffeeef);$i++){
   
      

     if($ffeeef[$i][0]=='A'){
      $list.='<li style="color:'.$txt.' !important;margin:auto;background-color:transparent !important;border:none;color:white" class="list-group-item"><div style="margin-top:8px;margin-right:8px;float:left;background-color:'.$ffeeef3[$i].';height:10px;width:30px;border: 2px solid '.$ffeeef4[$i].'"></div>'.$ffeeef[$i].'</li>';
     }

     if($ffeeef[$i][1]=='D'){
      if(isset($ffeeef[$i])){
        $list2.='<li style="color:'.$txt.' !important;margin:auto;background-color:transparent !important;border:none;color:white" class="list-group-item"><div style="margin-right:8px;margin-top:8px;float:left;background-color:'.$ffeeef3[$i].';height:10px;width:30px;border: 2px solid '.$ffeeef4[$i].'"></div>'.$ffeeef[$i].'</li>';

   } }

   if($ffeeef[$i][1]=='P'){
   if(isset($ffeeef[$i])){
    $list3.='<li style="color:'.$txt.' !important;margin:auto;background-color:transparent !important;border:none;color:white" class="list-group-item"><div style="margin-right:8px;margin-top:8px;float:left;background-color:'.$ffeeef3[$i].';height:10px;width:30px;border: 2px solid '.$ffeeef4[$i].'"></div>'.$ffeeef[$i].'</li>';

} }
    }

    
    
  
  ?>
<ul class="list-group" style="width:33%;float:left;">
<li style="color:<?php echo $txt ?> !important;background-color:transparent !important;border:none;color:white;text-align:center" class="list-group-item">OUTER RING : amhpis</li>
<?php
echo $list;

?>

</ul>

<ul class="list-group" style="width:33%;float:left; ">
<li style="color:<?php echo $txt ?> !important;background-color:transparent !important;border:none;color:white;text-align:center" class="list-group-item">MIDDLE RING : td classes</li>

<?php
echo $list2;
?>
</ul>
<ul class="list-group" style="width:33%;float:left; ">
<li style="color:<?php echo $txt ?> !important;background-color:transparent !important;border:none;color:white;text-align:center" class="list-group-item">INNER RING : tp classes</li>

<?php
echo $list3;
?>
</ul>


<canvas  id="piepie" ></canvas>
</div>



</div>












































<script >



















































var ttgg1={



  

type: 'line',
data: {
labels: <?php echo json_encode($dte);?>,
datasets: [
 
  
  {
    label: 'all',
    data: <?php echo json_encode($dte2);?>,
    backgroundColor: 'rgb(0,176,116,0.2)',
    borderColor: 'rgb(0,176,116)',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'amphi',
    data: <?php echo json_encode($amp2);?>,
    backgroundColor: 'rgb(255,163,140,0.2)',
    borderColor: 'coral',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'td',
    data: <?php echo json_encode($td2);?>,
    backgroundColor: ' rgb(19,112,214,0.2)',
    borderColor: ' rgb(19,112,214)',
    borderWidth: 2,fill: false,lineTension:0.4,
  }, {
    label: 'tp',
    data: <?php echo json_encode($tp2);?>,
    backgroundColor: 'rgb(218,112,214,0.2)',
    borderColor: 'orchid',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
],

},
options: {
  color:'<?php echo $txt;?>',
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
  },
  scales: {
    
    


    yAxes: [{
          ticks: {
            
              fontColor:'white'
          }
      }],





    x: {
     
    }
  
  
  
  },
    y: {
     
      
      stacked: false,
     
    },
 
  responsive: true,
  plugins: {
    
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
    
  },





    legend: {
      labels: {
      padding: 20
    },
      position: 'top',
    },



    title: {
      color:'<?php echo $txt;?>',
      display: true,
      text:'number of reservations for each class type',

      font: {
        
        size: 16,
        family: 'tahoma',
       
      },
    },
    
  }
},



};




var ttgg21={



  

type: 'line',
data: {
labels: <?php echo json_encode($dtedte);?>,
datasets: [
 
  
  {
    label: 'all',
    data: <?php echo json_encode($dte2dte2);?>,
    backgroundColor: 'rgb(0,176,116,0.2)',
    borderColor: 'rgb(0,176,116)',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'amphi',
    data: <?php echo json_encode($amp2amp2);?>,
    backgroundColor: 'rgb(255,163,140,0.2)',
    borderColor: 'coral',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'td',
    data: <?php echo json_encode($td2td2);?>,
    backgroundColor: ' rgb(19,112,214,0.2)',
    borderColor: ' rgb(19,112,214)',
    borderWidth: 2,fill: false,lineTension:0.4,
  }, {
    label: 'tp',
    data: <?php echo json_encode($tp2tp2);?>,
    backgroundColor: 'rgb(218,112,214,0.2)',
    borderColor: 'orchid',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
],

},
options: {
  color:'<?php echo $txt;?>',
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
  },
  scales: {
    
    


    yAxes: [{
          ticks: {
            
              fontColor:'white'
          }
      }],





    x: {
     
    }},
    y: {
     
      
      stacked: false,
     
    },
 
  responsive: true,
  plugins: {
    
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
    
  },





    legend: {
      labels: {
      padding: 20
    },
      position: 'top',
    },



    title: {
      color:'<?php echo $txt;?>',
      display: true,
      text:'number of reservations for each class type',

      font: {
        
        size: 16,
        family: 'tahoma',
       
      },
    },
    
  }
},



};








var ttgg31={



  

type: 'line',
data: {
labels: <?php echo json_encode($dtedtedte);?>,
datasets: [
 
  
  {
    label: 'all',
    data: <?php echo json_encode($dte2dte2dte2);?>,
    backgroundColor: 'rgb(0,176,116,0.2)',
    borderColor: 'rgb(0,176,116)',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'amphi',
    data: <?php echo json_encode($amp2amp2amp2);?>,
    backgroundColor: 'rgb(255,163,140,0.2)',
    borderColor: 'coral',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'td',
    data: <?php echo json_encode($td2td2td2);?>,
    backgroundColor: ' rgb(19,112,214,0.2)',
    borderColor: ' rgb(19,112,214)',
    borderWidth: 2,fill: false,lineTension:0.4,
  }, {
    label: 'tp',
    data: <?php echo json_encode($tp2tp2tp2);?>,
    backgroundColor: 'rgb(218,112,214,0.2)',
    borderColor: 'orchid',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
],

},
options: {
  color:'<?php echo $txt;?>',
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
  },
  scales: {
    
    


    yAxes: [{
          ticks: {
            
              fontColor:'white'
          }
      }],





    x: {
     
    }},
    y: {
     
      
      stacked: false,
     
    },
 
  responsive: true,
  plugins: {
    
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
    
  },





    legend: {
      labels: {
      padding: 20
    },
      position: 'top',
    },



    title: {
      color:'<?php echo $txt;?>',
      display: true,
      text:'number of reservations for each class type',

      font: {
        
        size: 16,
        family: 'tahoma',
       
      },
    },
    
  }
},



};



var ttgg41= {



  

type: 'line',
data: {
labels: <?php echo json_encode($dtedtedtedte);?>,
datasets: [
 
  
  {
    label: 'all',
    data: <?php echo json_encode($dte2dte2dte2dte2);?>,
    backgroundColor: 'rgb(0,176,116,0.2)',
    borderColor: 'rgb(0,176,116)',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'amphi',
    data: <?php echo json_encode($amp2amp2amp2amp2);?>,
    backgroundColor: 'rgb(255,163,140,0.2)',
    borderColor: 'coral',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'td',
    data: <?php echo json_encode($td2td2td2td2);?>,
    backgroundColor: ' rgb(19,112,214,0.2)',
    borderColor: ' rgb(19,112,214)',
    borderWidth: 2,fill: false,lineTension:0.4,
  }, {
    label: 'tp',
    data: <?php echo json_encode($tp2tp2tp2tp2);?>,
    backgroundColor: 'rgb(218,112,214,0.2)',
    borderColor: 'orchid',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
],

},
options: {
  color:'<?php echo $txt;?>',
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
  },
  scales: {
    
    


    yAxes: [{
          ticks: {
            
              fontColor:'white'
          }
      }],





    x: {
     
    }},
    y: {
     
      
      stacked: false,
     
    },
 
  responsive: true,
  plugins: {
    
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
    
  },





    legend: {
      labels: {
      padding: 20
    },
      position: 'top',
    },



    title: {
      color:'<?php echo $txt;?>',
      display: true,
      text:'number of reservations for each class type',

      font: {
        
        size: 16,
        family: 'tahoma',
       
      },
    },
    
  }
},



};




var ppie1= {



  

type: 'pie',
data: {
labels: <?php echo json_encode($klm);?>,
datasets: [
 
  
  {
    label: 'names',
    data: <?php echo json_encode($klm2);?>,
    backgroundColor: <?php echo json_encode($re1);?>,
    borderColor: '<?php echo $colorcolor;?>',
  //  hoverBackgroundColor: 'rgb(0,176,116)',

  
hoverOffset: 50,
    borderWidth: 2
  }
],

},
options: {
  
  color:'<?php echo $txt;?>',


  parsing: {
      key: 'nested.value'
  },
  responsive: true,
  plugins: {
    
    legend: {
    
      
      
      position: 'bottom',
    },
    title: {
      
      padding:{
        top:10,
        bottom:20,
      },
      color:'<?php echo $txt;?>',
      font: {
        color: 'red',
        size: 12,
        family: 'tahoma',
       
      },
      display: true,
      text:'number of reservations for each day of the week'
    }
  }
},
plugins: [{
  beforeInit: function(chart, options) {
    chart.legend.afterFit = function() {
      this.height = this.height + 500;
    };
  }
}]



};



var ppie21={



  

type: 'pie',
data: {
labels: <?php echo json_encode($srsr);?>,
datasets: [
 
  
  {
    label: 'names',
    data: <?php echo json_encode($srsr2);?>,
    backgroundColor: <?php echo json_encode($kmkm);?>,
    borderColor: '<?php echo $colorcolor;?>',
    hoverOffset: 50,
    borderWidth: 2
  }
],

},
options: {
  color:'<?php echo $txt;?>',
  parsing: {
      key: 'nested.value'
  },
  responsive: true,
  plugins: {
    
    legend: {
      position: 'bottom',
    },
    
    title: {
      
      padding:{
        top:10,
        bottom:20,
      },
      color:'<?php echo $txt;?>',
      font: {
        color: 'red',
        size: 12,
        family: 'tahoma',
       
      },
      display: true,
      text:'number of reservations for each time period'
    }
  }
},



};























var ctx = document.getElementById('days2').getContext('2d');
var days_pie1 = new Chart(ctx,ppie1);




var ctx = document.getElementById('time_per2').getContext('2d');
var time_pie1 = new Chart(ctx,ppie21 );



var ctx = document.getElementById('lines_types_week2').getContext('2d');
var pp111 = new Chart(ctx,ttgg41);



var ctx = document.getElementById('lines_types_year2').getContext('2d');
var pp1121 = new Chart(ctx, ttgg21);


var ctx = document.getElementById('lines_types_month2').getContext('2d');
var pp1131 = new Chart(ctx, ttgg31);



var ctx = document.getElementById('lines_types_all2').getContext('2d');
var pp1141 = new Chart(ctx, ttgg1);








$('.bars').click(function(){

  



  ttgg1.type = "bar";
  ttgg21.type = "bar";
  ttgg31.type = "bar";
  ttgg41.type = "bar";

  ttgg1.options.scales.x.stacked = true;
  ttgg1.options.scales.y.stacked = true;
  ttgg21.options.scales.x.stacked = true;
  ttgg21.options.scales.y.stacked = true;
  ttgg31.options.scales.x.stacked = true;
  ttgg31.options.scales.y.stacked = true;
  ttgg41.options.scales.x.stacked = true;
  ttgg41.options.scales.y.stacked = true;



    pp111.update();
    pp1121.update();
    pp1131.update();
    pp1141.update();

    







});


$('.line').click(function(){

  



  ttgg1.type = "line";
  ttgg21.type = "line";
  ttgg31.type = "line";
  ttgg41.type = "line";

  ttgg1.options.scales.x.stacked = false;
  ttgg1.options.scales.y.stacked = false;
  ttgg21.options.scales.x.stacked = false;
  ttgg21.options.scales.y.stacked = false;
  ttgg31.options.scales.x.stacked = false;
  ttgg31.options.scales.y.stacked = false;
  ttgg41.options.scales.x.stacked = false;
  ttgg41.options.scales.y.stacked = false;



    pp111.update();
    pp1121.update();
    pp1131.update();
    pp1141.update();

  







});






$('.pie').click(function(){

ppie1.type = "pie";
ppie21.type = "pie";
days_pie1.update();
  time_pie1.update();

 

});










$('.donut').click(function(){


ppie1.type = "doughnut";
ppie21.type = "doughnut";
days_pie1.update();
time_pie1.update();
  
});




























































































var ttgg={



  

type: 'line',
data: {
labels: <?php echo json_encode($dte1);?>,
datasets: [
 
  
  {
    label: 'all',
    data: <?php echo json_encode($dte21);?>,
    backgroundColor: 'rgb(0,176,116,0.2)',
    borderColor: 'rgb(0,176,116)',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'amphi',
    data: <?php echo json_encode($amp21);?>,
    backgroundColor: 'rgb(255,163,140,0.2)',
    borderColor: 'coral',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'td',
    data: <?php echo json_encode($td21);?>,
    backgroundColor: ' rgb(19,112,214,0.2)',
    borderColor: ' rgb(19,112,214)',
    borderWidth: 2,fill: false,lineTension:0.4,
  }, {
    label: 'tp',
    data: <?php echo json_encode($tp21);?>,
    backgroundColor: 'rgb(218,112,214,0.2)',
    borderColor: 'orchid',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
],

},
options: {
  color:'<?php echo $txt;?>',
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
  },
  scales: {
    
    


    yAxes: [{
          ticks: {
            
              fontColor:'white'
          }
      }],





    x: {
     
    }
  
  
  
  },
    y: {
     
      
      stacked: false,
     
    },
 
  responsive: true,
  plugins: {
    
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
    
  },





    legend: {
      labels: {
      padding: 20
    },
      position: 'top',
    },



    title: {
      color:'<?php echo $txt;?>',
      display: true,
      text:'number of reservations for each class type',

      font: {
        
        size: 16,
        family: 'tahoma',
       
      },
    },
    
  }
},



};




var ttgg2={



  

type: 'line',
data: {
labels: <?php echo json_encode($dtedte1);?>,
datasets: [
 
  
  {
    label: 'all',
    data: <?php echo json_encode($dte2dte21);?>,
    backgroundColor: 'rgb(0,176,116,0.2)',
    borderColor: 'rgb(0,176,116)',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'amphi',
    data: <?php echo json_encode($amp2amp21);?>,
    backgroundColor: 'rgb(255,163,140,0.2)',
    borderColor: 'coral',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'td',
    data: <?php echo json_encode($td2td21);?>,
    backgroundColor: ' rgb(19,112,214,0.2)',
    borderColor: ' rgb(19,112,214)',
    borderWidth: 2,fill: false,lineTension:0.4,
  }, {
    label: 'tp',
    data: <?php echo json_encode($tp2tp21);?>,
    backgroundColor: 'rgb(218,112,214,0.2)',
    borderColor: 'orchid',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
],

},
options: {
  color:'<?php echo $txt;?>',
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
  },
  scales: {
    
    


    yAxes: [{
          ticks: {
            
              fontColor:'white'
          }
      }],





    x: {
     
    }},
    y: {
     
      
      stacked: false,
     
    },
 
  responsive: true,
  plugins: {
    
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
    
  },





    legend: {
      labels: {
      padding: 20
    },
      position: 'top',
    },



    title: {
      color:'<?php echo $txt;?>',
      display: true,
      text:'number of reservations for each class type',

      font: {
        
        size: 16,
        family: 'tahoma',
       
      },
    },
    
  }
},



};








var ttgg3={



  

type: 'line',
data: {
labels: <?php echo json_encode($dtedtedte1);?>,
datasets: [
 
  
  {
    label: 'all',
    data: <?php echo json_encode($dte2dte2dte21);?>,
    backgroundColor: 'rgb(0,176,116,0.2)',
    borderColor: 'rgb(0,176,116)',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'amphi',
    data: <?php echo json_encode($amp2amp2amp21);?>,
    backgroundColor: 'rgb(255,163,140,0.2)',
    borderColor: 'coral',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'td',
    data: <?php echo json_encode($td2td2td21);?>,
    backgroundColor: ' rgb(19,112,214,0.2)',
    borderColor: ' rgb(19,112,214)',
    borderWidth: 2,fill: false,lineTension:0.4,
  }, {
    label: 'tp',
    data: <?php echo json_encode($tp2tp2tp21);?>,
    backgroundColor: 'rgb(218,112,214,0.2)',
    borderColor: 'orchid',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
],

},
options: {
  color:'<?php echo $txt;?>',
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
  },
  scales: {
    
    


    yAxes: [{
          ticks: {
            
              fontColor:'white'
          }
      }],





    x: {
     
    }},
    y: {
     
      
      stacked: false,
     
    },
 
  responsive: true,
  plugins: {
    
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
    
  },





    legend: {
      labels: {
      padding: 20
    },
      position: 'top',
    },



    title: {
      color:'<?php echo $txt;?>',
      display: true,
      text:'number of reservations for each class type',

      font: {
        
        size: 16,
        family: 'tahoma',
       
      },
    },
    
  }
},



};



var ttgg4= {



  

type: 'line',
data: {
labels: <?php echo json_encode($dtedtedtedte1);?>,
datasets: [
 
  
  {
    label: 'all',
    data: <?php echo json_encode($dte2dte2dte2dte21);?>,
    backgroundColor: 'rgb(0,176,116,0.2)',
    borderColor: 'rgb(0,176,116)',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'amphi',
    data: <?php echo json_encode($amp2amp2amp2amp21);?>,
    backgroundColor: 'rgb(255,163,140,0.2)',
    borderColor: 'coral',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
  {
    label: 'td',
    data: <?php echo json_encode($td2td2td2td21);?>,
    backgroundColor: ' rgb(19,112,214,0.2)',
    borderColor: ' rgb(19,112,214)',
    borderWidth: 2,fill: false,lineTension:0.4,
  }, {
    label: 'tp',
    data: <?php echo json_encode($tp2tp2tp2tp21);?>,
    backgroundColor: 'rgb(218,112,214,0.2)',
    borderColor: 'orchid',
    borderWidth: 2,fill: false,lineTension:0.4,
  },
],

},
options: {
  color:'<?php echo $txt;?>',
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
  },
  scales: {
    
    


    yAxes: [{
          ticks: {
            
              fontColor:'white'
          }
      }],





    x: {
     
    }},
    y: {
     
      
      stacked: false,
     
    },
 
  responsive: true,
  plugins: {
    
  interaction: {
    mode: 'nearest',
    axis: 'x',
    intersect: false
    
  },





    legend: {
      labels: {
      padding: 20
    },
      position: 'top',
    },



    title: {
      color:'<?php echo $txt;?>',
      display: true,
      text:'number of reservations for each class type',

      font: {
        
        size: 16,
        family: 'tahoma',
       
      },
    },
    
  }
},



};




var ppie= {



  

type: 'pie',
data: {
labels: <?php echo json_encode($klm11);?>,
datasets: [
 
  
  {
    label: 'names',
    data: <?php echo json_encode($klm211);?>,
    backgroundColor: <?php echo json_encode($re111);?>,
    borderColor: '<?php echo $colorcolor;?>',
  //  hoverBackgroundColor: 'rgb(0,176,116)',

  
hoverOffset: 50,
    borderWidth: 2
  }
],

},
options: {
  
  color:'<?php echo $txt;?>',


  parsing: {
      key: 'nested.value'
  },
  responsive: true,
  plugins: {
    
    legend: {
    
      
      
      position: 'bottom',
    },
    title: {
      
      padding:{
        top:10,
        bottom:20,
      },
      color:'<?php echo $txt;?>',
      font: {
        color: 'red',
        size: 12,
        family: 'tahoma',
       
      },
      display: true,
      text:'number of reservations for each day of the week'
    }
  }
},
plugins: [{
  beforeInit: function(chart, options) {
    chart.legend.afterFit = function() {
      this.height = this.height + 500;
    };
  }
}]



};



var ppie2={



  

type: 'pie',
data: {
labels: <?php echo json_encode($srsrff);?>,
datasets: [
 
  
  {
    label: 'names',
    data: <?php echo json_encode($srsr2ff);?>,
    backgroundColor: <?php echo json_encode($kmkm);?>,
    borderColor: '<?php echo $colorcolor;?>',
    hoverOffset: 50,
    borderWidth: 2
  }
],

},
options: {
  color:'<?php echo $txt;?>',
  parsing: {
      key: 'nested.value'
  },
  responsive: true,
  plugins: {
    
    legend: {
      position: 'bottom',
    },
    
    title: {
      
      padding:{
        top:10,
        bottom:20,
      },
      color:'<?php echo $txt;?>',
      font: {
        color: 'red',
        size: 12,
        family: 'tahoma',
       
      },
      display: true,
      text:'number of reservations for each time period'
    }
  }
},



};























var ctx = document.getElementById('days').getContext('2d');
var days_pie = new Chart(ctx,ppie);




var ctx = document.getElementById('time_per').getContext('2d');
var time_pie = new Chart(ctx,ppie2 );



var ctx = document.getElementById('lines_types_week').getContext('2d');
var pp11 = new Chart(ctx,ttgg4);



var ctx = document.getElementById('lines_types_year').getContext('2d');
var pp112 = new Chart(ctx, ttgg2);


var ctx = document.getElementById('lines_types_month').getContext('2d');
var pp113 = new Chart(ctx, ttgg3);



var ctx = document.getElementById('lines_types_all').getContext('2d');
var pp114 = new Chart(ctx, ttgg);








$('.bars').click(function(){

  



  ttgg.type = "bar";
  ttgg2.type = "bar";
  ttgg3.type = "bar";
  ttgg4.type = "bar";

  ttgg.options.scales.x.stacked = true;
  ttgg.options.scales.y.stacked = true;
  ttgg2.options.scales.x.stacked = true;
  ttgg2.options.scales.y.stacked = true;
  ttgg3.options.scales.x.stacked = true;
  ttgg3.options.scales.y.stacked = true;
  ttgg4.options.scales.x.stacked = true;
  ttgg4.options.scales.y.stacked = true;



    pp11.update();
    pp112.update();
    pp113.update();
    pp114.update();

    







});


$('.line').click(function(){

  



  ttgg.type = "line";
  ttgg2.type = "line";
  ttgg3.type = "line";
  ttgg4.type = "line";

  ttgg.options.scales.x.stacked = false;
  ttgg.options.scales.y.stacked = false;
  ttgg2.options.scales.x.stacked = false;
  ttgg2.options.scales.y.stacked = false;
  ttgg3.options.scales.x.stacked = false;
  ttgg3.options.scales.y.stacked = false;
  ttgg4.options.scales.x.stacked = false;
  ttgg4.options.scales.y.stacked = false;



    pp11.update();
    pp112.update();
    pp113.update();
    pp114.update();

  







});







$('.pie').click(function(){

  ppie.type = "pie";
  ppie2.type = "pie";
  days_pie.update();
    time_pie.update();



});










$('.donut').click(function(){


  ppie.type = "doughnut";
  ppie2.type = "doughnut";
  days_pie.update();
  time_pie.update();
    
});


























































































/*

var ctx = document.getElementById('res_me_bars').getContext('2d');

var res_me_bars_chart = new Chart(ctx, {
  
    type: 'bar',
data:{
  labels: <?php echo json_encode($mine_types2);?>,
  datasets: [{
    axis: 'y',
    label: 'number of reservations',
    data:<?php echo json_encode($mine_types);?>,
    fill: false,
    backgroundColor: [
      'rgb(255,127,80,0.1) ',
      'rgb(019,112,214,0.1)',
      'rgba(218,112,214, 0.1)'
     
    ],
    borderColor: [
      'rgb(255,127,80)',
      'rgb(019,112,214)',
      'rgb(218,112,214)'
    ],
    borderWidth: 2,
   
    
  }]
},
labels:<//?php echo json_encode($mine_types2);?>,


    options: {
      
     indexAxis: 'y',
        scales: {
      xAxes: [{
        ticks: {
          beginAtZero: true
        }
      }],
            y: {
              
                beginAtZero: true
            }
        }
    }
});

*/






























<?php

   /*
$perc=100/(array_sum($all_types));

for ($i = 0; $i < count($all_types); $i++) {
  
  $all_types[$i]=round($all_types[$i]*$perc, 2);
}


for ($i = 0; $i < count($psg); $i++) {
 

  if(isset($psg[$i+2])){
    
      $percc=100/($psg[$i]+$psg[$i+1]+$psg[$i+2]);
       $psg[$i]=round($psg[$i]*$percc, 2); 
       if(isset($psg[$i+1])){$psg[$i+1]=round($psg[$i+1]*$percc, 2);}
       if(isset($psg[$i+2])){$psg[$i+2]=round($psg[$i+2]*$percc, 2);}
     
    
       

    
  }elseif(isset($psg[$i+1])){

      $percc=100/($psg[$i]+$psg[$i+1]+$psg[$i+2]);
       $psg[$i]=round($psg[$i]*$percc, 2); 
       if(isset($psg[$i+1])){$psg[$i+1]=round($psg[$i+1]*$percc, 2);}
   
       

    

  }else{
      $percc=100/($psg[$i]+$psg[$i+1]+$psg[$i+2]);
       $psg[$i]=round($psg[$i]*$percc, 2); 
    
       
  }

  
  




 
}

*/




?>







var ctx = document.getElementById('res_all_pie').getContext('2d');
var res_me_bars_chart = new Chart(ctx, {



  

  type: 'pie',
  data: {
  datasets: [
   
    
    {
      
      data: <?php echo json_encode($all_types);?>,
      backgroundColor: <?php echo json_encode($all_types3);?>,
      borderColor: <?php echo json_encode($colorcolor);?>,
      borderWidth: 2,
      hoverOffset: 20,
    },
    {
      
      data: <?php echo json_encode($psg);?>,
      backgroundColor: <?php echo json_encode($colis2);?>,
      //$colis for color borders
      borderColor: <?php echo json_encode($colorcolor);?>,
      borderWidth: 2,hoverOffset: 20,
    }
  ],

},
  options: {
  
  
    layout:{
      padding:20
    },
    
    
    responsive: true,
  
    
  },



});






















































<?php
   
$rrff=100/(array_sum($room_res2));
$rrff2=100/(array_sum($room_res22));
$rrff3=100/(array_sum($room_res222));


  for ($i = 0; $i < count($room_res2); $i++) {
  
   $room_res2[$i]=round($room_res2[$i]*$rrff, 2)
   ;
}

for ($i = 0; $i < count($room_res22); $i++) {
  
 $room_res22[$i]=round($room_res22[$i]*$rrff2, 2)
 ;
}

for ($i = 0; $i < count($room_res222); $i++) {
  
 $room_res222[$i]=round($room_res222[$i]*$rrff3, 2)
 ;
}
?>







/*
for borders.
<?php //echo json_encode($room_res4);?>
<?php //echo json_encode($room_res44);?>
<?php //echo json_encode($room_res444);?>
*/






var ctx = document.getElementById('piepie').getContext('2d');
var res_me_bars_chart = new Chart(ctx, {




  type: 'pie',
  data: {
  labels: ['percentage','percentage','percentage','percentage','percentage',
           'percentage','percentage','percentage','percentage','percentage',
           'percentage','percentage','percentage','percentage','percentage',
           'percentage','percentage','percentage','percentage','percentage',
           'percentage','percentage','percentage','percentage','percentage',
           'percentage','percentage','percentage','percentage','percentage',
           'percentage','percentage','percentage','percentage','percentage',
           'percentage','percentage','percentage','percentage','percentage',
           'percentage','percentage','percentage','percentage','percentage',
           'percentage','percentage','percentage','percentage','percentage',],
  datasets: [

    
    {
      label: 'names',
      data:<?php echo json_encode($room_res2);?>,
      backgroundColor: <?php echo json_encode($room_res3);?>,
    borderColor: '<?php echo $colorcolor;?>',
      borderWidth: 2,hoverOffset: 20,
    },

    {
      label: 'names',
      data:<?php echo json_encode($room_res22);?>,
      backgroundColor: <?php echo json_encode($room_res33);?>,
    borderColor: '<?php echo $colorcolor;?>',
      borderWidth: 2,hoverOffset: 20,
    },


    {
      label: 'names',
      data:<?php echo json_encode($room_res222);?>,
      backgroundColor: <?php echo json_encode($room_res333);?>,
    borderColor: '<?php echo $colorcolor;?>',
      borderWidth: 2,hoverOffset: 20,
    },


  ],

},
  options: {
    layout:{
      padding:20
    },
    
   
    
    responsive: true,


    


    tooltips: {
                  enabled: true,
                  callbacks: {
                  label: function(tooltipItem, data) {
                      var label = data.datasets[tooltipItem.datasetIndex].label;
                      var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                      return label + ' : ' + val + ' Mb';
                  }
                }
              },







    plugins: {
      legend: false,
    }
  },



});















var ctx = document.getElementById('res_rooms_bars1').getContext('2d');
var res_me_bars_chart = new Chart(ctx, {
  
    type: 'bar',
data:{
  labels: <?php echo json_encode($room_res1f);?>,
  datasets: [{

    barPercentage:1,
        barThickness: 10,
        maxBarThickness: 300,
        minBarLength: 0,


    axis: 'y',
    label: 'number of reservations',
    data:<?php echo json_encode($room_res2);?>,
    fill: false,
    backgroundColor: <?php echo json_encode($room_res3);?>,
    borderColor: <?php echo json_encode($room_res4);?>,
    borderWidth: 2
  }]
},
labels:<?php echo json_encode($room_res1f);?>,


    options: {
      responsive:true,
      maintainAspectRatio:true,
      indexAxis: 'y',
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});





var ctx = document.getElementById('res_rooms_bars2').getContext('2d');
var res_me_bars_chart = new Chart(ctx, {
  
    type: 'bar',
data:{
  labels: <?php echo json_encode($room_res11f);?>,
  datasets: [{

    barPercentage:1,
        barThickness: 10,
        maxBarThickness: 300,
        minBarLength: 0,

    axis: 'y',
    label: 'number of reservations',
    data:<?php echo json_encode($room_res22);?>,
    fill: false,
    backgroundColor: <?php echo json_encode($room_res33);?>,
    borderColor: <?php echo json_encode($room_res44);?>,
    borderWidth: 2
  }]
},
labels:<?php echo json_encode($room_res11f);?>,


    options: {
      responsive:true,
      maintainAspectRatio:true,
      indexAxis: 'y',
              scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});





var ctx = document.getElementById('res_rooms_bars3').getContext('2d');
var res_me_bars_chart = new Chart(ctx, {
  
    type: 'bar',
data:{
  labels: <?php echo json_encode($room_res111f);?>,
  datasets: [{

    barPercentage:1,
        barThickness: 10,
        maxBarThickness: 300,
        minBarLength: 0,

    axis: 'y',
    label: 'number of reservations',
    data:<?php echo json_encode($room_res222);?>,
    fill: false,
    backgroundColor: <?php echo json_encode($room_res333);?>,
    borderColor: <?php echo json_encode($room_res444);?>,
    borderWidth: 2
  }]
},
labels:<?php echo json_encode($room_res111f);?>,


    options: {      indexAxis: 'y',

      responsive:true,
      maintainAspectRatio:true,
     // indexAxis: 'y',
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
























































var ctx = document.getElementById('stacked').getContext('2d');
var stacked = {
  
    type: 'bar',
    data:{
  labels: <?php echo json_encode($all_types2);?>,
  datasets: [
   
    
    {
      label: 'amphis reserved',
      barPercentage:0.9,
        barThickness: 20,
        maxBarThickness: 100,
        minBarLength: 0,

      
      data: <?php echo json_encode($arar);?>,
      backgroundColor: [
      'rgb(255,127,80,0.1) '
      
     
    ],
    borderColor: [
      'rgb(255,127,80)'
  
    ],
    borderWidth: 2
    },
    {   barPercentage:0.9,
        barThickness: 20,
        maxBarThickness: 100,
        minBarLength: 0,

      data: <?php echo json_encode($arar2);?>,

      label: 'td classes reserved',
      backgroundColor: [
      'rgb(019,112,214,0.1)'
     
    ],
    borderColor: [
      'rgb(019,112,214)'
    ],
    borderWidth: 2
    },
    {   barPercentage:0.9,
        barThickness: 20,
        maxBarThickness: 100,
        minBarLength: 0,
      label: 'tp classes reserved',
      data: <?php echo json_encode($arar3);?>,
      backgroundColor: [
      'rgba(218,112,214, 0.1)'
     
    ],
    borderColor: [
      'rgb(218,112,214)'
    ],
    borderWidth: 2
    },
  ]
},
labels:'fzegergh',



options: {
      responsive: true,
    // indexAxis: 'y',
        scales: {
         
          x: {
        stacked: true,
      },
      y: {
        stacked: true,
        beginAtZero: true
      },
           
      
        }
    }
};



for (let i = 0; i <5; i++) {
 // stacked.data.datasets.push(i+5);
  }



  new Chart(ctx,stacked );

































  </script>








</div>











































































































<footer class="text-center text-lg-start text-muted">
  <div class="container">
  <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
  >
    <div class="me-5 d-none d-lg-block">
    </div>

    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
  </section>

  <section class="">
    <div class="container text-center text-md-start mt-5">
      <div class="row mt-3">
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            <img src="../assets/images/logo-black.png" class="footer-logo">
          </h6>
          <p class="ppp">
            This Is Not The Officaily Website Of Constantine 2 University
          </p>
        </div>

        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Website
          </h6>
          <p>
            <a href="#!" class="text-reset text-light">Home</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-light">How Does It Work</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-light">Admin</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-light">Sign Up</a>
          </p>
        </div>

        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful Links
          </h6>
          <p>
            <a href="#!" class="text-reset text-light">Privicy</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-light">Policy</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-light">Contact</a>
          </p>
          <p>
            <a href="#!" class="text-reset text-light">Help</a>
          </p>
        </div>

        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p>Constantine, NV 10012</p>
          <p>
            info@example.com
          </p>
          <p> + 213 234 567 88</p>
          <p> + 213 234 567 89</p>
        </div>
      </div>
    </div>
  </section>
<hr>
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0);">
    © 2021 Copyright: Made By LATRAOUI Walid | OUCHETATI Ilyes
  </div>
</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/javascript2.js"></script>
<script src="../assets/js/javascript4.js"></script>

</body>
</html>