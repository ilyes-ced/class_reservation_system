<?php

$base_name='base';

try
{$bdd = new PDO('mysql:host=localhost;dbname='.$base_name.';charset=utf8', 'root', '');
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}



?>