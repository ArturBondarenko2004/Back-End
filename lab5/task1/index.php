<?php
session_start();
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
    <title>Головна сторінка</title>
</head>
<body>
<div class="container">
    <?php if (!isset($_SESSION['user'])) : ?>
    <h1 class="title mt-4 mb-4">Головна сторінка</h1>
    <form method="post" action="actionAuth.php">
        <div class="mb-3">
            <label for="exampleInputLogin" class="form-label">Введіть логін:</label>
            <input type="email" class="form-control" name="login" id="exampleInputLogin" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword" class="form-label">Введіть пароль:</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword">
        </div>
        <button type="submit" class="btn btn-primary">Авторизуватись</button>
    </form>
    <p class="mt-4 mb-4 h5">Не маєте акаунту? <a href="register.php">Зареєструватись</a></p>

    <?php else:?>
        <h1 class="title mt-4 mb-4">Вітаємо, <?=$_SESSION['user']['name']?>!</h1>
        <div>
            <a class="btn btn-primary " href="logout.php">Вийти з акаунту</a>
            <a class="btn btn-danger" href="delete.php">Видалити акаунт</a>
        </div>
        <div class="mt-3">
            <div><a class="btn btn-primary " href="changeLogin.php">Змінити логін</a></div>
            <div class="mt-1"> <a class="btn btn-primary" href="changePassword.php">Змінити пароль</a></div>
        </div>
    <?php endif; ?>
</div>
<?php
if(is_file("../assets/scripts.php"))
    require_once "../assets/scripts.php";
?>
</body>
</html>
