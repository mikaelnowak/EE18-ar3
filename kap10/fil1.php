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
    session_start(); // Startar sessionen
    $_SESSION['namn'] = "test";
    ?>
    <a href="fil2.php">Fil 2</a>
</body>
</html>