<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}


if(isset($_POST)){
    $username = $_POST['Username'];
    $tripid = $_POST['tripid'];    
}

$sql_data = $mysqli -> query("SELECT name, description, time FROM reminders WHERE tripid = '$tripid' ");

echo "<table>"; // start a table tag in the HTML
echo "Reminders:";
while($row = $sql_data->fetch_assoc()){ 
    echo "<tr><td>" . $row['name'] . "</td><td>" . $row['description'] . "</td><td>" . $row['time'] . "</td></tr>";
}

echo "</table>"; //Close the table in HTML

?>

<form method="post" action="viewgroupbudget.php">
<?php        
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        echo '<input type="hidden" name="Username" value="'.$username.'">';
?>
    <input type="submit" value="Group Budget">
</form>

<form method="post" action="viewindbudget.php">
<?php        
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        echo '<input type="hidden" name="Username" value="'.$username.'">';
?>
    <input type="submit" value="Your Budget">
</form>

<form method="post" action="viewtraveloptions.php">
<?php        
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        echo '<input type="hidden" name="Username" value="'.$username.'">';
?>
    <input type="submit" value="Travelling">
</form>

<form method="post" action="createreminders.php">
<?php        
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        echo '<input type="hidden" name="Username" value="'.$username.'">';
?>
    <input type="submit" value="Create Reminder">
</form>

<form method="post" action="viewpolls.php">
<?php        
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        echo '<input type="hidden" name="Username" value="'.$username.'">';
?>
    <input type="submit" value="Polls">
</form>

<?php

$tripowner = $mysqli -> query("SELECT owner FROM trips WHERE tripid = '$tripid' ");

$row = mysqli_fetch_assoc($tripowner);
$owner = $row['owner'];
if ($owner == $username){
    echo '<form method="post" action="viewmembers.php">';
    echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
    echo '<input type="hidden" name="Username" value="'.$username.'">';
    echo '<input type="submit" value="Manage Members">';
    echo '</form>';
}
?>


<form method="post" action="deletetrip.php">
<?php        
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        echo '<input type="hidden" name="Username" value="'.$username.'">';
?>
    <input type="submit" value="Delete Trip">
</form>