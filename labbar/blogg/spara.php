<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>inlägg</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/minty/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <form action="#" method="POST">
            <textarea class="form-control" name="inlagg" id="inlagg" cols="30" rows="10"></textarea>
            <button class="btn btn-primary">Spara inlägg</button>
        </form>
    </main>
    <?php
    /* Ta emot text från formuläret och spara ned i en textfil. */
    if (isset($_POST['inlagg'])) {
        $filnamn = "blogg.txt";
        $texten = $_POST["inlagg"];

        $textenBr = str_replace("\n", "<br>", $texten);

        $tidpunkt = date('l j F Y h:i:s');

        // Öppna asnslutningen till textfilen
        $handtag = fopen($filnamn, "a");

        // Skriv text i textfilen
        fwrite($handtag, "<p>$tidpunkt<br>$textenBr</p>\n");

        // Stäng anslutningen till textfilen
        fclose($handtag);

        echo "<p>Inlägget registrerat!</p>";
    } else {
        // Skriv felmeddelande
        echo "<p>inlägg sparades inte</p>";
        
    }
    ?>
</body>
</html>