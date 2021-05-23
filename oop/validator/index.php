<?php
    $username = filter_input(INPUT_POST, "user", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "mail", FILTER_SANITIZE_STRING);

    $errors = [];

    function validateUsername($data)
    {
        global $errors;
        if (!preg_match("/[a-zA-Z0-9]{6,12}/", $data)) {
            $errors['username'][] = "fel";
        }
    }

    function validatePassword($data)
    {
        global $errors;
        if (!preg_match("/[a-zåäö]/", $data) > 0) {
            $errors['password'][] = "password must contain a least one lowercase character<br>";
        }
        if (!preg_match("/[A-ZÅÄÖ]/", $data) > 0) {
            $errors['password'][] .= "password must contain a least one uppercase character<br>";
        }
        if (!preg_match("/[0-9]/", $data) > 0) {
            $errors['password'][] .= "password must contain a least one alphanumeric<br>";
        }
        if (!preg_match("/[#%&¤_\*\-\+\@\!\?\(\)\[\]\$£€]/", $data) > 0) {
            $errors['password'][] .= "password must contain a least one special character<br>";
        }
        if (!preg_match("/^.{8,40}$/", $data) > 0) {
            $errors['password'][] .= "password must at least 8 character long";
        }
    }

    function validateEmail($data)
    {
        global $errors;
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            $errors['email'][] = "fel";
        }
    }

    function showErrors($type)
    {
        global $errors;

        echo "<p>";
        foreach ($errors[$type] as $error) {
            echo "$error";
        }
        echo "</p>";
    }

    if ($username && $password && $email) {
        
        validateUsername($username);

        validatePassword($password);

        validateEmail($email);

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
    <div class="container">
        <h1>Create new user</h1>
        <form action="#" method="post">
            <label>Username: <input type="text" name="user" require></label>
            <?php
                showErrors('username');
            ?>
            <label>Password: <input type="password" name="pass" require></label>
            <?php
                showErrors('password');
            ?>
            <label>Email<input type="email" name="mail" require></label>
            <?php
                showErrors('email');
            ?>
            <button>Submit</button>
        </form>
    </div>
</body>
</html>