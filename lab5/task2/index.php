<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    if(is_file("../assets/links.php"))
        require_once "../assets/links.php";
    ?>
    <title>Лабораторна робота 5. Завдання 2. Головна сторінка</title>
</head>
<body>
<div class="container mt-5">
    <?php
    function addItems($pdo)
    {
        $sql = "DELETE from products";
        $pdo->query($sql);
        $sql = "INSERT INTO products (name, price, count) VALUES ('Хліб', 12.5, 55)";
        $pdo->query($sql);
        $sql = "INSERT INTO products (name, price, count) VALUES ('Молоко', 35.25, 30)";
        $pdo->query($sql);
        $sql = "INSERT INTO products (name, price, count) VALUES ('Яйця', 10, 25)";
        $pdo->query($sql);
        $sql = "INSERT INTO products (name, price, count) VALUES ('Горіхи', 120.99, 35)";
        $pdo->query($sql);
        $sql = "INSERT INTO products (name, price, count) VALUES ('Сосиски', 15, 15)";
        $pdo->query($sql);
        $sql = "INSERT INTO products (name, price, count) VALUES ('Сир', 35.15, 5)";
        $pdo->query($sql);
        $sql = "INSERT INTO products (name, price, count) VALUES ('Цукерки', 100, 10)";
        $pdo->query($sql);
        $sql = "INSERT INTO products (name, price, count) VALUES ('Вода', 12.89, 100)";
        $pdo->query($sql);
        $sql = "INSERT INTO products (name, price, count) VALUES ('Стейк', 250, 31)";
        $pdo->query($sql);
        $sql = "INSERT INTO products (name, price, count) VALUES ('Жуйка', 5, 90)";
        $pdo->query($sql);
    }
    require_once "../db.php";
   
    //addItems($pdo);
    echo "<p class='h5'>Виведемо всі товари:</p><br>";
    $sql = "SELECT * FROM products";
    $result = $pdo->query($sql);
    echo "<table class='table'>";
    echo "<tr>";
    echo "<td style='font-weight: bold'>ID</td>";
    echo "<td style='font-weight: bold'>Назва</td>";
    echo "<td style='font-weight: bold'>Ціна</td>";
    echo "<td style='font-weight: bold'>Кількість</td>";
    echo "</tr>";
    foreach($result as $row)
    {
        echo "<tr>";
            echo '<td>'.$row["id"].'</td>';
            echo '<td>'.$row["name"].'</td>';
            echo '<td>'.$row["price"].'</td>';
            echo '<td>'.$row["count"].'</td>';
        echo "</tr>";
    }
    echo "</table>";
    ?>
    <div>
        <a class="btn btn-primary" href="insert.php">Додати запис</a>
    </div>
    <form method="post" action="delete.php">
        <div style="column-gap: 10px" class="d-flex align-items-center mt-3">
            <button class="btn btn-primary" type="submit">Видалити запис</button>
            <input required style="width: initial" type="number" name="id" class="form-control" id="exampleInputId">
        </div>
    </form>
</div>
<?php
if(is_file("../assets/scripts.php"))
    require_once "../assets/scripts.php";
?>
</body>
</html>
ви