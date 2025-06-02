<?php
include '../db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryname = $_POST['CAT_NAME'];
 
    $sql = "UPDATE category SET CAT_NAME='$categoryname' WHERE ID=$id";
    $conn->query($sql);
    header('Location: read.php');
}

$result = $conn->query("SELECT * FROM category WHERE ID=$id");
$category = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Category</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Category</h2>
        <form method="POST">
            <div class="form-group">
                <label for="CAT_NAME">Category Name</label>
                <input type="text" class="form-control" name="CAT_NAME" value="<?= $category['CAT_NAME'] ?>" required>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>