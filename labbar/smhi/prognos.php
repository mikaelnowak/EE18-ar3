<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h1>10 dagars prognos</h1>
        <canvas id="myChart"></canvas>
    <?php
        $url = "https://opendata-download-metfcst.smhi.se/api/category/pmp3g/version/2/geotype/point/lon/18/lat/59/data.json";

        $json = file_get_contents($url);

        $jsonData = json_decode($json);

        $at = $jsonData->approvedTime;
        echo "<p>Prognosen publicerad $at</p>";

        $ts = $jsonData->timeSeries;

        $tp = "";
        $temp = "";
        foreach ($ts as $td) {
            $vt = $td->validTime;
            $p = $td->parameters;
            $t = $p[10]->values[0];
            
            $tp .= "'$vt', ";
            $temp .= "'$t', ";
        }

        echo "<script>
            const labels = [$tp];

            const data = {
            labels: labels,
            datasets: [{
                label: 'Temp',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [$temp],
                tension: 0.4,
            }]
            };

            const config = {
            type: 'line',
            data,
            options: {}
            };

            var myChart = new Chart(
            document.getElementById('myChart'),
            config
            );
        </script>";
    ?>
    </div>
</body>
</html>