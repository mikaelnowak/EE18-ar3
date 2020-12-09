<?php
error_reporting(E_ALL);

$host = "localhost";
$db = "bloggS";
$user = "admin";
$pass = "pass";

/* SKOLA
$host = "localhost";
$db = "blogg";
$user = "blogg";
$pass = "54EJGQKO6sOyy8lq";
 */

//Skapa en anslutning
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die('Ended:' . $conn->error);
}