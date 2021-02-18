<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $namn = $_POST['anamn'];
    $mail = $_POST['mail'];
    $nummer = $_POST['nummer'];
    $val = "";

    if ($_POST['kontakt'] == "telefon") {
        $val = $nummer;
    } else {
        $val = $mail;
    }

    echo "<p>Namn: $namn epostadress: $mail Vi kommer att kontakta dig inom snarast per $val</p>"
    ?>
</body>
</html>