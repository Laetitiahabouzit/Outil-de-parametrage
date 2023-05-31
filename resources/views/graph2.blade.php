<!-- <h1>Résultats de la requête sur la table "scenario"</h1>
<ul>
    @foreach ($scenarios as $scenario)
        <li>{{ $scenario->nom }}</li>
    @endforeach
</ul> -->

<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<canvas id="myChart" style="width:100%;max-width:700px"></canvas>

<script>
var xyValues = [
  {x:50, y:7},
  {x:60, y:8},
  {x:70, y:8},
  {x:80, y:9},
  {x:90, y:9},
  {x:100, y:9},
  {x:110, y:10},
  {x:120, y:11},
  {x:130, y:14},
  {x:140, y:14},
  {x:150, y:15}
];

new Chart("myChart", {
  type: "scatter",
  data: {
    datasets: [{
      pointRadius: 4,
      pointBackgroundColor: "rgb(0,0,255)",
      data: xyValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      xAxes: [{ticks: {min: 40, max:160}}],
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});
</script>

</body>
</html>










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
<script src="https://cdn.jsdelivr.net/npm/chart.js/dist/Chart.min.js"></script>

<script>
const queryString = window.location.search;

const urlParams = new URLSearchParams(queryString);

const idtest = urlParams.get('idtest');
console.log(idtest);

const { origin } = window.location;
console.log(origin);

const requete = fetch(`/api/graph-data?idtest=${idtest}`)
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
</script> -->
