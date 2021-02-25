<?php
session_start();
if (!isset($_SESSION['i'])) {
    $_SESSION['i'] = 2;
} else {
    $_SESSION['i'] += 6;
}

$allaFlaggor = scandir("../flags");

echo "<img src=\"./flags/{$allaFlaggor[$_SESSION['i']]}\">";
echo "<img src=\"./flags/{$allaFlaggor[$_SESSION['i'] + 1]}\">";
echo "<img src=\"./flags/{$allaFlaggor[$_SESSION['i'] + 2]}\">";
echo "<img src=\"./flags/{$allaFlaggor[$_SESSION['i'] + 3]}\">";
echo "<img src=\"./flags/{$allaFlaggor[$_SESSION['i'] + 4]}\">";
echo "<img src=\"./flags/{$allaFlaggor[$_SESSION['i'] + 5]}\">";