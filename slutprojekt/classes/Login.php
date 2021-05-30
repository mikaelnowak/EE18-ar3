<?php
/**
 * Form validator
 * 
 * PHP version 7
 * @category   PHP class
 * @author     xx yy <mikael.nowak@elev.ga.ntig.se>
 * @license    PHP CC
 */

/* 
Getting all needed information to log in and go to another website

set() - Get all user inputs with following arguments (All inputs from array)
username() - Log in function with following arguments (All usernames in DB in a array)
password() - Confirming password with following arguments (The users hash from DB, The location the user will go to when logged in)
*/

class Login
{
    // Properties
    private $data;

    // Methods
    public function set($getData)
    {
        $this->data = $getData;
    }

    public function username($dbUsername)
    {
        foreach ($dbUsername as $usernames) {
            if ($usernames['username'] == $this->data['username']) {
                return $responce = $this->data['username'];
            }
        }
    }
    
    public function password($checkPassword, $changeLocation)
    {
        session_start();
        $confirmPassword = password_verify($this->data['password'], $checkPassword['hash']);
        if (!$confirmPassword) {
            echo '-';
        } else {
            $_SESSION['user'] = $this->data['username'];
            echo header("Location: $changeLocation");
        }
    }
}