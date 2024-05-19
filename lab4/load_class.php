<?php
// require_once 'autoload.php';

// $userController = new UserController();
// $userMessage = $userController->UserController();
// echo $userMessage . "<br>";

// $userModel = new UserModels();
// $userModel->displayMessage();
// echo "<br>";

// // $userView = new UserViews();
// $userView = new UserViews();
// $userView->displayUserData();

require_once 'autoload.php';

$userController = new \Controllers\UserController();
$userMessage = $userController->UserController();
echo $userMessage . "<br>";

$userModel = new \Models\UserModels();
$userModel->displayMessage();
echo "<br>";

$userView = new \Views\UserViews();
$userView->displayUserData();
