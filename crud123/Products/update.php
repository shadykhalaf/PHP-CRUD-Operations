<?php
include '../db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $PRODUCT_NAME = $_POST['PRODUCT_NAME'];
    $PRICE = $_POST['PRICE'];
    $CAT_ID = $_POST['CAT_ID'];

    $sql = "UPDATE products SET AMOUNT='$AMOUNT',PRICE='$PRICE', CAT_ID='$CAT_ID' WHERE ID=$id";
    $conn->query($sql);
    header('Location: read.php');
}

$result = $conn->query("SELECT * FROM products WHERE ID=$id");
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Product</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Product</h2>
        <form method="POST">
            <div class="form-group">
                <label for="PRODUCT_NAME">Order Paid Amount</label>
                <input type="text" class="form-control" name="PRODUCT_NAME" value="<?= $product['PRODUCT_NAME'] ?>" required>
            </div>
            <div class="form-group">
                <label for="PRICE">Customer</label>
                <input type="text" class="form-control" name="PRICE" value="<?= $product['PRICE'] ?>" required>
            </div>
            <div class="form-group">
                <label for="CAT_ID">Product</label>
                <input type="text" class="form-control" name="CAT_ID" value="<?= $product['CAT_ID'] ?>" required>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>