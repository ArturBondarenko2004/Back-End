<?php
// Перевірити, чи завантажено файл
if (isset($_FILES['file']['error']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    // Отримати інформацію про файл
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];

    // Перевірити тип файлу
    $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');
    if (!in_array($fileType, $allowedTypes)) {
        echo "Неправильний тип файлу. Дозволені лише JPEG, PNG та GIF.";
        exit;
    }

    // Створити унікальне ім'я файлу
    $newFileName = uniqid() . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

    // Перемістити тимчасовий файл до постійного каталогу
    $uploadDir = 'uploads/'; // Змініть цей шлях на потрібний вам
    if (!move_uploaded_file($fileTmpName, $uploadDir . $newFileName)) {
        echo "Помилка завантаження файлу.";
        exit;
    }

    // Відобразити повідомлення про успішне завантаження
    echo "Файл завантажено успішно: " . $newFileName;
} else {
    echo "Помилка завантаження файлу.";
}

?>