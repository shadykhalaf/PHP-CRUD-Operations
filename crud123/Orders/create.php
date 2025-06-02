<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $AMOUNT = $_POST['AMOUNT'];
    $cust_id = $_POST['CUST_ID'];
    $product_id = $_POST['PRODUCT_ID'];
  

    $sql = "INSERT INTO orders (AMOUNT,CUST_ID,PRODUCT_ID) VALUES ('$AMOUNT',$cust_id,$product_id)";
    $conn->query($sql);
    header('Location: read.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Add Order</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Add Order</h2>
        <form method="POST">
            <div class="form-group">
                <label for="ANOUNT">Order Paid Amount</label>
                <input type="text" class="form-control" name="AMOUNT" required>
            </div>
            <div class="form-group">
                <label for="CUST_ID">Customer</label>
                <input type="text" class="form-control" name="CUST_ID" required>
            </div>
            <div class="form-group">
                <label for="PRODUCT_ID">Product</label>
                <input type="text" class="form-control" name="PRODUCT_ID" required>
            </div>
         
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</body>
</html>