<?php
//Variablar
$colorNames;

// Hämta sidan
$site = file_get_contents('https://developer.mozilla.org/en-US/docs/Web/CSS/color_value');

//Vart början av det jag vill ha är
$colorsStart = strpos($site, '<table id="colors_table">');
#var_dump($colorsStart);

//Vart slutet av det jag vill ha är
$colorsEnd = strpos($site, '<h3 id="Lighter_and_darker_greens">', $colorsStart);
#var_dump($colorsEnd);
 
//innehållet jag vill ha
$colorList = substr($site, $colorsStart, $colorsEnd - $colorsStart);
#echo $colorList;

//Hämta ut alla namn på alla CSS förger
preg_match_all('/<td style="text-align: center;"><code>(.*?)</', $colorList, $newColor);
$colorNames = $newColor[1];