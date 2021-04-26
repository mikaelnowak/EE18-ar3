<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>SL hållplatser</h1>
        <form action="#" method="post">
            <label>lat <input type="text" name="lat"></label>
            <label>lon <input type="text" name="lon"></label>
            <button>.</button>
        </form>
        <?php
            $lat = filter_input(INPUT_POST, "lat", FILTER_SANITIZE_STRING);
            $lon = filter_input(INPUT_POST, "lon", FILTER_SANITIZE_STRING);

            if ($lat && $lon) {
                $key = "5a04359da47042b7837f88a5c61908c9";

                $url = "http://api.sl.se/api2/nearbystops.json?key=$key&originCoordLat=$lat&originCoordLong=$lon&maxresults=10&radius=500";

                $json = file_get_contents($url);

                $jsonData = json_decode($json);
                //var_dump($jsonData);

                $ll = $jsonData->LocationList;
                //var_dump($ll);

                $sl = $ll->StopLocation;
                //var_dump($sl);

                echo "<ul>";
                foreach ($sl as $stop) {
                    echo "<li>$stop->name</li>";
                }
                echo "</ul>";

            }
        ?>
    </div>
</body>
</html>