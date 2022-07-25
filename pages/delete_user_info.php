<?php 



setcookie("login", "", time()-3600,"/");
setcookie("password", "", time()-3600,"/");
setcookie("email", "", time()-3600,"/");
setcookie("admin", "", time()-3600,"/");



header("Refresh:0; url=login");

?>