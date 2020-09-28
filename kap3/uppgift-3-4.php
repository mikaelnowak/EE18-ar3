<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Formulär</h1>
        <form action="#" method="POST">
            <label for="t1">tal 1</label>
            <input id="t1" type="text" class="form-control" name="t1" require>
            <label for="ränta">tal 2</label>
            <input id="t2" type="t2" class="form-control" name="t2" require>
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>

        <?php
        if (isset($_POST['t1'], $_POST['t2']))

        $tal1 = $_POST['t1'] + 1;
        $tal2 = $_POST['t2'];

        if ($tal1 < $tal2) {
            for ($i = $tal1; $i <= $tal2; $i++) { 
                $kvad = $i * $i;
                if ($kvad <= $tal2) {
                    echo "$kvad ";
                }
            }
        } else {
            echo "<p>Skriv den mindre talet i tal 1</p>";
        }
        ?>
    </div>
</body>
</html>