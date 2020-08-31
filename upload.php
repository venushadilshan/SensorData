<?php 
//venusha 2020
$connect = mysqli_connect("localhost","root","","ac");

if(isset($_POST["submit"]))
{
    if($_FILES['file']['name'])
    {
        $filename = explode('.',$_FILES['file']['name']);
        if($filename[1]=='csv')
        {
            $handle = fopen ($_FILES['file']['tmp_name'],"r");
            fgetcsv($handle);
            while($data = fgetcsv($handle))
            {
                $time = mysqli_real_escape_string($connect,$data[0]);
                $power = mysqli_real_escape_string($connect,$data[1]);
                $temp = mysqli_real_escape_string($connect,$data[2]);
                $humidity = mysqli_real_escape_string($connect,$data[3]);
                $light = mysqli_real_escape_string($connect,$data[4]);
                $co2 = mysqli_real_escape_string($connect,$data[5]);
                $dust = mysqli_real_escape_string($connect,$data[6]);
                
                $sql = "INSERT INTO info (time,power,temp,humidity,light,co2,dust) VALUES ('$time','$power','$temp','$humidity','$light','$co2','$dust')";
                mysqli_query($connect,$sql);

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
    <title>Dashboard</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-3">
          <div class="menu-bar">
            
          </div>
        </div>
        <div class="col-9">
          <form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" >
    <input type="submit" name="submit" value="Upload">
    </form></div>
      </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>

