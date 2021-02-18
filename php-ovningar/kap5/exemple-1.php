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
    <title>Läsa och skriva textfiler</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <div class="kontainer">
        <?php
        $handtag = fopen("style.css", "r");

        $text = fread($handtag, 10);
        echo "<p>$text</p>";

        fclose($handtag);

        $handtag = fopen("mandag.txt", "w");

        fwrite($handtag, "asda sdas d ad asd sadasdsadasd asd as d ad\n");
        fwrite($handtag, "a\n");

        fclose($handtag);

        $rader = file("mandag.txt");
        //print_r($rader);

        foreach ($rader as $rad) {
            echo "<p>$rad</p>";
        }

        $allText = file_get_contents("mandag.txt");
        echo "<p>$allText</p>";

        $hemsida = file_get_contents("https://vecka.nu/");
        echo "<p>$hemsida</p>";

        $handtag = fopen("vecka-nu.html", "w");
        fwrite($handtag, $hemsida);
        fclose($handtag);
        
        ?>
    </div>
</body>
</html>