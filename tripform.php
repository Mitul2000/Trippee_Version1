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
    <title>Trip</title>
</head>
<body>
<div id="tripform">

<form method="post" action="inserttrip.php">

<?php
    $datecreated = date("Y-m-d h:i:s");
    echo '<input type="hidden" name="Username" value="'.$username.'">';
    echo '<input type="hidden" name="Datecreated" value="'.$datecreated.'">';     
?>
    TRIPNAME:<br> <input type="text" name="TripName" required><br><br>
    <input id="submit" type="submit" value="Submit">
</form>


</div>

</body>
</html>
