<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=company_db;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    die("Помилка підключення до бази даних");
}

if (isset($_POST['edit'])) {
    $id = $_POST["id"];
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $position = isset($_POST['position']) ? $_POST['position'] : null;
    $salary = isset($_POST['salary']) ? $_POST['salary'] : null;

    if ($name !== null && $position !== null && $salary !== null) {
        $sql = "UPDATE employees SET name=?, position=?, salary=? WHERE id=?";
        $stml = $pdo->prepare($sql);
        $stml->execute([$name, $position, $salary, $id]);
        header("Location: index.php");
    } else {
        $sql = "SELECT * FROM employees WHERE id=?";
        $stml = $pdo->prepare($sql);
        $stml->execute([$id]);
        $employee = $stml->fetch();

        if ($employee) {
           
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Редагування таблиці</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            </head>
            <body>
            <div class="container mt-5">
                <h2> Редагування таблиці</h2>
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $employee['id']; ?>">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $employee['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="position">Position:</label>
                        <input type="text" class="form-control" id="position" name="position" value="<?php echo $employee['position']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary:</label>
                        <input type="number" class="form-control" id="salary" name="salary" value="<?php echo $employee['salary']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="edit">Зберегти</button>
                </form>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </body>
            </html>
            <?php
        } else {
            echo "Помилка по доступу.";
        }
    }
}
?>
