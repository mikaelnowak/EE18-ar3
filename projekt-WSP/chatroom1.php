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
        <div class="rooms">
        <div class="room on">Chatroom 1</div>
        <a href=""><div class="room">Chatroom 2</div></a>
        <a href=""><div class="room">Chatroom 3</div></a>
        </div>
        <div class="view-chat">
            <?php
                $selectFromChatroom1 = $conn->query('SELECT name, color, content, postdate FROM users RIGHT OUTER JOIN chatroom1 ON users.id=chatroom1.user_id');
                
                foreach ($selectFromChatroom1 as $message) {
                    #var_dump($message[name], $message[color], $message[content], $message[postdate]);

                    if ($message[name] == '') {
                        $message[name] = 'Removed user';
                        $message[color] = '#000';
                    }

                    echo "<div class=\"show-message\">
                            <h2 style=\"color: $message[color]\">$message[name]</h2>
                            <h6>$message[postdate]</h6>
                            <p>$message[content]</p>
                        </div>";
                }
            ?>
        </div>
        <div class="go-back">
            <a href="./user.php"><button>Back</button></a>
        </div>
        <div class="input-message">
            <form action="#" method="post">
                <input type="text" name="new-message">
                <button type="submit">&#9654</button>
            </form>
            <?php
                $newMessage = filter_input(INPUT_POST, 'new-message', FILTER_SANITIZE_STRING);

                $getuserId = $conn->query('SELECT id FROM users WHERE name="$userName"');
                var_dump($getuserId);
            ?>
        </div>
    </div>
</body>
</html>