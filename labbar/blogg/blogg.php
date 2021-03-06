<?php
/*
En enkel blogg där inlägg lagras i en textfil.
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
    <title>Min enkla blogg</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/minty/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Bloggen</h1>
            <nav class="navbar navbar-expand-lg navbar-light nav nav-pills">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link" href="blogg.php">Alla inlägg</a></li>
                    <li class="nav-item"><a class="active nav-link" href="spara.php">Skriva inlägg</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <?php
            $filnamn = "blogg.txt";

            // Öppna asnslutningen till textfilen
            $innehall = file($filnamn);

            $innehall = array_reverse($innehall);

            // Läs rad för rad i textfilen
            foreach ($innehall as $rad) {
                echo $rad;
            }

            // Stäng anslutningen till textfilen
            fclose($filnamn);
            ?>

        </main>
        <footer>
            2020
        </footer>
    </div>
</body>
</html>