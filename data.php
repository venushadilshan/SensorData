
<?php

header('Content-Type: application/json');
$category =  $_COOKIE["category"];
$del = ' 00:00:00';
$date = '2015-08-01';
$fDate =  $_COOKIE["fDate"].$del;
$lDate =   $_COOKIE["lDate"].$del;;

//echo $_POST['category'];

$sqlQuery = "select time,$category from info where time>='$fDate' AND time<'$lDate'";

$conn = mysqli_connect("localhost","root","","ac");

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);
echo json_encode($data);


//header("Location:chart.php");


?>

