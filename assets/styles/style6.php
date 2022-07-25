
@import "font.css";

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
    border-bottom: 1px solid rgb(219, 219, 219) !important;
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
    color: #616571   !important;
}



a{
    text-decoration:none !important;
    color: white !important;
}





nav{
    background-color: transparent ;
    position: absolute;
    z-index: 1000;
}

nav img{
    opacity: 70%;
}

nav img:hover{
    opacity: 90%;
    transition: 0.5s;
    cursor: pointer;
}

nav ul li a{

    color: #353A47   !important;
    font-family: 'Montserrat', sans-serif;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    margin-right: 30px;
    opacity: 80%;
    
}

a{
    text-decoration: none !important;
    color: rgb(26, 26, 26) !important;
}

nav ul li a:hover{

    transform: scale(1.02);
    transition: 0.2s;
    
}




nav ul li{

    letter-spacing: 2px;
    
}
.btn-danger {
    font-size: 10px !important;
    margin-left: 10px;
}

.btn-success {
    font-size: 10px !important;
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

.btn-danger {
    font-size: 10px !important;
    margin-left: 10px;
}

.btn-success {
    font-size: 10px !important;
}
.dropdown-content a:hover {background-color: rgb(0,176,116)}

i{
  margin-right: 10px;
}


.badge{
  position:relative;
  top:-10px;
}
