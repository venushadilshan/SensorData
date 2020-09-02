<!DOCTYPE html>
<html>

<head>
    <title></title>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="css/theme.css">

</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: transparent;">
        <a class="navbar-brand" href="#">Sensor Data Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="upload.php">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="reportUi.php">Report Generator</a>
                </li>

            </ul>

        </div>
    </nav>

    <div class="container main-container text-center" style="width: 100%; height:95vh; margin-top:40px; ">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong >Tip! </strong> Click on a Category Label to Filter the Chart.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        <canvas id="myChart" style="background-color: #222A3F; padding:10px;" width="100%"></canvas>

    </div>


    <script>
        //read the cookies
        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        var x = [];
        var y = [];
        var y2 = [];
        var y3 = [];
        var y4 = [];
        var y5 = [];
        //JSON read
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {

            if (this.readyState == 4 && this.status == 200) {

                var dataObj = JSON.parse(this.responseText);




                for (var i = 0; i < dataObj.length; i++) {
                    var obj = dataObj[i];

                    x.push(obj.time);
                    //decide the category by cookies value
                    y.push(obj.dust);
                    y2.push(obj.temp);
                    y3.push(obj.co2);
                    y4.push(obj.light);
                    y5.push(obj.humidity);



                }


                var ctx = document.getElementById('myChart');
                //setting the chart topic. concatinating category and date range
                var clabel = getCookie('category').toUpperCase() + " " + getCookie('fDate').toUpperCase() + " to " + getCookie('lDate').toUpperCase();
                var myChart = new Chart(ctx, {


                    type: 'line',
                    data: {
                        //x axis
                        labels: x,
                        datasets: [{
                                label: 'Dust',
                                data: y,
                                backgroundColor: [

                                    'rgba(255, 99, 132, 1)'


                                ],
                                borderColor: [

                                    'rgba(255, 99, 132, 1)'


                                ],
                                borderWidth: 1


                            },

                            {
                                label: 'Temperature',
                                data: y2,
                                backgroundColor: [


                                    'rgba(54, 162, 235, 1)'

                                ],
                                borderColor: [


                                    'rgba(54, 162, 235, 1)'

                                ],
                                borderWidth: 1


                            },
                            {
                                label: 'CO2',
                                data: y3,
                                backgroundColor: [


                                    'rgba(71, 157, 92, 1)'

                                ],
                                borderColor: [


                                    'rgba(71, 157, 92, 1)'

                                ],
                                borderWidth: 1


                            },
                            {
                                label: 'Humidity',
                                data: y5,
                                backgroundColor: [


                                    'rgba(255, 206, 86)'

                                ],
                                borderColor: [


                                    'rgba(255, 206, 86)'

                                ],
                                borderWidth: 1


                            },
                            {
                                label: 'Light',
                                data: y4,
                                backgroundColor: [


                                    'rgba(80, 10, 112)'

                                ],
                                borderColor: [


                                    'rgba(80, 10, 112)'

                                ],
                                borderWidth: 1


                            }
                        ]
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

            }
        };
        xmlhttp.open("GET", "data.php", true);
        xmlhttp.send();
    </script>





    <script>

    </script>
    
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>