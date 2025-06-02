<?php
include '../db.php';

$result = $conn->query("SELECT * FROM orders");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>View Orders</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Orders</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PRODUCT_ID</th>
                    <th>CUST_ID</th>
                    <th>AMOUNT</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['ID'] ?></td>
                    <td><?= $row['PRODUCT_ID'] ?></td>
                    <td><?= $row['CUST_ID'] ?></td>
                    <td><?= $row['AMOUNT'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['ID'] ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?= $row['ID'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-primary">Add New Order</a>
        <a href="http://localhost:8080/crud123/index.php" class="btn btn-primary mx-2"  >Return Home</a>
    </div>
</body>
</html>