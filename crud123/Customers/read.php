<?php
include '../db.php';

$result = $conn->query("SELECT * FROM customers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>View Customers</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Customers</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['ID'] ?></td>
                    <td><?= $row['USERNAME'] ?></td>
                    <td><?= $row['EMAIL'] ?></td>
                    <td><?= $row['ADDRESS'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['ID'] ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?= $row['ID'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-primary">Add New Customer</a>
        <a href="http://localhost:8080/crud123/index.php" class="btn btn-primary mx-2"  >Return Home</a>
    </div>
</body>
</html>