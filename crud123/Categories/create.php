<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryname = $_POST['CAT_NAME'];
  

    $sql = "INSERT INTO category (CAT_NAME) VALUES ('$categoryname')";
    $conn->query($sql);
    header('Location: read.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Add Category</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Add Category</h2>
        <form method="POST">
            <div class="form-group">
                <label for="username">Category Name</label>
                <input type="text" class="form-control" name="CAT_NAME" required>
            </div>
         
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</body>
</html>