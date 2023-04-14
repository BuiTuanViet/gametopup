@extends('admin.master.layout')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<div class="chart-container" style="position: relative; height:40vh; width:80vw">
    <canvas id="myChart" width="20" height="20"></canvas>
</div>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var charHeight = document.getElementById('myChart');
charHeight.height = 20;
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'Time Keeping',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

@endsection