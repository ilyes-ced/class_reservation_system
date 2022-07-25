<?php

$base_name='base';

try
{$bdd = new PDO('mysql:host=localhost;dbname='.$base_name.';charset=utf8', 'root', '');
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}












//$bdd = new PDO('sqlite:xampp\htdocs\project\mydata.db');

/*
$dir = 'sqlite:/xampp/htdocs/project/database/mydata.db';





try{
    $bdd  = new PDO($dir);
    echo 'ergqe';
}catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}


*/














/*


$dir = 'sqlite:database/mydata.db';


$bdd  = new PDO("sqlite:database/mydata.db");

*/












?>