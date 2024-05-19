<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,
maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Завдання 3.3</title>
</head>

<body>
    <?php
    $file = file_get_contents("file1.txt");
    $fileWords = explode(" ", $file);
    echo "Початковий контент файлу:</br>";
    foreach ($fileWords as $item) {
        echo $item . " ";
    }
    natcasesort($fileWords);
    echo "</br></br>Слова із файлу впорядковані за алфовітом:</br>";
    foreach ($fileWords as $item) {
        echo $item . " ";
    }
    ?>
</body>

</html>