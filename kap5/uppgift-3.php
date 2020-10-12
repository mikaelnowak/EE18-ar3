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
            <label for="namn">Namn</label>
            <input name="namn" type="text">
            <label for="mail">Mail</label>
            <input name="mail" type="email">
            <label for="meddelande">Meddelande</label>
            <textarea name="meddelande" id="" cols="30" rows="10"></textarea>
            <button type="submit" class="btn btn-primary">Skicka</button>
        </form>
        <?php
        if (isset($_POST['namn'], $_POST['mail'], $_POST['meddelande'])) {

            $namn = $_POST['namn'];
            $mail = $_POST['mail'];
            $meddelande = $_POST['meddelande'];

            $hantera = fopen("gastbokning.txt", 'a');
            fwrite($hantera, "Namn: $namn\nE-mail: $mail\nMeddelande: $meddelande\n\n");
            fclose($hantera);
        }
        ?>
    </div>
</body>
</html>