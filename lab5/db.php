<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=lab05;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    die("Помилка підключення до бази даних");
}
