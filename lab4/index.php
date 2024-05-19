<?php
require_once "classes/Circle.php";
require_once "classes/FileManager.php";
require_once "interfaces/CleaningHouse.php";
require_once "classes/Human.php";
require_once "classes/Student.php";
require_once "classes/Programmer.php";

use classes\Circle;
use classes\FileManager;
use classes\Programmer;
use classes\Student;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Завдання 5</h2>
    <?php
    $circle = new Circle(10, 20, 5);

    echo $circle->__toString() . "\n"; 

    echo "<br>";
    echo "Координата X: " . $circle->getX() . "\n"; //  X
    echo "Координата Y: " . $circle->getY() . "\n"; // Y
    echo "Радіус: " . $circle->getRadius() . "\n"; // Вивід радіуса

    $circle->setX(15);
    $circle->setY(30);
    $circle->setRadius(7);
    echo "<br>";

    echo $circle->__toString() . "\n";

    echo "<br>";
    $circle1 = new Circle(10, 20, 5);
    $circle2 = new Circle(15, 25, 7);

    // Перевірка перетину
    $isIntersecting = $circle1->isIntersecting($circle2);


    if ($isIntersecting) {
        echo "Кола перетинаються";
    } else {
        echo "Кола не перетинаються";
    }
    ?>

    <h2>Завдання 7</h2>
    <?php
    $content = FileManager::readFile("file1.txt");
    echo " <br> Прочитаємо вміст файлу file1.txt: " . $content . "\n";

    FileManager::writeFile("file2.txt", "Артур Бондаренко\n");

    $content1 = FileManager::readFile("file3.txt");
    echo " <br>  <br> Прочитаємо вміст файлу file3.txt: " . $content1 . "\n";
    FileManager::clearFile("file3.txt");

    $clearedContent = FileManager::readFile("file3.txt");
    echo " <br> <br> Вміст file3.txt після очищення: " . $clearedContent . "\n";
    ?>

    <h2>Завдання 8</h2>

    <?php

    $student1 = new Student(173, 55, 19, "ЖДТУ", 3);
    $programmer1 = new Programmer(180, 80, 30, ["PHP", "JavaScript"], 5);

    echo "<br><b>Виводимо інформацію за допомогою Get запитів</b>";
    echo "<br>Зріст студента : " . $student1->getHeight() . " см\n";
    echo "<br>Вага студента : " . $student1->getWeight() . " кг\n";
    echo "<br>Вік студента : " . $student1->getAge() . " років\n";
    echo "<br>Університет студента : " . $student1->getUniversity() . "\n";
    echo "<br>Курс студента : " . $student1->getCourse() . "\n";
    echo "\n";
    echo "<br>Мови програмування програміста : " . implode(", ", $programmer1->getProgrammingLanguages()) . "\n";
    echo "<br>Досвід роботи : " . $programmer1->getWorkExperience() . "<br> <br>";

    echo  "<br><br>" . $student1->performBirth();
    echo "<br> " . $programmer1->performBirth();

    echo "<br><i>Процес оновлення за допомогою Set запитів</i>";
    $student1->setHeight(190);
    $student1->setWeight(110);
    $student1->setAge(21);
    $student1->setUniversity("Києво-Могилянська академія");
    // $student1->setCourse(4);
 
    $student1->promoteToNextCourse();
    $programmer1->addProgrammingLanguage("Java");

    echo "<br> <b>Виведені оновленні  дані</b>";
    echo "<br>Оновлені дані студента :\n";
    echo "<br>Зріст студента : " . $student1->getHeight() . " см\n";
    echo "<br>Вага студента : " . $student1->getWeight() . " кг\n";
    echo "<br>Вік студента : " . $student1->getAge() . " років\n";
    echo "<br>Університет студента : " . $student1->getUniversity() . "\n";
    echo "<br>Курс студента : " . $student1->getCourse();
    echo "<br>Мови програмування програміста : " . implode(", ", $programmer1->getProgrammingLanguages()) . "\n";
    var_dump($student1);
    var_dump($programmer1);
   ?>
    <h2>Завдання 10</h2>
    <div>
        <?php
        echo "Методи прибирання в класі студента:<br>";
        echo "<b>";
        $student1->CleaningKitchen();
        echo "<br>";
        $student1->CleaningRoom();
        echo "</b>";
        echo "<br>";
        echo "Методи прибирання в класі програміста:<br>";
        echo "<b>";
        $programmer1->CleaningKitchen();
        echo "<br>";
        $programmer1->CleaningRoom();
        echo "</b>";
        ?>
    </div>

</body>

</html>