<?php
session_start();
require_once "../db.php";
$user = [];
$user["login"] = trim($_POST["login"]);
$user["password"] = trim($_POST["password"]);

$backLink = $_SERVER['HTTP_REFERER'];
$errorLink = "<a href='$backLink'>Назад</a>";
$errorFieldsEcho = "<div class='alert alert-danger m-5' role='alert'>Ви не заповнили всі поля. $errorLink</div>";
$errorNotFoundEcho = "<div class='alert alert-danger m-5' role='alert'>Користувача не знайдено. $errorLink</div>";
$successEcho = "<div class='alert alert-success m-5' role='alert'>Авторизація пройшла успішно. <a href='index.php'>На головну</a></div>";
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
$sql = 'SELECT * from users where login = ? and password = ?';
$stml = $pdo->prepare($sql);
$user["password"] = md5($user["password"]);
$stml->execute([$user["login"], $user["password"]]);
$users = $stml->fetchAll();
if(empty($users[0]))
{
    echo $errorNotFoundEcho;
    die();
}
else
{
    $_SESSION['user'] = $users[0];
    echo $successEcho;
}

?>

<?php
if(is_file("assets/scripts.php"))
    require_once "assets/scripts.php";
?>
</body>
</html>
