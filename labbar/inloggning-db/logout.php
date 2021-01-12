<?php
include "./resurser/conn.php";
session_start();
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggning</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Inloggning</h1>
        </header>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./registrera.php">registrera</a></li>
                <li class="nav-item"><a class="nav-link" href="./login.php">login</a></li>
                <li class="nav-item"><a class="nav-link" href="./lista.php">lista</a></li>
                <li class="nav-item"><a class="nav-link active" href="./logout.php">logout</a></li>
            </ul>
        </nav>
        <main>
            <?php
                session_destroy();
            ?>
        </main>
    </div>
</body>
</html>