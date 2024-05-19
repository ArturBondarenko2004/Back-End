<?php
// Функція для перевірки коректності введених даних
function authenticate($username, $password) {
    // Перевіряємо, чи введені дані є правильними
    if ($username === 'Admin' && $password === 'password') {
        return true;
    } else {
        return false;
    }
}

// Перевіряємо, чи була відправлена форма авторизації
if (isset($_POST['login']) && isset($_POST['password'])) {
    $username = $_POST['login'];
    $password = $_POST['password'];
    
    // Перевіряємо введені дані на правильність
    if (authenticate($username, $password)) {
        // Якщо авторизація пройшла успішно, зберігаємо ім'я користувача в сесії
        session_start();
        $_SESSION['username'] = $username;
    } else {
        // Якщо введені дані не правильні, виводимо повідомлення про помилку
        $errorMessage = "Неправильний логін або пароль!";
    }
}

// Перевіряємо, чи користувач вже авторизований
if (isset($_SESSION['username'])) {
    // Якщо користувач вже авторизований, виводимо привітання
    $welcomeMessage = "Добрий день, ".$_SESSION['username']."!";
    // Додаємо кнопку "Вийти"
    $logoutButton = '<form action="logout.php" method="post">
                        <input type="submit" value="Вийти">
                    </form>';
} else {
    // Якщо користувач не авторизований, виводимо форму авторизації
    $loginForm = '<form method="post">
                    <label for="login">Логін:</label>
                    <input type="text" id="login" name="login" required><br>
                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password" required><br>
                    <input type="submit" value="Увійти">
                  </form>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма реєстрації</title>
</head>
<body>
    <h1>Форма реєстрації</h1>
    <?php 
    // Виводимо привітання, якщо користувач вже авторизований
    if (isset($welcomeMessage)) {
        echo "<p>$welcomeMessage</p>";
    } 
    // Виводимо повідомлення про помилку, якщо воно є
    if (isset($errorMessage)) {
        echo "<p style='color: red;'>$errorMessage</p>";
    }
    // Виводимо форму авторизації або кнопку "Вийти", залежно від статусу користувача
    if (isset($loginForm)) {
        echo $loginForm;
    }
    if (isset($logoutButton)) {
        echo $logoutButton;
    }
    ?>
</body>
</html>