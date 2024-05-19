<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    echo '<strong style="color: red;">Task 2</strong>';

    $probil1 = str_repeat("&nbsp;", 1);
    $probil2 = str_repeat("&nbsp;", 5);
    $probil3 = str_repeat("&nbsp;", 12);
    $probil4 = str_repeat("&nbsp;", 17);
    $probil5 = str_repeat("&nbsp;", 22);

    echo '<p>Полину в мріях в купель океану,<br>' .
        ' Відчую <strong>шовковистість</strong> глибини,<br>' .
        $probil1 . 'Чарівні мушлі з дна собі дістану,<br>' .
        $probil2 . 'Щоб <strong><i>взимку</i></strong><br>' .
        $probil3 . '<u>тішили</u><br> ' .
        $probil4 . 'мене <br>' .
        $probil5 . 'вони…</p>';

    echo '<strong style="color: red;">Task 2</strong> <br>';

    $probils = [
        1 => 0,
        2 => 0,
        4 => 1,
        5 => 5,
        6 => 12,
        7 => 17,
        8 => 22
    ];

    $texts = [
        1 => 'Полину в мріях в купель океану,',
        2 => 'Відчую <strong>шовковистість</strong> глибини,',
        4 => 'Чарівні мушлі з дна собі дістану,',
        5 => 'Щоб <strong><i>взимку</i></strong>',
        6 => '<u>тішили</u>',
        7 => 'мене',
        8 => 'вони…'
    ];
    foreach ($texts as $key => $text) {
        $probil = str_repeat("&nbsp;", $probils[$key]);
        echo $probil . $text . "<br>";
    }
    echo '<br>-----------------------------------------------------------<br>';
    echo '<strong style="color: red;">Task 3</strong> <br>';

    $in_uan = 1500;
    $ex = 38;
    $in_usdt = $in_uan / $ex;
    echo $in_uan . " грн. можна обміняти на " . round($in_usdt, 3) . " долар";

    echo '<br>-----------------------------------------------------------<br>';
    echo '<strong style="color: red;">Task 4</strong> <br>';
    $mon_num = 12;

    if ($mon_num >= 3 && $mon_num <= 5) {
        $season = "Весна";
    } elseif ($mon_num >= 6 && $mon_num <= 8) {
        $season = "Літо";
    } elseif ($mon_num >= 9 && $mon_num <= 11) {
        $season = "Осінь";
    } else {
        $season = "Зима";
    }
    echo "Місяц з номером: $mon_num  це  $season";

    echo '<br>-----------------------------------------------------------<br>';
    echo '<strong style="color: red;">Task 5</strong> <br>';
    $char = 'u';
    function golosna($char)
    {
        $char = strtoupper($char);
        switch ($char) {
            case 'A':
            case 'I':
            case 'E':
            case 'U':
            case 'O':
                return true;
            default:
                return false;
        }
    }
    if (golosna($char)) {
        echo "$char - голосна";
    } else {
        echo "$char - приголосна";
    }

    echo '<br>-----------------------------------------------------------<br>';
    echo '<strong style="color: red;">Task 6</strong> <br>';

    $num = mt_rand(100, 300);
    echo "Випадкове число: $num <br>";

    $rev_num = strrev($num);
    echo "Реверс: $rev_num <br>";

    $sum = array_sum(str_split($num));
    echo "Сума цифр: $sum <br>";

    $num_array = str_split($num);
    // print_r($num_array);
    rsort($num_array);
    // print_r($num_array);
    echo "Найбільше можливе число:";
    foreach ($num_array as $num) {
        echo  $num . " ";
    }
    echo '<br>-----------------------------------------------------------<br>';
    echo '<strong style="color: red;">Task 7</strong> <br>';

    function printTable($rows, $cols)
    {
        echo "<table border='20'>";

        for ($i = 0; $i < $rows; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $cols; $j++) {
                $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                echo "<td style='background-color: $color; width: 25px; height: 25px;'></td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    }
    printTable(10, 10);
    echo '<br>-----------------------------------------------------------<br>';
    function printSqr($count) {
        echo "<style> .square { position: absolute; background-color: white; } </style>";
        echo "<div style='position: relative; width: 300px; height: 300px; background-color: black;'>";
    
        for ($i = 0; $i < $count; $i++) {
            $size = mt_rand(10, 30);
            $left = mt_rand(0, 270);
            $top = mt_rand(0, 270);
            echo "<div class='square' style='width: {$size}px; height: {$size}px; left: {$left}px; top: {$top}px; z-index: 10;'></div>";
        }
        echo "</div>";
    }
    printSqr(10);
    ?>


</body>

</html>