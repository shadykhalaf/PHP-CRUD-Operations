<?php 
$host = "localhost";
$user = "root";
$password = "";
$db_name = "crud123";

$conn = new mysqli($host,$user,$password,$db_name,3307);

if ($conn->connect_error) {
    die("could not connect"  .  $conn->connect_error);
}

?>