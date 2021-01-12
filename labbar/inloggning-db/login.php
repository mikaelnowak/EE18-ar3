<?php
include "./resurser/conn.php";
session_start();
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggning</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="kontainer">
        <header>
            <h1>Inloggning</h1>
        </header>
        <nav>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link" href="./registrera.php">registrera</a></li>
                <li class="nav-item"><a class="nav-link active" href="./login.php">login</a></li>
                <li class="nav-item"><a class="nav-link" href="./lista.php">lista</a></li>
                <li class="nav-item"><a class="nav-link" href="./logout.php">logout</a></li>
            </ul>
        </nav>
        <main>
            <form action="#" method="post">
                <label>Användarnamn <input type="text" name="anamn" required></label>
                <label>Lösenord <input type="password" name="lösen" required></label>
                <button>Login</button>
            </form>
            <?php
                $anamn = filter_input(INPUT_POST, "anamn", FILTER_SANITIZE_STRING);
                $lösen = filter_input(INPUT_POST, "lösen", FILTER_SANITIZE_STRING);

                if ($anamn && $lösen) {
                    //Finns användaren i tabellen
                    $sql = ("SELECT * FROM user WHERE anamn='$anamn'");
                    $result = $conn->query($sql);

                    if ($result->num_rows == 0) {
                        echo "<p class=\"alert alert-warning\">Användaren finns inte</p>";
                    } else {
                        //Plocka ut hashen
                        $rad = $result->fetch_assoc();
                        $hash = $rad['hash'];

                        //Kolla om hashen matchar
                        if (password_verify($lösen, $hash)) {
                            //inloggad
                            echo "<p class=\"alert alert-success\">Inloggad</p>";
                            $_SESSION["anamn"] = $anamn;
                        } else {
                            //error
                            echo "<p class=\"alert alert-warning\">Lösenorder stämmer inte</p>";
                        }
                    }   
                }
            ?>
        </main>
    </div>
</body>
</html>