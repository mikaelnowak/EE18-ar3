<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $user = "gunnar";
    $db = "gunnar";
    $host = "localhost";
    $pass = "nnWFMiNx8yveWhU5";

    // använda databas
    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Kunde inte komma in: " . $conn->connect_error);    
    }

    $sql = "SELECT * FROM bilar";
    $result = $conn->query($sql);

    if (!$result) {
        die("FEL");
    }

    /* while ($rad = $result->fetch_assoc()) {
        echo "<p>$rad[marke]</p>";
    } */
    echo "  <table>
            <th>Regestrering</th>
            <th>Märke</th>
            <th>Modell</th>
            <th>Årsmodell</th>
            <th>Pris</th>
            <th>Ägare</th>";

    while ($rad = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>$rad[reg]</td>";
        echo "<td>$rad[marke]</td>";
        echo "<td>$rad[modell]</td>";
        echo "<td>$rad[arsmodell]</td>";
        echo "<td>$rad[pris]</td>";
        echo "<td>$rad[agare]</td>";
        echo "</tr>";
    }

    echo "  </table>";

    $conn->close();

    ?>
</body>
</html>
