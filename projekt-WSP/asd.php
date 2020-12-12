<?php
//Hämta ut select, "Change user name" och "Change user color"
$selectUser = filter_input(INPUT_POST, 'select-user', FILTER_SANITIZE_STRING);
$changeName = filter_input(INPUT_POST, 'change-name', FILTER_SANITIZE_STRING);
$changeColor = filter_input(INPUT_POST, 'change-color', FILTER_SANITIZE_STRING);
#var_dump($selectUser);
#var_dump($changeName);

//Variablar
$errorMessage = 0;

//Byta namn
if ($changeName && $selectUser) {
    //kontrollera om det nya namnet är tillåtet
    if (strlen($changeName) <= 16) {
        //Är namnet unik?
        foreach ($selectFromUser as $user) {
            //Om namnet inte är unik
            if ($user[name] == $changeName) {
                $changeName = '';
                $errorMessage[0] = "<p>There is allready a user named $changeName, please get another username and try again</p>";
            }
        }
    } else {
        $changeName = '';
        $errorMessage[0] = "<p>The longest accepteble user name is 16 caracters or less, pleast shorten your username and try again.</p>";
    }

    if ($changeName != '') {
        $rename = $conn->query("UPDATE users SET name=\"$changeName\" WHERE id=$selectUser");
    } else {
        echo "<div class=\"error-message\">
                $errorMessage[0]
            </div>";
    }

if ($changeColor && $selectUser) {
    //Kontrollera om man skriver in färgens hex kod
    if (!preg_match('/^#([a-f0-9]{6}|[a-f0-9]{3})\b$/i', $userColor)) {
        //Kolla om man skrev in färgens namn
        if (!in_array($userColor, $colorNames)) {
            $userColor = '';
            $errorMessage[1] = "<p>The text you typed in dont follow the color guidlines we have. Write the color's name or its hex code and try again.</p>";
        }
    }
}

if ($errorMessage[0] != '' || $errorMessage[1] != '') {
    
}