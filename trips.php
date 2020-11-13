<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}


if(isset($_POST)){
    $username = $_POST['Username'];    
}

?>
<html>
<head>
    <title>Trips</title>
</head>
<body>
    <div id="newtrip">
    <form method="post" action="tripform.php">
    
<?php
    echo '<input type="hidden" name="Username" value="'.$username.'">';
?>
    <input id="submit" type="submit" value="CreateTrip">
    </form>
    </div>

    <div id="triplist">
	<table id="triptable">
		
		<tbody>    

<?php
$query = "SELECT trips.tripid, trips.tripname, trips.datecreated  FROM trips  WHERE tripid IN (SELECT tripid FROM members WHERE username = '$username');";
$sql_data = $mysqli -> query($query);

    while ($row = $sql_data->fetch_assoc()){

        echo '<tr>';
        echo '<td>';
        echo '<form method="post" action="viewtrip.php">';
        echo '<input type="hidden" name="tripid" value="'.$row['tripid'].'">';
        echo '<input type="hidden" name="Username" value="'.$username.'">';
        echo '<input type="submit" value="'.$row['tripname'].' '.substr($row['datecreated'], 0, -8).'">';
        echo '</form>';
        echo '<td>';
        echo '</tr>';
        
    }

?>

        </tbody>
    </table>
</div>
</body>
</html>
