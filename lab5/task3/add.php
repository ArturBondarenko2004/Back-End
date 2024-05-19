<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $position = $_POST['position'];
    $salary = $_POST['salary'];
    
    $sql = 'INSERT INTO employees (name, position, salary) VALUES (?, ?, ?)';
    $stml = $pdo->prepare($sql);
    $stml->execute([$name, $position, $salary]);
    header("Location: index.php");
}