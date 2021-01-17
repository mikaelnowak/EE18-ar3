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
            <ul class="nav nav-tabs">
                <?php if (!isset($_SESSION["anamn"])) { ?>
                <li class="nav-item"><a class="nav-link" href="./login.php">login</a></li>
                <li class="nav-item"><a class="nav-link active" href="./registrera.php">registrera</a></li>
                <?php } else { ?>   
                <li class="nav-item"><a class="nav-link" href="./logout.php">logout</a></li>
                <li class="nav-item"><a class="nav-link" href="./lista.php">lista</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriv inlägg</a></li>
                <?php } ?>
                <li class="nav-item"><a class="nav-link" href="./lista-blogg.php">Inlägg</a></li>
                <li class="nav-item"><a class="nav-link" href="./hitta.php">Sök</a></li>
            </ul>
            </ul>
        </nav>
        <main>
            <form action="#" method="post">
                <label>Förnamn <input type="text" name="fnamn" required></label>
                <label>Efternamn <input type="text" name="enamn" required></label>
                <label>Användarnamn <input type="text" name="anamn" required></label>
                <label>Lösenord <input type="password" name="lösen1" required></label>
                <label>Upprepa lösenord <input type="password" name="lösen2" required></label>
                <button>Registrera</button>
            </form>
            <?php
                $fnamn = filter_input(INPUT_POST, "fnamn", FILTER_SANITIZE_STRING);
                $enamn = filter_input(INPUT_POST, "enamn", FILTER_SANITIZE_STRING);
                $anamn = filter_input(INPUT_POST, "anamn", FILTER_SANITIZE_STRING);
                $lösen1 = filter_input(INPUT_POST, "lösen1", FILTER_SANITIZE_STRING);
                $lösen2 = filter_input(INPUT_POST, "lösen2", FILTER_SANITIZE_STRING);

                if ($fnamn && $enamn && $anamn && $lösen1 && $lösen2) {

                    $sql = "SELECT * FROM user WHERE anamn = '$anamn'";
                    $result = $conn->query($sql);

                    if ($result->num_rows != 0) {
                        echo "<p class=\"alert alert-warning\">Användarnamnet är taget, mata in en ny användarnamn</p>";
                    } else {
                        if ($lösen1 == $lösen2) {
                            #var_dump($fnamn, $enamn, $anamn, $lösen1);

                            $hash = password_hash($lösen1, PASSWORD_DEFAULT);
    
                            $sql = "INSERT INTO user (fnamn, enamn, anamn, hash) VALUES ('$fnamn', '$enamn', '$anamn', '$hash')";
                            
                            $conn->query($sql);
    
                            echo "<p class=\"alert alert-success\">Registrerad</p>";
    
                            $conn->close();
                        } else {
                            echo "<p class=\"alert alert-warning\">Lösenorden matchar inte</p>";
                        }
                    }
                }
            ?>
        </main>
    </div>
</body>
</html>