<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if(isset($_POST)){
    $username = $_POST['Username']; 
    $tripid = $_POST['tripid'];
    $objectid = $_POST['objectid'];
    $seatnum = $_POST['seat'];
}
$seat = $mysqli -> query("INSERT INTO passengers (objectid, username, seatnumber)VALUES ('$objectid','$username','$seatnum')");

echo '<form id="myForm" action="viewcar.php" method="post">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
echo '<input type="hidden" name="Username" value="'.$username.'">';
echo '<input type="hidden" name="objectid" value="'.$objectid.'">';
echo '</form>';
echo '<script type="text/javascript">';
echo "document.getElementById('myForm').submit();";
echo '</script>';
?>