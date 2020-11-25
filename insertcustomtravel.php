<?php
include_once('config.php');

if(isset($_POST)){
    $username = $_POST['Username']; 
    $tripid = $_POST['tripid'];
    $member_id = $_POST['member_id'];  
    $carname = $_POST['carName'];
}

$mysqli ->query("INSERT INTO travel_options (tripid, objectname) VALUES ('$tripid','$carname')");

$sql_data = $mysqli -> query("SELECT objectid FROM travel_options  WHERE tripid = '$tripid' AND objectname = '$carname'");

$row = $sql_data->fetch_assoc();
$objectid = $row['objectid'];

$mysqli ->query("INSERT INTO custom_travels (objectid, username, member_id) VALUES('$objectid','$username','$member_id')");

echo '<form id="myForm" action="viewtraveloptions.php" method="post">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
echo '<input type="hidden" name="Username" value="'.$username.'">';
echo '</form>';
echo '<script type="text/javascript">';
echo "document.getElementById('myForm').submit();";
echo '</script>';

?>