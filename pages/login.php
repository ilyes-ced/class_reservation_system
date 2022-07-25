<?php

require('connect.php');

$tth=$bdd->query('SELECT  email from users where type="admin"');
while($tt=$tth->fetch()){
    $ffm[]=$tt['email'];
}






$err='none';


$this_arr=array();
 $query = $bdd->query("SELECT username,color FROM users");

 while($d=$query->fetch()){
    $this_arr[$d['username']] = $d['color']; 
 }
 setcookie('colors',json_encode($this_arr),time()+365*24*3600 ,'/');
 $_COOKIE['colors'] = json_encode($this_arr);




 
    setcookie("login", "", time()-3600 ,'/');
    setcookie("password", "", time()-3600 ,'/');
    setcookie("email", "", time()-3600 ,'/');
    setcookie("admin", "", time()-3600 ,'/');




    if (isset($_POST['login'])) {

        
        $username = $_POST['username'];
        $password = $_POST['password'];



        $query = $bdd->prepare("SELECT * FROM users WHERE email=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            
            $err='pass';
        } else {
            if (password_verify($password, $result['password'])) {
               
         


            if($result['status']=='active'){ if($result['type']=='teacher')   {
                
                setcookie('login',$result['username'],time()+365*24*3600 ,'/');
                $_COOKIE['login'] = $result['username'];
                setcookie('email',$result['email'],time()+365*24*3600 ,'/');
                $_COOKIE['email'] = $result['email'];
                setcookie('password',$password,time()+365*24*3600 ,'/');
                $_COOKIE['password'] = $password;
                header('Location: all_reservation_page');
            }elseif($result['type']=='admin'){      
                

                setcookie('login',$result['username'],time()+365*24*3600 ,'/');
                $_COOKIE['login'] = $result['username'];
                setcookie('admin',$result['type'],time()+365*24*3600 ,'/');
                $_COOKIE['admin'] = $result['type'];
                setcookie('email',$result['email'],time()+365*24*3600 ,'/');
                $_COOKIE['email'] = $result['email'];
                setcookie('password',$password,time()+365*24*3600 ,'/');
                $_COOKIE['password'] = $password;
               header('Location: all_reservation_admin');

            }
            } else {
                $err='unactive';

            }
        
        
        
        }else{

            $err='no_pass';
            ;}




        }
    }

    require('disconnect.php');
?>



<script>


var er='<?php echo $err;?>';



</script>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTIC</title>
    <link rel="icon" type="image/x-icon" href="../assets/images/fafa.png">

    <link rel="stylesheet" href="../assets/css/animate.css" >
    <link rel="stylesheet" href="../assets/css/bootstrap.css" >
    <link rel="stylesheet" href="../assets/styles/style_sign_up.php" >

</head>
<body>





<h1 class="error" id="err1" style="display:none;color:rgb(248,72,56)">Username password combination is wrong!</h1>
    <h1 class="error" id="err2" style="display:none;color:rgb(248,72,56)">unactive account</h1>


<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1 style='padding-bottom:10px;'>Contact our admins</h1>
		
<?php
if(isset($ffm[0])){
    echo '<p class="mail">'.$ffm[0].'</p>';
}
if(isset($ffm[1])){
    echo '<p class="mail">'.$ffm[1].'</p>';
}
if(isset($ffm[2])){
    echo '<p class="mail">'.$ffm[2].'</p>';
}
if(isset($ffm[3])){
    echo '<p class="mail">'.$ffm[3].'</p>';
}



?>

		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method='post'  enctype="multipart/form-data" action="login">
			<h1 style='padding-bottom:10px;'>Log in</h1>
			
			<input name='username'  type="text" placeholder="Email" />
			<input name='password'  type="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button type='submit' name="login" value="SUBMIT">Log In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Already have an account?</h1>
				<p>login to be able to make reservations</p>
				<button class="ghost" id="signIn">Log In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Not registered?</h1>
				<p>Contact our admins for an account</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>











    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="../assets/js/bootstrap.js"></script>

    

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/javascript_login.js"></script>



</body>
</html>


