<?php
session_start();
$y = str_replace(",", ".", $_GET["y"]);
$r = str_replace(",", ".", $_GET["r"]);
$x = $_GET["x"];
$pass = "false";
$currentTime = date("H:i:s", strtotime('now'));
$valid = true;
$start = microtime(true);
$check_if_digit_y = str_replace("-", "", str_replace(".", "", $y));
$check_if_digit_r = str_replace("-", "", str_replace(".", "", $r));

$dig_r = true;
$dig_y = true;
for ($i = 0; $i < strlen($check_if_digit_y); $i++) {
    if (!("0" <= $check_if_digit_y[$i] && $check_if_digit_y[$i] <= "9")) {
        $dig_y = false;
    }
}
for ($i = 0; $i < strlen($check_if_digit_r); $i++) {
	if (!("0" <= $check_if_digit_r[$i] && $check_if_digit_r[$i] <= "9")) {
		$dig_y = false;
	}
}
if ($y <= -3 || $y >= 5 || $y == "(-3...5)" || $y == "" || $y == null || !is_numeric($y) || !$dig_y) {
    echo "<font color=#CF000F>Y задан некорректно или находится вне заданного<br>интервала (-3...5) или содержит некорректные символы<br></font>";
    $y = "nan";
    $pass = "false";
    $valid = false;
} else if ($r <= 1 || $r >= 4 || $r == "(1...4)" || $r == "" || $r == null || !is_numeric($r) || !$dig_r) {
    echo "<font color=#CF000F>R задан некорректно или находится вне заданного<br> интервала (1...4) или содержит некорректные символы<br></font>";
    $r = "nan";
    $pass = "false";
    $valid = false;
} else {
    echo "X=" . $x . "<br>Y=" . $y . "<br>R=" . $r . "<br>";
    if ((($x <= 0 && $y <= 0 && $y >= -$r && $x >= -$r / 2) ||
            ($x >= 0 && $y >= 0 && ($x + $y - $r) <= 0) ||
            ($x >= 0 && $y <= 0 && (($x * $x + $y * $y) <= ($r) * ($r)))) && (is_numeric($y)) && (is_numeric($r))) {
        echo "<font color=#87D37C><b>Точка лежит в заданной области</b></font>";
        $pass = "true";
    } else {
        echo "<font color=#CF000F>Точка не лежит в заданной области</font>";
        $pass = "false";
    }
}

echo "<br>Текущее время: " . $currentTime;


$ar = array(
    "x" => $x,
    "y" => $y,
    "r" => $r,
    "pass" => $pass,
    "time" => $currentTime,
    "exec" => (100 * (microtime(true) - $start))

);
if ($valid) {
    $_SESSION["i"] = $_SESSION["i"] + 1;
    $_SESSION["listResult"][$_SESSION["i"]] = $ar;
}
?>
