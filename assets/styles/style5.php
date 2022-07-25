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


@import "font.css";

  ::-webkit-scrollbar {
    width: 10px;
  }
  
  ::-webkit-scrollbar-track {
    background: <?php echo $black; ?>;
  }
  
  ::-webkit-scrollbar-thumb {
    background: <?php echo $grey; ?>;
  }
  
  ::-webkit-scrollbar-thumb:hover {
    background: #555;
  }

  #hhjj {
  pointer-events: none !important;
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
.devider {

width:80%;
align-items: center;
display: block;

margin-left: 10%;

  
 border-bottom: 1px solid rgb(219, 219, 219) !important;
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

    background-color: <?php echo $black; ?> !important;
}

.table-box
{
    margin: 50px auto;
}

.table-row{
    display: table;
    width: 100%;
    margin: 0px auto;
    font-family: 'Montserrat', sans-serif;
    background: white;
    padding: 0px 0;
    color: #000;
    font-size: 13px;
    box-shadow: 0 1px 1px 0px rgba(0,0,50,0.3);
    border-bottom: 1px solid rgb(100, 100, 100) !important;
}


.table-head{
    background: #616571;
    box-shadow: none;
    color: #fff;
    font-weight: 600;
}

.table-head-one{
    background-color: #2B313E !important;
}

.table-head a{

    color: #fff !important;

}
.table-head .table-cell{
    border-right: 1px solid #d6d4d4;
}
.table-cell{
    display: table-cell;
    width: 10%;
    text-align: center;
    padding: 0px 0;
    border-right: 1px solid #d6d4d4;
    vertical-align: middle;
    height: 50px;
    position: relative;
}

.first-cell{
    width: 15% !important;
}
/*
.first-cell a{
    color: white !important;
}
*/
.table-cell:hover{
    cursor: pointer;
}

h3{
    color: <?php echo $near_white; ?>   !important;
}




.btn-danger{

    background-color: #616571 !important;
    border: none !important;
    color: white !important;
}






.btn-danger a{


    color: white !important;
    letter-spacing: 1.5px;
    font-family: 'open sans';
    font-size: 14px;
}


a{
    text-decoration:none !important;
    color: white !important;
}


.pic{

  
        display: inline-block;
        width: 65px;
        height: 50px;
        border-radius: 30%;
      
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
     
        

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
    color: rgb(241, 241, 241) !important; /*all text*/
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
color: <?php echo $near_white; ?>  !important; /*all text*/
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







.first-cell{
    text-align: left;
    padding-left: 25px;
}
.last-cell{
    border-right: none;
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


#avatar {
    /* This image is 687 wide by 1024 tall, similar to your aspect ratio */
    
    /* make a square container */
    width: 160px;
    height: 160px;

    /* fill the container, preserving aspect ratio, and cropping to fit */
    background-size: cover;

    /* center the image vertically and horizontally */
    background-position: top center;

    /* round the edges to a circle with border radius 1/2 container size */
    border-radius: 50%;
}

#avatar img{
    width: 100%;
}

.avatar-div span{
    font-family: 'Open Sans', sans-serif;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1.2px;
}






  a{
    text-decoration:none !important;
    color: white !important;
}

  .btn-outline-primary{
      color:#00AEEF !important;
      border-color: #00AEEF !important;
  }

  .btn-outline-primary:hover{
    color:#ffffff !important;
    border-color: #00AEEF !important;
    background-color: #00AEEF;
}


  .btn-primary{
    background-color:#070707 !important;
    border-color: #070707 !important;
    border-radius: 0px !important;
    width: 120px !important;
    height: 35px !important;
}

.btn-primary:hover{
    background-color:#000000 !important;
    border-color: #070707 !important;
}


.edit-btn{
    text-decoration-line: underline !important;
    cursor: pointer;
    color: black !important;
}



.overlay{
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
    height: 100%;
    background-color: #00000069 ;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 100%;
    transition: opacity 0.15s;
    border-bottom: 2px solid rgb(0,176,116) !important;
   
   
    
}


#imageUploadForm{
    display: flex;
    align-items: center;
    width: 100%;
    height: 100%;
    position: absolute;
    opacity: 0%; 
    
}
.pic2{
    
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    position: relative;
}


.profile-img{  aspect-ratio: 1 / 1;
    background-size: cover;
    background-position: center;
    position: relative;
}






#imageUploadForm:hover{
    position: absolute;
    opacity: 100%;
}






.overlay:hover{

    opacity: 100%;
    cursor: pointer;
    
}
















form{
    width: 100%;
}

.main-div{
    width: 100%;
}

input:disabled,
input:disabled.btn:active,
input:disabled.btn:focus {
  background-color: transparent !important;
  border: none !important;
  box-shadow: rgb(0,176,116) 0px 2px 0px 0px;
}

.input-group-text{
    background-color: transparent !important;
    border: none !important;
    box-shadow: rgb(0,176,116) 0px 2px 0px 0px;
}

form div{
    width: 100%;
}

form div input{
    height: 45px;
}


.profile-img:hover{

    transform: scale(1.02);
    transition: 0.2s;
}

.edit-btn{
    font-family: 'open sans';
    color: rgb(0,176,116) !important;
}

fieldset div input{
    color: <?php echo $near_white; ?>  !important;
    background-color: transparent !important;
    border-top: none!important;
    border-right: none !important;
    border-left: none !important;
    
    

}

fieldset div span{
    color: <?php echo $near_white; ?>  !important;
}




.divider {

    width: 80%;
    height: 8px;
  border-bottom: 100px solid white !important;
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
  
  .dropdown-content a { width:100%;
    
    color: black;
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




.pointer {
    cursor: pointer;
}




#time{
    display: none;
}




#extras{
    display: none;
}


.select_pages h3:not(#h3){
    
    
    padding-right: 50px;
    padding-bottom: 40px;
    float: left;
}
.dropdown-content a:hover { 
     border-left: solid 4px  rgb(0,176,116);
background-color: rgb(0,176,116,0.7);
color:white !important;
  }

i{
  margin-right: 10px;
}



.fofo{ 
    margin-top: 20px !important;
background-color: transparent !important;
border:none !important;
border-radius: 0px 0px 0px 5px !important;

border-bottom:rgb(0,176,116) 2px solid !important;
color: <?php echo $near_white; ?> !important ; 

}

.selsel{    margin-top: 29px !important;
    border:none !important;
    border-radius: 0px 0px 5px 0px !important;
    background-color: transparent !important;
    border-bottom:rgb(0,176,116) 2px solid !important;
    color: <?php echo $near_white; ?> !important ; 

}


.badge{
  position:relative;
  top:-10px;
}
