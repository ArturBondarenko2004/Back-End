<?php
if (isset($_POST['delete'])) {
    $id = $_POST["id"];
    $sql = "DELETE FROM employees WHERE id=?";
    $stml = $pdo->prepare($sql);
    $stml->execute([$id]);
    header("Location: index.php");
}