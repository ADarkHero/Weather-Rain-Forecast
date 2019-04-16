<script src="js/Chart.js"></script>

<div class="containter">
    <div class="row">
        <div class="col-12 col-lg-6"><h3 class="mt-5">Temperatures this week</h3><canvas id="temperatures"></canvas></div> 
        <div class="col-12 col-lg-6"><h3 class="mt-5">Rain this week</h3><canvas id="rain"></canvas></div> 
    </div>
</div>   

<script>  
var ctx = document.getElementById("temperatures");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            <?php
                $valuestring = "";
                foreach ($highestTemp as $key => $value) {
                    $valuestring .= '"'.$key.'", ';
                }
                $valuestring = substr($valuestring, 0, -2); //Cut last ,
                echo $valuestring;
            ?>
        ],
        datasets: [{
            label: '',
            data: [
                <?php
                    $valuestring = "";
                    foreach ($highestTemp as $value) {
                        $valuestring .= $value.", ";
                    }
                    $valuestring = substr($valuestring, 0, -2); //Cut last ,
                    echo $valuestring;
                ?>
            ],
            backgroundColor: [
                'rgba(75, 192, 192, 0.4)',
                'rgba(75, 192, 192, 0.4)',
                'rgba(75, 192, 192, 0.4)',
                'rgba(75, 192, 192, 0.4)',
                'rgba(75, 192, 192, 0.4)',
                'rgba(75, 192, 192, 0.4)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1        },
        {
            label: '',
            data: [
                <?php
                    $valuestring = "";
                    foreach ($lowestTemp as $value) {
                        $valuestring .= $value.", ";
                    }
                    $valuestring = substr($valuestring, 0, -2); //Cut last ,
                    echo $valuestring;
                ?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.4)',
                'rgba(255, 99, 132, 0.4)',
                'rgba(255, 99, 132, 0.4)',
                'rgba(255, 99, 132, 0.4)',
                'rgba(255, 99, 132, 0.4)',
                'rgba(255, 99, 132, 0.4)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1        }]
    },
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    fontSize: 11                }
            }],
            xAxes: [{
                ticks: {
                    fontSize: 11                }
            }]
        } 
    }
});
</script>

<script>  
var ctx = document.getElementById("rain");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            <?php
                $valuestring = "";
                foreach ($highestTemp as $key => $value) {
                    $valuestring .= '"'.$key.'", ';
                }
                $valuestring = substr($valuestring, 0, -2); //Cut last ,
                echo $valuestring;
            ?>
        ],
        datasets: [{
            label: '',
            data: [
                <?php
                    $valuestring = "";
                    foreach ($rainPerDay as $value) {
                        $valuestring .= $value.", ";
                    }
                    $valuestring = substr($valuestring, 0, -2); //Cut last ,
                    echo $valuestring;
                ?>
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.4)',
                'rgba(54, 162, 235, 0.4)',
                'rgba(54, 162, 235, 0.4)',
                'rgba(54, 162, 235, 0.4)',
                'rgba(54, 162, 235, 0.4)',
                'rgba(54, 162, 235, 0.4)' 
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1        }]},
    options: {
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    fontSize: 11                }
            }],
            xAxes: [{
                ticks: {
                    fontSize: 11                }
            }]
        } 
    }
});
</script>
