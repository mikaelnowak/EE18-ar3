<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Djuralfabetet</title>
    <link rel="stylesheet" href="style (1).css">
</head>
<body>
    <div class="kontainer">
        <h2>Djuralfabetet</h2>
        <p>Här söker du djur efter deras första bokstav.<br>
            Tex. djur som börjar på 'a' med: skriv 'a'.<br>
            Tex. djur som börjar på 'a' eller 'b' med: skriv 'a, b'.</p>
        <form class="kol2" action="#" method="post">
            <label>Ange sökterm</label>
            <input type="text" name="sokterm">
            <button>Sök</button>
        </form>
        <?php
            $sokterm = filter_input(INPUT_POST, 'sokterm', FILTER_SANITIZE_STRING);
            if ($sokterm) {
                //Lös av filen
                $rader = file("animals.txt");
                $antalTräffar = 0;

                //Skriva ut hur lång listan är
                $antalDjur = count($rader);
                echo "<p>Läst in $antalDjur djur.</p>";

                //Skriv ut alla djur i en tabel
                echo "<table>
                      <th>Det finns $antalTräffar som börjar på $sokterm</th>";

                foreach ($rader as $rad) {
                    if(substr($rad, 0, 1) == $sokterm) {
                        $rad = explode(" (", $rad);
                        echo "<tr><td>$rad[0]</tr></td>";
                        $antalTräffar++;
                    }
                }

                echo "</table>";
            }
        ?>
    </div>
</body>
</html>
