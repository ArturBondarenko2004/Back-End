<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Форма реєстрації</h1>
    <table>
        <form action="index.php" method="post">
            <tr>
                <td><label for="name">Ім'я:</label></td>
                <td><input type="text" id="name" name="name" required><br></td>
            </tr>
            <tr>
                <td><label for="comment">Коментар:</label></td>
                <td><textarea id="comment" name="comment" rows="5" cols="50" required></textarea><br></td>
            </tr>
            <input type="submit" value="Відправити">
        </form>
    </table>
    <h2>Збережені коментарі у файл</h2>

    <?php
    if (isset($_POST['name']) && isset($_POST['comment'])) {
        $name = trim($_POST['name']);
        $comment = trim($_POST['comment']);

        $file = fopen('comments.txt', 'a');
        if ($file) {
            $timestamp = time();
            $formattedComment = "$timestamp - $name: $comment\n";
            fwrite($file, $formattedComment);
            fclose($file);
        } else {
            echo "<p class='error'>Помилка запису</p>";
        }
    }
    $comments = file('comments.txt', FILE_IGNORE_NEW_LINES);
    if (!empty($comments)) {
        echo "<ul>";
        foreach ($comments as $comment) {
            echo "<li>" . htmlspecialchars($comment) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Поки що немає коментарів.</p>";
    }
    ?>
</body>

</html>