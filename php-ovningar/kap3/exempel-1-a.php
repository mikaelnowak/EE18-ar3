<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulär</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Inloggning</h1>
        <form action="exempel-1-b.php" method="POST">
            <label for="anamn">Användarnamn</label>
            <input id="anamn" type="text" class="form-control" name="anamn">
            <label for="pass">Lösenord</label>
            <input id="pass" type="password" class="form-control" name="pass">

            <button type="submit" class="btn btn-primary">Logga in</button>
        </form>
        <?php
        $fel = $_GET['fel'];

        if ($fel == "1") {
            echo "<p><div class=\"alert alert-danger\" role=\"alert\">
                    This is a danger alert—check it out!
                  </div></p>";
        }
        ?>
    </div>
</body>
</html>