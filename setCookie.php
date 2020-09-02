<?php
//settting cookies for category and date range. All cokkis are read by chart.php
$cookie_name = "category";
$cookie_value =  $_POST['category'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day


$cookie_name = "fDate";
$cookie_value =  $_POST['fDate'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$cookie_name = "lDate";
$cookie_value =  $_POST['lDate'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$cookie_name = "dr";
$cookie_value =  $_POST['dataRange'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
 if ( $_POST['category']=='all')
 {
    header("Location:allChart.php");
 }

//redirect to the chart

else{
    header("Location:chart.php");
}



?>