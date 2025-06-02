<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $PRODUCT_NAME = $_POST['PRODUCT_NAME'];
    $PRICE = $_POST['PRICE'];
    $CAT_ID = $_POST['CAT_ID'];
  

    $sql = "INSERT INTO products (PRODUCT_NAME,PRICE,CAT_ID) VALUES ('$PRODUCT_NAME',$PRICE,$CAT_ID)";
    $conn->query($sql);
    header('Location: read.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Add Product</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Add Product</h2>
        <form method="POST">
            <div class="form-group">
                <label for="PRODUCT_NAME">Product</label>
                <input type="text" class="form-control" name="PRODUCT_NAME" required>
            </div>
            <div class="form-group">
                <label for="Price">Price</label>
                <input type="text" class="form-control" name="PRICE" required>
            </div>
            <div class="form-group">
                <label for="CAT_ID">Category</label>
                <input type="text" class="form-control" name="CAT_ID" required>
            </div>
         
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</body>
</html>