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
    $destination = $_POST['destination'];
    $priority = $_POST['priority'];  
    $member_id = $_POST['member_id']; 
}


$result = $mysqli -> query("INSERT INTO destinations_Car (objectid, priority, location) VALUES ('$objectid','$priority','$destination')");

echo '<form id="myForm" action="viewcar.php" method="post">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
echo '<input type="hidden" name="Username" value="'.$username.'">';
echo '<input type="hidden" name="objectid" value="'.$objectid.'">';
echo '<input type="hidden" name="member_id" value="'.$member_id.'">';
echo '</form>';
echo '<script type="text/javascript">';
echo "document.getElementById('myForm').submit();";
echo '</script>';
?>
