<?php
//Ta emot text
$saveCordinate = filter_input(INPUT_POST, 'texten', FILTER_SANITIZE_STRING);

$textfil = fopen('textfil.tsv', 'a');
fwrite($textfil, "$saveCordinate\n");
fclose($textfil);