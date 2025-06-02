<?php
include '../db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $AMOUNT = $_POST['AMOUNT'];
    $cust_id = $_POST['CUST_ID'];
    $product_id = $_POST['PRODUCT_ID'];

    $sql = "UPDATE orders SET AMOUNT='$AMOUNT',CUST_ID='$cust_id', PRODUCT_ID='$product_id' WHERE ID=$id";
    $conn->query($sql);
    header('Location: read.php');
}

$result = $conn->query("SELECT * FROM orders WHERE ID=$id");
$order = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Order</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Order</h2>
        <form method="POST">
            <div class="form-group">
                <label for="AMOUNT">Order Paid Amount</label>
                <input type="text" class="form-control" name="AMOUNT" value="<?= $order['AMOUNT'] ?>" required>
            </div>
            <div class="form-group">
                <label for="CUST_ID">Customer</label>
                <input type="text" class="form-control" name="CUST_ID" value="<?= $order['CUST_ID'] ?>" required>
            </div>
            <div class="form-group">
                <label for="PRODUCT_ID">Product</label>
                <input type="text" class="form-control" name="PRODUCT_ID" value="<?= $order['PRODUCT_ID'] ?>" required>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>