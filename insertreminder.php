<?php
include_once('config.php');

if (!empty($_POST)){
    $tripid = $_POST['tripid'];
    $name = mysqli_real_escape_string($mysqli, $_POST["ReminderName"]);
    $description = mysqli_real_escape_string($mysqli, $_POST["ReminderDescription"]);
    $time = mysqli_real_escape_string($mysqli, $_POST["ReminderTime"]);

    $mysqli -> query("INSERT INTO trippe.reminders (tripid, time, description, name) VALUES ('$tripid', '$time', '$description', '$name')"); 
}
    
    $username = $_POST["Username"];
    echo '<form id="myForm" action="viewtrip.php" method="post">';
    echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
    echo '<input type="hidden" name="Username" value="'.$username.'">';
    echo '</form>';
    echo '<script type="text/javascript">';
    echo "document.getElementById('myForm').submit();";
    echo '</script>';


$mysqli -> close();

?>