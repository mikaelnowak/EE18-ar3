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
    <div class="content">
        <h1 class="max-con">LOGIN</h1>
        <div class="login">
            <form action="#" method="POST">
                <label>User name: </label>
                <input type="text" name="user-name" autocomplete="off" require>
                <label>Password: </label>
                <input type="password" name="user-password" autocomplete="off" require>
                <button>Login</button>
            </form>
            <?php
                $userName = filter_input(INPUT_POST, 'user-name', FILTER_SANITIZE_STRING);
                $pass = filter_input(INPUT_POST, 'user-password', FILTER_SANITIZE_STRING);
                #var_dump($userName, $pass);

                //Om man har skrivit in användarnamn och lösenord
                if ($userName && $pass) {
                    $selectUserData = $conn->query("SELECT id, user_name, hash FROM users WHERE user_name='$userName'");
                    #var_dump($selectUserData);
                    //Finns användaren i databasen?
                    if ($selectUserData->num_rows != 0) {
                        //Användaren finns
                        $row = $selectUserData->fetch_assoc();
                        #var_dump($row);
                        //Kolla om hashen matchar lösenordet
                        if (password_verify($pass, $row[hash])) {
                            //inloggad
                            $_SESSION['userId'] = $row[id];
                            #var_dump($row[id]);
                            
                            //Gå över till chatrum
                            header('Location: ./chatroom1.php');
                        } else {
                            //Lösenordet matchar inte
                            echo "<p class=\"error-message\">The password dont mach.</p>";
                        }
                    } else {
                        //Användaren finns inte
                        echo "<p class=\"error-message\">There is no user with the username \"$userName\"</p>";
                    }
                } else {
                    //Om man missar
                    echo "<p class=\"error-message\">There is no user with the username \"$userName\"</p>";
                }
            ?>
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