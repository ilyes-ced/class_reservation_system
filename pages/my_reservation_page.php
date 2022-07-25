<?php


if(isset($_POST['delete_it'])){

  
require('connect.php');



if($_POST['delete_it'][0]=='c'){
  $bdd->query('DELETE from reservations1 where users="'.$_COOKIE['login'].'" and datee="'.$_POST['dat'].'" and cell="'.$_POST['delete_it'].'"');
  $bdd->query('UPDATE  table_amphi SET '.$_POST['delete_it'].'="/" where datee="'.$_POST['dat'].'" and '.$_POST['delete_it'].'="'.$_COOKIE['login'].'"');




}elseif($_POST['delete_it'][0]=='b'){
  

  $bdd->query('DELETE from reservations2 where users="'.$_COOKIE['login'].'" and datee="'.$_POST['dat'].'" and box="'.$_POST['delete_it'].'"');
  $bdd->query('UPDATE  table_td SET '.$_POST['delete_it'].'="/" where datee="'.$_POST['dat'].'" and '.$_POST['delete_it'].'="'.$_COOKIE['login'].'"');





}elseif($_POST['delete_it'][0]=='s'){
  
  $bdd->query('DELETE from reservations3 where users="'.$_COOKIE['login'].'" and datee="'.$_POST['dat'].'" and square="'.$_POST['delete_it'].'"');
  $bdd->query('UPDATE  table_tp SET '.$_POST['delete_it'].'="/" where datee="'.$_POST['dat'].'" and '.$_POST['delete_it'].'="'.$_COOKIE['login'].'"');





}





}







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

    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">

-->


    <link rel="stylesheet" href="../assets/css/bootstrap-icons.css" >

    <link rel="stylesheet" href="../assets/styles/style4.php" >
    <link rel="stylesheet" href="../assets/css/bootstrap.css" >
</head>

<body class="light">
    
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="inside_nav container">
      
    <img src="../assets/images/logo-black.png" class="navbar-brand"  href="hero_page.html"></img>
   
   
   
    <button  style="border:  0px solid;"  class="navbar-toggler" id='navnav' type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        ?>    
        </li>
        <li class="nav-item">
            <a class="nav-link" href="my_reservation_page">My Reservations</a>
        </li>
      
        
        
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

<li class="nav-item jj ">
        
        <img   class="ll cir nav-link " src='../assets/<?php echo $image_src;  ?>' />
      
       
        
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
?>
</button>
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







<?php
/*
   require('connect.php');


$req = $bdd->prepare('SELECT * FROM contact WHERE reciever=:v');
$req->execute(array(
 'v'=>$_COOKIE['login'],
));

$number_of_rows = $req->Rowcount(); 
if($number_of_rows==0){
       echo '<li class="nav-item">
            <a class="nav-link" href="msg.php">REQUESTS</a>
        </li>';}else{echo '<li class="nav-item">
          <a style="color: red;" class="nav-link" href="msg.php">REQUESTS</a>
      </li>';}


      require('disconnect.php');
*/
?>


 





<form action='my_reservation_page' id="mode_hidden_form" method="post">
  <input type="hidden" id="some_some" name="change_mode" required/>

</form>







  <div class="container mt-5">
  <div class="d1">
    <h3  class="d2 ffffffffffff" style="cursor: pointer !important;">My Reservations  <i style='font-size:18px;pointer-events: visiblePainted;' class="bi bi-chevron-down"></i></h3>


    
  <div class="d3">
    <a style='cursor:pointer' onclick='ff1()'><i class="bi bi-card-list"></i>list view</a>
    <a style='cursor:pointer'  onclick='ff2()'><i class="bi bi-table"></i>table view</a>
  </div>
</div>










    <div class='table-box my_res' id='my_res'>







    
<div class='the_date_bar'>

<div class='inside_bar1'>
<div id="today_container">

<a id='today'>today</a>

</div>

  </div>




  <div class='inside_bar2'>
  <div id="date1_container">
   <a id='date1'></a>
  </div>

  <div style='display:none' id="date2_container">
   <a id='date2'></a>
  </div>
  </div>


  <div class='inside_bar3'>


  <div id="sub_week_container">
<?php if($_COOKIE['mode']=='dark'){
echo '<img id="sub_week" src="../assets/images/left.svg" >';
}else{
  echo '<img id="sub_week" src="../assets/images/left2.svg" >';
}
?>


  </div>


  <div id="add_week_container">
  <?php if($_COOKIE['mode']=='dark'){
echo '<img id="sub_week" src="../assets/images/right.svg" >';
}else{
  echo '<img id="sub_week" src="../assets/images/right2.svg" >';
}?>
  </div>


  
</div>

</div>







<input type='hidden' id='ddff'>
<input type='hidden' id='ig'>
<input type='hidden' id='gh'>


<script>

const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];









function addDays(d, qty) {
    var dd = d.getDate();
    var mm = d.getMonth();
    var yyyy = d.getFullYear();
    return new Date(yyyy, mm, dd + qty);
}


var date = new Date();
var date2 = new Date();
var date3 = new Date();
var date4 = new Date();




window.onload = function() {







  $(document).on('click','.del_icon_container',function(){



$.ajax({
url: 'my_reservation_page', 
method: "POST",
data:{'delete_it':$('#ig').val(),'dat':$('#ddff').val()},
success: function(data){
  
$(this).addClass('empt');
$(this).find('a').text('eg');
}

                
});  

$(".modal_res").hide();
var ffjjkk=$('#gh').val();

$("#"+ffjjkk).addClass('empt');
$("#"+ffjjkk).find('a').text('');
$("#"+ffjjkk).css('border-left','');
$("#"+ffjjkk).css('background-color','');




});







  $(".to_update").on('click','.table-cell',function(e){


    
    if(new Date(the_date).setHours(0,0,0,0)>new Date().setHours(0,0,0,0)){



  if($(this).find('a').attr('id').charAt(0)=='c' ||$(this).find('a').attr('id').charAt(0)=='b'  ||$(this).find('a').attr('id').charAt(0)=='s' ){
  
    var ig=$(this).find('a').attr('id');
$('#ig').val(ig);

  

  var parts =$('#date2').text().substring(0, 10).split('-');

  
var mydate = new Date(parts[2], parts[1] - 1, parts[0]); 

mydate=addDays(mydate,$(this).index()-1);




var ddff= mydate.getFullYear()+ '-'
+ ('0' + (mydate.getMonth()+1)).slice(-2) + '-'
+('0' + mydate.getDate()).slice(-2) ;
  
  $('#ddff').val(ddff);
        
var fm=$(this).find('a').text();



$.ajax({
    type: "POST",
    url: "../controllers/modal",
    data: {
        'date': ddff,
        'name':$(this).find('a').text(),
        'idddd':$(this).find('a').attr('id'),
        
    },
    success: function(data){

      
      $(".modal_res").css({left: e.pageX});
  $(".modal_res").css({top: e.pageY});
        $(".modal_res").show();


        $('.to_be_inserted').html(data);

    }
});




var gh=$(this).find('a').attr('id');

$('#gh').val($(this).parent().index()+$(this).index());
$(this).attr('id',$(this).parent().index()+$(this).index());

}



  }else{/*alert('no edit past ress');*/}

});





$('#today_container').on('click', function(){

    the_date = new Date();
      var date3 = new Date();

      var gg=('0' + date3.getDate()).slice(-2) + '-'
  + ('0' + (date3.getMonth()+1)).slice(-2) + '-'
  + date3.getFullYear();
  
  $.ajax({
              url: '../controllers/my_res', 
              method: "POST",
              data:{'ab':gg},
              success: function(data){
                $('.to_update').html(data);

                $('.table-cell').each(function(){
                
    if($(this).find('a').text()[0]=='A' && $(this).find('a').text()[6]!='/'){
   // alert($(this).text());
   $(this).css('background-color', 'rgb(255,163,140,0.5)');
    $(this).css('border-left', '5px solid coral');
    }

    if($(this).find('a').text()[1]=='D'){
     // alert($(this).text());
     $(this).css('background-color', 'rgb(019,112,214,0.5');
    $(this).css('border-left', '5px solid rgb(19,112,214)');
    }

    if($(this).find('a').text()[1]=='P'){
     // alert($(this).text());
     $(this).css('background-color', 'rgb(218,112,214,0.5)');
    $(this).css('border-left', '5px solid orchid');
    }


     });
              }
          });  



  for(let i = 0; i <=6; i++){


  
  document.getElementById('d'+i).innerHTML = date3.toLocaleString('en-us', {weekday: 'short'})+'<br/>' +('0' + date3.getDate()).slice(-2) + '-'
               + ('0' + (date3.getMonth()+1)).slice(-2) + '-'
               + date3.getFullYear();
               date3=addDays(date3,1);     
               
               
  }
  

  the_date=addDays(the_date,7);

  hh=new Date();
  var ffd=hh;
  var ff =('0' + hh.getDate()).slice(-2) + '-'
  + ('0' + (hh.getMonth()+1)).slice(-2) + '-'
  + hh.getFullYear()
/*
  var ff2 =monthNames[hh.getMonth()] + ' '
  + hh.getFullYear();
*/
var ff2 =monthNames[hh.getMonth()] + ' '
  + hh.getFullYear();

  
  jj=addDays(hh,6);

if((('0' + ffd.getDate()).slice(-2))>(('0' + jj.getDate()).slice(-2))){
  var ff2 =monthNames[hh.getMonth()] + ' - '+monthNames[hh.getMonth()+1]+" "
  + hh.getFullYear();
}
  var jj =('0' + jj.getDate()).slice(-2) + '-'
               + monthNames[jj.getMonth()] + '-'
               + jj.getFullYear();

   





  $('#date1_container').find('a').text(ff2);
  $('#date2_container').find('a').text(ff+' to  '+jj);
});







$('#add_week_container').on('click', function(){  

        gg=the_date;
        var dd=the_date

        var gg=('0' + gg.getDate()).slice(-2) + '-'
        + ('0' + (gg.getMonth()+1)).slice(-2) + '-'
        + gg.getFullYear();

        $.ajax({
                    url: '../controllers/my_res', 
                    method: "POST",
                    data:{'ab':gg},
                    success: function(data){
                      $('.to_update').html(data);

                      $('.table-cell').each(function(){
                      
                        if($(this).find('a').text()[0]=='A' && $(this).find('a').text()[6]!='/'){
         // alert($(this).text());
         $(this).css('background-color', 'rgb(255,163,140,0.5)');
          $(this).css('border-left', '5px solid coral');
          }

          if($(this).find('a').text()[1]=='D'){
           // alert($(this).text());
           $(this).css('background-color', 'rgb(019,112,214,0.5');
          $(this).css('border-left', '5px solid rgb(19,112,214)');
          }

          if($(this).find('a').text()[1]=='P'){
           // alert($(this).text());
           $(this).css('background-color', 'rgb(218,112,214,0.5)');
          $(this).css('border-left', '5px solid orchid');
          }



           });
                    }
  });  


    
  for(let i = 0; i <=6; i++){
  

  date=addDays(date,1);
  document.getElementById('d'+i).innerHTML = date.toLocaleString('en-us', {weekday: 'short'})+'<br/>' +('0' + dd.getDate()).slice(-2) + '-'
             + ('0' + (dd.getMonth()+1)).slice(-2) + '-'
             + dd.getFullYear();
             dd=addDays(dd,1);
  }

var ffd=the_date;
  var gg=('0' + the_date.getDate()).slice(-2) + '-'
             + ('0' + (the_date.getMonth()+1)).slice(-2) + '-'
             + the_date.getFullYear();

             var ff2 =monthNames[the_date.getMonth()] + ' '
  + the_date.getFullYear();

  hh=addDays(the_date,6);
  the_date=addDays(the_date,7);

  if((('0' + ffd.getDate()).slice(-2))>(('0' + the_date.getDate()).slice(-2))){
  var ff2 =monthNames[ffd.getMonth()] + ' - '+monthNames[hh.getMonth()]+" "
  + hh.getFullYear();
}


  var bb=('0' + hh.getDate()).slice(-2) + '-'
             + ('0' + (hh.getMonth()+1)).slice(-2) + '-'
             + hh.getFullYear();

             
      

  $('#date1_container').find('a').text(ff2);
  $('#date2_container').find('a').text(gg+' to  '+bb);
});






$('#sub_week_container').on('click', function(){

  the_date=addDays(the_date,-14);
    date3=the_date;
  


  var gg=('0' + date3.getDate()).slice(-2) + '-'
  + ('0' + (date3.getMonth()+1)).slice(-2) + '-'
  + date3.getFullYear();

  $.ajax({
              url: '../controllers/my_res', 
              method: "POST",
              data:{'ab':gg},
              success: function(data){
                $('.to_update').html(data);
                $('.table-cell').each(function(){
                  if($(this).find('a').text()[0]=='A' && $(this).find('a').text()[6]!='/'){
   // alert($(this).text());
   $(this).css('background-color', 'rgb(255,163,140,0.5)');
    $(this).css('border-left', '5px solid coral');
    }

    if($(this).find('a').text()[1]=='D'){
     // alert($(this).text());
     $(this).css('background-color', 'rgb(019,112,214,0.5');
    $(this).css('border-left', '5px solid rgb(19,112,214)');
    }

    if($(this).find('a').text()[1]=='P'){
     // alert($(this).text());
     $(this).css('background-color', 'rgb(218,112,214,0.5)');
    $(this).css('border-left', '5px solid orchid');
    }



     });
              }
          });  


          

    for(let i = 0; i <=6; i++){
      
  document.getElementById('d'+i).innerHTML =  date3.toLocaleString('en-us', {weekday: 'short'})+'<br/>' +('0' + date3.getDate()).slice(-2) + '-'
               + ('0' + (date3.getMonth()+1)).slice(-2) + '-'
               + date3.getFullYear();
               date3=addDays(date3,1);
  }

  var gg=('0' + the_date.getDate()).slice(-2) + '-'
             + ('0' + (the_date.getMonth()+1)).slice(-2) + '-'
             + the_date.getFullYear();

             var ff2 =monthNames[the_date.getMonth()] + ' '
  + the_date.getFullYear();

  ffd=the_date;
  hh=addDays(the_date,6);
  the_date=addDays(the_date,7);


  if((('0' + ffd.getDate()).slice(-2))>(('0' + the_date.getDate()).slice(-2))){
  var ff2 =monthNames[ffd.getMonth()] + ' - '+monthNames[hh.getMonth()]+" "
  + hh.getFullYear();
}

  
  var bb=('0' + hh.getDate()).slice(-2) + '-'
             + ('0' + (hh.getMonth()+1)).slice(-2) + '-'
             + hh.getFullYear();



  $('#date1_container').find('a').text(ff2);
  $('#date2_container').find('a').text(gg+' to  '+bb);

});














var the_date = new Date();



  var gg=('0' + date.getDate()).slice(-2) + '-'
  + ('0' + (date.getMonth()+1)).slice(-2) + '-'
  + date.getFullYear();

  $.ajax({
              url: '../controllers/my_res', 
              method: "POST",
              data:{'ab':gg},
              success: function(data){
                $('.to_update').html(data);
                $('.table-cell').each(function(){
                  if($(this).find('a').text()[0]=='A' && $(this).find('a').text()[6]!='/'){
   // alert($(this).text());
   $(this).css('background-color', 'rgb(255,163,140,0.5)');
    $(this).css('border-left', '5px solid coral');
    }

    if($(this).find('a').text()[1]=='D'){
     // alert($(this).text());
     $(this).css('background-color', 'rgb(019,112,214,0.5');
    $(this).css('border-left', '5px solid rgb(19,112,214)');
    }

    if($(this).find('a').text()[1]=='P'){
     // alert($(this).text());
     $(this).css('background-color', 'rgb(218,112,214,0.5)');
    $(this).css('border-left', '5px solid orchid');
    }


     });
              }
  });  



  for(let i = 0; i <=6; i++){
    
    document.getElementById('d'+i).innerHTML =  date.toLocaleString('en-us', {weekday: 'short'})+'<br/>' +('0' + date.getDate()).slice(-2) + '-'
               + ('0' + (date.getMonth()+1)).slice(-2) + '-'
               + date.getFullYear();
  date=addDays(date,1);
  if(i==6){
    date=addDays(date,-1);
  }
  }
the_date=addDays(the_date,7);

  hh=new Date();
  ffd=hh;
  var ff =('0' + hh.getDate()).slice(-2) + '-'
  + ('0' + (hh.getMonth()+1)).slice(-2) + '-'
  + hh.getFullYear()
  var ff2 =monthNames[hh.getMonth()] + ' '
  + hh.getFullYear();

  jj=addDays(hh,6);
  if((('0' + ffd.getDate()).slice(-2))>(('0' + the_date.getDate()).slice(-2))){
  var ff2 =monthNames[ffd.getMonth()] + ' - '+monthNames[jj.getMonth()]+" "
  + hh.getFullYear();
}
  var jj =('0' + jj.getDate()).slice(-2) + '-'
               + ('0' + (jj.getMonth()+1)).slice(-2) + '-'
               + jj.getFullYear();
  $('#date1_container').find('a').text(ff2);
  $('#date2_container').find('a').text(ff+' to  '+jj);

}










</script>

<div class="table-row table-head" >
<div class="table-cell pri " style='background-color:transparent !important;'>
    <a></a>
</div>
<div class="table-cell pri" id='d0'>
    <a></a>
</div>
<div class="table-cell pri" id='d1'>
    <a></a>
</div>
<div class="table-cell pri" id='d2'>
  <a></a>
</div>
<div class="table-cell pri" id='d3'>
<a></a>
</div>
<div class="table-cell pri" id='d4'>
<a></a>
</div>
<div class="table-cell pri" id='d5'>
    <a></a>
</div> 
<div class="table-cell pri" id='d6'>
  <a></a>
</div> 

</div>









<div class='to_update'>
  





<!-- js will fill it -->




</div>



</div>



  <div class="table-box my_res2" id='my_res2'>
  
  <?php
   require('connect.php');




 $req = $bdd->query('SELECT * FROM reservations1 WHERE users="'.$_COOKIE['login'].'" and datee >="'.date('Y-m-d').'" ORDER BY datee, length(cell),cell');
 $number_of_rows = $req->Rowcount(); 

 $req22 = $bdd->query('SELECT * FROM reservations2 WHERE users="'.$_COOKIE['login'].'" and datee >="'.date('Y-m-d').'" ORDER BY datee, length(box),box');
 $number_of_rows2 = $req22->Rowcount(); 

 $req33 = $bdd->query('SELECT * FROM reservations3 WHERE users="'.$_COOKIE['login'].'" and datee >="'.date('Y-m-d').'" ORDER BY datee, length(square),square');
 $number_of_rows3 = $req33->Rowcount(); 
$number_of_rows_total=$number_of_rows3+$number_of_rows+$number_of_rows2 ;






if($number_of_rows_total<1  ){
echo '<br/><br/><br/><h3 class="mb-5" style="text-align-last:center">no reservations made</h3>';

}else{
echo '  <div class="table-row table-head">
<div class="table-cell first-cell table-head-one">
    <a>Amphi / Classroom</a>
</div>
<div class="table-cell">
    <a>Date</a>
</div>
<div class="table-cell">
  <a>Time</a>
</div>
<div class="table-cell">
<a>device 1</a>
</div>
<div class="table-cell">
<a>device 2</a>
</div>
<div class="table-cell">
    <a>device 3</a>
</div> 
<div class="table-cell">
  <a>device 4</a>
</div> 
<div class="table-cell last-cell">
  <a>Delete</a>
</div> 
</div>
';

}

 require('disconnect.php');

?>

    <form action='my_reservation_page' id="nin" method="post">
       
    <input type="hidden" id="hid1" name="html" required/>
 

</form>



<?php 
 require('connect.php');
 $req214 = $bdd->query('SELECT * FROM time ');
 $req314 = $bdd->query('SELECT * FROM rooms');
 $result=$req214->fetch();
 $result2=$req314->fetch();

 


while($re1=$req->fetch()){
  
  $ind= (int) filter_var($re1['cell'], FILTER_SANITIZE_NUMBER_INT);  
  if($ind%$result['number_of_periods']==0){
    $time=$result['period'.$result['number_of_periods']];
  }else{ 
    $time=$result['period'.$ind%$result['number_of_periods']];
  }
  
  
  $room='AMPHI '.ceil(($ind/$result['number_of_periods']));

  


  $fff=explode("-",$re1['datee']);
  
  
  

  echo'
  <div class="table-row">
  <div class="table-cell first-cell">
    <a class="pp">'.$room.'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'  .$fff[2]."-".$fff[1]."-".$fff[0].'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$time.'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$re1['device1'].'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$re1['device2'].'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$re1['device3'].'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$re1['device4'].'</a>
  </div>
  
  <div class="table-cell last-cell">
    <a id="'.$re1['cell'].' '.$re1['datee'].'"  class="pp11s"><img  src="../assets/images/trash2.svg" style="opacity: 100%;" class="trash"></a>
  
  </div>
  </div>';
  
}


while($re1=$req22->fetch()){
  
  $ind= (int) filter_var($re1['box'], FILTER_SANITIZE_NUMBER_INT);  
  if($ind%$result['number_of_periods']==0){
    $time=$result['period'.$result['number_of_periods']];
  }else{ 
    $time=$result['period'.$ind%$result['number_of_periods']];
  }
  
  
  $room='TD '.ceil(($ind/$result['number_of_periods']));

  



  $fff=explode("-",$re1['datee']);
  


  echo'
  <div class="table-row">
  <div class="table-cell first-cell">
    <a class="pp">'.$room.'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$fff[2]."-".$fff[1]."-".$fff[0].'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$time.'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$re1['device1'].'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$re1['device2'].'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$re1['device3'].'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$re1['device4'].'</a>
  </div>
  
  <div class="table-cell last-cell">
    <a id="'.$re1['box'].' '.$re1['datee'].'" class="pp11s"><img  src="../assets/images/trash2.svg" style="opacity: 100%;" class="trash"></a>
  
  </div>
  </div>';
  
}


while($re1=$req33->fetch()){
  
  $ind= (int) filter_var($re1['square'], FILTER_SANITIZE_NUMBER_INT);  
  if($ind%$result['number_of_periods']==0){
    $time=$result['period'.$result['number_of_periods']];
  }else{ 
    $time=$result['period'.$ind%$result['number_of_periods']];
  }
  
  
  $room='TP '.ceil(($ind/$result['number_of_periods']));

  

  $fff=explode("-",$re1['datee']);





  echo'
  <div class="table-row">
  <div class="table-cell first-cell">
    <a class="pp">'.$room.'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$fff[2]."-".$fff[1]."-".$fff[0].'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$time.'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$re1['device1'].'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$re1['device2'].'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$re1['device3'].'</a>
  </div>
  <div class="table-cell">
    <a class="pp" >'.$re1['device4'].'</a>
  </div>
  
  <div class="table-cell last-cell">
    <a id="'.$re1['square'].' '.$re1['datee'].'" class="pp11s"><img  src="../assets/images/trash2.svg" style="opacity: 100%;" class="trash"></a>
  
  </div>
  </div>';
  
}

?>

  </div>  















  <div id="mymodal_res" class="modal_res">


  
<div class="modal-content">
  <div class="modal-container row">
    <div class="col-6 to_be_inserted">
   
<!-- contecnt genrated my modal.php -->

</div>
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
            <p> Constantine, NV 10012</p>
            <p>
              info@example.com
            </p>
            <p> + 213 234 567 88</p>
            <p>+ 213 234 567 89</p>
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
<script src="../assets/js/javascript2.js"></script>
</body>
</html>

<script>


document.getElementById("my_res").style.display = "block";
document.getElementById("my_res2").style.display = "none";

function ff1(){
  document.getElementById("my_res").style.display = "none";
document.getElementById("my_res2").style.display = "block";
  
}
function ff2(){
  document.getElementById("my_res").style.display = "block";
document.getElementById("my_res2").style.display = "none";
  
}

</script>
