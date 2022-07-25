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


  .modal_grade,.modal_dep,.modal_spec,.modal_edit,.modal_add {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: hidden; 
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
  } 
  






  
  .col-6 {
    width: 90% !important;
  }
.modal-content {
    
  background-color: <?php echo $black; ?>;
  margin: 80px auto; 
  padding: 20px;
  border: 1px solid rgb(0,176,116);
  width: 75% !important;
}

.modal-container {
    
    align-items: center;
    justify-content: center;
    padding-left: 0px;
    padding-top: 10px;
    padding-bottom: 10px;
}

.modal-container .form-check{
    margin-bottom: 15px;
}

.btn-primary a{
    color: white !important;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: rgb(0,176,116);
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

    background-color: #F6F5FA !important;
}

.table-box
{
    margin: 50px auto ;
}

.table-row{
    display: table;
    width: 100%;
    margin: 0px auto;
    font-family: 'Montserrat', sans-serif;
    background: transparent;
    padding: 0px 0;
    color: #000;
    font-size: 13px;
    /*box-shadow: 0 1px 1px 0px rgba(0,0,50,0.3);*/
  /*  border-bottom: 1px solid rgb(219, 219, 219) !important;*/
}


.table-head{   border-radius: 15px 15px 0px 0px;
    background: rgb(0,176,116);
    box-shadow: none;
    color: #fff;
    font-weight: 600;
    
}

.table-head-one{
    background-color:rgb(0,176,116) !important;
    border-radius: 15px 15px 0px 0px;
}

.table-head a{

    color: #fff !important;

}
/*
.table-head .table-cell{

}*/

.table-cell{
  
    overflow-wrap: normal;
    overflow-wrap: break-word;
    overflow-wrap: anywhere;
    display: table-cell;
    width: 10%;
    text-align: center;
    padding: 0px 0;
    /*border-right: 1px solid #d6d4d4;*/
    vertical-align: middle;
    height: 50px;
    position: relative;
}

.table-cell:hover{
    cursor: pointer;
}

h3{
    color: <?php echo $near_white; ?>   !important;
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

.btn-primary a{
    color: white !important;
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




  *{
    margin: 0;
    padding: 0;
}

body{

    background-color: <?php echo $black; ?> !important;
}



.btn-secondary{

    background-color: rgb(0,176,116) !important;
    border: none !important;
    color: rgb(240,240,240) !important;
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
    color: <?php echo $near_white; ?> !important;
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

.devider{
    width:95%;
    align-items: center;
    display: block;
    
    margin-left: 2.5%;
    
      
     border-bottom: 1px solid rgb(219, 219, 219) !important;
}

.devider2{
    width:80%;
    align-items: center;
    display: block;
    
margin-left: 10%;
    
      
     border-bottom: 1px solid rgb(219, 219, 219) !important;
}
/*

.first-cell{
    text-align: left;
    padding-left: 15px;
}
*/
.last-cell{
    border-right: none !important;
}
a{
    text-decoration: none;
    color: #555;
}




.footer-logo{
    opacity: 80%;
}

.ppp{
    color: #545b6b !important;
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
      background-color: rgb(60,60,60)}
  
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
  text-align:center !important;
  padding-bottom:5px;
width:130px !important;
    border-radius:3px;
    width:100px;
    
    
    margin-bottom: 40px;
    float: left;
}




::placeholder { 
    color: rgb(100,100,100);
  }
  .text2:focus::placeholder {
  color: transparent;
}

  .text:focus::placeholder {
  color: transparent;
}
.text{
  text-align:center !important;
    background: <?php echo $grey; ?>;

    
    width:45%;
    float:left;

    height:50px;

color: <?php echo $near_white; ?>;
outline:none;

    border: 1px solid rgba(0, 176, 116);
    border-top: none;
    border-left: none;
    border-right: none;
   
}


.select{
  height:50px;
  background: <?php echo $grey; ?>;

  width:45%;
  float:left;

  color: <?php echo $near_white; ?>;
  outline:none;

  border: 1px solid rgba(0, 176, 116);
  border-top: none;
  border-left: none;
  border-right: none;
}






.select:not(.kkk){
  margin:2.5%;
}
.text:not(.kkk){
  margin:2.5%;
}







.select:last-of-type:not(#klklm) {
    
    width: 22.5%;
    margin-right:0% !important;
  }




.hh{
    border-left: 1px solid rgba(0, 176, 116);
}

.date:disabled {
  
  border: none;
  color:transparent;
  background-color:<?php echo $black; ?>;

}

.space{
  margin-bottom:15px;
}
  
.date{ 
  
    font-size: 12px;
    width:50%;
    float:right;
        height:40px;

        background: <?php echo $grey; ?>;
        
        color: <?php echo $near_white; ?>;
    
    
        border: 1px solid rgba(0, 176, 116);
        border-top: none;
        border-left: 1px solid rgba(0, 176, 116);
        border-right: none;
}



h1{
    text-align: center;
    color :<?php echo $near_white; ?>;
    margin-bottom:40px;
}





.profil{
float:top;
margin-bottom:20px;
height:100%;
width:100%;
}
.profil > img{


  text-align: center;
  
  }


p{
    
    margin-top: 3%;
    margin-left: 10%;
    color: <?php echo $near_white; ?>;
    font-size: 20px;
    float:top;
    

}



.times{

  font-size: 20px;
  width:50%;
  float:left;
      height:50px;

      background: <?php echo $grey; ?>;
      
      color: <?php echo $near_white; ?>;
  
  
      border: 1px solid rgba(0, 176, 116);
      border-top: none;
      border-right: 1px solid rgba(0, 176, 116) !important;
      border-left: 1px solid rgba(0, 176, 116) !important;

      margin:5px;
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






































.fff{
  width:100px;
  height:100px;

  
  display: block;
  margin-left: auto;
  margin-right: auto;

  

  
  text-align: center;
  border-radius: 10px;
}



.te>p{
  padding:0px;
  margin:0px;
  text-align: center;
  margin-bottom:20px !important;
}
.the_text{
  margin-top:20px !important;
  
}


 /* white-space: nowrap;*/
  .kakakaka{
    
  }
  .to_be_spaces{
    width:100%;
    display: flex;
    justify-content: center;
  }
 .frezghrtehrth{
  display: flex;
  justify-content: center;
 }
.select5{

text-align: center;

  height:50px;
  background: <?php echo $grey; ?>;

  
  float:left;

  color: <?php echo $near_white; ?>;
  outline:none;

  border: 1px solid rgba(0, 176, 116);
  border-top: none;
  border-left: none;
  border-right: none;

  width: 20%;
  
    margin-top:15px;

  margin-bottom:15px;

}

.ghgh{

  margin-right:5%;
}












































i{
  margin-right: 10px;
}










.devider3{
    width:80%;
    align-items: center;
    display: flex;



    margin-bottom: 10px;

    margin-left: 10%;
    
      
     border-bottom: 1px solid rgb(219, 219, 219) !important;
}









.first{
  margin-top:5px;
  margin-bottom:20px;

}



.label{
  color: <?php echo $near_white; ?>;

}












.select2{
  text-align:center !important;
    background: <?php echo $grey; ?>;

    
    width:40%;
  
    height:40px;
    margin-right:5%;
    margin-left:5%;
color: <?php echo $near_white; ?>;
outline:none;

    border: 1px solid rgba(0, 176, 116);
    border-top: none;
    border-left: none;
    border-right: none;
    margin-bottom:40px;
float:left;
}


.text2{
  text-align:center !important;
    background: <?php echo $grey; ?>;
float:left;
    margin-bottom:40px;
    width:40%;
    margin-right:5%;
    margin-left:5%;

    height:40px;

color: <?php echo $near_white; ?>;
outline:none;

    border: 1px solid rgba(0, 176, 116);
    border-top: none;
    border-left: none;
    border-right: none;
   
}







label:not(.label){
  text-decoration: underline rgb(0,176,116);
  width:100% !important;
  text-align: center !important;
color:<?php echo $near_white; ?>;
font-size: 15px;
margin-left:45%;
}




























.the_tables_container {
  display: flex;
  width: 100%;
}
.tables{
  flex: 1;
  margin: 2px;
}
.tables:first-child {
  margin-right: 2px;
}
.square{
  background-color: rgb(248,72,56);
  height: 15px;
  width: 15px;
}

.dd{
  color: <?php echo $black; ?>;
  text-align: center;
}




.dropdown-content a { 
  width:100%;
    
  color: black;
 padding: 12px 16px !important;
 text-decoration: none;
 display: block;
   }
   
   .dropdown-content a:hover 
   {  border-left: solid 4px  rgb(0,176,116);
background-color: rgb(0,176,116,0.7);
color:white !important;
  
  }
   
   .show {display:block;}
   
   
   
   
   
   

   #type_time{
     margin:0px !important;
   }




   #sub{
    height:50px;
    width:100%;
text-align: center !important;
font-size: 15px;   }

































.adadad {
  margin: 0 2.5%;
  margin-top:50px;
padding-top:5px;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  border-radius:5px;
}













.llll{
  margin-top:40px;
}
.cont_ele{
  margin-left:5%;  margin-right:0%;

}
.ele{margin-bottom:40px;
  float:left;
  width:50% !important;
}
.ele>label{
  margin-top:5px;
  margin-right:15px;

  float:left;
  width:30% !important;

}
.ele>input{
  float:left;
  width:50% !important;
}
.ele>select{
  float:left;
  width:50% !important;
}


.this_label{
  width: fit-content !important;
  text-decoration: none !important;
margin:0px !important;
padding:0px !important;
text-align: left  !important;
}
.radios{
  float: left !important;
}
#tta{
  position: relative;
  top: 6px;
  width: 15px !important;
  float:left;
}


.badge{
  position:relative;
  top:-10px;
}


footer a{
  
  text-decoration: none !important;
}
footer p{
 padding:0px !important;
 margin:0px !important;
 margin-bottom:10px !important;

 color: #545b6b  !important;

}







