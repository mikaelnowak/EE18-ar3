<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Interaktiv berättelse</title>
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="berettelse.css">
</head>
<body>
    <div class="kontainer">
        <h1>Interaktiv berättelse</h1>
        <?php
        // Finns data?
        $chatt = "";

        if (isset($_POST["svar"], $_POST["chatt"])) {

            // Ta emot data från formuläret
            $svar = $_POST["svar"];
            $chatt = $_POST["chat"];

            if ($svar == "ja") {
                $chatt .= "Bot: Är du tagad? \n";
            } elseif ($svar == "nej") {
                $chatt .= "Bot: Är det helg eller är du sjuk? \n";
            }

        } else {
            $chatt = "Bot: Har du skola idag? \n";
        }
        ?>
        <form action="#" method="POST">
            <textarea name="chatt" cols="30" rows="10" readonly> <?php echo $chat ?> </textarea>
            <input id="svar" class="form-control" type="text" name="svar">
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
    </div>
</body>
</html>