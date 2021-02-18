<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="#" method="POST">
    <label>Tal 1</label>
    <input type="text" name="t1">
    <label>Tal 2</label>
    <input type="text" name="t2">
    <button type="submit">Submit</button>
    </form>
    <?php
        session_start();
        $_SESSION['started']++;

        $t1 = filter_input(INPUT_POST, 't1', FILTER_SANITIZE_STRING);
        $t2 = filter_input(INPUT_POST, 't2', FILTER_SANITIZE_STRING);

        if ($t1 && $t2) {
            $sum = $t1 + $t2;
            echo "$sum";
        }
        session_destroy();

        echo $_SESSION['started'];
        
    ?>
</body>
</html>