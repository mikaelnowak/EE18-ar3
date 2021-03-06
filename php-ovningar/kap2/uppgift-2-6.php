<?php
/*

Skriv ett skript som tar en siffra (från formuläret i uppgift 1.4) som innehåller dagens temperatur i Celsius. Pro&deg ska sedan skriva ut hur många&deg Fahrenheit det motsvarar enligt följande mall: "100 grader Celsius motsvarar 212 grader Fahrenheit". Formeln för omvandlingen är F = (9/5)*C + 32 där F står för grader Fahrenheit och C för grader Celsius.

* PHP version 7
* @category   Lånekalkylator
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fahrenheit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        $grader = $_POST['grader'];
        $omvandla = $_POST['select'];

        if ($omvandla == "C") {
            $cTillF = $grader * 9 / 5 + 32;
            echo "<p>$grader&dgr;C är $cTillF&dgr;F</p>";
        } else if ($omvandla == "F"){
            $fTillC = $grader / 9 * 5 - 32;
            echo "<p>$grader&dgr;F är $fTillC&dgr;C</p>";
        } else {
            $cTillK = $grader -273;
            echo "<p>$grader&dgr;C är $cTillK&dgr;K</p>";
        }
        ?>
    </div>
</body>
</html>