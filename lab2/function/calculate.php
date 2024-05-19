<?php

require_once('func.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $x = $_POST['x'];
  $y = $_POST['y'];

?>
<link rel="stylesheet" href="style.css">
<table>
  <tr>
    <td>x^y</td>
    <td>Факторіал(x)</td>
    <td>my_tg(x)</td>
    <td>sin(x)</td>
    <td>cos(x)</td>
    <td>tg(x)</td>
  </tr>
  <tr>
    <td><?=my_xy($x, $y); ?></td>
    <td><?=my_factorial($x); ?></td>
    <td><?=my_tg($x); ?></td>
    <td><?=my_sin($x); ?></td>
    <td><?=my_cos($x); ?></td>
    <td><?=my_tg($x); ?></td>
  </tr>
</table>

<?php

}

