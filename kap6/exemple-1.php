<?php
/*
* PHP version 7
* @category   
* @author     Mikael Nowak <mikael.nowak@elev.ga.ntig.se>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stränghantering</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="container">
        <?php
        $email = " hej@abc.åäö";
        $emailTrim = trim($email);
        echo "<p>-$email-$emailTrim-</p>";

        $svar = "Usa";
        $svarGemena = strtolower($svar);
        $svarVersaler = strtoupper($svar);
        $svenska = mb_strtoupper("asdåasdäasdö");
        echo "<p>$svenska</p>";

        $stycke = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $antal = strlen($stycke);
        echo "<p>Antal tecken = $antal</p>";

        /* $epost = "mikaelnowak10@gmail.com";
        $för = substr($epost, 0, 6);
        echo "<p>$för</p>";
        $efter = substr($epost, 6, 5);
        echo "<p>$efter</p>";

        $domän = substr($epost, -9);
        echo "<p>$domän</p>";
        
        $domän = strstr($epost, "@");
        echo "<p>$domän</p>";

        $epost = "mikaelnowak10@gmail.com";
        $position = strpos($epost, "@");
        echo "<p>$position</p>";
        
        $epost = "mikaelnowak10@gmail.com";
        if (strpos($epost, "gmail") !== FALSE) {
            echo "<p>gmail finns</p>";
        } else {
            echo "<p>gmail finns inte</p>";
        }

        $texten = "asdaf rv vds f sfw ge h sdfs as";
        $nyText = str_replace("rv", "hej", $texten);
        echo "<p>$nyText</p>";
         */

        ?>
    </div>
</body>
</html>