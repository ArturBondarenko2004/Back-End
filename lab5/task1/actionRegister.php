<?php
session_start();
require_once "../db.php";
$user = [];
$user["name"] = trim($_POST["name"]);
$user["surname"] = trim($_POST["surname"]);
$user["login"] = trim($_POST["login"]);
$user["password"] = trim($_POST["password"]);
$user["password2"] = trim($_POST["password2"]);
$backLink = $_SERVER['HTTP_REFERER'];
$errorLink = "<a href='$backLink'>Назад</a>";
$errorFieldsEcho = "<div class='alert alert-danger m-5' role='alert'>Ви не заповнили всі поля. $errorLink</div>";
$errorAlreadyExistsEcho = "<div class='alert alert-danger m-5' role='alert'>Користувач з таким логіном вже зареєстрований. $errorLink</div>";
$errorArentSameEcho = "<div class='alert alert-danger m-5' role='alert'>Паролі не співпадають. $errorLink</div>";
$successEcho = "<div class='alert alert-success m-5' role='alert'>Реєстрація пройшла успішно. <a href='index.php'>Авторизуватись</a></div>";
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
    <title>Document</title>
</head>
<body>
<?php
foreach ($user as $item)
{
    if(empty($item))
    {
        echo $errorFieldsEcho;
        die();
    }
}
$sql = 'SELECT * from users where login = ?';
$stml = $pdo->prepare($sql);
$stml->execute([$user["login"]]);
$users = $stml->fetchAll();
if(!empty($users[0]))
{
    echo $errorAlreadyExistsEcho;
    die();
}
else if ($user["password"] !== $user["password2"])
{
    echo $errorArentSameEcho;
    die();
}
else
{
    $sql = 'INSERT INTO users (name, surname, login, password) VALUES (?, ?, ?, ?)';
    $stml = $pdo->prepare($sql);
    $user["password"] = md5($user["password"]);
    $stml->execute([$user["name"], $user["surname"], $user["login"],$user["password"]]);
    echo $successEcho;
}

?>
<?php
if(is_file("../assets/scripts.php"))
    require_once "../assets/scripts.php";
?>
</body>
</html>


