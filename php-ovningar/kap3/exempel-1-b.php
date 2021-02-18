<?php
/*
Inloggning
* PHP version 7
* @category   Lånekalkylator
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inloggning</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        $användernamn = $_POST['anamn'];
        $lösenord = $_POST['pass'];

        if ($användernamn == "mikael" && $lösenord == "gunnar") {
            echo "<p><div class=\"alert alert-success\" role=\"alert\">
                    This is a danger alert—check it out!
                  </div></p>";
        } else {
            header("Location:exempel-1-a.php?fel=1");
        }
        ?>
    </div>
</body>
</html>