<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kapitel 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    //echo "<p>Idag e det \"" . date('l') . "\".</p>";

    $idag = date('l');
    //echo "<p>Idag e det \"" . $idag . "\".</p>";

    echo "<p>Idag e det \"$idag\".</p>";

    echo '<p>Idag e det \"$idag\".</p>';

    $dagensDatum = date('d');
    $månad = date('F');
    echo $dagensDatum;

    echo "<p>Idag är det \"$idag $dagensDatum $månad\"</p>";

    echo "<p>$_SERVER[SERVER_ADDR]</p>";
    ?>
</body>
</html>