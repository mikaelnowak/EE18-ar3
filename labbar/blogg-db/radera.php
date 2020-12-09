<?php 
    include "./resurser/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php
    // Ta emot text från formuläret och spara ned i en textfil.
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $radera = filter_input(INPUT_POST, 'radera', FILTER_SANITIZE_STRING);

    if ($id && !$radera) {
        
        // 2. Ställ en SQL-fråga
        $sql = "SELECT * FROM blogg WHERE id = '$id'";
        $result = $conn->query($sql);
        
        // Gick det bra?
        if (!$result) {
            die("Något blev fel med SQL-satsen." . $conn->connect_error);
        } else {
            $rad = $result->fetch_assoc();
            echo "<form action=\"#\" method=\"POST\">";
            echo "<div class=\"inlagg\">";
            echo "<h4>Inlägg $id</h4>";
            echo "<h5>$rad[title]</h5>";
            echo "<h6>$rad[postdate]</h6>";
            echo "<p>$rad[content]</p>";
            echo "</div>";
            echo "<button class=\"btn btn-danger\" name=\"radera\" value=\"1\">Radera inlägget</button>";
            echo "</form>";
        }
    }

    // När man klickat på knappen
    if ($id && $radera) {

        // 2. Ställ en SQL-fråga
        $sql = "DELETE FROM blogg WHERE id = '$id'";
        $result = $conn->query($sql);

        // Gick det bra?
        if (!$result) {
            die("Något blev fel med SQL-satsen.");
        } else {
            echo "<p class=\"alert alert-danger\">Inlägg $id har raderats!</p>";
        }
    }
    ?>
</body>
</html>