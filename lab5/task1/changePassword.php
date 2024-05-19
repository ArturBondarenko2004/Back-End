<?php
session_start();
require_once "../db.php";
$errorArentSameEcho = "<div class='alert alert-danger m-5' role='alert'>Неправильно введено старий пароль. Спробуйте ще або <a href='index.php'>на головну</a></div>";
$errorArentSame2Echo = "<div class='alert alert-danger m-5' role='alert'>Нові паролі не співпадають. Спробуйте ще або <a href='index.php'>на головну</a></div>";
$successEcho = "<div class='alert alert-success m-5' role='alert'>Пароль успішно змінено. <a href='index.php'>На головну</a></div>";
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
    <title>Зміна паролю</title>
</head>
<body>
<div class="container">
    <h1 class="title mt-4 mb-4">Зміна паролю</h1>
    <form method="post" action="">

        <div class="mb-3">
            <label for="exampleInputLogin1" class="form-label">Введіть старий пароль:</label>
            <input type="password" class="form-control" name="oldPassword" id="exampleInputLogin1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputLogin2" class="form-label">Введіть новий пароль:</label>
            <input type="password" class="form-control" name="newPassword" id="exampleInputLogin2" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputLogin2" class="form-label">Введіть новий пароль ще раз:</label>
            <input type="password" class="form-control" name="newPassword2" id="exampleInputLogin2" aria-describedby="emailHelp">
        </div>
        <button name="submit" type="submit" class="btn btn-primary">Змінити</button>
    </form>
    <div><a class="btn btn-primary mt-3" href="index.php">На головну сторінку</a></div>
</div>
<?php
if (isset($_POST['submit']))
{
    $oldPassword = md5($_POST['oldPassword']);
    $newPassword = md5($_POST['newPassword']);
    $newPassword2 = md5($_POST['newPassword2']);
    $sql = 'SELECT * from users where password = ?';
    $stml = $pdo->prepare($sql);
    $stml->execute([$oldPassword]);
    $users = $stml->fetchAll();
    if(empty($users[0]))
    {
        echo $errorArentSameEcho;
        die();
    }
    else if($newPassword !== $newPassword2)
    {
        echo $errorArentSame2Echo;
        die();
    }
    else
    {
        $sql = 'UPDATE users set password = ? where password = ?';
        $stml = $pdo->prepare($sql);
        $stml->execute([$newPassword, $oldPassword]);
        $_SESSION['user']['password'] = $newPassword;
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
