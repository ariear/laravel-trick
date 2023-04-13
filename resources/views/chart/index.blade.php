<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@200;300;400;500&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Kodchasan:ital,wght@0,300;1,200;1,300&family=Montserrat:ital,wght@0,200;0,300;0,800;1,200;1,300;1,400;1,500;1,600;1,700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Parisienne&family=Playball&family=Poppins:ital,wght@0,100;0,200;0,300;0,800;0,900;1,100;1,200;1,300&family=Roboto+Condensed:wght@300;400;700&family=Roboto+Mono:ital,wght@0,100;1,100&family=Roboto:ital,wght@0,100;0,300;1,100&family=Rubik+Beastly&family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>How to Use Charts.JS in Laravel 9? - Mywebtuts.com</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Mono', monospace;
    }
    h1{
        text-align: center;
        font-size:35px;
        font-weight:900;
    }
</style>

<body>
    <h1>How to Use Charts.JS in Laravel</h1>
    <canvas id="myChart" height="100px"></canvas>
    <canvas id="barChart" height="100px"></canvas>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">

    let labels = {{ Js::from($labels) }}
    let users = {{ Js::from($data) }}
    let lateryearuser = {{ Js::from($lateryearuser) }}

    const myChart = document.getElementById('myChart');
    const barChart = document.getElementById('barChart');

    new Chart(myChart, {
    type: 'line', // doughnut, line, polarArea, radar
    data: {
      labels: labels,
      datasets: [{
        label: 'Pengguna tahun sekarang',
        data: users,
        borderWidth: 1
      },{
        label: 'Pengguna tahun lalu',
        data: lateryearuser,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

    new Chart(barChart, {
    type: 'bar', // doughnut, line, polarArea, radar
    data: {
      labels: labels,
      datasets: [{
        label: 'Pengguna tahun sekarang',
        data: users,
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
</html>
