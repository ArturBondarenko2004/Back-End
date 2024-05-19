<?php
require_once('./db.php');
require_once('./delete.php');
require_once('./edit.php');
require_once('./add.php');

$sql = "SELECT * FROM employees";
$result = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Всі співробітники</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["position"]; ?></td>
                    <td><?php echo $row["salary"]; ?></td>
                    <td>
                        <form action="edit.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                            <input type="submit" class="btn btn-primary btn-sm" name="edit" value="Edit">
                        </form>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                            <input type="submit" class="btn btn-danger btn-sm" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h2 class="mt-5">Додати нового співробітника</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" class="form-control" id="position" name="position">
        </div>
        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="number" class="form-control" id="salary" name="salary">
        </div>
        <button type="submit" class="btn btn-success" name="submit">Add</button>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>