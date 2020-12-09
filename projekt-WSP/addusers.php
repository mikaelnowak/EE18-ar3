<?php include "./resurser/conn.php"; ?>
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
        <div class="content small">
            <h1 class="max-con">Add User</h1>
            <form action="#" method="POST">
                <label>User name:</label>
                <input type="text" name="user-name" required>
                <p class="description">No 2 users with the same name. Ex no two "Gumpe".</p>
                <label>User color:</label>
                <input type="text" name="user-color" required>
                <p class="description">Write the color of choice's hex code counterpart "Ex: #f0f or #F0ecB12"</p>
                <button type="submit">Add user</button>
            </form>
            <?php
                //Ta ut det som finns i "User name" och "User color" inputsem
                $userName = filter_input(INPUT_POST, 'user-name', FILTER_SANITIZE_STRING);
                $userColor = filter_input(INPUT_POST, 'user-color', FILTER_SANITIZE_STRING);

                //Variablar
                $errorMessage = "";

                if ($userName && $userColor) {
                    //Kontrolera om namnet e unik
                    $userNamesInDB = $conn->query('SELECT name FROM users');
                    //var_dump($userNamesInDB);
                    foreach ($userNamesInDB as $name) {
                        if ($name[name] == $userName) {
                            $userName = "";
                            $errorMessage += "<p>There is allready a user named $userName, please get another username and try again</p>";
                        }
                    }

                    //Kolla om man skriver in en färg namn eller hexkod för färg
                    if (!preg_match('/^#([a-f0-9]{6}|[a-f0-9]{3})\b$/i', $userColor)) {
                        $userColor = "";
                        $errorMessage += "<p>The text you typed in dont follow the hex color rule, it a combination of red, green and blue color values. Search for an explenation and come back to type the correct color hex code.</p>";
                    }

                    //Om allt stämmer
                    if ($userName != "" && $userColor != "") {
                        $newUser = "INSERT INTO users (name, color) VALUES ('$userName', '$userColor')";
                        $check = $conn->query($newUser);
                        if (!$check) {
                            echo "<p>There was an error when creating the user. Please come back later efter the bug is fixed.</p>
                            <p>Error message: $conn->connect_error</p>";
                        } else {
                            echo "<div class=\"success\">
                                    <p>Succes, your user with the username $userName and with its color have ben created, go back to the previous web page to access the user or other users.</p>
                                </div>";
                        }
                    } else {
                        echo "hej";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>