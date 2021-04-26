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
        <h1>Väder</h1>
        <?php
            $key = "22ee1d58f7adae08ee71fa7c0bd24481";

            $stad = "Stockholm";

            $url = "https://api.openweathermap.org/data/2.5/weather?q=$stad&appid=$key&units=metric";
            echo $url;

            $json = file_get_contents($url);

            $jsonData = json_decode($json);

            $coord = $jsonData->coord;

            $weather = $jsonData->weather;
            $description = $weather[0]->description;
            $icon = $weather[0]->icon;

            $lon = $coord->lon;
            $lat = $coord->lat;

            echo "<p>$lat, $lon</p>";
            echo "<img src=\"http://openweathermap.org/img/wn/$icon@2x.png\"";
        ?>
    </div>
</body>
</html>