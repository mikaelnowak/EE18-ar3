<?php
/*
* PHP version 7
* @category   Lånekalkylator
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/

/*
På det nationella provet i Matematik 1 våren 2018 så fanns följande poänggränser för olika provbetyg. Skapa ett skript som frågar användaren hur många poäng hen fick på detta prov. Skriptet ska säga vilket provbetyg användaren fick.
*/



?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Nationella prov i matte 1</h1>
        <form action="#" method="POST">
            <label for="poäng">Ange poänd</label>
            <input id="poäng" type="text" class="form-control" name="poäng" require>
            <button type="submit" class="btn btn-primary">Visa betyg</button>
        </form>

        <?php
        if (isset($_POST['poäng'])) {

            $poäng = $_POST['poäng'];

            if ($poäng < 15) {
                echo "<p>F</p>";
            } else if ($poäng >= 15 && $poäng < 25) {
                echo "<p>E</p>";
            } else if ($poäng >= 25 && $poäng < 35) {
                echo "<p>D</p>";
            } else if ($poäng >= 35 && $poäng < 45) {
                echo "<p>C</p>";
            } else if ($poäng >= 45 && $poäng < 55) {
                echo "<p>B</p>";
            } else if ($poäng >= 55) {
                echo "<p>A</p>";
            }
        }
        
        ?>
    </div>
</body>
</html>