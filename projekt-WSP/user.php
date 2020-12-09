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
        <div class="select">
            <h1 class="max-con">SELECT USER</h1>
            <div class="users">
            <?php
            $users = $conn->query('SELECT * FROM users');
            //var_dump($users);
            foreach ($users as $key => $user) {
                echo    "<a href=\"chatroom.php\">
                            <div class=\"user\" style=\"border:5px solid $user[color];\" >
                                <h2 class=\"min-con\">$user[name]</h2>
                            </div>
                        </a>";
            }
            ?>
            </div>
            <a href="addusers.php">
                <div class="addusers">
                    <h2>ADD USERS</h2>
                </div>
            </a>
        </div>
    </div>
</body>
</html>