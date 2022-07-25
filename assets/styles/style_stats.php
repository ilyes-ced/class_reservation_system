@import "font.css";
<?php
header("Content-type: text/css; charset: UTF-8");



$green='rgb(0,176,116)';
if($_COOKIE['mode']=='dark'){
  $black='rgb(22,23,27)';
  $grey='rgb(32,33,37)';
  $near_white='rgb(241,241,241)';
  $somesome='rgb(10,10,10)';

  }else{
  $black='white';
  $grey='rgb(240,240,240)';
  $near_white='rgb(50,50,50)';
  $somesome='rgb(200,200,200)';

  }




?>

::-webkit-scrollbar {
width: 10px;
}

::-webkit-scrollbar-track {
background:rgb(22,23,27);
}

::-webkit-scrollbar-thumb {
background:rgb(32,33,37);
}

::-webkit-scrollbar-thumb:hover {
background: #555;
}




.aa::-webkit-scrollbar {
height: 10px;
}

.aa::-webkit-scrollbar-track {
  background:rgb(22,23,27);}

.aa::-webkit-scrollbar-thumb {
  background:rgb(0,176,116);
}

.aa::-webkit-scrollbar-thumb:hover {
  background: #555;
}




.container {
padding-top: 30px;
}
.ppDate {
height: 38px;
font-size: 12px;
padding-left: 6px;
}
.ppDate::-webkit-inner-spin-button,
.ppDate::-webkit-calendar-picker-indicator {
  display: none;
  -webkit-appearance: none;
}
.ppDate:focus::-webkit-calendar-picker-indicator, .ppDate:hover::-webkit-calendar-picker-indicator {
display: block;
-webkit-appearance: menulist;
}
.ppDate::-webkit-clear-button {
display: none;
-webkit-appearance: none;
}
.constrained {
max-width: 160px;
}


*{
margin: 0;
padding: 0;
}

body{

background-color: <?php echo $black; ?>  !important;
}

.table-box
{
margin: 50px auto;
}


h3{
color: <?php echo $near_white; ?>   !important;
}





.cir {
display: inline-block;
width: 50px;
height: 50px;
border-radius: 25%;

background-repeat: no-repeat;
background-position: center center;
background-size: cover;
margin-left:40px; }


nav{
background-color: transparent/*rgb(11,33,37)*/ ;
position: absolute;
z-index: 1000;
}

nav > div > img{

opacity: 70%;
}

nav img:hover{
opacity: 90%;
transition: 0.5s;
cursor: pointer;
}

nav ul li a{

color: <?php echo $near_white; ?>   !important;
font-family: 'Montserrat', sans-serif;
font-size: 12px;
font-weight: 600;
text-transform: uppercase;

opacity: 80%;

}

.mm{margin-left:0px;}/*remove to remove distance between user info and other pages*/
nav ul li a:not(.mm){


margin-right: 30px;


}







a{
text-decoration: none !important;
color:  <?php echo $near_white; ?>!important; /*all text*/
}

nav ul li a:hover{

transform: scale(1.02);
transition: 0.2s;

}





nav ul li{

letter-spacing: 2px;

}


nav ul {



display: flex;
flex-direction: column;
align-items: left;
justify-content: left;



}


.nav-item{

display: flex;
flex-direction: column;
align-items: center;
justify-content: center;

}





.first-cell{
text-align: left;
padding-left: 15px;
}
.last-cell{
border-right: none !important;
}
a{
text-decoration: none;
color: #555;
}

@media only screen and (max-width: 600px) {
.table-row {
font-size: 11px;
}
}

.footer-logo{
opacity: 80%;
}

.ppp{
color: #545b6b !important;
}




.pics1{

padding: 1px;
height:16px;
width:16px;
}
.pics2{   
height:16px;
width:16px;
}
.pics3{   padding: 2px; 
height:16px;
width:16px;
}






.devider {

width:80%;
align-items: center;
display: block;

margin-left: 10%;

  
 border-bottom: 1px solid rgb(219, 219, 219) !important;
}









.dropbtn {
background-color: transparent;
color: white;
font-size: 16px;
border: none;
cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
background-color: rgb(0,176,116);
}

.dropdown {
position: relative;
display: inline-block;
}

.dropdown-content { right:0%;
   
   display: none;
   position: absolute;
   background-color: <?php echo $black; ?>;
   min-width: 163px;
   box-shadow: 5px 5px 10px 1px <?php echo $somesome; ?>;
   z-index: 1;
 }
 
 .dropdown-content a { 
   width:100%;
   color: <?php echo $near_white; ?>;
   padding: 12px 16px !important;
   text-decoration: none;
   display: block;
 }
 

.dropdown-content a:hover {
border-left: solid 4px  rgb(0,176,116);
background-color: rgb(0,176,116,0.7);
color:white !important;

}

.show {display:block;}
.dropdown-content a:hover {
border-left: solid 4px  rgb(0,176,116);
background-color: rgb(0,176,116,0.7);
color:white !important;


}

i{
margin-right: 10px;
}















.select_it1,.select_it2,.select_it3{
  width:33%;
  height: 100%;
  
  }
  

  .select_it1{
    text-align: right;

  }
  
  
  .select_it2{
    text-align: center;

    }

    .select_it3{
      text-align: left;
  
      }
.cheems{

  
  text-align: center;

  cursor: pointer;

  padding-top:10px;
  width :50%;
  height: 100%;

 position: relative;
  display: inline-block;

  box-shadow: inset 0 0 0 0 rgb(0,176,116);
    
  
    transition: color .3s ease-in-out, box-shadow .3s ease-in-out;



}

.cheems:hover{
  color: #fff;
  box-shadow: inset 200px 0 0 0 rgb(0,176,116);
  border-bottom:4px solid rgb(0,176,116);

}

  

































.block3{
  
  margin-top: 70px;
}





.dima2,.dima3,.dima4{
  
  height:auto;

  width:32%;
  
  float:left;
  margin-bottom: 20px;
  background-color: <?php echo $grey; ?>;
  border-radius: 5px;

}




.dima2,.dima3{

  
margin-right:2%
}


.dima1{
  float:left;
  width:100%;
  height:auto;
  margin-bottom: 20px;
  background-color: <?php echo $grey; ?>;
  border-radius: 5px;
}
















.all_time  {
   text-decoration: none !important;
 }







.donut>i,.month>i,.year>i,.me>i,.all>i,.device>i,.type>i,.bars>i,.pie>i,.week>i,.line>i,.number>i{
padding-left:15%;
  color: <?php echo $near_white; ?>;

}



.donut,.week,.month,.year,.me,.all,.device,.type,.bars,.pie,.line,.number{
  cursor:pointer;
  text-align: center;
  border:2px solid rgb(0,176,116);  
}



.donut:hover,.week:hover,.month:hover,.year:hover,.me:hover,.all:hover,.device:hover,.type:hover,.bars:hover,.pie:hover,.line:hover,.number:hover{
  background-color:rgb(0,176,116,0.2);  
}




.graph_container2,.person_container,.graph_container,.duration_container{
  margin-left:2.5%;
  margin-right:2.5%;
  width:20%;
  float:left;
  text-align: center;
}









.me,.all{
  float:left;
  width:50%;
}



.bars,.line{
  float:left;
  width:50%;
}




.pie,.donut{
  float:left;
  width:50%;
}




.week,.month,.year,.ggh{
  float:left;
  width:25%;
}




.me,.bars,.donut,.week,.month,.ggh{
  border-left: none;
}





.me,.bars,.donut,.week{

border-radius: 0px 5px 5px 0px;
}

.all,.line,.pie,.all_time{

  border-radius: 5px 0px 0px 5px;
  }












.the_select_bar{
  display: flex;
align-items: center;

  width: 100%;
border-radius : 10px;
position: relative;
height :50px;
float: left;
  background-color: <?php echo $grey ;?> !important;
}










.bar{
  display :flex;
  align-items: center;
  width:100%;
  float:left;
  margin-bottom: 20px;
  background-color: <?php echo $grey; ?>;
  border-radius: 5px;
  height:50px;
}


.info_cont{
  display :flex;
  align-items: center;
  
  position: relative;
  border-radius: 5px;
  float:left;
  width:48%;
  
  padding:25px;
  
background-color: <?php echo $grey; ?>;
margin-bottom: 20px;
}
.ss{
  margin-right:4%;
}


h5{
  color: <?php echo $near_white ?>;
}






.main_diag{
  display :flex;
  align-items: center;
  
  position: relative;
  border-radius: 5px;
  height:auto;
  width:100%;
  margin-bottom: 20px;
  padding:25px;
  
background-color: <?php echo $grey; ?>;
}




@media only screen and (max-width: 990px) {
  .ll{
    margin-left: 0px !important;
    margin-right: 30px !important;
  }
  .mm{
    margin-left: 0px !important;
    margin-right: 30px !important;
  }
  .dropdown{
    margin-left: 0px !important;
    margin-right: 30px !important;
}
}

.main_diag3,.main_diag2{
  display :flex;
  align-items: center;
  float: left;
  position: relative;
  border-radius: 5px;
  height:auto;
  width:49%;
  margin-bottom: 20px;
  
background-color: <?php echo $grey; ?>;
}


.main_diag2,.dig1{
  margin-right:2%;
}



.dig3{ 
  padding:25px;
  display :flex;
  align-items: center;
  
  position: relative;
  border-radius: 5px;
  height:auto;
  width:100%;
  
  margin-bottom: 20px;
  
background-color: <?php echo $grey; ?>;
}









.dig1,.dig2{
  padding:25px;

  float: left;

  border-radius: 5px;
  
  width:100%;
  height:auto;
  margin-bottom: 20px;
  
background-color: <?php echo $grey; ?>;
}


.v2{
float: left;
}


.block2{float: left;


}

.texts{
  text-align: center;
 
  margin-bottom:35px;

 display: block; 
}


.dig2>a{
  
  margin-right:10px;
  padding-right:5px;
  padding-left:5px;
 
  
  margin: 20px;

  
}






































#lines_typesdv{
  height:100%;
  width:100%;

}

































.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
}

/* Tooltip text */
.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  padding: 5px 0;
  border-radius: 6px;
 
  /* Position the tooltip text - see examples below! */
  position: absolute;
  z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
  visibility: visible;
}


.badge{
  position:relative;
  top:-10px;
}
