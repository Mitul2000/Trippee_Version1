<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if(isset($_POST)){
    $username = $_POST['Username']; 
    $tripid = $_POST['tripid'];  
    $carname = $_POST['carName'];
    $seats = $_POST['quantity'];
}

$mysqli ->query("INSERT INTO travel_options (tripid, objectname) VALUES ('$tripid','$carname')");

$sql_data = $mysqli -> query("SELECT objectid FROM travel_options  WHERE tripid = '$tripid' AND objectname = '$carname'");

$row = $sql_data->fetch_assoc();
$objectid = $row['objectid'];

$mysqli ->query("INSERT INTO cars (objectid,seats) VALUES('$objectid','$seats')");

echo '<form id="myForm" action="viewtraveloptions.php" method="post">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
echo '<input type="hidden" name="Username" value="'.$username.'">';
echo '</form>';
echo '<script type="text/javascript">';
echo "document.getElementById('myForm').submit();";
echo '</script>';

?>