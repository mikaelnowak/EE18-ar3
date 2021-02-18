<?php
include "./resurser/conn.php";
session_start();
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
    <h1>Spara ditt inlägg</h1>
    <nav>
        <ul class="nav nav-tabs">
            <?php if (!isset($_SESSION["anamn"])) { ?>
            <li class="nav-item"><a class="nav-link" href="./login.php">login</a></li>
            <li class="nav-item"><a class="nav-link" href="./registrera.php">registrera</a></li>
            <li class="nav-item"><a class="nav-link" href="./lista-blogg.php">Inlägg</a></li>
            <li class="nav-item"><a class="nav-link" href="./hitta.php">Sök</a></li>
            <?php } else { ?>
            <li class="nav-item"><a class="nav-link" href="./logout.php">logout</a></li>
            <li class="nav-item"><a class="nav-link" href="./lista.php">lista</a></li>
            <li class="nav-item"><a class="nav-link active" href="./skriva.php">Skriv inlägg</a></li>
            <li class="nav-item"><a class="nav-link" href="./lista-blogg.php">Inlägg</a></li>
            <li class="nav-item"><a class="nav-link" href="./hitta.php">Sök</a></li>
            <li class="anamn"><?php echo $_SESSION['anamn'] . "(" . $_SESSION['antal'] . ")"?></li>
            <?php } ?>
        </ul>
    </nav>
    <form action="#" method="POST">
        <label>Ange rubrik<input type="text" name="title"></label>
        <label>Ange text <textarea name="content"></textarea></label>
        <button>Spara</button>
    </form>
    <?php
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);

    // Finns data?
    if ($title && $content) {

        $sql = "SELECT id FROM user WHERE anamn=\"$_SESSION[anamn]\"";
        $userId = $conn->query($sql);
        $userId = $userId->fetch_assoc();
        #var_dump($userId[id]);
        $sql = "INSERT INTO blogg (title, content, user_id) VALUES ('$title', '$content', $userId[id])";
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