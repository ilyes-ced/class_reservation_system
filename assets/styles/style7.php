<?php
    header("Content-type: text/css; charset: UTF-8");

    
if($_COOKIE['mode']=='dark'){
$black='rgb(22,23,27)';
$grey='rgb(32,33,37)';
$near_white='rgb(241,241,241)';
$somesome='rgb(10,10,10)';
}else{
$black='white';
$grey='rgb(240,240,240)';
$near_white='black';
$somesome='rgb(200,200,200)';

}
?>








/*
@font-face {
  font-family: myFirstFont;
  src: url(../fonts/Montserrat-Italic-VariableFont_wght.ttf);
}


@font-face {
  font-family: myFirstFont;
  src: url(../fonts/Montserrat-VariableFont_wght.ttf);
}

@font-face {
  font-family: myFirstFont;
  src: url(../fonts/OpenSans-Italic-VariableFont_wdth,wght.ttf);
}

@font-face {
  font-family: myFirstFont;
  src: url(../fonts/OpenSans-VariableFont_wdth,wght.ttf);
}



*/



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

.modal,.modal2,.modal3,.modal4,.modal_demand,.suc,.suc2,.suc3 {
display: none;
position: fixed;
z-index: 1;
left: 0;
top: 0;
width: 100%;
height: 100%;
overflow: auto; 
background-color: rgb(0,0,0);
background-color: rgba(0,0,0,0.4);
}
.modal2 #oko{
  
  height:30px;
  border:none !important;
  border-bottom: 2px solid rgb(0,176,116) !important;
}
.modal2 #oko:focus{
  outline: none;
}

.col-6 {
    width: 75% !important;
  }
.modal-content {
    
  background-color: <?php echo $black; ?> !important;
  margin: 15% auto; 
  padding: 20px;
  border: 1px solid rgb(0,176,116) !important;
  width: 50% !important;
}
#edit1 .modal-content {
  width: 100% !important;
}
#edit2 .modal-content {
  width: 100% !important;
}
#edit5 .modal-content {
  width: 100% !important;
}
#edit6 .modal-content {
  width: 100% !important;
}
#edit3 .modal-content {
  width: 100% !important;
}
#edit7 .modal-content {
  width: 100% !important;
}

.modal-container {
    
    align-items: center;
    justify-content: center;
    padding-left: 0px;
    padding-top: 10px;
    padding-bottom: 10px;
}

/*
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; 
  padding: 20px;
  border: 1px solid #888;
  width: 50% !important; 
}

.modal-container {
    padding-left: 40px;
    padding-top: 10px;
}*/
.modal-container .form-check{
    margin-bottom: 15px;
}

.btn-primary a{
    color: red !important;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
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
    background: <?php echo $grey; ?>;
    padding: 0px 0;
    color: #000;
    font-size: 13px;
    /*box-shadow: 0 1px 1px 0px rgba(0,0,50,0.3);*/
    border-bottom: 2px solid <?php echo $black; ?> !important;
}


.table-head{
    background: rgb(0,176,116);/*color of 4 last of head row*/
    box-shadow: none;
    color: #fff;
    font-weight: 600;
}

.table-head-one{
    background-color: rgb(0,176,116) !important;
}
/*text of head row*/
.table-head a{

    color: #fff !important;

}
.table-head .table-cell{
    border-right: 2px solid <?php echo $black; ?>;/*color  of head row borders*/

}



.table-cell{
    display: table-cell;
    width: 20%;
    text-align: center;
    padding: 0px 0;
    border-right: 2px solid <?php echo $black; ?>;/*color  of borders*/
    vertical-align: middle;
    height: 50px;
    position: relative;
}
/*
.first-cell{
    background-color: rgb(0,176,116) !important;
    color: <?php echo $near_white; ?> !important;

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


.date-input{
    font-family: 'Open Sans', sans-serif;
    font-weight: 400 !important;
    letter-spacing: 2px;
    font-size: 14px !important;
    padding: 15px 15px !important;
    color: <?php echo $near_white; ?> !important;
}

#the_display{
    font-family: 'Open Sans', sans-serif;
    font-weight: 400 !important;
    letter-spacing: 2px;
    font-size: 14px !important;
    padding: 15px 15px !important;
    color: <?php echo $near_white; ?> !important;
}

.contact{
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
    height: 100%;
    background-color:rgb(80, 198, 161) ;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.5s;
    border-left: 4px solid rgb(0,176,116) !important;

}

.demand{
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
    height: 100%;
    background-color:rgb(80, 198, 161) ;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.5s;
    border-left: 4px solid rgb(0,176,116) !important;

}
label{
  color:<?php echo $near_white; ?>;
}
.btn-secondary{

    background-color: rgb(0,176,116) !important;
    border: none !important;
    color: white !important;
}



.table-box{
    padding-bottom: 0px;
}


.btn-secondary a{


    color: white !important;
    letter-spacing: 1.5px;
    font-family: 'open sans';
    font-size: 14px;
}


a{
    text-decoration:none !important;
    color: white !important;
}
.reservation{
position: absolute;
width: 100%;
top: 0;
left: 0;
height: 100%;
background-color:rgb(80, 198, 161);
display: flex;
flex-direction: column;
align-items: center;
justify-content: center;
transition: opacity 0.5s;
opacity: 0;
border-left: 4px solid rgb(0,176,116) !important;

}
.cir {
    display: inline-block;
    width: 50px;
    height: 50px;
    border-radius: 25%;
  
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    margin-left:40px;}






nav{
    background-color: transparent ;
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
    color: <?php echo $near_white; ?> !important; /*all text*/
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




















.msg_modal{
  display: grid;


  
}


.msg_modal>p, .msg_modal>img{

  
 margin: auto;
 text-align: center;

  float :left;
 }

 .msg_modal>img{
  grid-column: 1;
  grid-row: 1;
border-radius: 10px;
  height: 100%;
  width: 30%;
  
 }


 .msg_modal>p{
  margin-bottom:20px;
  grid-column: 1;
  grid-row: 2;
width: 100%;

 }
 .msg_modal>.p2{
   
  grid-column: 1;
  grid-row: 3;
width: 100%;

 }




 .msg_modal>.p1{
   
margin-top: 30px;
  
 }
.p1{
color: <?php echo $near_white ?> ;
font-size:20px;
}
.p2{
  color: <?php echo $near_white ?> ;
  font-size:20px;


}



.msg_box{
outline:none;
border:none;
border-bottom:2px solid rgb(0,176,116);
  width: 100%;
  
  
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


.first-cell{
    text-align: left;
    padding-left: 15px;
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







h5{
  color: <?php echo $near_white; ?>;
}




#pure-date{
    background-color: <?php echo $grey; ?>;
    border-width: 0;
text-align: center;
}
#the_display{
    background-color: <?php echo $grey; ?>;
    border-width: 0;
}













.dropbtn {
    background-color: transparent;
    color: white;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }
  
  /* Dropdown button on hover & focus */
  .dropbtn:hover, .dropbtn:focus {
    background-color: rgb(0,176,116);
  }
  
  /* The container <div> - needed to position the dropdown content */
  .dropdown {
    position: relative;
    display: inline-block;
  }
  
  /* Dropdown Content (Hidden by Default) */
  .dropdown-content { right:0%;
     
    display: none;
    position: absolute;
    background-color: <?php echo $black; ?>;
    min-width: 163px;
    box-shadow: 5px 5px 10px 1px <?php echo $somesome; ?>;
    z-index: 1;
  }
  
  /* Links inside the dropdown */
  .dropdown-content a { width:100%;
    
    color: black;
    padding: 12px 16px !important;
    text-decoration: none;
    display: block;
  }
  
  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {background-color: #ddd}
  
  /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
  .show {display:block;}



  .date{

  
    border-bottom: 2px solid rgb(0,176,116) !important;
  }
  
  .select{  
    
  
    border-radius: 0% !important;
    border-bottom: 2px solid rgb(0,176,116) !important;
  
  }
  
  .devider{
    width:80%;
    align-items: center;
    display: block;
    
margin-left: 10%;
    
      
     border-bottom: 1px solid rgb(219, 219, 219) !important;
}
.dropdown-content a:hover {
  
border-left: solid 4px  rgb(0,176,116);
background-color: rgb(0,176,116,0.7);
color:white !important;
  

}

i{
  margin-right: 10px;
}



































::-webkit-calendar-picker-indicator {
  background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" viewBox="0 0 24 24"><path fill="<?php echo $near_white; ?>" d="M20 3h-1V1h-2v2H7V1H5v2H4c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 18H4V8h16v13z"/></svg>');
}





.bg-warning{
  background: blue !important;
}

.badge{
  position:relative;
  top:-10px;
}


.ics{
  width: 1em ;
   height: 1em;
}











#change_the_mode{

  overflow: hidden; 


}