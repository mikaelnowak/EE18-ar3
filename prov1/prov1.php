<?php
/*
 * Skapa en PHP-webbapplikation som räknar ut din lön efter skatt.
 * Du skall kunna mata in namn, bruttolönen och skattesatsen (tex 30 för 30%).
 * Beräkning: lön efter skatt heter nettolön = bruttolön * (100 - skattesatsen) / 100.
 *
 * PHP version 7
 * @category   Skatteberäkning
 * @author     ...
 * @license    PHP CC
 */
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skatteberäkning</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Lön efter skatt</h1>
        <!-- Sidans formulär -->
        <form action="#" method="POST">
        <label for="namn">Namn</label>
        <input type="text" id="name" name="namn">
        <label for="brutto">Bruttolön</label>
        <input type="text" id="brutto" name="brutto">
        <label for="skatt">Sakttesats</label>
        <input type="text" id="skatt" name="skatt">
        <button type="submit">Skicka</button>
        </form>

    <?php
    // Om inget är angent
    if (isset($_POST['namn'], $_POST['brutto'], $_POST['skatt'])) {

        //Kalla in information från forlumäret
        $namn = $_POST['namn'];
        $brutto = $_POST['brutto'];
        $skatt = $_POST['skatt'];

        //Se till att allt stämmer för uträkning av netolön
        if ($namn != "" and $brutto < 45000 and $brutto > 10000 and $skatt < 45 and $skatt > 10) {
            //När allt e angent korekt
            $netto = $brutto * (100 - $skatt) / 100;
            echo "
                 <h1>Lönebesked</h1>
                 <p>$namn:s lön är $netto kr efter skatt.</p>
                 <p>Beräkning baserat på bruttolön $brutto kr och skattesatsen $skatt%</p>
                 ";
        } else if ($namn == "") {
            //Om namnet inte stämmer
            echo "<p class=\"varning\">Detta namn gills inte. Skriv in ditt namn</p>";
        } else if ($brutto < 10000 or $brutto > 45000) {
            //Om bruttolönet inte stämmer
            echo "<p class=\"varning\">Du måste ange ett bruttolön mellan 10 000 - 45 000 kr.</p>";
        } else if ($skatt < 10 or $skatt > 45) {
            //Om skattesatsen inte stämmer
            echo "<p class=\"varning\">Skattensatsen måste vara mellan 10 - 45 %</p>";
        } else {
            //Eventuelt andra errors
            echo "<p class=\"varning\">Något är fel med sidan</p>";
        }
        
    }
    ?>
    </div>
</body>
</html>