<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Geolocation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>Sites name</h1>
            <img src="./pictures/6db57ae216790490f53cbd9e2a49d486.png" alt="Site logo">
        </div>
        <ul class="nav justify-content-end">
        <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./game.php">Game</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./logout.php">Log out</a>
            </li>
        </ul>
    </header>
    <div>
        <div id="map"></div>
        <h1 id="lat"></h1>
        <h1 id="lon"></h1>
    </div>
    <table class="table table-dark table-striped">
        <tr>
            <th>Joke</th>
            <th>Created at</th>
        </tr>
    <?php
    for ($i=0; $i < 5; $i++) { 
        $url = "https://api.chucknorris.io/jokes/random";

        $json = file_get_contents($url);

        $jsonData = json_decode($json);

        echo "<tr>
            <td>$jsonData->value</td>
            <td>$jsonData->created_at</td>
            </tr>";
    }
    ?>
    </table>
    <script src="./admin.js"></script>
</body>
</html>