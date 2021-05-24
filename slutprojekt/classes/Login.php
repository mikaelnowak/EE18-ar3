<?php

/**
 * Form validator
 * 
 * PHP version 7
 * @category   PHP class
 * @author     xx yy <mikael.nowak@elev.ga.ntig.se>
 * @license    PHP CC
 */

class Login
{
    // Properties
    private $errors = [];
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
    
    public function password($checkPassword, $newLocation)
    {
        $confirmPassword = password_verify($this->data['password'], $checkPassword['hash']);
        if (!$confirmPassword) {
            echo '-';
        } else {
            echo header("Location: $newLocation");
        }
    }
}