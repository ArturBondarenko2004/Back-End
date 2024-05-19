<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,
maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сторінка з видаленням директорії</title>
    <style>
        .error {
            color: red;
            font-weight: 700;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <form method="post" action="delete.php">
        <div><label for="login">Введіть логін: <input id="login" name="login" type="text"></label></div>
        <div style="margin-top: 10px;"><label for="password">Введіть пароль: <input id="password" name="password" type="password"></label></div>
        <button name="submit" type="submit">Обробити</button>
    </form>
    <a href="index.php">Перейти до сторінки з створенням директорії</a>
    <?php
    if (isset($_POST["submit"])) {
        $folder = $_POST["login"];
        if (is_dir($folder)) {
            removeDirectory($folder);
        } else {
            echo "<div class='error'>Такої папки не існує!</div>";
        }
    }
    function removeDirectory($path)
    {
        if (is_file($path)) {
            return unlink($path);
        }
        if (is_dir($path)) {
            foreach (scandir($path) as $p) {
                if (($p != '.') && ($p != '..')) {
                    removeDirectory($path . DIRECTORY_SEPARATOR . $p);
                }
            }
            return rmdir($path);
        }
        return false;
    }
    ?>
</body>

</html>