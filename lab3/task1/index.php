<?php
if (isset($_GET['fonnt_size'])) {
    switch ($_GET['fonnt_size']) {
        case 'large':
            $fontSize = '30px';
            break;
        case 'medium':
            $fontSize = '20px';
            break;
        case 'small':
        default:
            $fontSize = '10px';
            break;
    }
    
    setcookie('fontSize', $fontSize, time() + (60*60*24 * 180), '/'); 
} else {
    $fontSize = isset($_COOKIE['fontSize']) ? $_COOKIE['fontSize'] : '14px';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Зміна розміру шрифту</title>
</head>
<body style="font-size: <?php echo $fontSize; ?>">
    <h1>Завдання 1</h1>
    <div>
        <a href="?fonnt_size=large">Великий шрифт</a> |
        <a href="?fonnt_size=medium">Середній шрифт</a> |
        <a href="?fonnt_size=small">Маленький шрифт</a>
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque consequuntur cumque eos adipisci similique fuga iste praesentium pariatur, quae, facilis neque rerum sapiente debitis iusto mollitia saepe placeat nisiFacilis autem quidem praesentium! Sapiente rerum praesentium totam ratione. Suscipit officiis maxime quia aperiam quos doloribus iste quibusdam aut voluptates quod fugiat voluptatem accusamus quae voluptas, ut reiciendis, molestiae nostrum!
    Debitis, quod quaerat distinctio, sequi ab minus voluptate numquam molestiae, veniam cumque aspernatur tempore reiciendis in harum odio minima? Dignissimos repellat nobis nostrum sapiente delectus nulla officia architecto debitis ipsa?
    Nobis molestiae a provident fuga vel. Excepturi ducimus labore eius aut reiciendis quos placeat iure non. Eius magni maxime vitae itaque, necessitatibus ea! Aliquam vitae, ratione laudantium magni veritatis sed?
    Aut reprehenderit laudantium, dolorum dolor necessitatibus neque incidunt molestias est sed consequatur, vero tempora fugit! Ullam eum accusantium sit ea neque modi rem repudiandae mollitia, impedit nam eaque aspernatur consequatur?
    Ut, optio, dolores culpa quasi asperiores totam eius reiciendis excepturi ab veniam temporibus dolore cumque voluptatum possimus illum expedita, cupiditate dolor architecto sunt quibusdam! Eum, vero voluptate. Architecto, commodi amet?
    Iste cumque aliquid dignissimos cupiditate veritatis porro excepturi facilis eum labore totam at exercitationem temporibus recusandae aut voluptatem optio dolor modi debitis nisi saepe, sit non! Veritatis quis odit sequi?
    Ab corrupti dolorum quos laboriosam est consequuntur maxime deserunt necessitatibus ad. Commodi, eum, ad voluptates non voluptatibus ea vitae illo, vel a maiores aliquid accusantium culpa alias ipsam? Ipsa, nesciunt!
    Ab quam minima mollitia fuga, corporis molestiae vero at? Aliquid, repellat ratione. Consequatur voluptates nemo expedita eum nihil. Architecto asperiores soluta modi, ullam ab laborum ducimus dolore excepturi dolor ratione!</p>
</body>
</html>