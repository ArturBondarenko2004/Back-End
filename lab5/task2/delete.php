<?php
require_once "../db.php";
$id = $_POST["id"];
$sql = "SELECT * from products where id = ?";
$stml = $pdo->prepare($sql);
$stml->execute([$id]);
$products = $stml->fetchAll();
if(!empty($products[0]))
{
    $sql = "DELETE from products where id = ?";
    $stml = $pdo->prepare($sql);
    $stml->execute([$id]);
}
header("Location: index.php");
