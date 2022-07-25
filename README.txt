php version must be 8
javascript and cookies must be enabled

database phpmyadmin 10.4.21 mariaDB


create the database with the file 'CREATE_DATABASE.php'


must turn off database strict mode off:


to check your database's strict mode input this in your database's sql console :
-------------> SHOW  variables LIKE '%strict%';
to disable it :
------------------------> SET GLOBAL innodb_strict_mode=OFF;

create database with the name 'base':
http://localhost/project/pages/CREATE_DATABASE.php
if not named 'base' change the name of 
the database in the file pages/connect.php to your preferred database name




register.php file is for manual regestration 
and not intended for the final version of the project
http://localhost/project/pages/register.php 
for manual regstration