<?php

if(isset($_POST['register'])){
  require('connect.php');



    session_start();
        if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $grade = $_POST['grade'];
        $dep = $_POST['dep'];
        $col=str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        $type=$_POST['type'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $bdd->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error">The email address is already registered!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $bdd->prepare("INSERT INTO users(username,password,email,color,type,grade,departement) VALUES (:username,:password_hash,:email,:color,:t,:gr,:dep)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("color", $col, PDO::PARAM_STR);
            $query->bindParam("t", $type, PDO::PARAM_STR);
            $query->bindParam("gr", $grade, PDO::PARAM_STR);
            $query->bindParam("dep", $dep, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo 'registerd';
            } else {
                echo 'Something went wrong';
            }
        }
    }

}
require('disconnect.php');
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/styles/style_sign_up.php" >
    <link rel="stylesheet" href="../assets/css/animate.css" >
    <link rel="stylesheet" href="../assets/css/bootstrap.css" >
</head>
<body>








<div class="container" id="container">

<div class="container" id="container">
  
  <div class="form-container sign-in-container">
		

      <form method='post' action='register.php' enctype="multipart/form-data">
      <h1 style='text-align:center;padding-bottom:10px;padding-top:30px;'>experimental, not ment for the final version</h1>

          <input type="text" name='username' class="form-control mb-4" id="exampleInputUsername1" aria-describedby="emailHelp" placeholder="Enter username">
       
          
          <input type="password" name='password' class="form-control mb-4" id="exampleInputPassword1" placeholder="Password">
     
          
            <input type="email" name='email' class="form-control mb-4" id="exampleInputEmail1" placeholder="email" required >
    
            
            <select style="text-align-last:center;" name="type" id="type" class="form-control mb-4">
              <option value="teacher" selected  >teacher</option>
              <option value="admin">admin</option>
            </select>          
      
            

   



            <select style="text-align-last:center;" name="grade"  class="form-control mb-4">
              
  <option disabled selected value >select grade</option>
              <?php
      require('connect.php');



$req = $bdd->query('SELECT * FROM grades order by grades');


while ($result = $req->fetch()){
  
  $v='<option value="'.$result['grades'].'">'.$result['grades'].'</option>';
  
  echo $v;
  }


              
              ?>

              


            </select>          
      
          



            <select style="text-align-last:center;" name="dep"  class="form-control mb-4">
            
  <option disabled selected value >select departement</option>

          <?php  
          
  
  
  
  $req = $bdd->query('SELECT * FROM departements order by departements');
  
  
  while ($result = $req->fetch()){
    
    $v='<option value="'.$result['departements'].'">'.$result['departements'].'</option>';
    
    echo $v;
    }
    
    require('disconnect.php');
    ?>
             
            </select>          
      


        <button style='width:100%;' type="submit" name="register" value="register" class="btn btn-primary"><a>Submit</a></button>
      </form>

      </div>
      </div>      </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script>
      new WOW().init();
      </script>
</body>
</html>