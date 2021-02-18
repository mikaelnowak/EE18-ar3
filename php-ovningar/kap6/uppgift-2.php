<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="#" method="POST">
        <label for="namn">namn</label>
        <input name="namn" type="text" placeholder="T.ex filen">
        <label for="adress">adress</label>
        <input name="adress" type="text" placeholder="T.ex filen">
        <label for="postnr">postnr</label>
        <input name="postnr" type="text" placeholder="T.ex filen">
        <label for="postort">postort</label>
        <input name="postort" type="text" placeholder="T.ex filen">
        <label for="email">email</label>
        <input name="email" type="text" placeholder="T.ex filen">
        <button type="submit" class="btn btn-primary">Skicka</button>
    </form>
    <?php

    $namn = filter_input(INPUT_POST, "namn", FILTER_SANITIZE_STRING);
    $adress = filter_input(INPUT_POST, "adress", FILTER_SANITIZE_STRING);
    $postnr = filter_input(INPUT_POST, "postnr", FILTER_SANITIZE_NUMBER_INT);
    $postort = filter_input(INPUT_POST, "postort", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);

    if ($namn && $adress && $postnr && $postort && $email) {
        if (strlen($namn) < 3) {
            echo "<p>Namn ska vara minst 3 tecken lång</p>";
        }
        if (strlen($adress) < 3) {
            echo "<p>Adress ska vara minst 3 tecken lång</p>";
        }
        if (strlen($postnr) < 5) {
            echo "<p>Postnr ska vara minst 5 tecken lång</p>";
        }
        if (strlen($postort) < 3) {
            echo "<p>Postort ska vara minst 3 tecken lång</p>";
        }
        if (strlen($email) < 6) {
            echo "<p>email ska vara minst 6 tecken lång</p>";
        }

        if (!is_numeric($postnr)) {
           echo "<p>Postnr ska vara siffror</p>";
        }
        if (strpos($email, "@") == FALSE) {
            echo "<p>Eposten ska ha en @ tecken</p>";
        }
    }
    ?>
</body>
</html>