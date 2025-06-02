<?php
include '../db.php';

$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>View Products</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Products</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PRODUCT NAME</th>
                    <th>PRICE</th>
                    <th>CATEGORY</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['ID'] ?></td>
                    <td><?= $row['PRODUCT_NAME'] ?></td>
                    <td><?= $row['PRICE'] ?></td>
                    <td><?= $row['CAT_ID'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['ID'] ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?= $row['ID'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-primary">Add New Product</a>
        <a href="http://localhost:8080/crud123/index.php" class="btn btn-primary mx-2"  >Return Home</a>
    </div>
</body>
</html>