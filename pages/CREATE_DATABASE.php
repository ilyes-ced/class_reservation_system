<?php

if(isset($_POST['CREATE'])){
echo $_POST['base'];
$ur_username='root';
$ur_password='';
$base=$_POST['base'];
  try {
    $conn = new PDO("mysql:host=localhost",$ur_username,$ur_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE ".$base;
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database CREATEd successfully<br>";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }






  try
{$bdd = new PDO('mysql:host=localhost;dbname='.$base.';charset=utf8', 'root', '');
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}



$sql1="CREATE TABLE users (
    id int(100) unsigned NOT NULL AUTO_INCREMENT,
    username varchar(200) NOT NULL,
    password varchar(255) NOT NULL,
    email  varchar(100) NOT NULL,
    type  text(100) DEFAULT 'teacher' NOT NULL,
    color text(100) NOT NULL,
    grade text(100) NOT NULL,
    departement text(100) NOT NULL,
    status text(100) DEFAULT 'active' NOT NULL,
    image longtext default('none') not null,
    expiration_date varchar(100) DEFAULT 'none' NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY username (username)
)";

$sql2="CREATE table table_amphi (
  datee varchar(20)   NOT NULL,
  PRIMARY KEY (datee)
)";


$sql3="CREATE table table_td (
  datee varchar(20)   NOT NULL,
  PRIMARY KEY (datee)
)";
$sql4="CREATE table table_tp (
  datee varchar(20)   NOT NULL,
  PRIMARY KEY (datee)
)
";
$sql5="CREATE table reservations1 (
  users   varchar(100)  NOT NULL,
  datee   varchar(20)  NOT NULL,
  cell    varchar(20)  NOT NULL,
  device1 varchar(20),
  device2 varchar(20),
  device3 varchar(20),
  device4 varchar(20)
  )";
$sql6="CREATE table reservations2 (
  users   varchar(100)  NOT NULL,
  datee   varchar(20)  NOT NULL,
  box    varchar(20)  NOT NULL,
  device1 varchar(20),
  device2 varchar(20),
  device3 varchar(20),
  device4 varchar(20)
  )";
$sql7="CREATE table reservations3 (
  users   varchar(100)  NOT NULL,
  datee   varchar(20)  NOT NULL,
  square    varchar(20)  NOT NULL,
  device1 varchar(20),
  device2 varchar(20),
  device3 varchar(20),
  device4 varchar(20)
  )";
$sql8="CREATE table contact (
  id int(100) unsigned NOT NULL AUTO_INCREMENT,
  sender varchar(20)  NOT NULL,
  content varchar(400),
  date varchar(20)  NOT NULL,
  cell varchar(20)  NOT NULL,
  reciever varchar(20)  NOT NULL,
    PRIMARY KEY (id))";
$sql9="CREATE table demands (
  id int(100) unsigned NOT NULL AUTO_INCREMENT,
  sender varchar(20)  NOT NULL,
  devices varchar(200) not null,
  date varchar(20)  NOT NULL,
  cell varchar(20)  NOT NULL,
  PRIMARY KEY (id))";
$sql10="
CREATE table rooms(
room VARCHAR(255) NOT NULL,
indexes int not null ,
special VARCHAR(255) not null default('no')
)
";
$sql11="CREATE table grades(
  grades VARCHAR(255) NOT NULL,
  PRIMARY KEY (grades)
  )";
$sql12="CREATE table departements(
  departements VARCHAR(255) not null,
  PRIMARY KEY (departements)
  )";
$sql13="CREATE table time(
  number_of_periods VARCHAR(255) not null,
  period1 varchar(255) not null,
  period2 varchar(255) not null,
  period3 varchar(255)  not null,
  period4 varchar(255)  not null
)";
$sql14="INSERT into time values('4','8:00 - 9:30','9:30 - 11:00','11:00  - 11:30','11:30 - 13:00')";
$sql15="INSERT into grades values('MBA')";
$sql15="INSERT into grades values('MAA')";
$sql15="INSERT into grades values('Profrssor')";
$sql15="INSERT into grades values('researcher')";
$sql16="INSERT into departements values('some IFA')";
$sql16="INSERT into departements values('some TLSI')";
$sql16="INSERT into departements values('some MI')";


$sql171="INSERT into rooms(room,indexes) values('AMPHI ','1')";
$sql172="INSERT into rooms(room,indexes) values('AMPHI ','2')";
$sql173="INSERT into rooms(room,indexes) values('AMPHI ','3')";
$sql181="INSERT into rooms(room,indexes) values('TD ','1')";
$sql182="INSERT into rooms(room,indexes) values('TD ','2')";
$sql183="INSERT into rooms(room,indexes) values('TD ','3')";
$sql191="INSERT into rooms(room,indexes) values('TP ','1')";
$sql192="INSERT into rooms(room,indexes) values('TP ','2')";
$sql193="INSERT into rooms(room,indexes) values('TP ','3')";

$sql20='ALTER TABLE table_amphi  
ADD COLUMN cell1 varchar(30) DEFAULT("/"),
ADD COLUMN cell2 varchar(30) DEFAULT("/"),
ADD COLUMN cell3 varchar(30) DEFAULT("/"),
ADD COLUMN cell4 varchar(30) DEFAULT("/"),
ADD COLUMN cell5 varchar(30) DEFAULT("/"),
ADD COLUMN cell6 varchar(30) DEFAULT("/"),
ADD COLUMN cell7 varchar(30) DEFAULT("/"),
ADD COLUMN cell8 varchar(30) DEFAULT("/"),
ADD COLUMN cell9 varchar(30) DEFAULT("/"),
ADD COLUMN cell10 varchar(30) DEFAULT("/"),
ADD COLUMN cell11 varchar(30) DEFAULT("/"),
ADD COLUMN cell12 varchar(30) DEFAULT("/");';

$sql21='ALTER TABLE table_td  
ADD COLUMN box1 varchar(30) DEFAULT("/"),
ADD COLUMN box2 varchar(30) DEFAULT("/"),
ADD COLUMN box3 varchar(30) DEFAULT("/"),
ADD COLUMN box4 varchar(30) DEFAULT("/"),
ADD COLUMN box5 varchar(30) DEFAULT("/"),
ADD COLUMN box6 varchar(30) DEFAULT("/"),
ADD COLUMN box7 varchar(30) DEFAULT("/"),
ADD COLUMN box8 varchar(30) DEFAULT("/"),
ADD COLUMN box9 varchar(30) DEFAULT("/"),
ADD COLUMN box10 varchar(30) DEFAULT("/"),
ADD COLUMN box11 varchar(30) DEFAULT("/"),
ADD COLUMN box12 varchar(30) DEFAULT("/");';

$sql22='ALTER TABLE table_tp  
ADD COLUMN square1 varchar(30) DEFAULT("/"),
ADD COLUMN square2 varchar(30) DEFAULT("/"),
ADD COLUMN square3 varchar(30) DEFAULT("/"),
ADD COLUMN square4 varchar(30) DEFAULT("/"),
ADD COLUMN square5 varchar(30) DEFAULT("/"),
ADD COLUMN square6 varchar(30) DEFAULT("/"),
ADD COLUMN square7 varchar(30) DEFAULT("/"),
ADD COLUMN square8 varchar(30) DEFAULT("/"),
ADD COLUMN square9 varchar(30) DEFAULT("/"),
ADD COLUMN square10 varchar(30) DEFAULT("/"),
ADD COLUMN square11 varchar(30) DEFAULT("/"),
ADD COLUMN square12 varchar(30) DEFAULT("/");';















  try {
    $conn = new PDO("mysql:host=localhost;dbname=".$base, 'root', '');
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
 
    
$conn->exec($sql1);
$conn->exec($sql2);
$conn->exec($sql3);
$conn->exec($sql4);
$conn->exec($sql5);
$conn->exec($sql6);
$conn->exec($sql7);
$conn->exec($sql8);
$conn->exec($sql9);
$conn->exec($sql10);
$conn->exec($sql11);
$conn->exec($sql12);
$conn->exec($sql13);
$conn->exec($sql14);
$conn->exec($sql15);
$conn->exec($sql16);
$conn->exec($sql171);
$conn->exec($sql172);
$conn->exec($sql173);
$conn->exec($sql181);
$conn->exec($sql182);
$conn->exec($sql183);
$conn->exec($sql191);
$conn->exec($sql192);
$conn->exec($sql193);
$conn->exec($sql20);
$conn->exec($sql21);
$conn->exec($sql22);









$username = 'admin';
$email = 'admin@gmail.com';
$password = 'admin';
$grade = 'some grade';
$dep = 'some departement';
$col=str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
$type='admin';
$password_hash = password_hash($password, PASSWORD_BCRYPT);
  
        


$query = $bdd->prepare("INSERT INTO users(username,password,email,color,type,grade,departement) VALUES (:username,:password_hash,:email,:color,:t,:gr,:dep)");
$query->bindParam("username", $username, PDO::PARAM_STR);
$query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
$query->bindParam("email", $email, PDO::PARAM_STR);
$query->bindParam("color", $col, PDO::PARAM_STR);
$query->bindParam("t", $type, PDO::PARAM_STR);
$query->bindParam("gr", $grade, PDO::PARAM_STR);
$query->bindParam("dep", $dep, PDO::PARAM_STR);
$result = $query->execute();
      




$username = 'teacher';
$email = 'teacher@gmail.com';
$password = 'teacher';
$grade = 'some grade';
$dep = 'some departement';
$col=str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
$type='teacher';
$password_hash = password_hash($password, PASSWORD_BCRYPT);
            
$query = $bdd->prepare("INSERT INTO users(username,password,email,color,type,grade,departement) VALUES (:username,:password_hash,:email,:color,:t,:gr,:dep)");
$query->bindParam("username", $username, PDO::PARAM_STR);
$query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
$query->bindParam("email", $email, PDO::PARAM_STR);
$query->bindParam("color", $col, PDO::PARAM_STR);
$query->bindParam("t", $type, PDO::PARAM_STR);
$query->bindParam("gr", $grade, PDO::PARAM_STR);
$query->bindParam("dep", $dep, PDO::PARAM_STR);
$result = $query->execute(); 
    


    echo "Tables CREATEd successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
</head>
<body>


   
 
    <div class="flex-container">
  <div class="content-container">
    
    <div class="form-container">

          click to CREATE database and tables phpmyadmin
       

      <form id="ff1" method='post'  enctype="multipart/form-data" action="CREATE_DATABASE.php">
       
      <input placeholder='database name' style='' type='text' name='base'>
     

        
        <input type="submit" name="CREATE" value="SUBMIT" class="submit-btn">
      </form>
    </div>
  </div>
</div>







