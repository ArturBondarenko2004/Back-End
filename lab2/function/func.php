<?
function my_xy($x, $y) {
  return pow($x, $y);
}

function my_factorial($x) {
  if ($x == 0) {
    return 1;
  } else {
    return $x * my_factorial($x - 1);
  }
}

function my_tg($x) {
  return tan($x);
}

function my_sin($x) {
  return sin($x);
}

function my_cos($x) {
  return cos($x);
}