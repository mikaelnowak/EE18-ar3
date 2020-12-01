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
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
    <h1>Spara ditt namn</h1>
    <form action="#" method="POST">
        <label>Ange rubrik<input type="text" name="header"></label>
        <label>Ange text <textarea name="postText"></textarea></label>
        <button>Spara</button>
    </form>
    <?php
    $header = filter_input(INPUT_POST, 'header', FILTER_SANITIZE_STRING);
    $postText = filter_input(INPUT_POST, 'postText', FILTER_SANITIZE_STRING);

    // Finns data?
    if ($header && $postText) {
        //var_dump($header, $postText);
        $sql = "INSERT INTO bloggen (id, header, postText, postDate) VALUES (NULL, '$header', '$postText', CURRENT_TIMESTAMP)";
        $result = $conn->query($sql);
        if (!$result) {
            die('Error');
        } else {
            echo "<p>Posted</p>";
        }

        $conn->close();
    }
    ?>
</div>
</body>
</html>