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
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="hej">

    </div>
</body>
</html>