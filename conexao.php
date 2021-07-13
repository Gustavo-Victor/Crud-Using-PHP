<?php 
session_start();

$server = "localhost";
$user = "root";
$password = "";
$db_name = "db_usuario";

$conn = mysqli_connect($server, $user, $password, $db_name);

if(mysqli_connect_error()){
    echo "Error: ".mysqli_connect_error();
}