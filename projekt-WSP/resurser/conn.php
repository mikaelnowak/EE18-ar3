<?php
error_reporting(E_ALL);

$host = "localhost";
$db = "fake_discord";
$user = "chatboss";
$pass = "pCAFdhIzpWqRpobK";

//Skapa en anslutning
$conn = new mysqli($host, $user, $pass, $db);

//Kontrollera om man är ansluten
/* if ($conn->connect_error) {
    die('Ended:' . $conn->error);
} else {
    echo "succes";
} */

//Ta ut alla namn ur tabellen 'users'
$selectFromUser = $conn->query('SELECT * FROM users');