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
    session_start();
    echo $_SESSION['namn']; // Skriver ut test
    ?>
    <a href="fil3.php">Fil 3</a>
</body>
</html>