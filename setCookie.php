<?php
$cookie_name = "category";
$cookie_value =  $_POST['category'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$cookie_name = "fDate";
$cookie_value =  $_POST['fDate'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$cookie_name = "lDate";
$cookie_value =  $_POST['lDate'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

echo  $_POST['category'];
//echo "<script type = 'text/javascript'> window.location.replace('chart.php'); </script>";
header("Location:chart.php");


?>