<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/chxscenario.css') }}" media="screen" type="text/css" />
</head>
<body>
    <div class="taille">
        <canvas id="myChart1"></canvas>
    </div>
    <div class="taille">
        <canvas id="myChart2"></canvas>
    </div>
    <div class="taille">
        <canvas id="myChart3"></canvas>
    </div>


    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.umd.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/Chart.min.js"></script>
    <script>
        var idtest = <?php echo json_encode($idtest); ?>;
    </script>
    <script src="{{ asset('js/graph.js') }}"></script>
</body>
</html>
