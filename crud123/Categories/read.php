<?php
include '../db.php';

$result = $conn->query("SELECT * FROM category");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>View Categories</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Categories</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CAT_NAME</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <th><?= $row['ID'] ?></th>
                    <td><?= $row['CAT_NAME'] ?></td>
                 
                    <td>
                        <a href="update.php?id=<?= $row['ID'] ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?= $row['ID'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-primary">Add New Category</a>
        <a href="http://localhost:8080/crud123/index.php" class="btn btn-primary mx-2"  >Return Home</a>
    </div>
</body>
</html>