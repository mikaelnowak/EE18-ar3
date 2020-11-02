<?php

/**
 * Skriv ett skript som frågar efter två heltal via ett formulär, det första talet ska vara lägre än det andra. Skriv ut alla heltal mellan de två som matats in. Separera med mellanslag. Varna om tal 1 är större än tal 2.
 * 
 * PHP version 7
 * @category   
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
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
    <div class="kontainer">
        <h1>Parsa epost</h1>
        <form action="#" method="POST">
            <label for="epost">Ange epost</label>
            <input id="epost" class="form-control" type="text" name="epost" required>
            <button type="submit" class="btn btn-primary">Skriv ut</button>
        </form>

        <?php
        // Läs in från formuläret och rensa från hot
        $epost = filter_input(INPUT_POST, "epost", FILTER_SANITIZE_STRING);

        // Om vi har data
        if ($epost) {
            
            $delar = explode("@", $epost);
            //var_dump($delar);

            echo "<p>Namn: $delar[0]</p><p>Domän: $delar[1]</p>";

            $namn = substr($epost, 0, 13);
            $domän = substr($epost, -9);

            echo "<p>Namn: $namn</p><p>Domän: $domän</p>";
            
            $varÄr = strpos($epost, "@");
            
            $namnet = substr($epost, 0, $varÄr);
            //var_dump($namnet);
            $domänet = substr($epost, $varÄr + 1);
            //var_dump($domänet);

            echo "<p>Namn: $namnet</p><p>Domän: $domänet</p>";

            $Domän = substr(strstr($epost, "@"), 1);
            $Namn = strstr($epost, "@", true);

            echo "<p>Namn: $Namn</p><p>Domän: $Domän</p>";
            
        }
        ?>
    </div>
</body>
</html>