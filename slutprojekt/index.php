<?php
session_start();
include './resurser/conn.php';
include './classes/Login.php';
include './classes/Registration.php';
$login = new Login();
$signIn = new Registration();

$check;
$allUsernames = $conn->query("SELECT username FROM users");

if (isset($_POST['login'])) {
    $login->set($_POST);
    $isUsernameInDB = $login->username($allUsernames);
    
    if ($isUsernameInDB) {
        $getUserHashFromDB = $conn->query("SELECT hash FROM users WHERE username=\"$isUsernameInDB\"");
        $userHash = $getUserHashFromDB->fetch_assoc();

        $login->password($userHash, 'game.php');
    }
}

if (isset($_POST['signIn'])) {
    $allEmails = $conn->query("SELECT email FROM users");

    $signIn->set($_POST);
    $signIn->registerName('regFirstName');
    $signIn->registerName('regLastName');
    $signIn->registerUsername($allUsernames);
    $signIn->registerEmail($allEmails);
    $signIn->registerPassword();

    $data = $signIn->registerDB();

    if ($data) {
        $check = $conn->query("INSERT INTO users (username, fname, lname, email, hash) VALUES (\"$data[0]\", \"$data[1]\", \"$data[2]\", \"$data[3]\", \"$data[4]\")");
    }

    if ($check) {
        echo '<div class="alert alert-success" role="alert">
        <p>Your account is now registrated! You can login now if u want to.</p>
        </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
        <p>Something whent wrong.</p>
        </div>';
    }
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <!-- Boxen -->
    <div class="container">
        <!-- login -->
        <form class="text-center" action="#" method="post">
            <h1>Login</h1>
            <div class="col">
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder=" " name="username" required>
                    <label for="floatingInputGrid">Username</label>
                  </div>
            </div>
            <div class="col">
                <div class="form-floating">
                    <input type="password" class="form-control" placeholder=" " name="password" required>
                    <label for="floatingInputGrid">Password</label>
                  </div>
            </div>
            <button class="btn btn-secondary btn-lg" name="login">Login</button>
        </form>
        <!-- Vertical linje -->
        <div class="vr"></div>
        <!-- Registrering -->
        <form class="text-center" action="#" method="post">
            <h1>Sign in</h1>
            <div class="row">
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder=" " name="regFirstName" required>
                        <label for="floatingInputGrid">First name</label>
                      </div>
                      <?php $signIn->showErrors('regFirstName'); ?>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder=" " name="regLastName" required>
                        <label for="floatingInputGrid">Last name</label>
                      </div>
                      <?php $signIn->showErrors('regLastName'); ?>
                </div>
            </div>
            <div class="col">
                <div class="form-floating">
                    <input type="text" class="form-control" placeholder=" " name="regUsername" required>
                    <label for="floatingInputGrid">Username</label>
                  </div>
                  <?php $signIn->showErrors('regUsername'); ?>
            </div>
            <div class="col">
                <div class="form-floating">
                    <input type="email" class="form-control" placeholder=" " name="regEmail" required>
                    <label for="floatingInputGrid">Email</label>
                  </div>
                  <?php $signIn->showErrors('regEmail'); ?>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating">
                        <input type="password" class="form-control" placeholder=" " name="regPassword" required>
                        <label for="floatingInputGrid">Password</label>
                      </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <input type="password" class="form-control" placeholder=" " name="regPasswordConfirmation" required>
                        <label for="floatingInputGrid">Confirm pass</label>
                      </div>
                </div>
            </div>
            <?php $signIn->showErrors('regPassword'); ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" required>
                <label class="form-check-label">Check the box to agree to <b>terms of service</b> and continue the registration</label>
            </div>
            <button class="btn btn-secondary btn-lg" name="signIn">Registrate</button>
        </div>
    </div>
</body>
</html>