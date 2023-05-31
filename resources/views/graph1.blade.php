<div class="taille">
  <canvas id="myChart1"></canvas>
</div>
<div class="taille">
  <canvas id="myChart2"></canvas>
</div>
<div class="taille">
  <canvas id="myChart3"></canvas>
</div>

<style>
  .taille{
    width: 50%;
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const queryString = window.location.search;

const urlParams = new URLSearchParams(queryString);

const idtest = urlParams.get('idtest');
console.log(idtest);

const { origin } = window.location;
console.log(origin);

const requete = fetch(`${origin}/No Laravel/api.php?idtest=${idtest}`)
  .then(function(reponse){
    return reponse.json();
  })
  .then(function(data) {
    const dataPort1 = data.filter(d => d.port === "1");
    const dataPort2 = data.filter(d => d.port === "2");
    const dataPort3 = data.filter(d => d.port === "3");
    
    createGraph(dataPort1, "Port 1", "myChart1");
    createGraph(dataPort2, "Port 2", "myChart2");
    createGraph(dataPort3, "Port 3", "myChart3");
  });

function createGraph(data, portLabel, chartId) {
  const labels = data.map((d) => d.tiknum);
  
  const dataChart = {
    labels: labels,
    datasets: [
      {
        label: 'Upload',
        data: data.map((d) => d.up),
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
        fill: true,
      },
      {
        label: 'Download',
        data: data.map((d) => d.down),
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1,
        fill: true,
      },
      {
        label: 'Ping',
        data: data.map((d) => d.ping),
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1,
        fill: true,
      }
    ]
  };

  const configChart = {
    type: 'line',
    data: dataChart,
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: `Performance du port ${portLabel}`
        },
      },
      scales: {
        x: {
          display: true,
          title: {
            display: true,
            text: 'Temps (ms)'
          }
        },
        y: {
          display: true,
          title: {
            display: true,
            text: 'Nombre de tests'
          },
          suggestedMin: 0,
          suggestedMax: 1,
        }
      }
    }
  };

  const myChart = new Chart(
    document.getElementById(chartId),
    configChart
  );
}
</script>





















<!-- <!DOCTYPE html>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var idtest = php echo json_encode($idtest); ?>;
    </script>
    <script src="{{ asset('js/graph.js') }}"></script>
</body>
</html> -->





<!-- <div class="taille">
  <canvas id="myChart1"></canvas>
</div>
<div class="taille">
  <canvas id="myChart2"></canvas>
</div>
<div class="taille">
  <canvas id="myChart3"></canvas>
</div>

<style>
  .taille{
    width: 50%;
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const queryString = window.location.search;

const urlParams = new URLSearchParams(queryString);

const idtest = urlParams.get('idtest');
console.log(idtest);

const { origin } = window.location;
console.log(origin);

const requete = fetch(`${origin}/edsa-projet/api.php?idtest=${idtest}`)
  .then(function(reponse){
    return reponse.json();
  })
  .then(function(data) {
    const dataPort1 = data.filter(d => d.port === "1");
    const dataPort2 = data.filter(d => d.port === "2");
    const dataPort3 = data.filter(d => d.port === "3");
    
    createGraph(dataPort1, "Port 1", "myChart1");
    createGraph(dataPort2, "Port 2", "myChart2");
    createGraph(dataPort3, "Port 3", "myChart3");
  });

function createGraph(data, portLabel, chartId) {
  const labels = data.map((d) => d.tiknum);
  
  const dataChart = {
    labels: labels,
    datasets: [
      {
        label: 'Upload',
        data: data.map((d) => d.up),
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
        fill: true,
      },
      {
        label: 'Download',
        data: data.map((d) => d.down),
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1,
        fill: true,
      },
      {
        label: 'Ping',
        data: data.map((d) => d.ping),
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1,
        fill: true,
      }
    ]
  };

  const configChart = {
    type: 'line',
    data: dataChart,
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: `Performance du port ${portLabel}`
        },
      },
      scales: {
        x: {
          display: true,
          title: {
            display: true,
            text: 'Temps (ms)'
          }
        },
        y: {
          display: true,
          title: {
            display: true,
            text: 'Nombre de tests'
          },
          suggestedMin: 0,
          suggestedMax: 1,
        }
      }
    }
  };

  const myChart = new Chart(
    document.getElementById(chartId),
    configChart
  );
}
</script>






@section('content')
<div class="taille">
  <canvas id="myChart1"></canvas>
</div>
<div class="taille">
  <canvas id="myChart2"></canvas>
</div>
<div class="taille">
  <canvas id="myChart3"></canvas>
</div>

<style>
  .taille{
    width: 50%;
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const idtest = @json($idtest); // Récupère la variable $idtest passée depuis le contrôleur

const requete = fetch(`/edsa-projet/api?idtest=${idtest}`)
  .then(function(reponse){
    return reponse.json();
  })
  .then(function(data) {
    const dataPort1 = data.filter(d => d.port === "1");
    const dataPort2 = data.filter(d => d.port === "2");
    const dataPort3 = data.filter(d => d.port === "3");
    
    createGraph(dataPort1, "Port 1", "myChart1");
    createGraph(dataPort2, "Port 2", "myChart2");
    createGraph(dataPort3, "Port 3", "myChart3");
  });

function createGraph(data, portLabel, chartId) {
  const labels = data.map((d) => d.tiknum);
  
  const dataChart = {
    labels: labels,
    datasets: [
      {
        label: 'Upload',
        data: data.map((d) => d.up),
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
        fill: true,
      },
      {
        label: 'Download',
        data: data.map((d) => d.down),
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1,
        fill: true,
      },
      {
        label: 'Ping',
        data: data.map((d) => d.ping),
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1,
        fill: true,
      }
    ]
  };

  const configChart = {
    type: 'line',
    data: dataChart,
    options: {
      responsive: true,
      plugins: {
        title: {
          display: true,
          text: `Performance du port ${portLabel}`
        },
      },
      scales: {
        x: {
          display: true,
          title: {
            display: true,
            text: 'Temps (ms)'
          }
        },
        y: {
          display: true,
          title: {
            display: true,
            text: 'Nombre de tests'
          },
          suggestedMin: 0,
          suggestedMax: 1,
        }
      }
    }
  };

  const myChart = new Chart(
    document.getElementById(chartId),
    configChart
  );
}
</script>
@endsection -->
