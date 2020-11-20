<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}


if(isset($_POST)){
    $username = $_POST['Username'];
    $tripid = $_POST['tripid'];
    $member_id = $_POST['member_id'];
    $description = $_POST['Description'];
    $value = $_POST['Value'];    
}

$mysqli -> query("INSERT INTO individual_entries (description, tripid, value, username, member_id) VALUES ('$description','$tripid','$value','$username', '$member_id')");

echo '<form id="myForm" action="viewindbudget.php" method="post">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
echo '<input type="hidden" name="Username" value="'.$username.'">';
echo '</form>';
echo '<script type="text/javascript">';
echo "document.getElementById('myForm').submit();";
echo '</script>';

?>