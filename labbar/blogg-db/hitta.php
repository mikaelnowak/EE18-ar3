
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
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="kontainer">
    <h1>Lista</h1>
    <nav>
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link" href="./lista.php">Läsa</a></li>
            <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriva</a></li>
            <li class="nav-item"><a class="nav-link active" href="./hitta.php">Sök</a></li>
            <li class="nav-item"><a class="nav-link" href="./admin.php">Admin</a></li>
        </ul>
    </nav>
    <form action="#" method="POST">
        <label>Sörterm<input type="text" name="sokterm"></label>
        <button>Sök</button>
    </form>
    <?php
    $sokterm = filter_input(INPUT_POST, 'sokterm', FILTER_SANITIZE_STRING);

    // Finns data?
    if ($sokterm) {
        $sql = "SELECT * FROM blogg WHERE content LIKE \"%$sokterm%\"";
        $result = $conn->query($sql);

        if (!result) {
            echo "Hittar inte ett inlägg med \"$sokterm\" i sig.";
        } else {
            while ($rad = $result->fetch_assoc()) {
                echo "<div>
                        <h5><strong>$rad[title]</strong></h5>
                        <p>$rad[postdate]</p>
                        <p>$rad[content]</p>
                    </div>";
            }
        }
    } else {
        echo "<p>Mata in nåt innehåll du vill hitta</p>";
    }

    $conn->close();
    ?>
</div>
</body>
</html>

