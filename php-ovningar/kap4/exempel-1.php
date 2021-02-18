<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Array och foreach()</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    
    $länder = ["Sverige", "England", "Tyskland"];

    print_r($länder);

    echo "<p>$länder[0]</p>";
    echo "<p>$länder[1]</p>";
    echo "<p>$länder[2]</p>";
    
    $länder[] = "Sverige";

    print_r($länder);
    echo "<p></p>";
    

    unset($länder[1]);

    print_r($länder);
    echo "<p></p>";
    

    $elever = [];
    $elever["Viltor"] = "Guitar";
    $elever["Lukas"] = "Keyboard";
    $elever["Olle"] = "Munspel";

    print_r($elever);

    $länder[1] = "England";

    foreach ($länder as $land) {
        echo "<p>$land</p>";
    }
    
    foreach ($elever as $elev) {
        echo "<p>$elev</p>";
    }

    foreach ($elever as $key => $elev) {
        echo "<p>$key spelar $elev</p>";
        
    }

    /* 
    <table>
        <tr>
            <td>John</td>
            <td>Doe</td>
        </tr>
        <tr>
            <td>Jane</td>
            <td>Doe</td>
        </tr>
    </table>
    */

    echo "<table>";
    echo "<tr>";
    echo "<td>John</td>";
    echo "<td>Doe</td>";
    echo "</tr>";
    echo "</table>";

    echo "<table>";
    foreach ($länder as $land) {
        echo "<tr>";
        echo "<td>$land</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<table>
         <th>Namn</th><th>Instrument</th>";
    foreach ($elever as $key => $elev) {
        echo "<tr>
             <td>$key</td><td>$elev</td>
             </tr>";
    }
    echo "</table>";

    $mening = "Vi och våra partners bearbetar personuppgifter såsom IP-adress, unikt ID och browsingdata. Vissa partner begär inte ditt samtycke till att behandla dina data, utan de litar på sitt legitima affärsintresse. Visa vår lista över partners för att se de syften som de tror att de har ett legitimt intresse för och hur du kan göra invändningar mot det.";

    $allaOrd = explode(" ", $mening);

    echo "<table>
         <th>Namn</th><th>Instrument</th>";
    foreach ($allaOrd as $key => $ja) {
        $key++;
        echo "<tr>
             <td>$key</td><td>$ja</td>
             </tr>";
    }
    echo "</table>";

    ?>
</body>
</html>