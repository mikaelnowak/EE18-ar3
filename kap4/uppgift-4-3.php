<?php
/*
* PHP version 7
* @category   Lånekalkylator
* @author     Mikael Nowak <mikael.nowak@elev.ga.ntig.se>
* @license    PHP CC

Skriv en webbapp där användaren matar in ett tal 1-9 och sedan returnerar det svenska namnet för talet (ett, två, tre osv). Om talet är större än 9 så returnerar du i stället talet som vanligt (tex. 11). 


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
        <h1>Array med namn</h1>
        <form action="#" method="POST">
            <label for="tal">Ange ett tal</label>
            <input id="tal" type="text" class="form-control" name="tal">
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>

        <?php
        if (isset($_POST['tal'])) {

            $tal = $_POST['tal'];

            $svar = ['noll', 'ett', 'två', 'tre', 'fyra', 'fem', 'sex', 'sju', 'åta', 'nio'];

            if ($tal > 9) {
                echo "<p>$tal</p>";
            } else {
                echo "<p>$svar[$tal]</p>";
            }
        }
        ?>
    </div>
</body>
</html>