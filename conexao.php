<?php 

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'select';

$mysqli = new mysqli($host, $user, $password, $db);

if($mysqli->connect_errno) {
    die("falha na conexão (" . $mysqli->connect_errno . " ) " . $mysqli->connect_error );
}