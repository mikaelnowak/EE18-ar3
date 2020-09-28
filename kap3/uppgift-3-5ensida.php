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
            <label for="belop">Ange belop</label>
            <input id="belop" type="text" class="form-control" name="belop">
            <label for="ränta">Ange ränta</label>
            <input id="ränta" type="ränta" class="form-control" name="ränta">
            <label>lånetid</label>
            <div>
                <input type="radio" name="tid" value="1"> 1
                <input type="radio" name="tid" value="3"> 3
                <input type="radio" name="tid" value="5"> 5
            </div>
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>

        <?php
        if (isset($_POST['belop'], $_POST['ränta'], $_POST['tid'])) {

        $belop = $_POST['belop'];
        $ränta = $_POST['ränta'];
        $tid = $_POST['tid'];
        $antalRänta;

        $antalRänta = $belop;
        for ($i=0; $i < $tid; $i++) { 
            $antalRänta *= $ränta / 100 + 1;
        }
        
        echo "<p>Du e skyldig $antalRänta:-</p>";

        }
        ?>
    </div>
</body>
</html>