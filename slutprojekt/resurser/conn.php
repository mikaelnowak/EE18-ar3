<?php
error_reporting(E_ALL);

$host = "localhost";
$db = "slutprojekt";
$user = "slutprojekt";
$pass = "gj97k1wT0y0rPFll";

//Skapa en anslutning
$conn = new mysqli($host, $user, $pass, $db);

//Kontrollera om man är ansluten
if ($conn->connect_error) {
    die('Ended:' . $conn->error);
}