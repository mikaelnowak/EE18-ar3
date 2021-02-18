<?php
$text = 'Min e-post-adress är thohoj02@student.chalmers.se';
$pattern = 'student';
$replace = "TJOOOOOOOOO";
$nytext = preg_replace("/$pattern/", $replace, $text);
echo $nytext;