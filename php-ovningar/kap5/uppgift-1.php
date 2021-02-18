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
        <h1>Array med namn</h1>
        <form action="#" method="POST">
            <textarea name="area" id="area" cols="30" rows="10"></textarea>
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
        <?php
        if (isset($_POST['area'])) {

            $text = $_POST['area'];

            $hantera = fopen('text1.txt', 'w');
            fwrite($hantera, $text);
            fclose($hantera);
        }
        ?>
    </div>
</body>
</html>