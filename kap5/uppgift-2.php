<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Läsa filer</h1>
        <form action="#" method="POST">
            <label for="filnamn">filnamn</label>
            <input name="filnamn" type="text" placeholder="T.ex filen">
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
        <?php
        if (isset($_POST['filnamn'])) {

            $namn = $_POST['filnamn'];

            $hantera = fopen("$namn.txt", 'r');
            $text = fread($hantera, filesize("$namn.txt"));
            echo "<p>$text</p>";
            fclose($hantera);
        }
        ?>
    </div>
</body>
</html>