<?php
#Database Connection
session_start();

date_default_timezone_set('Africa/Lagos');


$host = 'localhost';
$user = 'root';

$db_password = '';
$database = 'quiz_db';

$connection = mysqli_connect($host, $user, $db_password, $database);

?>