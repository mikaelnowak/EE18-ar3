<?php
$user = "gunnar";
$db = "gunnar";
$host = "localhost";
$pass = "nnWFMiNx8yveWhU5";

// använda databas
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Kunde inte komma in" . $conn->connect_error);    
}

$sql = "SELECT * FROM bilar";
$result = $conn->query($sql);

if (!$result) {
    die("FEL");
}

/* while ($rad = $result->fetch_assoc()) {
    echo "<p>$rad[marke]</p>";
} */

while ($rad = $result->fetch_assoc()) {
    
}

$conn->close();

?>