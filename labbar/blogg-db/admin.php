<?php
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
            <li class="nav-item"><a class="nav-link" href="./hitta.php">Sök</a></li>
            <li class="nav-item"><a class="nav-link active" href="./admin.php">Admin</a></li>
        </ul>
    </nav>
    <?php
    $sql = "SELECT * FROM blogg";
    $result = $conn->query($sql);
    echo "<table>
            <tr>
                <th>Datum</th>
                <th>Title</th>
                <th>Content</th>
                <th colspan=\"2\">Action</th>
            </tr>";
            while ($rad = $result->fetch_assoc()) {
                // Korta ned texten
                $snippet = mb_substr($rad['content'], 0, 30) . "...";
                
                // Skriv ut en tabellrad
                echo "<tr>
                <td>$rad[postdate]</td>
                <td>$rad[title]</td>
                <td>$snippet</td>
                <td><a class=\"alert alert-warning\" href=\"redigera.php?id=$rad[id]\"><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a></td>
                <td><a class=\"alert alert-danger\" href=\"radera.php?id=$rad[id]\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a></td>
                </tr>";
            }

    echo "</table>";
    ?>
</div>
</body>
</html>

