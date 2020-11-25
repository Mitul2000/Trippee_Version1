
<?php

$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if(isset($_POST)){
    $username = $_POST['Username'];
    $tripid = $_POST['tripid'];
    $owner = $_POST['Owner'];    
}

$query = "SELECT * FROM users WHERE (username = '$username');";
$sql_data = $mysqli -> query($query);

if (mysqli_num_rows($sql_data) != 0){ 

$mysqli -> query("INSERT INTO trippe.members (username, tripid) VALUES ('$username', '$tripid')");
echo '<form id="myForm" action="viewmembers.php" method="post">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
echo '<input type="hidden" name="Username" value="'.$owner.'">';
echo '</form>';
echo '<script type="text/javascript">';
echo "document.getElementById('myForm').submit();";
echo '</script>';
}
else{
echo '<script>alert("no users")</script>';
echo '<form id="myForm" action="viewmembers.php" method="post">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
echo '<input type="hidden" name="Username" value="'.$owner.'">';
echo '</form>';
echo '<script type="text/javascript">';
echo "document.getElementById('myForm').submit();";
echo '</script>';
}
?>