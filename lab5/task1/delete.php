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
    <title>Видалення акаунту</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Ви дійсно бажаєте видалити акаунт?</h1>
        <div>
            <a class="btn btn-danger" href="deleteConfirm.php">Так</a>
            <a class="btn btn-primary" href="index.php">Відмінити</a>
        </div>
    </div>
    <?php
    if(is_file("../assets/scripts.php"))
        require_once "../assets/scripts.php";
    ?>
</body>
</html>
