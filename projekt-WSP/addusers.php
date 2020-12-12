<?php include "./resurser/conn.php";
include "./cssColorNames.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add chatroom</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="content small-content">
            <h1 class="max-con">Add User</h1>
            <form action="#" method="POST">
                <label>User name:<input type="text" name="user-name" autocomplete="off" required></label>
                <p class="description">No 2 users with the same name. Ex no two "Gumpe".</p>
                <label>User color:<input type="text" name="user-color" autocomplete="off" required></label>
                <p class="description">Write the name of the color or the color's hex code counterpart "Ex: #f0f or #F0ecB12"</p>
                <button type="submit">Add user</button>
            </form>
            <?php
                //Ta ut det som finns i "User name" och "User color" inputsem
                $userName = filter_input(INPUT_POST, 'user-name', FILTER_SANITIZE_STRING);
                $userColor = filter_input(INPUT_POST, 'user-color', FILTER_SANITIZE_STRING);

                if ($userName && $userColor) {
                    //Globala variablar
                    $errorMessage;

                    //Är strängen 16 eller mindre karaktärer lång
                    if (strlen($userName) <= 16) {
                        //Är namnet unik?
                        foreach ($selectFromUser as $user) {
                            //Om namnet inte är unik
                            if ($user[name] == $userName) {
                                $userName = '';
                                $errorMessage[0] = "<p>There is allready a user named $userName, please get another username and try again</p>";
                            }
                        }
                    } else {
                        $userName = '';
                        $errorMessage[0] = "<p>The longest accepteble user name is 16 caracters or less, pleast shorten your username and try again.</p>";
                    }

                    if (!preg_match('/^#([a-f0-9]{6}|[a-f0-9]{3})\b$/i', $userColor)) {
                        //Kolla om man skrev in färgens namn
                        if (!in_array($userColor, $colorNames)) {
                            $userColor = '';
                            $errorMessage[1] = "<p>The text you typed in dont follow the color guidlines we have. Write the color's name or its hex code and try again.</p>";
                        }
                    }

                    //Om allt stämmer
                    if ($userName != '' && $userColor != '') {
                        $check = $conn->query("INSERT INTO users (name, color) VALUES ('$userName', '$userColor')");

                        if (!$check) {
                            echo "<p>There was an error when creating the user. Please come back later.</p>
                            <p>Error message: $conn->connect_error</p>";
                        } else {
                            echo "<div class=\"success\">
                                    <p>Succes, your user with the username $userName and with its color have ben created, go back to the previous web page to access the user or other users.</p>
                                </div>";
                        }
                    } else {
                        echo "<div class=\"error-message\">
                                $errorMessage[0]
                                $errorMessage[1]
                            </div>";
                    }
                }

                //Stäng ner databas anslutningen
                $conn->close();

            ?>
            <a href="user.php"><button>Previous page</button></a>
        </div>
    </div>
</body>
</html>