
<?php

header('Content-Type: application/json');
$category =  $_COOKIE["category"];
$del = ' 00:00:00';
$date = '2015-08-01';
$fDate =  $_COOKIE["fDate"].$del;
$lDate =   $_COOKIE["lDate"].$del;
$dr =  $_COOKIE["dr"];

//echo $_POST['category'];
if($dr == '5')
{
	$sqlQuery = "select time,$category from info where time>='$fDate' AND time<'$lDate' limit 5";
}

if($dr == '10')
{
	$sqlQuery = "select time,$category from info where time>='$fDate' AND time<'$lDate' limit 10";
}

if($dr == '100')
{
	$sqlQuery = "select time,$category from info where time>='$fDate' AND time<'$lDate' limit 100";
}
if($dr == '200')
{
	$sqlQuery = "select time,$category from info where time>='$fDate' AND time<'$lDate' limit 200";
}
if($dr == 'ALL')
{
	$sqlQuery = "select time,$category from info where time>='$fDate' AND time<'$lDate'";
}


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

