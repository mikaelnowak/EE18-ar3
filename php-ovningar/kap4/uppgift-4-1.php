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
        <h1>Array med namn</h1>
        <form action="#" method="POST">
            <label for="namn">Ange Namn 1</label>
            <input id="namn" type="text" class="form-control" name="namn[]">
            <label for="namn">Ange Namn 2</label>
            <input id="namn" type="text" class="form-control" name="namn[]">
            <label for="namn">Ange Namn 3</label>
            <input id="namn" type="text" class="form-control" name="namn[]">
            <label for="namn">Ange Namn 4</label>
            <input id="namn" type="text" class="form-control" name="namn[]">
            <label for="namn">Ange Namn 5</label>
            <input id="namn" type="text" class="form-control" name="namn[]">
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>

        <?php
        if (isset($_POST['namn'])) {

        $namn = $_POST['namn'];

        var_dump($namn);

        sort($namn);
        foreach ($namn as $key => $nam) {
            echo "<p>$key $nam</p>";
        }
        }
        ?>
    </div>
</body>
</html>