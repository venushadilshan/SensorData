<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/theme.css" />

  <title>Report Generator</title>
</head>

<body>
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
  <div class="container flex-container">
    <div class="main-container" style="background-color: #222A3F; padding:20px; color:white; border-radius:10px;">
      <form method="POST" action="setCookie.php">
        <div class="form-group">
          <label for="exampleInputEmail1">Category:</label>
        
          
          <select class="custom-select" id="category" name="category">
    <option selected>Choose...</option>
    <option value="all">ALL</option>
    <option value="dust">Dust</option>
    <option value="temp">Temperature</option>
    <option value="co2">CO2</option>
    <option value="humidity">Humidity</option>
    <option value="light">Light</option>
  </select>


        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Data Set:</label>
        
        
          <select class="custom-select" id="dataRange" name="dataRange">
    <option selected>Choose...</option>
    <option value="5">5</option>
    <option value="10">10</option>
    <option value="100">100</option>
    <option value="200">200</option>
    <option value="500">500</option>
    <option value="ALL">ALL</option>
  </select>
  <small id="emailHelp" class="form-text text-muted">Larger datasets can cause loading lags and crashes.</small>

        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Date Range:</label>
          <input type="date" class="form-control" id="fDate" name="fDate" aria-describedby="emailHelp">
         
        



        </div>
        <div class="form-group">
          
      
         
          <input type="date" class="form-control" id="lDate" name="lDate" aria-describedby="emailHelp">



        </div>


        <button type="submit" class="btn btn-primary float-right">Generate Report</button>
      </form>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>