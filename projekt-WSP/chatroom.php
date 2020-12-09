<?php include "./resurser/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="chatrooms">
        <?php
        //Vissa alla chatter som finns
        $tables = $conn->query("SHOW TABLES");
        //var_dump($tables);
        foreach ($tables as $key => $table) {
            $name[$key] = $table['Tables_in_fake_discord'];
            //var_dump($name[$key]);
            if ($name[$key] != 'users') {
                echo "$name[$key]";
            }
        }
        ?>
        </div>
    </div>
</body>
</html>