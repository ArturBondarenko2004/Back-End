<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Завантаження зображень</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Виберіть файл:</label>
        <input type="file" id="file" name="file" required><br><br>
        <input type="submit" value="Завантажити">
    </form>
</body>
</html>

<?php

