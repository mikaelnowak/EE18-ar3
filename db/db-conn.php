<?php
$user = "gunnar";
$db = "gunnar";
$host = "localhost";
$pass = "nnWFMiNx8yveWhU5";
?>
+--------+------------+-----------+-----------+----+--------+
| reg    | marke      | modell    | arsmodell | id | pris   |
+--------+------------+-----------+-----------+----+--------+
| ABC123 | Saab       | 9-5       |      2003 |  1 | 130000 |
| DEF123 | Volvo      | S80       |      2002 |  2 | 140000 |
| GHI123 | Mazda      | 626       |      2001 |  3 |  80000 |
| JKL123 | Audi       | A8        |      2001 |  4 | 150000 |
| MNO123 | BMW        | 323       |      1998 |  5 |  60000 |
| PQR123 | Ford       | Mondeo    |      2001 |  6 |  90000 |
| STU123 | Volvo      | 740       |      1987 |  7 |  35000 |
| VYX123 | Volkswagen | Golf      |      1988 |  8 |  40000 |
| ABC456 | Volkswagen | Polo      |      2003 |  9 |  75000 |
| DEF456 | Toyota     | Carina II |      1998 | 10 |  30000 |
+--------+------------+-----------+-----------+----+--------+

Uppgift 1: SELECT * FROM bilar WHERE marke="Volvo" AND arsmodell<=2001;

Uppgift 2: SELECT marke, COUNT(*) FROM bilar GROUP BY marke DESC;

Uppgift 3: SELECT marke, MIN(pris), MAX(pris), SUM(pris) FROM bilar GROUP BY marke;

Uppgift 4: SELECT arsmodell, COUNT(*), AVG(pris) FROM bilar GROUP BY arsmodell DESC;