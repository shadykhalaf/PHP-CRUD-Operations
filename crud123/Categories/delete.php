<?php
include '../db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM category WHERE ID=$id");
header('Location: read.php');
?>