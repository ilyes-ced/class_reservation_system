<?php



if($_COOKIE['login']==null){header("Location: login");}
if(isset($_COOKIE['admin'])){header("Location: login");}

function check_accs(){

 
  require('connect.php');



      $req=$bdd->query('SELECT * from users where expiration_date<>"none"');
      while($rr=$req->fetch()){
  if(date("Y-m-d")>$rr['expiration_date']){
  $bdd->query('UPDATE users SET expiration_date="none",status="unactive" where id='.$rr["id"]);
  }
  }


  require('disconnect.php');
      
}

check_accs();



if(isset($_POST['change_mode'])){

  
  if($_COOKIE['mode']=='light'){
    setcookie('mode','dark',time()+365*24*3600,"/");
    $_COOKIE['mode']='dark';
  }elseif($_COOKIE['mode']=='dark'){
    setcookie('mode','light',time()+365*24*3600,"/");
    $_COOKIE['mode']='light';
  }else{
    setcookie('mode','dark',time()+365*24*3600,"/");
    $_COOKIE['mode']='dark';
  }
}



if(isset($_COOKIE['mode'])){}else{
  setcookie('mode','light',time()+365*24*3600,'/');

  $_COOKIE['mode']='light';}




$username=$_COOKIE['login'];

$user=  $_COOKIE['login'];



$rr=array();
$vv=array();

$cols = json_decode($_COOKIE['colors'], true);
$cols2 = json_decode($_COOKIE['colors']);


foreach($cols as $key=>$value){


array_push($rr,$key,$value);



}

$vv=implode('|',$rr);






if(isset($_POST['dem_date'])){
      $date1=$_POST['dem_date'];}else{
     if(isset($date2)){
     $date1=$date2;
     }elseif(isset($_POST['the_date'])){
       $date1=$_POST['the_date'];
     }else{
           if(isset($_POST['this_date'])){
             $date1=($_POST['this_date']);
             }else{
             $jj=new DateTime();
             $date1 = $jj->format('Y-m-d');}
     }
}
if(isset($_POST['this_date'])){
  setcookie('dater',$_POST['this_date'],time()+600,"/");
  $_COOKIE['dater']=$_POST['this_date'];
}else{

if(isset($_COOKIE['dater'])){
$date1=$_COOKIE['dater'];
}else{
  setcookie('dater',$date1,time()+600,"/");
  $_COOKIE['dater']=$date1;

}
}
  

function f1($xx){
  if($xx=='amphi'){
  $table='table_amphi';
  $room='AMPHI ';
  $cont='cell';
  $array='ara';
  }elseif($xx=='td'){
    $table='table_td';
  $room='TD ';
    $cont='box';
    $array='ara2';
  }elseif($xx=='tp'){
  $table='table_tp';
  $room='TP ';
  $cont='square';
    $array='ara3';
  } 

  $exists=0;
  global $date1;
  $ara=array();
   
  require('connect.php');

    $req = $bdd->query('SELECT datee FROM '.$table);

    while ($result = $req->fetch()){
      if($result['datee']==$date1){
        $exists=1;
        break;
      }else{$exists=0;}
    }




    if($exists==1){
    $req = $bdd->prepare('SELECT * FROM '.$table.' WHERE datee= :d');
    $req->execute(array(
        'd' => $date1
    ));


    while($dd=$req->fetch()){


    $req2 = $bdd->query('SELECT number_of_periods FROM time');
    $result= $req2->fetch();
  
    $req3 = $bdd->query('SELECT indexes FROM rooms WHERE room="'.$room.'" order by indexes');
  


    while($bb=$req3->fetch()){
      global  ${$array.$bb['indexes']};
      ${$array.$bb['indexes']}=array();
      
      

    for($i=1;$i<=$result['number_of_periods'];$i++){


     $name=$cont.($bb['indexes']-1)*$result['number_of_periods']+$i;

     array_push(${$array.$bb['indexes']},$dd[$name]) ; 
    


     
    }}
   
    }
    }else{
      $req = $bdd->prepare('INSERT INTO '.$table.'(datee) VALUES(:v0)');
      $req->execute(array(
          'v0' => $date1,
         
        ));

        $req = $bdd->prepare('SELECT * FROM '.$table.' WHERE datee= :d');
        $req->execute(array(
            'd' => $date1
        ));

        while($dd=$req->fetch()){

         
          $req2 = $bdd->query('SELECT number_of_periods FROM time');
          $result= $req2->fetch();
        
          $req3 = $bdd->query('SELECT indexes FROM rooms WHERE room="'.$room.'" order by indexes');
        
      
      
          while($bb=$req3->fetch()){
           
            global  ${$array.$bb['indexes']};
            ${$array.$bb['indexes']}=array();
            
            
      
          for($i=1;$i<=$result['number_of_periods'];$i++){
      
      
           $name=$cont.($bb['indexes']-1)*$result['number_of_periods']+$i;
      
           array_push(${$array.$bb['indexes']},$dd[$name]) ; 
          
          }      


        }
      
        
        }


    }

   
    require('disconnect.php');
}



f1($am='amphi');
f1($td='td');
f1($tp='tp');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTIC</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/fafa.png">


<!--

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    
<script src="../assets/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 -->



    <link rel="stylesheet" href="../assets/css/bootstrap-icons.css" >
    <link rel="stylesheet" href="../assets/styles/style7.php" >
    <link rel="stylesheet" href="../assets/css/bootstrap.css" >


  </head>

<body class="light">
<?php
require('connect.php');
$req = $bdd->query("SELECT * FROM time");
$result = $req->fetch();
?>


<script>
var times='<?php echo $result['number_of_periods'];?>';
var user1='<?php echo $_COOKIE['login'];?>';
var colors_array='<?php echo $vv;?>';
</script>


  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="inside_nav container">
    <img src="../assets/images/logo-black.png" class="navbar-brand"  href=""></img>

    
    <button  style="border:  0px solid;"  class="navbar-toggler" id='navnav' type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       
    
    
  <?php 
if($_COOKIE['mode']=='light'){
  echo '<i class="bi bi-list " style="font-size:30px; margin:0px !important;"></i>';
}else{
  echo '<i class="bi bi-list" style="font-size:30px;color:rgb(200,200,200);text-align:center !important;margin:0px !important;"></i>';
}
    ?>    </button>

    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
       
        
        <li class="nav-item">
            <a class="nav-link" href="all_reservation_page">home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="my_reservation_page">My Reservations</a>
        </li>
        
<?php

require('connect.php');



$req = $bdd->prepare('SELECT * FROM contact WHERE reciever=:v');
$req->execute(array(
 'v'=>$_COOKIE['login'],
));

$number_of_rows = $req->Rowcount(); 
if($number_of_rows==0){
       echo '<li class="nav-item">
            <a class="nav-link" href="msg">REQUESTS</a>
        </li>';}else{echo '<li class="nav-item">
          <a style="color: rgba(248,72,56) !important;" class="nav-link" href="msg">REQUESTS<span style="background-color:rgb(248,72,56) !important;" class="badge rounded-circle bg-danger">'.$number_of_rows.'</span></a>
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
        
        <a   onclick="myFunction()"  style='cursor: pointer;' class="mm nav-link active "><?php echo $_COOKIE['login'];?> </a>
      
    
      </li>
   <li class="nav-item jj">
 

<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">
 

<?php
if($_COOKIE['mode']=='light'){
  echo ' <svg width="24px" height="24px" fill="black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <g>
      <path fill="none" d="M0 0h24v24H0z"/>
      <path d="M12 14l-4-4h8z"/>
  </g>
</svg>';
}else{
  echo ' <svg width="24px" height="24px" fill="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
  <g>
      <path fill="none" d="M0 0h24v24H0z"/>
      <path d="M12 14l-4-4h8z"/>
  </g>
</svg>';
}
?>
   </button>
  <div id="myDropdown" class="dropdown-content">

  <?php
if($_COOKIE['mode']=='light'){

   echo'<a href="#" id="change_the_mode"><i class="bi bi-moon"></i>dark mode</a>';
  }else{
    echo'<a href="#" id="change_the_mode"><i class="bi bi-sun"></i>light mode</a>';

  }
  ?>  <span class="devider"></span>
  <a class="nav-link" href="my_profile_page"><i class="bi bi-person"></i>profile</a>
  <span class="devider"></span>

<a class="nav-link ww" href="stats"><i class="bi bi-pie-chart"></i>statistics</a>
  <span class="devider"></span>
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
























<form action='all_reservation_page' id="mode_hidden_form" method="post">
  <input type="hidden" id="some_some" name="change_mode" required/>

</form>




























  <div class="container mt-5">



























 

    <form  id='this_form' action="all_reservation_page" method="post">
      <div class="row justify-content-md-center">
        <div class="col">
          <div class="form-group">
              <div class="input-group">
              <div class="input-group-prepend">
              </div>
              <input style='width:40%;margin-right: 10px;' name='this_date' type="date"  value='<?php echo $date1; ?>' 
              class="date form-control date-input" id="pure-date" aria-describedby="date-design-prepend">
              
              <select  style="text-align-last:center;width:40%;margin-left: 10px;" name="type" id="the_display" class="select form-control ">
              <option disabled selected value >select display</option>
              <option value="all"  >ALL</option>
              <option value="amphi" >AMPHI</option>
              <option value="td"  >TD</option>
              <option value="tp"  >TP</option>
            </select> 
            </div>
            </div>
        </div>
    </form>
  </div>


























  
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-container row">
        <div class=" col-6">

        <form action='all_reservation_page' id="ninja" method="post">
          <div  class="form-check">
            <input name='check[]' class="form-check-input" type="checkbox" value="datashow" id="dev_cell1">
            <label class="form-check-label" for="defaultCheck1">
              datashow
            </label>
          </div>
          <div class="form-check">
            <input name='check[]' class="form-check-input" type="checkbox" value="router" id="dev_cell2">
            <label class="form-check-label" for="defaultCheck1">
              router
            </label>
          </div>
          <div class="form-check">
            <input name='check[]' class="form-check-input" type="checkbox" value="switch" id="dev_cell3">
            <label class="form-check-label" for="defaultCheck1">
              switch
            </label>
          </div>
          <div class="form-check">
            <input name='check[]' class="form-check-input" type="checkbox" value="access point" id="dev_cell4">
            <label class="form-check-label" for="defaultCheck1">
              access point
            </label>
          </div>
        </div>



    </div>

</form>
    <button id='reserve' type="button"  class="btn btn-secondary mt-3">RESERVE</button>
    </div>

  </div>

        


































          




  <div id="myModal_demand" class="modal_demand">
<!-- Modal content -->
<div class="modal-content">
  <span class="close">&times;</span>
  <div class="modal-container row">
    <div class=" col-6">
    <form name='form_dem' action='all_reservation_page' id="send_dem" method="post">
    <div  class="form-check fzefzef">
            <input name='check2[]' class="form-check-input" type="checkbox" value="datashow" id="mp1">
            <label class="form-check-label" for="defaultCheck1">
              datashow
            </label>
          </div>
          <div class="form-check">
            <input name='check2[]' class="form-check-input" type="checkbox" value="router" id="mp2">
            <label class="form-check-label" for="defaultCheck1">
              router
            </label>
          </div>
          <div class="form-check">
            <input name='check2[]' class="form-check-input" type="checkbox" value="switch" id="mp3">
            <label class="form-check-label" for="defaultCheck1">
              switch
            </label>
          </div>
          <div class="form-check">
            <input name='check2[]' class="form-check-input" type="checkbox" value="access point" id="mp4">
            <label class="form-check-label" for="defaultCheck1">
              access point
            </label>
          </div>

  <input type="hidden" id="dem_cell" name="dem_cell" required/>
  <input type="hidden" id="dem_date" name="dem_date" required/>
</form>
<button style='width:100%;' id='send_demand' type="button"  class="btn btn-secondary mt-3">SEND DEMAND</button>
</div>
</div>
</div>
</div>











































<div id="suc" class="suc">

<!-- Modal content -->
<div class="modal-content">
  
<div class="modal-container row">
<div class=" col-6">



<p style='text-align:center;padding-top:10px;' class='p1'> 
message sent
</p>



</div>

</div>


</div>

</div>


<div id="suc2" class="suc2">

<!-- Modal content -->
<div class="modal-content">
  
<div class="modal-container row">
<div class=" col-6">


<p style='text-align:center;padding-top:10px;' class='p1'> 
reservation made successfully
</p>

</div>

</div>


</div>

</div>








<div id="suc3" class="suc3">

<!-- Modal content -->
<div class="modal-content">
  
<div class="modal-container row">
<div class=" col-6">


<p style='text-align:center;padding-top:10px;' class='p1'> 
demand sent successfully
</p>

</div>

</div>


</div>

</div>














<input type='hidden' id='some_cell'>
<input type='hidden' id='some_date'>
<input type='hidden' id='some_reciever'>







  <div id="myModal2" class="modal2">
<!-- Modal content -->
<div class="modal-content">
  <span class="close">&times;</span>
  <div class="modal-container row">
    <div class="col-6 herehere">



    
    


  
</div>
</div>
</div>
</div>

































































  <div class="table-box mt-5">
   
  <div id='dis_amphi'>
    

  
    
<h3 class="mb-5">AMPHI</h3>
  <?php 
      
    
require('connect.php');
      $req = $bdd->query("SELECT number_of_periods FROM time");
      $req2 = $bdd->query("SELECT * FROM time");
      $req3 = $bdd->query("SELECT * FROM rooms where room='AMPHI '");
      $result = $req->fetch();
      $result2 = $req2->fetch();
      $width=100/($result['number_of_periods']+1);



if($req3->rowCount()>0){
$html='<div class="table-box mt-5">
<div class="table-row table-head">
    <div style="width:'.$width.'%" class="table-cell first-cell table-head-one nn">
        <a>AMPHI</a>
    </div>';



echo $html;




      $html='';

    for($i=1;$i<=$result['number_of_periods'];$i++){
      $f='';
if($i==$result['number_of_periods']){$f='last-cell';}
$html.='
 
<div style="width:'.$width.'%" class="table-cell nn '.$f.'">
<a>'.$result2['period'.$i.''].'</a></div>

';
    }
      

echo $html;
}else{echo '<div class="table-box mt-5">
<h3 class="mb-5" style="text-align-last:center">no amphis added</h3>';}



  echo'  </div>';

  





$req = $bdd->query('SELECT * FROM rooms WHERE room="AMPHI " order by indexes');
   
  while ($result3 = $req->fetch()){

if($result3['special']=='special'){$sp='special';$r='(S)';}else{$sp='';$r='';}


  $var='<div class="table-row">
  <div style="width:'.$width.'%" class="table-cell first-cell">
      <a class="pp">'.$result3['room']." ".$result3['indexes'].' '.$r.'</a>
  </div>';




  if($result['number_of_periods']>1){
    for($i=1;$i<=$result['number_of_periods']-1;$i++){
    $id=($result3['indexes']-1)*$result['number_of_periods']+$i;
    
     

    $var.='
     
    <div style="width:'.$width.'%" class="table-cell">
    

    <a id="cell'.$id.'" class="pp '.$sp.'">'.${'ara'.$result3['indexes']}[$i-1].'</a>
    <div class="contact">
      <a href="sign_up_page.html">Send A Msg </a>
    </div>
    <div class="reservation">
      <a>Reserver</a>
    </div>
    <div class="demand">
    <a>demand</a>
  </div>


    </div>
    ';
        }}else{$id=$result3['indexes']-1;$i=1;}




        $var.= '<div style="width:'.$width.'%" class="table-cell last-cell">
    <a id="cell'.$id+1 .'" class="pp '.$sp.'">'.${'ara'.$result3['indexes']}[$i-1].'</a>
    <div class="contact">
      <a href="msg_page.html">Send A Msg</a>
    </div>
    <div class="reservation">
      <a>Reserver</a>
    </div>
    <div class="demand">
    <a>demand</a>
  </div>
  </div></div>';
  echo $var; 
}
?>
</div>
</div>












































































<div id='dis_td'>


<h3 class="mb-5">TD Classes</h3>

<div class="table-box mt-5">
 



<?php 
      
    
require('connect.php');
      $req = $bdd->query("SELECT number_of_periods FROM time");
      $req2 = $bdd->query("SELECT * FROM time");
      $result = $req->fetch();
      $result2 = $req2->fetch();
      $width=100/($result['number_of_periods']+1);


$req3 = $bdd->query("SELECT * FROM rooms where room='TD  '");
if($req3->rowCount()>0){



$html='<div class="table-box mt-5">
<div class="table-row table-head">
    <div style="width:'.$width.'%" class="table-cell first-cell table-head-one nn">
        <a>TD Classes</a>
    </div>';



echo $html;




      $html='';

    for($i=1;$i<=$result['number_of_periods'];$i++){
      $f='';
if($i==$result['number_of_periods']){$f='last-cell';}
$html.='
 
<div style="width:'.$width.'%" class="table-cell nn '.$f.'">
<a>'.$result2['period'.$i.''].'</a>
</div>
';
    }
      

echo $html;
echo'  </div>';
}else{echo '<div class="table-box mt-5">
  <h3 class="mb-5" style="text-align-last:center">no td classes added</h3>';}

 
  





$req = $bdd->prepare('SELECT * FROM rooms WHERE room=:v order by indexes');
    $req->execute(array(
      'v' => 'TD '
    ));

  while ($result3 = $req->fetch()){
    if($result3['special']=='special'){$sp='special';$r='(S)';}else{$sp='';$r='';}
    
  $var='<div class="table-row">
  <div style="width:'.$width.'%" class="table-cell first-cell">
      <a class="pp">'.$result3['room']." ".$result3['indexes'].' '.$r.'</a>
  </div>';



  if($result['number_of_periods']>1){

  for($i=1;$i<=$result['number_of_periods']-1;$i++){
    $id=($result3['indexes']-1)*$result['number_of_periods']+$i;

    $var.='
     
    <div style="width:'.$width.'%" class="table-cell">
    

    <a id="box'.$id.'" class="pp '.$sp.'">'.${'ara2'.$result3['indexes']}[$i-1].'</a>
    <div class="contact">
      <a href="sign_up_page.html">Send A Msg </a>
    </div>
    <div class="reservation">
      <a>Reserver</a>
    </div>
    <div class="demand">
    <a>demand</a>
  </div>
    </div>
    ';
        }}else{$id=$result3['indexes']-1;$i=1;}







        $var.= '<div style="width:'.$width.'%" class="table-cell last-cell">
    <a id="box'.$id+1 .'" class="pp '.$sp.'">'.${'ara2'.$result3['indexes']}[$i-1].'</a>
    <div class="contact">
      <a href="msg_page.html">Send A Msg</a>
    </div>
    <div class="reservation">
      <a>Reserver</a>
    </div>
    <div class="demand">
    <a>demand</a>
  </div>
  </div> 
  
  </div>';
  echo $var; 
}








?>
</div>
</div>

</div>






































































<div id='dis_tp'>

<div class="table-box mt-5">

<h3 class="mb-5">TP Classes</h3>

</div>


<?php 


require('connect.php');
$req = $bdd->query("SELECT number_of_periods FROM time");
$req2 = $bdd->query("SELECT * FROM time");
$result = $req->fetch();
$result2 = $req2->fetch();
$width=100/($result['number_of_periods']+1);


$req3 = $bdd->query("SELECT * FROM rooms where room='TP '");
if($req3->rowCount()>0){



$html='<div class="table-box mt-5">
<div class="table-row table-head">
<div style="width:'.$width.'%" class="table-cell first-cell table-head-one nn">
<a>TP Classes</a>
</div>';



echo $html;




$html='';

for($i=1;$i<=$result['number_of_periods'];$i++){
  $f='';
  if($i==$result['number_of_periods']){$f='last-cell';}
  $html.='
   
  <div style="width:'.$width.'%" class="table-cell nn '.$f.'">
<a>'.$result2['period'.$i.''].'</a>
</div>
';
}


echo $html;
}else{echo '<div class="table-box mt-5">
  <h3 class="mb-5" style="text-align-last:center">no tp classes added</h3>';}
  

echo'  </div>';







$req = $bdd->prepare('SELECT * FROM rooms WHERE room=:v order by indexes');
$req->execute(array(
'v' => 'TP '
));

while ($result3 = $req->fetch()){
  if($result3['special']=='special'){$sp='special';$r='(S)';}else{$sp='';$r='';}
 
$var='<div class="table-row">
<div style="width:'.$width.'%" class="table-cell first-cell">
<a class="pp">'.$result3['room']." ".$result3['indexes'].' '.$r.'</a>
</div>';



if($result['number_of_periods']>1){

for($i=1;$i<=$result['number_of_periods']-1;$i++){
$id=($result3['indexes']-1)*$result['number_of_periods']+$i;

$var.='

<div style="width:'.$width.'%" class="table-cell">


<a id="square'.$id.'" class="pp '.$sp.'">'.${'ara3'.$result3['indexes']}[$i-1].'</a>
<div class="contact">
<a href="sign_up_page.html">Send A Msg </a>
</div>
<div class="reservation">
<a>Reserver</a>
</div>
<div class="demand">
<a>demand</a>
</div>

</div>
';
}}else{$id=$result3['indexes']-1;$i=1;}







$var.= '<div style="width:'.$width.'%" class="table-cell last-cell">
<a id="square'.$id+1 .'" class="pp '.$sp.'">'.${'ara3'.$result3['indexes']}[$i-1].'</a>
<div class="contact">
<a href="msg_page.html">Send A Msg</a>
</div>
<div class="reservation">
<a>Reserver</a>
</div>
<div class="demand">
<a>demand</a>
</div>
</div>
</div>';
echo $var; 
}








?>
</div></div>























































<div id="myModal3" class="modal3">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-container row">
        <div class=" col-6">

        <form action='all_reservation_page' id="ninja_2" method="post">
          <div  class="form-check">
            <input name='check[]' class="form-check-input" type="checkbox" value="datashow" id="dev_box1">
            <label class="form-check-label" for="defaultCheck1">
              DATASHOW
            </label>
          </div>
          <div class="form-check">
            <input name='check[]' class="form-check-input" type="checkbox" value="router" id="dev_box2">
            <label class="form-check-label" for="defaultCheck1">
              router
            </label>
          </div>
          <div class="form-check">
            <input name='check[]' class="form-check-input" type="checkbox" value="switch" id="dev_box3">
            <label class="form-check-label" for="defaultCheck1">
              switch
            </label>
          </div>
          <div class="form-check">
            <input name='check[]' class="form-check-input" type="checkbox" value="access point" id="dev_box4">
            <label class="form-check-label" for="defaultCheck1">
              access point
            </label>
          </div>
        </div>



    </div>
 
</form>
    <button id='reserve2' type="button"  class="btn btn-secondary mt-3">RESERVE</button>
    </div>

  </div>





































  <div id="myModal4" class="modal4">

<!-- Modal content -->
<div class="modal-content">
  <span class="close">&times;</span>
  <div class="modal-container row">
    <div class=" col-6">

    <form action='all_reservation_page' id="ninja_3" method="post">
      <div  class="form-check">
        <input name='check[]' class="form-check-input" type="checkbox" value="datashow" id="dev_square1">
        <label class="form-check-label" for="defaultCheck1">
          datashow
        </label>
      </div>
      <div class="form-check">
        <input name='check[]' class="form-check-input" type="checkbox" value="router" id="dev_square2">
        <label class="form-check-label" for="defaultCheck1">
          router
        </label>
      </div>
      <div class="form-check">
        <input name='check[]' class="form-check-input" type="checkbox" value="switch" id="dev_square3">
        <label class="form-check-label" for="defaultCheck1">
          switch
        </label>
      </div>
      <div class="form-check">
        <input name='check[]' class="form-check-input" type="checkbox" value="access point" id="dev_square4">
        <label class="form-check-label" for="defaultCheck1">
          access point
        </label>
      </div>
    </div>



</div>


</form>
<button id='reserve3' type="button"  class="btn btn-secondary mt-3">RESERVE</button>
</div>

</div>



























  
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
<!--

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->


<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/javascript.js"></script>
</body>
</html>

