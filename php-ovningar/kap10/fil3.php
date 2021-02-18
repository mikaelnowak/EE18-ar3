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
    $_SESSION = Null; // Tar bort alla sessionsvariabler
    session_destroy(); // Avslutar sessionen
    echo $_SESSION['namn']; // Skriver inte ut någonting.
    ?>
</body>
</html>