<?
session_start();
if (isset($_GET['action']) && $_GET['action'] === 'return') {
    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $gender = $_SESSION['gender'] ?? '';
    $city = $_SESSION['city'];
    $games = $_SESSION['games'];
    $about = $_SESSION['about'];
} else {

    $login = '';
    $password = '';
    $gender = '';
    $city = '';
    $games = [];
    $about = '';
}
require_once('translations.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<?
$lang = 'ukr';
if (isset($_GET['lang'])) {
    $lang = $_GET['lang'];
    setcookie('lang', $lang, time() + 60 * 60 * 24 * 180);
}
if (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
}



?>

<body>
    <h1><?= $translations[$lang]['title'] ?></h1>
    <div class="localisation">
        <a href="form.php?lang=ukr">
            <img class="img-icon" src="/img/icon-ukraine.png" alt="">
        </a>
        <a href="form.php?lang=deu">
            <img class="img-icon" src="/img/icon-germany.png" alt="">
        </a>
        <a href="form.php?lang=jpn">
            <img class="img-icon" src="/img/icon-japan.png" alt="">
        </a>
        <a href="form.php?lang=eng">
            <img class="img-icon" src="/img/icon-united-states-of-america.png" alt="">
        </a>
    </div>
    <form action="form-result.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="login"><?= $translations[$lang]['login'] ?>:</label></td>
                <td> <input type="text" id="login" name="login" value="<?= $login ?? '' ?>" required> </td>
            </tr>
            <tr>
                <td><label for="password"><?= $translations[$lang]['password'] ?>:</label></td>
                <td><input type="password" id="password" name="password" value="<?= $password ?? '' ?>" required></td>
            </tr>
            <tr>
                <td><label for="password_confirm"><?= $translations[$lang]['password'] ?>:</label></td>
                <td><input type="password" id="password_confirm" name="password_confirm" value="<?= $password ?? '' ?>" required></td>
            </tr>
            <tr>
                <td><label for="gender"><?= $translations[$lang]['gender'] ?>:</label></td>
                <td><input type="radio" id="gender-male" name="gender" value="Чоловік" <?php if ($gender === 'Чоловік') echo 'checked'; ?>>
                    <label for="gender-male">Чоловік</label>

                    <input type="radio" id="gender-female" name="gender" value="Жінка" <?php if ($gender === 'Жінка') echo 'checked'; ?>>
                    <label for="Жінка">Жінка</label>
                </td>
            </tr>
            <tr>
                <td> <label for="city"><?= $translations[$lang]['city'] ?>:</label></td>
                <td>
                    <select id="city" name="city">
                        <option value="Житомир" <?php if ($city === 'Житомир') echo 'selected'; ?>>Житомир</option>
                        <option value="Харків" <?php if ($city === 'Харків') echo 'selected'; ?>>Харків</option>
                        <option value="Івано-Франківськ" <?php if ($city === 'Івано-Франківськ') echo 'selected'; ?>>Івано-Франківськ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for=""><?= $translations[$lang]['games'] ?>:</label>
                </td>
                <td>
                    <input type="checkbox" id="game1" name="games[]" value="Футбол">
                    <label for="game1">Футбол</label><br>
                    <input type="checkbox" id="game2" name="games[]" value="Баскетбол">
                    <label for="game2">Баскетбол</label><br>
                    <input type="checkbox" id="game3" name="games[]" value="Волейбол">
                    <label for="game3">Волейбол</label><br>
                    <input type="checkbox" id="game4" name="games[]" value="Шахи">
                    <label for="game4">Шахи</label><br>
                </td>
            </tr>
            <tr>
                <td><label for="about"><?= $translations[$lang]['about'] ?>:</label></td>
                <td><textarea id="about" name="about" rows="4" cols="50"><?php echo $about; ?></textarea></td>
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
                <td> <label for="photo"><?= $translations[$lang]['photo'] ?>:</label></td>
                <td> <input type="file" id="photo" name="photo" accept="image/*"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="<?php echo htmlspecialchars($translations[$lang]['register']); ?>"> </td>
            </tr>

        </table>
    </form>
</body>

</html>