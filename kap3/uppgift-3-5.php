<?php

/* Gör ett skript som är en lånekalkylator. Mha radioknappar ska användaren kunna välja mellan 1, 3 och 5 års lånetid. I en ruta ska användaren skriva i lånebeloppet och i nästa räntan i hela procent. Programmet ska sedan räkna ut den totala lånekostnaden. Räknas ut genom ränta på ränta-principen, årsvis). Så för ett tvåårigt lån på 5000 med räntan 4% skulle alltså lånekostnaden bli 5000*1,04*1,04 - 5000. Observera att lånet är "amorteringsfritt". */

/*
* PHP version 7
* @category   Lånekalkylator
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
*/

$belop = $_POST['belop'];
$ränta = $_POST['ränta'];
$tid = $_POST['tid'];
$antalRänta;

/* switch ($tid) {
    case "1":
        $antalRänta = $belop * ($ränta / 100 + 1);
        break;
    case "3":
        $antalRänta = $belop;
        for ($i=0; $i < 3; $i++) { 
            $antalRänta *= $ränta / 100 + 1;
        }
        //$antalRänta = $belop * ($ränta / 100 + 1);
        break;
    case "5":
        $antalRänta = $belop;
        for ($i=0; $i < 5; $i++) { 
            $antalRänta *= $ränta / 100 + 1;
        }
        break;
}

echo "<p>Du e skyldig banken $antalRänta:-</p>"; */

$antalRänta = $belop;
for ($i=0; $i < $tid; $i++) { 
    $antalRänta *= $ränta / 100 + 1;
}

echo "<p>Du e skyldig $antalRänta:- banken</p>"
?>