<?php
//venusha 2020
$connect = mysqli_connect("localhost", "root", "", "ac");
$temp;
$humidity;
$co2;
$power;
$light;
$dust2;
if (isset($_POST["submit"])) {
  if ($_FILES['file']['name']) {
    $filename = explode('.', $_FILES['file']['name']);
    if ($filename[1] == 'csv') {
      $handle = fopen($_FILES['file']['tmp_name'], "r");
      fgetcsv($handle);
      while ($data = fgetcsv($handle)) {
        $time = mysqli_real_escape_string($connect, $data[0]);
        $power = mysqli_real_escape_string($connect, $data[1]);
        $temp = mysqli_real_escape_string($connect, $data[2]);
        $humidity = mysqli_real_escape_string($connect, $data[3]);
        $light = mysqli_real_escape_string($connect, $data[4]);
        $co2 = mysqli_real_escape_string($connect, $data[5]);
        $dust = mysqli_real_escape_string($connect, $data[6]);

        $sql = "INSERT INTO info (time,power,temp,humidity,light,co2,dust) VALUES ('$time','$power','$temp','$humidity','$light','$co2','$dust')";
        mysqli_query($connect, $sql);
      }
      fclose($handle);
      //echo "doneeijeh";
      print "done";
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/theme.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <title>Dashboard</title>
</head>

<body>
<script>
  AOS.init();
</script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="background-color: transparent;">
    <a class="navbar-brand" href="#">Sensor Data Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="upload.php">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reportUi.php">Reports</a>
        </li>

      </ul>

    </div>
  </nav>
  <div class="container-fluid ">
    <div class="row">



      <div class="col-md-4">
        <div class="custom-card"  data-aos="fade-up">

          <h5>Upload File</h5>
          <hr>
          <p> Select & Uplaod .CSV to the Database </p>
          <form method="POST" enctype="multipart/form-data">
            <input type="file" name="file" style="color: white; width:100%; border:0px; background:#E5E5E5;">
            <br><br>
            <input type="submit" name="submit" class="btn btn-primary" style="width: 100%;" value="Upload">
          </form>
        </div>

      </div>


      <div class="col-md-4">
        <div class="custom-card" data-aos="fade-up"   data-aos-duration="800">

          <h5>Dust</h5>
          <hr>
          <p> Number of Data Records in the Database </p>
          <div class="stat-card text-center">
            <h5>
              <?php if (!$connect) {
                die("Connection failed: " . mysqli_connect_error());
              }
              $sql = "SELECT * FROM info ORDER BY time LIMIT 1;";
              $result = mysqli_query($connect, $sql);
              if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                  echo $row["dust"];
                  $temp  = $row["temp"];
                  $humidity  = $row["humidity"];
                  $co2 = $row["co2"];
                  $light = $row["light"];
                  $power = $row["power"];
                  $dust2 = $row["dust"];
                }
              } else {
                echo "0 results";
              }

              mysqli_close($connect);

              ?>
            </h5>
          </div>

        </div>


      </div>

      <div class="col-md-4">
        <div class="custom-card"  data-aos="fade-up" data-aos-duration="1100">

          <h5>Temperature</h5>
          <hr>
          <p> Number of Data Records in the Database </p>
          <div class="stat-card text-center" style="background-color: #F78723;">
            <h5>
              <?php
              echo $temp;
              ?>
            </h5>
          </div>

        </div>


      </div>











      <div class="col-md-4">
        <div class="custom-card"  data-aos="fade-up"  data-aos-duration="1400"> 

          <h5>Humidity</h5>
          <hr>
          <p> Number of Data Records in the Database </p>
          <div class="stat-card text-center" style="background-color: #8D4199;">
            <h5>
              <?php
              echo $humidity;
              ?>
            </h5>
          </div>

        </div>


      </div>


      <div class="col-md-4">
        <div class="custom-card"  data-aos="fade-up"  data-aos-duration="1900">

        <p> Recent Data Analysis </p>
          <canvas id="myChart" height="150%"></canvas> <br>
         <a href="reportUi.php"> <button class="btn btn-success" style="width:100%">Detailed Report</button></a>

        </div>


      </div>

      <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: ['Temp', 'Dust', 'CO2', 'Humidity', 'Power', 'Light'],
            datasets: [{
              label: 'Value',
              data: ["<?php echo $temp; ?>", "<?php echo $temp; ?>", "<?php echo $light; ?>", "<?php echo $power; ?>", "<?php echo $dust2; ?>", "<?php echo $co2; ?>"],
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {

          }
        });
      </script>
    </div>

  </div>

<p class="text-center" style="color: white; margin-bottom:20px; margin-left:20px; position:absolute;  bottom:0;"> ©VENUSHA 2020. www.venusha.com </p>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>