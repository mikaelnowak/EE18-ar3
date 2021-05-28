<?php
include './resurser/conn.php';
session_start();

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
        <ul class="nav">
            <li class="nav-item">
                <h1>Sites name</h1>
            </li>
            <li class="nav-item">
                <img src="./pictures/6db57ae216790490f53cbd9e2a49d486.png" alt="Site logo">
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li>
        </ul>
    </header>
    <div class="game-container">

    </div>
</body>
</html>