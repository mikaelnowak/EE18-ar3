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
            <form action="#" method="POST">
            <label>Chat name</label>
            <input type="text" name="room-name">
            <button>Submit</button>
            </form>
            <?php
                //Vissa alla chatter som finns
                $tables = $conn->query("SHOW TABLES");

                //Hämta ut input
                $roomName = filter_input(INPUT_POST, 'room-name', FILTER_SANITIZE_STRING);

                //Kolla om namnet är max 16 karaktärer långt
                if ($roomName) {
                    if (strlen($roomName) <= 16) {
                        //Kolla om namnet är unik
                        foreach ($tables as $table) {
                            #var_dump($table);
                            $name[$key] = $table['Tables_in_fake_discord'];
                            var_dump($name[$key]);
                            if ($name[$key] == $roomName) {
                                //Kolla om namnet är 'users'
                                if ($name[$key] == 'users') {
                                    //Lägg till chaten
                                    echo "funkar";
                                }
                            }
                        }
                    }
                }
            ?>
            <hr>
            <?php
                //Skriv ut alla chat rummen
                echo "<div class=\"all-rooms\">";
                //gå igenom alla tabeller i databasen
                foreach ($tables as $table) {
                    //Få ut tabellens namn
                    $name[$key] = $table['Tables_in_fake_discord'];
                    #var_dump($name[$key]);
                    //Skriv ut namnet
                    if ($name[$key] != 'users') {
                        echo "<div class=\"room\">$name[$key]</div>";
                    }
                }
                echo "</div>";
            ?>
        </div>
        <div class="view-chat">
            
        </div>
        <div class="account">
            <a href="./user.php"><button>Back</button></a>
        </div>
        <div class="input-message">

        </div>
    </div>
</body>
</html>