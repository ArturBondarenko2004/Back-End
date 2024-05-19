<?php
session_start();
require_once "../db.php";
$errorArentSameEcho = "<div class='alert alert-danger m-5' role='alert'>Неправильно введено старий логін. Спробуйте ще або <a href='index.php'>на головну</a></div>";
$successEcho = "<div class='alert alert-success m-5' role='alert'>Логін успішно змінено. <a href='index.php'>На головну</a></div>";
?>
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
    <title>Зміна логіну</title>
</head>
<body>
    <div class="container">
        <h1 class="title mt-4 mb-4">Зміна логіну</h1>
        <form method="post" action="">

            <div class="mb-3">
                <label for="exampleInputLogin1" class="form-label">Введіть старий логін:</label>
                <input type="email" class="form-control" name="oldLogin" id="exampleInputLogin1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputLogin2" class="form-label">Введіть новий логін:</label>
                <input type="email" class="form-control" name="newLogin" id="exampleInputLogin2" aria-describedby="emailHelp">
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Змінити</button>
        </form>
        <div><a class="btn btn-primary mt-3" href="index.php">На головну сторінку</a></div>
    </div>
    <?php
    if (isset($_POST['submit']))
    {
        $oldLogin = $_POST['oldLogin'];
        $newLogin = $_POST['newLogin'];
        $sql = 'SELECT * from users where login = ?';
        $stml = $pdo->prepare($sql);
        $stml->execute([$oldLogin]);
        $users = $stml->fetchAll();
        if(empty($users[0]))
        {
            echo $errorArentSameEcho;
            die();
        }
        else
        {
            $sql = 'UPDATE users set login = ? where login = ?';
            $stml = $pdo->prepare($sql);
            $stml->execute([$newLogin, $oldLogin]);
            $_SESSION['user']['login'] = $newLogin;
            echo $successEcho;
        }
    }
    ?>
    <?php
    if(is_file("../assets/scripts.php"))
        require_once "../assets/scripts.php";
    ?>
</body>
</html>
