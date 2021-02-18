<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Skanna katalog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>Skanna katalog</h1>
        <?php
            $katalog = ".";

            echo "<p>Katalogen: \"$katalog\"</p>";

            $resultat = scandir($katalog);
            //var_dump($resultat);

            foreach ($resultat as $objekt) {
                if ($objekt == "." || $objekt == "..") {
                    continue;
                }
                if (is_dir($katalog/$objekt)) {
                    continue;
                }

                $info = pathinfo($objekt);
                var_dump($info);

                echo "<p>$objekt</p>";
            }
        ?>
    </div>
</body>
</html>