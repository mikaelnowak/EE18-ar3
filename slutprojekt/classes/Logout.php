<?php
/**
 * Form validator
 * 
 * PHP version 7
 * @category   PHP class
 * @author     xx yy <mikael.nowak@elev.ga.ntig.se>
 * @license    PHP CC
 */

class Logout
{
    public function username($changeLocation)
    {
        session_start();
        session_destroy();
        header("Location: $changeLocation");
    }
}