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
    <title>Лабораторна робота 6. Завдання 2. Додавання запису</title>
</head>
<div class="container mt-5">
    <form method="post" action="">
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Введіть назву товару:</label>
            <input type="text" class="form-control" name="name" id="exampleInputName" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPrice" class="form-label">Введіть ціну товару:</label>
            <input type="text" class="form-control" name="price" id="exampleInputPrice" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputCount" class="form-label">Введіть кількість товару:</label>
            <input type="number" class="form-control" name="count" id="exampleInputCount" aria-describedby="emailHelp">
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Додати</button>
    </form>
</div>
<body>
<?php
require_once "../db.php";
if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    if (str_contains($_POST['price'], ","))
    {
        $price = floatval(str_replace(",", ".", $_POST['price']));
    }
    else
    {
        $price = floatval($_POST['price']);
    }
    $count = $_POST['count'];
    $sql = 'INSERT INTO products (name, price, count) VALUES (?, ?, ?)';
    $stml = $pdo->prepare($sql);
    $stml->execute([$name, $price, $count]);
    header("Location: index.php");
}
?>
<?php
if(is_file("../assets/scripts.php"))
    require_once "../assets/scripts.php";
?>
</body>
</html>
