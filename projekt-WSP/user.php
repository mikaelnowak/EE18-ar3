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
    <div class="content">
        <h1 class="max-con">SELECT USER</h1>
        <div class="vertical-menu">
            <div class="users">
            <?php
                //Vissa alla användare i en grid
                #var_dump($users);
                foreach ($selectFromUser as $user) {
                    echo "<a href=\"chatroom.php?user_name=$user[name]\">
                            <div class=\"user\"style=\"
                            border:5px solid $user[color];
                            box-shadow: 0 0 5px $user[color];\">
                                <h2 class=\"max-con\">$user[name]</h2>
                            </div>
                        </a>";
                }

                //Stäng ner databas anslutningen
                $conn->close();
                
            ?>
            </div>
        </div>
        <hr>
        <h1 class="max-con">MANAGE</h1>
        <div class="manage">
            <a href="addusers.php">
                <div class="manage-part">
                    <h2 class="max-con">ADD USERS</h2>
                </div>
            </a>
            <a href="manage.php">
                <div class="manage-part">
                    <h2 class="max-con">MANAGE USERS</h2>
                </div>
            </a>
        </div>
    </div>
</body>
</html>