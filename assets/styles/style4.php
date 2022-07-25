
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


.btn-danger {
    font-size: 10px !important;
    margin-left: 10px;
}

.btn-success {
    font-size: 10px !important;
}



/*
display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; 
*/

.modal_res {
    
    display: none;
  position: absolute;
  color: white;
  
  
  
  text-align: center;
  
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
  


    .col-6 {
      width: 90% !important;
    }
  .modal-content {
      
      
    background-color: <?php echo $black; ?> !important;
  
    border: 1px solid rgb(0,176,116) !important;
    width: 100% !important;
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
   /* box-shadow: 0 1px 1px 0px rgba(0,0,50,0.3);*/
    border-bottom: 2px solid <?php echo $black; ?> !important;
}


.table-head{
    background: rgb(0,176,116);/*color of 4 last of head row*/
    box-shadow: none;
    color: #fff;
    font-weight: 600;
}

.table-head-one{
    background-color: rgb(0,176,116) ;
}

.table-head a{

    color: #fff !important;

}
.table-head .table-cell{
    border-right: 2px solid <?php echo $black; ?>;/*color  of head row borders*/
}
.table-cell{
    display: table-cell;
    width: 10%;
    text-align: center;
    padding: 0px 0;
    border-right: 2px solid <?php echo $black; ?>;/*color  of borders*/
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


.date-input{
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
    background-color: #ffffff ;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.5s;
    border-bottom: 2px solid rgb(219, 219, 219) !important;

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
    background-color: #ffffff ;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: opacity 0.5s;
    opacity: 0;
    border-bottom: 2px solid rgb(219, 219, 219) !important;

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




#hhjj {
  pointer-events: none !important;
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











.devider {

    width:80%;
    align-items: center;
    display: block;
    
  margin-left: 10%;
    
      
     border-bottom: 1px solid rgb(219, 219, 219) !important;
  }





.date{
 border-bottom: 2px solid rgb(0,176,116) !important;




 
}

.select{  
 

 border-radius: 0% !important;
 border-bottom: 2px solid rgb(0,176,116) !important;

}











.ggg3{
    background-color: <?php echo $black; ?>!important;
}







.empt{ 
    
    
    pointer-events: none;
    



}

























  .d1 {
    position: relative;
    display: inline-block;
  }
  
  .d3 {
      left:75px;
    display: none;
    position: absolute;
    background-color: <?php echo $black; ?>;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  .d3 a {
    color: <?php echo $near_white; ?> !important;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  
  .d3 a:hover {
    border-left: solid 4px  rgb(0,176,116);
    background-color: rgb(0,176,116,0.7);
    color:white !important;
      
    }
  
  .d1:hover .d3 {
      display: block;
    }
  
 







    #date1{
        line-height: 15px;
        font-size: 25px;
        white-space: nowrap;
    }
    
    
    










.spacespace{
    height: 20px;
    margin: 20px;
}

#sub_week_container{margin-left: auto; 
    margin-right: 0;
     cursor: pointer;
     border: 2px solid rgb(0,176,116);
     width:40px;
     border-radius: 10% 0% 0% 10%;
    }


#add_week_container{ float:right;
    cursor: pointer;
    border: 2px solid rgb(0,176,116);
    border-left: none;
    width:40px;
    border-radius: 0% 10% 10% 0%;
}


#today_container{ 
    float:right;
    cursor: pointer;
    border: 2px solid rgb(0,176,116);
    border-radius: 5px;
  
width:80px !important;
}

#today{
    
text-align: center !important;
}


.the_date_bar{ 
    width:100%;
 
    margin-bottom:25px;

    display: flex;
    text-align:center;
}


.inside_bar1{  width:33%;
  

    display: flex;
    float:left;
}
.inside_bar2{
    justify-content: center;
    width:33%;
    display: flex;
    float:right;
    

}
.inside_bar3{
    
    width:33%;
    display: flex;
    
    

}


#sub_week{
padding-bottom:3px;
}
#add_week{
    padding-bottom:3px;

}



























.dropdown-content a:hover {
    border-left: solid 4px  rgb(0,176,116);
background-color: rgb(0,176,116,0.7);
color:white !important;
  

}

i:not(.del_icon){
  margin-right: 10px;
}
.fix{
    
    color:<?php echo $near_white; ?>;
}
#add_week_container{
    text-align: center;
}



























.int{  
    margin-left:20px;
    text-align: left;
    font-size: 25px !important;
}

.int:first-of-type {  
    width:80% !important;
    
}



.dev{
    float:left !important;
    width:50% !important;
    font-size: 15px !important;
}


.up{
   
    

}
.hhj{
   
    
}
.below{

}
.del_icon_container{
    cursor:pointer;
    margin-top: 10px;
    display: flex;
justify-content: center;
    text-align: center;
    float:right !important;
    width:15%;
border-radius: 5%;
    height:100% ;
    border: rgb(248,72,56) 1px solid;
    background-color:rgb(248,72,56,0.3) ;
}

.del_icon{
    color: rgb(248,72,56) !important;
}













#M{
    box-shadow: inset 0 0 0 0 coral;
    
    padding: 0 .25rem;
    margin: 0 -.25rem;
    transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
}

#D{
    box-shadow: inset 0 0 0 0 rgb(19,112,214);
    
    padding: 0 .25rem;
    margin: 0 -.25rem;
    transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
}

#P{
    box-shadow: inset 0 0 0 0 rgb(218,112,214);
    
    padding: 0 .25rem;
    margin: 0 -.25rem;
    transition: color .3s ease-in-out, box-shadow .3s ease-in-out;
}











#M:hover{
    color: #fff;
  box-shadow: inset 200px 0 0 0 coral;
}


#D:hover{
    color: #fff;
  box-shadow: inset 200px 0 0 0 rgb(19,112,214);
}


#P:hover{
    color: #fff;
  box-shadow: inset 200px 0 0 0 rgb(218,112,214);
}






















/*


.to_be_colored{
    border-radius: 0px 5px 5px 0px;
    
    margin :1px;
        white-space:nowrap;
    
    
    }
    
    .d{
        border : 1px solid rgb(126,36,175);
        border-left : 3px solid rgb(126,36,175);
        
            background-color: rgb(126,036,175,0.5);
    }
    .d2{
        width:50% !important;
        border : 1px solid rgb(27, 199, 56);
        border-left : 3px solid rgb(27, 199, 56);
        
            background-color: rgb(27,119,56,0.4); 
    }
    .d33{        width: 50% !important;;

        border : 1px solid rgb(153, 199, 27);
        border-left : 3px solid rgb(153, 199, 56);
        
            background-color: rgb(153,119,56,0.4); 
    }
    .d4{
        border : 1px solid rgb(232, 16, 80);
        border-left : 3px solid rgb(232, 16, 80);
        
          background-color: rgb(232, 16, 80,0.4); 
    }



    
*/















.to_be_colored{
    border-radius: 5px 5px 5px 5px;
    
    margin :1px;
        white-space:nowrap;
    
    
    }
    
    .d{
        border : 1px solid rgb(126,36,175);
        border-left : 3px solid rgb(126,36,175);
        border-right : 3px solid rgb(126,36,175);

            background-color: rgb(126,036,175,0.2);
    }
    .d2:not(.ffffffffffff){
        width:50% !important;
        border : 1px solid rgb(27, 199, 56);
        border-left : 3px solid rgb(27, 199, 56);
        border-right : 3px solid rgb(27, 199, 56);

            background-color: rgb(27,119,56,0.2); 
    }
    .d33{        width: 50% !important;;

        border : 1px solid rgb(153, 199, 27);
        border-left : 3px solid rgb(153, 199, 56);
        border-right : 3px solid rgb(153, 199, 56);

            background-color: rgb(153,119,56,0.2); 
    }
    .d4{
        border : 1px solid rgb(232, 16, 80);
        border-left : 3px solid rgb(232, 16, 80);
        border-right : 3px solid rgb(232, 16, 80);

          background-color: rgb(232, 16, 80,0.2); 
    }



















.text_alig{
   
    text-align: center !important; 
}




.badge{
  position:relative;
  top:-10px;
}
