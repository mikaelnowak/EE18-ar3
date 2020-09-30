<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Slumpa fram sex ordspråk</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="/kap4/ordsprak.css">
</head>
<body>
<?php
    // Skapa en array med tio ordspråk
    $ordsprak = ['Alla vägar bär till Rom.', 'Stor i orden men liten på jorden.', 'Blyga pojkar får aldrig kyssa vackra flickor.', 'Den ko som brukar bröla får nog mest ändå.', 'Nära skjuter ingen hare.', 'Gråt inte över spilld mjölk.', 'Lyckan kan inte köpas för pengar.', 'Öst är öst, och väst är väst, och aldrig mötas de båda.', 'I nöden prövas vännen.', 'En svala gör ingen sommar.'];

    // Slumpa fram ett tal mellan 0 och 9 med funktionen rand()

    // Skriv ut ordspråket 

/*     $i = 0;
    $nummer = 9;
*/
    $tagna = [];

    echo "<ol>";
    /*
    for ($i; $i < 6; $i++) {
        $nummer--;
        $index = rand(0, $nummer);
        if (!in_array($index, $ordsprak)) {
            echo "<li>$ordsprak[$index]</li>";
            unset($ordsprak[$index]);
            sort($ordsprak);
        } else {
            $nummer++;
            $i--;
        }
    } */
    for ($i=0; $i < 6; $i++) { 
        $index = rand(0, 9);
        if (!in_array($index, $tagna)) {
            echo "<li>$ordsprak[$index]</li>";
            $tagna = $index;
        } else {
            $i--;
        }
    }
    echo "</ol>";
?>
</body>
</html>