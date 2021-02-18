<?php
include "./resurser/conn.php";
session_start();
if (!isset($_SESSION["anamn"])) {
    header("Location: login.php");
}
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
            <h1>Inloggad</h1>
        </header>
        <nav>
        <ul class="nav nav-tabs">
                <?php if (!isset($_SESSION["anamn"])) { ?>
                <li class="nav-item"><a class="nav-link" href="./login.php">login</a></li>
                <li class="nav-item"><a class="nav-link" href="./registrera.php">registrera</a></li>
                <li class="nav-item"><a class="nav-link" href="./lista-blogg.php">Inlägg</a></li>
                <li class="nav-item"><a class="nav-link" href="./hitta.php">Sök</a></li>
                <?php } else { ?>   
                <li class="nav-item"><a class="nav-link" href="./logout.php">logout</a></li>
                <li class="nav-item"><a class="nav-link active" href="./lista.php">lista</a></li>
                <li class="nav-item"><a class="nav-link" href="./skriva.php">Skriv inlägg</a></li>
                <li class="nav-item"><a class="nav-link" href="./lista-blogg.php">Inlägg</a></li>
                <li class="nav-item"><a class="nav-link" href="./hitta.php">Sök</a></li>
                <li class="anamn"><?php echo $_SESSION['anamn'] . "(" . $_SESSION['antal'] . ")"?></li>
                <?php } ?>
            </ul>
        </nav>
        <main>
            <?php
                $sql = "SELECT * FROM user";
                $result = $conn->query($sql);
            
                // Gick det bra?
                if (!$result) {
                    die("Något blev fel med SQL-satsen.");
                }
            
                // Presentera resultatet
                echo '<table>
                        <th>Förnamn</th>
                        <th>Efternamn</th>
                        <th>Användarnamn</th>
                        <th>Skapad</th>';
                
                while ($rad = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>$rad[fnamn]</td>
                            <td>$rad[enamn]</td>
                            <td>$rad[anamn]</td>
                            <td>$rad[skapad]</td>
                        </tr>";
                }
                echo '</table>';
            ?>
        </main>
    </div>
</body>
</html>