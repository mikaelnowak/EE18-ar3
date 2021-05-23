<?php

    class User
    {
        public $username = 'ryu';
        public $email = 'ryu@gmail.com';

        public function addFriend()
        {
            return $this->username . "ny";
        }
    }

    $user1 = new User();
    $user2 = new User();

    echo $user1->username;
    echo $user1->email;
    echo $user1->addFriend();

?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>