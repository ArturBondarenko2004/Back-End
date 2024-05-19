<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,
maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cтворення директорії з підкаталогами та файлами</title>
    <style>
        .error {
            color: red;
            font-weight: 700;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <form method="post" action="index.php">
        <div><label for="login">Введіть логін: <input id="login" name="login" type="text"></label></div>
        <div style="margin-top: 10px;"><label for="password">Введіть пароль: <input id="password" name="password" type="password"></label></div>
        <button name="submit" type="submit">Обробити</button>
    </form>
    <a href="delete.php">Перейти до сторінки з видаленням директорії</a>
    <?php
    if (isset($_POST["submit"])) {
        $folder = $_POST["login"];
        $foldersName = ["photo", "music", "video"];
        $filesName = ["photo.txt", "music.txt", "video.txt"];
        if (is_dir($folder)) {
            echo "<div class='error'>Така папка вже існує!</div>";
        } else {
            mkdir($folder);
        }
        $counter = 0;

        foreach ($foldersName as $folderName) {
            if (!is_dir($folder . "/" . $folderName)) {
                mkdir($folder . "/" . $folderName);
            }
            file_put_contents(
                $folder . "/" . $folderName . "/" . $filesName[$counter],
                "Some data for {$filesName[$counter]} file"
            );
            $counter++;
        }
    }
    ?>
</body>

</html>