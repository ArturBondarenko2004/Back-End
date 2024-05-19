<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form.php');
    echo "Неправильний метод";
    exit;
}
require_once('translations.php');
session_start();

$_SESSION['login'] = $_POST['login'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['gender'] = $_POST['gender'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['games'] = $_POST['games'] ?? '';
$_SESSION['about'] = $_POST['about'];


$games = [
    'Футбол' => 'Футбол',
    'Баскетбол' => 'Баскетбол',
    'Волейбол' => 'Волейбол',
    'Шахи' => 'Шахи'
];

if (isset($_POST['city'])) {
    $city = $_POST['city'];
} else {
    $city = 'Не обрано';
}

if (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
}
?>
<h1>Прийом даних</h1>
<table>
    <tr>
        <td><?= $translations[$lang]['login'] ?></td>
        <td><?= $_POST['login'] ?></td>
    </tr>
    <tr>
        <td><?= $translations[$lang]['password'] ?></td>
        <td><?
            if ($_POST['password'] === $_POST['password_confirm']) {
                echo 'Пароль співпадає';
            } else
                echo 'Пароль не співпадає'
            ?></td>
    </tr>
    <tr>
        <td><?= $translations[$lang]['gender'] ?></td>
        <td><?= $_POST['gender'] ?? 'Не обрано' ?></td>
    </tr>
    <tr>
        <td><?= $translations[$lang]['city'] ?></td>
        <td><?= $city ?>
        </td>
    </tr>
    <?php if (isset($_POST['games']) && !empty($_POST['games'])) : ?>
        <tr>
            <td><?= $translations[$lang]['games'] ?>:</td>
            <td>
                <?php foreach ($_POST['games'] as $game_key) : ?>
                    <?= $games[$game_key] ?><br>
                <?php endforeach; ?>
            </td>
        </tr>
    <?php else : ?>
        <tr>
            <td><?= $translations[$lang]['games'] ?>:</td>
            <td>Не обрано</td>
        </tr>
    <?php endif; ?>
    <tr>
        <td></td>
        <td>
    </tr>
    <tr>
        <td><?= $translations[$lang]['about'] ?></td>
        <td><?= $_POST['about'] ?></td>
    </tr>
    <tr>
                <td>
                    <?= $translations[$lang]['selected_language'] ?>
                </td>
                <td>
                    <?= $translations[$lang]['selected_lang'] ?>
                </td>
            </tr>
    <tr>
        <td><?= $translations[$lang]['photo'] ?>:</td>
        <td>
        <?php
           if (isset($_FILES['photo'])) {
            $tmp_name = $_FILES["photo"]["tmp_name"];
            $file_name = basename($_FILES["photo"]["name"]);
            $destination = "uploads/" . $file_name;
            if (file_exists($destination)) {
                move_uploaded_file($tmp_name, $destination);
                echo "<img src=\"$destination\" alt=\"Фото користувача\">";
            } else {
                if (move_uploaded_file($tmp_name, $destination)) {
                    echo "<img src=\"$destination\" alt=\"Фото користувача\">";
                } else {
                    echo "Помилка завантаження фото.";
                }
            }
        } else {
            echo "Фото не завантажено";
        }
            ?>
        </td>
    </tr>
    <tr>
        <td><a href="form.php?action=return" > <?= $translations[$lang]['register'] ?></a></td>


    </tr>
</table>