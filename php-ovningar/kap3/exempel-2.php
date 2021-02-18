<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    /* Laugh on Monday, laugh for danger.
    Laugh on Tuesday, kiss a stranger.
    Laugh on Wednesday, laugh for a letter.
    Laugh on Thursday, something better.
    Laugh on Friday, laugh for sorrow.
    Laugh on Saturday, joy tomorrow. */

    switch ($idag) {
        case 'Monday':
            echo "Laugh on Monday, laugh for danger.";
            break;
        case 'Tuesdat':
            echo "Laugh on Tuesday, kiss a stranger.";
            break;
        case 'Wednesday':
            echo "Laugh on Wednesday, laugh for a letter.";
            break;
        case 'Thursday':
            echo "Laugh on Thursday, something better.";
            break;
        case 'Friday':
            echo "Laugh on Friday, laugh for sorrow.";
            break;
        case 'Saturday':
            echo "Laugh on Saturday, joy tomorrow.";
            break;
    }

        for ($i=0; $i < 10; $i++) { 
            echo "<p>hej $i</p><br>";
        }
    ?>
</body>
</html>