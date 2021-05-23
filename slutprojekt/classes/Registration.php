<?php

/**
 * Form validator
 * 
 * PHP version 7
 * @category   PHP class
 * @author     xx yy <mikael.nowak@elev.ga.ntig.se>
 * @license    PHP CC
 */

class Registration
{
    // Properties
    private $errors = [];
    private $data;

    // Methods
    public function set($getData)
    {
        $this->data = $getData;
    }

    public function registerName($name)
    {
        if (!preg_match('/[a-zåäöA-Zåäö]{1,20}/', $this->data["$name"])) {
            $this->errors["$name"][] = "&#10005; Your name cant contain numbers, special letters (é, á, exe) or special characters (', \", exe)";
        }
    }

    public function registerUsername($dbUsernames)
    {
        $usernames = '';
        if (!preg_match("/[a-zA-Z0-9]/", $this->data['regUsername'])) {
            $this->errors['uname'][] = '&#10005; The username must use a-z, A-Z or 0-9.';
        }
        if (!preg_match('/.{6,12}/', $this->data['regUsername'])) {
            $this->errors['uname'][] = '&#10005; The username must be 6-12 characters long';
        }
        foreach ($dbUsernames as $usernames) {
            if ($usernames['username'] == $this->data['regUsername']) {
                $this->errors['uname'][] = '&#10005; Someone is using the same username allready, please come up with a new username';
            }
        }
    }

    public function registerEmail($dbEmails)
    {
        if (!filter_var($this->data['regEmail'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['regEmail'][] = '&#10005; Invalid email format';
        }
        foreach ($dbEmails as $emails) {
            if ($emails['email'] == $this->data['regEmail']) {
                $this->errors['regEmail'][] = '&#10005; This email adress is already in use.';
            }
        }
    }

    public function registerPassword()
    {
        if ($this->data['regPassword'] == $this->data['regPasswordConfirmation']) {
            if (!preg_match("/[a-zåäö]/", $this->data['regPassword']) > 0) {
                $this->errors['regPassword'][] = '&#10005; password must contain a least one lwercase character';
            }
            if (!preg_match("/[A-ZÅÄÖ]/", $this->data['regPassword']) > 0) {
                $this->errors['regPassword'][] = '&#10005; password must contain a least one uppercase character';
            }
            if (!preg_match("/[0-9]/", $this->data['regPassword']) > 0) {
                $this->errors['regPassword'][] = '&#10005; password must contain a least one alphanumeric';
            }
            if (!preg_match("/[#%&¤_\*\-\+\@\!\?\(\)\[\]\$£€]/", $this->data['regPassword']) > 0) {
                $this->errors['regPassword'][] = '&#10005; password can\'t contain special character';
            }
            if (!preg_match("/^.{8,40}$/", $this->data['regPassword']) > 0) {
                $this->errors['regPassword'][] = '&#10005; password must be between 8-40 character long';
            }
        } else {
            $this->errors['regPassword'][] = 'The tow passwords dosent match. Please try again';
        }
    }

    public function showErrors($type)
    {
        if (array_key_exists($type, $this->errors)) {
            echo '<div class="alert alert-danger" role="alert">';
            foreach ($this->errors[$type] as $error) {
                echo '<p>' . $error . '</p>';
            }
            echo '</div>';
        }
    }

    public function registerDB()
    {
        if (count($this->errors) == 0) {

            $hash = $this->data['regPassword'];
            $send = password_hash($hash, PASSWORD_DEFAULT);
            
            $response[] = $this->data['regUsername'];
            $response[] = $this->data['regFirstName'];
            $response[] = $this->data['regLastName'];
            $response[] = $this->data['regEmail'];
            $response[] = $send;

            return $response;
        }
    }
}