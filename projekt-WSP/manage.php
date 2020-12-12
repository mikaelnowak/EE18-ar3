<?php include "./resurser/conn.php";
include "./cssColorNames.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="content small-content">
            <div class="section">
                <h1>EDIT NAME</h1>
                <form action="#" method="POST">
                    <select name="select-user">
                        <option value="0" selected>Select a user</option>
                        <?php
                            //Skriv ut alla användare i "users" tabellen
                            foreach ($selectFromUser as $user) {
                                #var_dump($user);
                                echo "<option value=\"$user[id]\">$user[name]</option>";
                            }
                        ?>
                    </select>
                    <label>Change user name:<input type="text" name="change-name" autocomplete="off"></label>
                    <button>Edit user</button>
                </form>
                <?php
                    //Hämta ut select och från "Change user name"
                    $selectUser = filter_input(INPUT_POST, 'select-user', FILTER_SANITIZE_STRING);
                    $changeName = filter_input(INPUT_POST, 'change-name', FILTER_SANITIZE_STRING);
                    #var_dump($selectUser);

                    //Variablar
                    $errorMessage;

                    if ($changeName && $selectUser != 0) {
                        //kontrollera om det nya namnet är tillåtet
                        if (strlen($changeName) <= 16) {
                            //Är namnet unik?
                            foreach ($selectFromUser as $user) {
                                //Om namnet inte är unik
                                if ($user[name] == $changeName) {
                                    $changeName = '';
                                    $errorMessage[0] = "<p>There is allready a user named $changeName, please get another username and try again</p>";
                                }
                            }
                        } else {
                            $changeName = '';
                            $errorMessage[0] = "<p>The longest accepteble user name is 16 caracters or less, pleast shorten your username and try again.</p>";
                        }
                    
                        if ($changeName != '') {
                            $checkRename = $conn->query("UPDATE users SET name=\"$changeName\" WHERE id=$selectUser");

                            if (!$checkRename) {
                                echo "<p>There was an error when renaming the user. Please come back later.</p>
                                <p>Error message: $conn->connect_error</p>";
                            } else {
                                echo "<div class=\"success\">
                                        <p>Succes, your user have succesfully ben renamed to $changeName</p>
                                    </div>";
                            }
                        } else {
                            echo "<div class=\"error-message\">
                                    $errorMessage[0]
                                </div>";
                        }
                    }
                ?>
            </div>
            <hr class="small-hr">
            <div class="section">
                <h1>EDIT COLOR</h1>
                <form action="#" method="POST">
                    <select name="select-user">
                        <option value="0" selected>Select a user</option>
                        <?php
                            //Skriv ut alla användare i "users" tabellen
                            foreach ($selectFromUser as $user) {
                                #var_dump($user);
                                echo "<option value=\"$user[id]\">$user[name]</option>";
                            }
                        ?>
                    </select>
                    <label>Change user color:<input type="text" name="change-color" autocomplete="off"></label>
                    <button>Edit color</button>
                </form>
                <?php
                    //Hämta ut select och från "Change user name"
                    $selectUser = filter_input(INPUT_POST, 'select-user', FILTER_SANITIZE_STRING);
                    $changeColor = filter_input(INPUT_POST, 'change-color', FILTER_SANITIZE_STRING);
                    #var_dump($selectColor);

                    if ($changeColor && $selectUser != 0) {
                        //Kontrollera om man skriver in färgens hex kod
                        if (!preg_match('/^#([a-f0-9]{6}|[a-f0-9]{3})\b$/i', $userColor)) {
                            //Kolla om man skrev in färgens namn
                            if (!in_array($userColor, $colorNames)) {
                                $userColor = '';
                                $errorMessage[1] = "<p>The text you typed in dont follow the color guidlines we have. Write the color's name or its hex code and try again.</p>";
                            }
                        }

                        //Om allt stämmer
                        if ($changeColor != '') {
                            $checkRecolor = $conn->query("UPDATE users SET color=\"$changeColor\" WHERE id=$selectUser");

                            if (!$checkRecolor) {
                                echo "<p>There was an error when recoloring the user. Please come back later.</p>
                                <p>Error message: $conn->connect_error</p>";
                            } else {
                                echo "<div class=\"success\">
                                        <p>Succes, your user have gotten a new color.</p>
                                    </div>";
                            }
                        } else {
                            echo "<div class=\"error-message\">
                                    $errorMessage[1]
                                </div>";
                        }
                    }
                ?>
            </div>
            <hr class="small-hr">
            <div class="section">
                <h1>DELETE</h1>
                <form action="#" method="POST">
                    <select name="delete-user">
                        <option value="0" selected>Select a user</option>
                        <?php
                            //Skriv ut alla användare i "users" tabellen
                            foreach ($selectFromUser as $user) {
                                #var_dump($user);
                                echo "<option value=\"$user[id]\">$user[name]</option>";
                            }
                        ?>
                    </select>
                    <button>Delete user</button>
                </form>
                <?php
                    //Hämta ut selecten för att redara användaren
                    $deleteUser = filter_input(INPUT_POST, 'delete-user', FILTER_SANITIZE_STRING);

                    //Om nån användare är selectad
                    if ($deleteUser != 0) {
                        $checkDelete = $conn->query("DELETE FROM users WHERE id=$deleteUser");

                        if (!$checkDelete) {
                            echo "<p>There was an error when deleting the user. Please come back later.</p>
                            <p>Error message: $conn->connect_error</p>";
                        } else {
                            echo "<div class=\"success\">
                                    <p>Succes, your user have gotten deleted.</p>
                                </div>";
                        }
                    }

                    //Stäng ner databas anslutningen
                    $conn->close();

                ?>
            </div>
            <hr class="small-hr">
            <a href="user.php"><button>Previous page</button></a>
        </div>
    </div>
</body>
</html>