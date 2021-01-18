<?php include "./resurser/conn.php";
include "./resurser/cssColorNames.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add chatroom</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content small-content">
        <h1 class="max-con">Add User</h1>
        <form action="#" method="POST">
            <label>User name<input type="text" name="user-name" autocomplete="off" required></label>
            <label>User color<input type="text" name="user-color" autocomplete="off" required></label>
            <label>Password<input type="password" name="user-pass-1" required></label>
            <label>Verify password<input type="password" name="user-pass-2" required></label>
            <button type="submit">Add user</button>
        </form>
        <?php
            //Ta ut det som finns i "User name" och "User color" inputsem
            $userName = filter_input(INPUT_POST, 'user-name', FILTER_SANITIZE_STRING);
            $userColor = filter_input(INPUT_POST, 'user-color', FILTER_SANITIZE_STRING);
            $password1 = filter_input(INPUT_POST, 'user-pass-1', FILTER_SANITIZE_STRING);
            $password2 = filter_input(INPUT_POST, 'user-pass-2', FILTER_SANITIZE_STRING);

            if ($userName && $userColor) {
                //Felmedelande-variabel
                $errorMessage;

                //Kontrolera användarnamn
                //Är strängen 16 eller mindre karaktärer lång
                if (strlen($userName) <= 16) {
                    //Är namnet unik?
                    foreach ($selectFromUser as $user) {
                        if ($user[user_name] == $userName) {
                            //Om namnet inte är unik
                            $userName = '';
                            $errorMessage[0] = "<p>There is allready a user named $user[name], please get another username and try again</p>";
                        }
                    }
                } else {
                    //Användarnamnet är för lång
                    $userName = '';
                    $errorMessage[0] = "<p>The longest accepteble user name is 16 caracters or less, pleast shorten your username and try again.</p>";
                }

                //Kontrolera färg
                //Är färgenen en hexkod?
                if (!preg_match('/^#([a-f0-9]{6}|[a-f0-9]{3})\b$/i', $userColor)) {
                    //Kolla om man skrev in färgens namn
                    if (!in_array($userColor, $colorNames)) {
                        //Ingen färg är inskrivet
                        $userColor = '';
                        $errorMessage[1] = "<p>The text you typed in dont follow the color guidlines we have. Write the color's name or its hex code and try again.</p>";
                    }
                }

                //Kontrolera lösenordet
                //Kontrolera om båda lösenorden är likadana
                if ($password1 == $password2) {
                    //Kryptera lösenordet
                    $hash = password_hash($password1, PASSWORD_DEFAULT);
                } else {
                    $hash = '';
                    $errorMessage[2] = "<p>The passwords dont match, make sure the password are the same and try again.</p>";
                }

                //Om allt stämmer
                if ($userName && $userColor && $hash != '') {
                    $check = $conn->query("INSERT INTO users (user_name, color, hash) VALUES ('$userName', '$userColor', '$hash')");

                    if (!$check) {
                        //Om användaren inte blev sparad
                        echo "<p class=\"error-message\">There was an error when creating the user. Please come back later.</p>
                        <p>Error message: $conn->connect_error</p>";
                    } else {
                        //Användaren sparades
                        echo "<div class=\"success\">
                                <p>Succes, your user with the username $userName and with its color have ben created, go back to the previous web page to access the user or other users.</p>
                            </div>";
                    }
                } else {
                    //Om nåt inte stämmer
                    echo "<div class=\"error-message\">
                            $errorMessage[0]
                            $errorMessage[1]
                            $errorMessage[2]
                        </div>";
                }
            }

            //Stäng ner databas anslutningen
            $conn->close();

        ?>
        <a href="user.php"><button>Previous page</button></a>
    </div>
</body>
</html>