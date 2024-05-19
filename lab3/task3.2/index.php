<?php
$file1 = file_get_contents("file1.txt");
$file2 = file_get_contents("file2.txt");
$file1Words = explode(" ", $file1);
$file2Words = explode(" ", $file2);
$arrTask3_2A = [];
$arrTask3_2B = [];
$arrTask3_2C = [];
$check = false;
$resStr = "";
for ($i = 0; $i < count($file1Words); $i++) {
    for ($j = 0; $j < count($file2Words); $j++) {
        if ($file1Words[$i] == $file2Words[$j]) {
            $check = True;
        }
    }
    if (!$check) {
        array_push($arrTask3_2A, $file1Words[$i]);
    }
    $check = false;
}
foreach ($arrTask3_2A as $item) {
    $resStr .= $item . " ";
}
$resStr = "Слова, які зустрічаються тільки в першому файлі: " . $resStr;
file_put_contents("Task3_2AFile.txt", $resStr);
$resStr = "";
$check = false;
for ($i = 0; $i < count($file1Words); $i++) {
    for ($j = 0; $j < count($file2Words); $j++) {
        if ($file1Words[$i] == $file2Words[$j]) {
            $check = True;
        }
    }
    if ($check) {
        array_push($arrTask3_2B, $file1Words[$i]);
    }
    $check = false;
}
foreach ($arrTask3_2B as $item) {
    $resStr .= $item . " ";
}
$resStr = "Слова, які зустрічаються в обох файлах: " . $resStr;
file_put_contents("Task3_2BFile.txt", $resStr);
$resStr = "";
$counter = 0;
$moreThanTwoArrTmp = [];
for ($i = 0; $i < count($file1Words); $i++) {
    for ($j = 0; $j < count($file2Words); $j++) {
        if ($file1Words[$i] == $file2Words[$j]) {
            $counter++;
        }
    }
    if ($counter > 2 && !in_array($file1Words[$i], $moreThanTwoArrTmp)) {
        array_push($moreThanTwoArrTmp, $file1Words[$i]);
    }
    $counter = 0;
}
$counter = 0;
for ($i = 0; $i < count($file1Words); $i++) {
    for ($j = 0; $j < count($moreThanTwoArrTmp); $j++) {
        if ($file1Words[$i] == $moreThanTwoArrTmp[$j]) {
            $counter++;
        }
    }
    if ($counter > 2) {
        array_push($arrTask3_2C, $file1Words[$i]);
    }
}
foreach ($arrTask3_2C as $item) {
    $resStr .= $item . " ";
}
$resStr = "Слова, які зустрічаються в кожному файлі більше двох разів: " .
    $resStr;
file_put_contents("Task3_2CFile.txt", $resStr);
