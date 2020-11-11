<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");

if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}


if (!empty($_POST)){
    $username = $_POST["Username"];
    $datecreated = $_POST["Datecreated"];
    $tripname = mysqli_real_escape_string($mysqli, $_POST["TripName"]);
    echo $tripname;

    $mysqli -> query("INSERT INTO trippe.trips (owner, tripname, datecreated) VALUES ('$username', '$tripname', '$datecreated')");
    
    $tripowner = $mysqli -> query("SELECT tripid FROM trips WHERE owner = '$username' AND datecreated = '$datecreated' AND tripname = '$tripname' ");
    
    $row = mysqli_fetch_assoc($tripowner);
    $tripid = $row['tripid'];
    
    $mysqli -> query("INSERT INTO trippe.members (username, tripid) VALUES ('$username', '$tripid')");
    
    
    echo '<form id="myForm" action="trips.php" method="post">';  
    echo '<input type="hidden" name="Username" value="'.$username.'">';
    echo '</form>';
    echo '<script type="text/javascript">';
    echo "document.getElementById('myForm').submit();";
    echo '</script>';
    
}


$mysqli -> close();
?>