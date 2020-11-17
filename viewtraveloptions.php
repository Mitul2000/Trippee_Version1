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

?>

<form method="post" action="cars.php">
<?php        
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        echo '<input type="hidden" name="Username" value="'.$username.'">';
       
?>
    <input type="submit" value="Add Cars">
</form>
<form method="post" action="customtravel.php">
<?php        
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        echo '<input type="hidden" name="Username" value="'.$username.'">';
       
?>
    <input type="submit" value="Custom travel">
</form>

<?php //-------------------table ---------------- ?>
<div id="triplist">
	<table id="triptable">
		<tbody>    
<?php
$query = "SELECT objectid, objectname  FROM travel_options  WHERE tripid= '$tripid' AND EXISTS (SELECT objectid FROM cars WHERE objectid = travel_options.objectid);";
$sql_data = $mysqli -> query($query);

    while ($row = $sql_data->fetch_assoc()){
        

        echo '<tr>';
        echo '<td>';
        echo '<form method="post" action="viewcar.php">';
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        echo '<input type="hidden" name="Username" value="'.$username.'">';
        echo '<input type="hidden" name="objectid" value="'.$row['objectid'].'">';
        echo '<input type="submit" value="'.$row['objectname'].'">';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        
    }

?>
<?php
$sql_datatwo = $mysqli -> query("SELECT objectid, objectname FROM travel_options WHERE tripid= '$tripid' AND EXISTS (SELECT objectid FROM custom_travels WHERE objectid = travel_options.objectid)");

        while ($rowtwo = $sql_datatwo->fetch_assoc()){
            echo '<tr>';
            echo '<td>';
            echo '<form method="post" action="viewcustomtravels.php">';
            echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
            echo '<input type="hidden" name="Username" value="'.$username.'">';
            echo '<input type="hidden" name="objectid" value="'.$rowtwo['objectid'].'">';
            echo '<input type="submit" value="'.$rowtwo['objectname'].'">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
    

?>
        </tbody>
    </table>
</div>
