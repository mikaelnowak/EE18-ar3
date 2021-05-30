<?php
session_start();
include './resurser/conn.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>Sites name</h1>
            <img src="./pictures/6db57ae216790490f53cbd9e2a49d486.png" alt="Site logo">
        </div>
        <ul class="nav justify-content-end">
            <?php
                if ($_SESSION['user'] == 'admin') {
                    echo '<li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./admin.php">Admin</a>
                </li>';
                }
            ?>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./logout.php">Log out</a>
            </li>
        </ul>
    </header>
    <div class="game-container">
        <canvas></canvas>
        <div class="shop">
            <div class="resources">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <p>Wood: </p>
                        <p id="woodAmount">0</p>
                    </li>
                    <li class="nav-item">
                        <p>Stone: </p>
                        <p id="stoneAmount">0</p>
                    </li>
                    <li class="nav-item">
                        <p>Plant: </p>
                        <p id="plantAmount">0</p>
                    </li>
                </ul>
            </div>
            <div class="upgrade">
                <div class="buy">
                    <h2>Wood+</h2>
                    <p>cost:</p>
                    <p id="woodCost">3 wood</p>
                    <button type="button" id="wood" class="btn btn-primary">Buy</button>
                </div>
                <div class="buy">
                    <h2>Stone+</h2>
                    <p>cost:</p>
                    <p id="stoneCost">3 wood</p>
                    <button type="button" id="stone" class="btn btn-primary">Buy</button>
                </div>
                <div class="buy">
                    <h2>Plant+</h2>
                    <p>cost:</p>
                    <p id="plantCost">3 plant</p>
                    <button type="button" id="plant" class="btn btn-primary">Buy</button>
                </div>
                <div class="buy">
                    <h2>speed+</h2>
                    <p>cost:</p>
                    <p id="speedWoodCost">3 wood</p>
                    <p id="speedStoneCost">3 stone</p>
                    <p id="speedPlantCost">3 plant</p>
                    <button type="button" id="speed" class="btn btn-primary">Buy</button>
                </div>
            </div>
        </div>
    </div>
    <script src="./game.js"></script>
</body>
</html>