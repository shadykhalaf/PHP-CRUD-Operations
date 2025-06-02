<?php
include '../db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "UPDATE customers SET USERNAME='$username', EMAIL='$email', ADDRESS='$address' WHERE ID=$id";
    $conn->query($sql);
    header('Location: read.php');
}

$result = $conn->query("SELECT * FROM customers WHERE ID=$id");
$customer = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Customer</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Customer</h2>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="<?= $customer['USERNAME'] ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $customer['EMAIL'] ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" name="address" required><?= $customer['ADDRESS'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>