<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Завдання 1.1 -->
    <H1>Завдання 1.1</H1>
    <form method="post">
        <label for="text">Текст:</label><br>
        <input type="text" id="text" name="text"><br>
        <label for="find">Знайти:</label><br>
        <input type="text" id="find" name="find"><br>
        <label for="replace">Замінити:</label><br>
        <input type="text" id="replace" name="replace"><br>
        <input type="submit" value="Submit">
    </form>
    <?php
    if (isset($_POST['text']) && isset($_POST['find']) && isset($_POST['replace'])) {
        $text = $_POST['text'];
        $find = $_POST['find'];
        $replace = $_POST['replace'];
        $result = str_replace($find, $replace, $text);

        echo "<p>Результат:</p>";
        echo ($result);
    }
    ?>
    <!-- Завдання 1.2 -->
    <H1>Завдання 1.2</H1>
    <form method="post">
        <label for="cities">Назви міст:</label><br>
        <input type="text" name="cities" id="cities"><br>
        <br>
        <input type="submit" value="Сортувати">
    </form>

    <?php
    if (isset($_POST['cities'])) {
        // розбивка по словам
        $cities = explode(" ", $_POST['cities']);
        sort($cities);
        echo "<p>Відсортовані назви міст:</p>";
        echo "<ol>";
        foreach ($cities as $city) {
            echo "<li>$city</li>";
        }
        echo "</ol>";
    }
    ?>
    <H1>Завдання 1.3</H1>
    <?php

    // $str = "D:\WebServers\home\testsite\www\myfile.txt";
    $str = __FILE__;
    echo "Шлях до файлу: {$str} <br>";
    // $name ==== myfile.txt
    $name = basename($str);
    //регулярний вираз
    $arr = array();
    preg_match('/^(.+)\.(.+)$/', $name, $arr);

    $str2 = $arr[1];
    echo "Без розширення: $str2 <br>";
    var_dump($arr);

    ?>
    <H1>Завдання 1.4</H1>
    <?php

    function dayes($date1, $date2)
    {
        $date1_timestamp = strtotime($date1);
        $date2_timestamp = strtotime($date2);
        $difference = $date2_timestamp - $date1_timestamp;
        return round($difference / 86400);
    }
    $date1 = "05-05-2019";
    $date2 = "12-03-2024";
    $days_difference = dayes($date1, $date2);
    echo "Кількість днів: $days_difference";
    ?>
    <H1>Завдання 1.5</H1>
    <?php
    function generPass($minLength, $maxLength)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
        $length = rand($minLength, $maxLength);
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[rand(0, strlen($chars) - 1)];
        }
        return $password;
    }
    function valPas($password)
    {
        $errors = [];

        $upper = preg_match('@[A-Z]@', $password);
        if (!$upper) {
            $errors[] = "Пароль повинен містити принаймні одну велику літеру.";
        }

        $lower = preg_match('@[a-z]@', $password);
        if (!$lower) {
            $errors[] = "Пароль повинен містити принаймні одну маленьку літеру.";
        }

        $number = preg_match('@[0-9]@', $password);
        if (!$number) {
            $errors[] = "Пароль повинен містити принаймні одну цифру.";
        }

        $special = preg_match('@[^\w]@', $password);
        if (!$special) {
            $errors[] = "Пароль повинен містити принаймні один спеціальний символ.";
        }

        if (strlen($password) < 8) {
            $errors[] = "Пароль повинен бути довжиною принаймні 8 символів.";
        }

        return $errors;
    }
    $genPas = generPass(5, 10);
    echo "<br><br>Згенерований пароль: " . $genPas;
    $valErr = valPas($genPas);
    if (empty($valErr)) {
        echo "<br><br>Пароль  міцний.";
    } else {
        echo "<br><br>Пароль не відповідає критеріям:<br>";
        foreach ($valErr as $error) {
            echo "$error<br>";
        }
    }
    ?>
    <H1>Завдання 2.1</H1>
    <?php

    function findDupl($array)
    {
        $dupl = [];

        foreach ($array as $key => $value) {
            if (isset($dupl[$value])) {
                $dupl[$value]++;
            } else {
                $dupl[$value] = 1;
            }
        }

        return array_keys($dupl, 2);
    }

    $array = [3, 4, 5, 4, 5, 8, 9, 6, 6];

    $dupl = findDupl($array);

    echo implode(", ", $dupl);

    ?>
    <H1>Завдання 2.2</H1>
    <?php

    function randName($arr2, $count, $lenghthName, $arr1)
    {
        $names = [];

        for ($i = 0; $i < $count; $i++) {
            $name = "";
            $firstSyllable = $arr1[rand(0, count($arr1) - 1)];
            $name .= $firstSyllable;
            for ($j = 1; $j < count($lenghthName); $j++) {
                for ($k = 0; $k < $lenghthName[$j]; $k++) {
                    $name .= $arr2[rand(0, count($arr2) - 1)];
                }
            }
            $names[] = $name;
        }

        return $names;
    }
    $arr1 = ["фі", "фі", "фе", "ді", "до", "да"];
    $arr2 = ["мі", "фу", "ток", "цок", "вау", "кра", "вар", "гоц", "фор"];

    $count = 5;
    $lenghthName = [1, 5];

    $names = randName($arr2, $count, $lenghthName, $arr1);

    echo "Клички:\n";
    foreach ($names as $name) {
        echo " <br>  -$name\n";
    }

    ?>

    <H1>Завдання 2.3</H1>
    <?php
    function createArray()
    {
        $length = rand(3, 7);
        $array = [];
        for ($i = 0; $i < $length; $i++) {
            $array[] = rand(10, 20);
        }
        return $array;
    }
    function mergeSort($array1, $array2)
    {
        $merge = array_merge($array1, $array2);
        $dubl = array_unique($merge);
        sort($dubl);
        return $dubl;
    }
    $array1 = createArray();
    $array2 = createArray();

    echo "<br>Перший масив: <br>";
    print_r($array1);

    echo "<br>Другий масив: <br>";
    print_r($array2);
    $merge = mergeSort($array1, $array2);

    echo "<br> Merge && Sort:<br> ";
    print_r($merge);
    echo "\n";
    ?>
    <H1>Завдання 2.4</H1>
    <?php
    $users = array(
        "user1" => array("name" => "Артур", "age" => 25),
        "user2" => array("name" => "Артуем", "age" => 30),
        "user3" => array("name" => "Макар", "age" => 12),
        "user4" => array("name" => "АДаша", "age" => 40),
        "user5" => array("name" => "Діана", "age" => 28),
        // "user6" => array("name" => "Аркашка", "age" => 45),
        // "user7" => array("name" => "Вікторія", "age" => 23),
        // "user8" => array("name" => "Юлія", "age" => 78),
        // "user9" => array("name" => "Ісак", "age" => 65),
        // "user10" => array("name" => "Едгар", "age" => 12),
    );

    function sortUsers($users, $sortBy = null)
    {
        $sortedUsers = $users;
        if ($sortBy === "age") {
            usort($sortedUsers, function ($a, $b) {
                return $a['age'] <=> $b['age'];
            });
        } else if ($sortBy === "name") {
            usort($sortedUsers, function ($a, $b) {
                return strcmp($a['name'], $b['name']);
            });
        }

        return $sortedUsers;
    }

    echo "<br>За віком: <br>";
    $users = sortUsers($users, "age");
    print_r($users);

    $users = $users;

    echo "<br>За іменем: <br>";
    $users = sortUsers($users, "name");
    print_r($users);
    ?>

</body>

</html>