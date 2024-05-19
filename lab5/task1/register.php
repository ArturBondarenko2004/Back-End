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
    <title>Реєстрація</title>
</head>
<body>
<div class="container">
    <?php if (!isset($_SESSION['user'])) : ?>
        <h1 class="title mt-4 mb-4">Реєстрація</h1>
        <form method="post" action="actionRegister.php">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Введіть ім'я:</label>
                <input type="text" name="name" class="form-control" id="exampleInputName">
            </div>
            <div class="mb-3">
                <label for="exampleInputSurname" class="form-label">Введіть прізвище:</label>
                <input type="text" name="surname" class="form-control" id="exampleInputSurname">
            </div>
            <div class="mb-3">
                <label for="exampleInputLogin" class="form-label">Введіть логін:</label>
                <input type="email" class="form-control" name="login" id="exampleInputLogin" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword" class="form-label">Введіть пароль:</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Введіть пароль ще раз:</label>
                <input type="password" name="password2" class="form-control" id="exampleInputPassword2">
            </div>
            <button type="submit" class="btn btn-primary">Зареєструватись</button>
            <button type="reset" class="btn btn-primary">Очистити форму</button>
        </form>
    <div><a class="btn btn-primary mt-3" href="index.php">На головну сторінку</a></div>
    <?php else:?>
        <h1 class="title mt-4 mb-4">Ви вже зареєстровані</h1>
        <div ><a class="btn btn-primary" href="index.php">На головну</a></div>
    <?php endif; ?>
</div>
<?php
if(is_file("../assets/scripts.php"))
    require_once "../assets/scripts.php";
?>
</body>
</html>
