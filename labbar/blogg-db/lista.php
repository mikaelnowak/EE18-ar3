
<?php
/*
enkel blogg med databas
* PHP version 7
* @category   Webb med databas
* @author     Mikael Nowak <mikael.nowak@elev.ga.ntig.se>
* @license    PHP CC
*/
//Hämta kod från en annan fil
include "./resurser/conn.php";
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogg</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1>Lista</h1>
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" href="./lista.php">Läsa</a></li>
            <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
            <li class="nav-item"><a class="nav-link" href="./hitta.php">Sök</a></li>
            <li class="nav-item"><a class="nav-link" href="./admin.php">Admin</a></li>
        </ul>
    </nav>
    <?php
    // 2. Ställ en SQL-fråga
    $sql = "SELECT * FROM blogg";
    $result = $conn->query($sql);

    // Gick det bra?
    if (!$result) {
        die("Något blev fel med SQL-satsen.");
    }

    // Presentera resultatet
    while ($rad = $result->fetch_assoc()) {
        echo "<div class=\"lista\">
                <h5><strong>$rad[title]</strong></h5>
                <p>$rad[postdate]</p>
                <p>$rad[content]</p>
            </div>";
    }
    ?>
</div>
</body>
</html>

