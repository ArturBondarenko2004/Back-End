<?php
session_start();
require_once "../db.php";
if(isset($_SESSION['user']))
{
    $login = $_SESSION['user']['login'];
    $password = $_SESSION['user']['password'];
    $sql = "DELETE from users where login = ? and password = ?";
    $stml = $pdo->prepare($sql);
    $stml->execute([$login, $password]);
    unset($_SESSION['user']);
    header("Location: index.php");
}
