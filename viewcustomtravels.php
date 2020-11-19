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
}
echo '<form method="post" action="viewtraveloptions.php">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
echo '<input type="hidden" name="Username" value="'.$username.'">';
echo '<input type="submit" value="Back">';
echo '</form>';

echo '<form method="post" action="insertdestination.php">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
echo '<input type="hidden" name="Username" value="'.$username.'">';
echo '<input type="hidden" name="objectid" value="'.$objectid.'">';
echo 'Destination: <input type="text" name="destination" required>';
echo 'Priority: <input type="number" name="priority" min="1" required>';
echo '<input type="submit" value="Add Destination">';
echo '</form>';
?>

<div id="triplist">
	<table id="triptable">
		<tbody>    
<?php
$query = "SELECT *  FROM destinations  WHERE objectid= '$objectid' ORDER BY priority";
$sql_data = $mysqli -> query($query);

    while ($row = $sql_data->fetch_assoc()){
        

        echo '<tr>';
        echo '<td>'.$row['priority'].'</td>';
        echo '<td>'.$row['location'].'</td>';
        echo '</tr>';
        
    }

?>
        </tbody>
    </table>
</div>