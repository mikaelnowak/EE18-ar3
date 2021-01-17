<?php
include "./resurser/conn.php";
session_start();
?>
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
        <a href="./chatroom1.php"><div class="room">Chatroom 1</div></a>
        <div class="room on">Chatroom 2</div>
        <a href="./chatroom3.php"><div class="room">Chatroom 3</div></a>
        </div>
        <div class="view-chat">
            <?php
                //Plocka ut användbar information
                $selectFromChatroom2 = $conn->query("SELECT user_name, color, content, postdate FROM users RIGHT OUTER JOIN chatroom2 ON chatroom2.user_id=users.id ORDER BY postdate DESC");
                #var_dump($selectFromChatroom2);
                //Skriv ut alla medelanden som finns i chatens daatabas
                while ($message = $selectFromChatroom2->fetch_assoc()) {
                    #var_dump($rad);
                    //Om användaren är borttagen
                    if ($message[user_name] == '') {
                        $message[user_name] = 'Removed user';
                        $message[color] = '#000';
                    }
                    echo "<div class=\"show-message\">
                            <h2 style=\"color: $message[color];\">$message[user_name]</h2>
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
            <form action="#" method="POST">
                <input type="text" name="new-message" autocomplete="off" require>
                <button>&#9654</button>
            </form>
            <?php
                $newMessage = filter_input(INPUT_POST, 'new-message', FILTER_SANITIZE_STRING);

                if ($newMessage) {
                    //Skicka in medelandet
                    $check = $conn->query("INSERT INTO chatroom2 (user_id, content) VALUES ($_SESSION[userId], '$newMessage')");

                    if (!$check) {
                        //Om medelandet inte blev sparad
                        echo "<p class=\"error-message\">There was an error when saving the message. Please come back later. Error message: $conn->connect_error</p>";
                    }
                }

                //Stäng ner databas anslutningen
                $conn->close();
            ?>
        </div>
    </div>
</body>
</html>