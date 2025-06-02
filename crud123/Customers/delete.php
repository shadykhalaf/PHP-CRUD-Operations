<?php
include '../db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM customers WHERE ID=$id");
header('Location: read.php');
?>