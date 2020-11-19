<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}


if(isset($_POST)){
    $username = $_POST['Username'];
    $tripid = $_POST['tripid'];
    

    $mysqli -> query("DELETE FROM trippe.individual_entries WHERE tripid='$tripid' AND username='$username'");
    $mysqli -> query("DELETE FROM trippe.individual_budgets WHERE tripid='$tripid' AND username='$username'");
    $mysqli -> query("DELETE FROM trippe.destinations WHERE objectid In (SELECT objectid FROM custom_travels WHERE objectid In (SELECT objectid FROM travel_options WHERE tripid='$tripid') AND username='$username')");
    $mysqli -> query("DELETE FROM trippe.custom_travels WHERE objectid In (SELECT objectid FROM travel_options WHERE tripid='$tripid') AND username='$username'");   
    $mysqli -> query("DELETE FROM trippe.passengers WHERE objectid In (SELECT objectid FROM cars WHERE objectid In (SELECT objectid FROM travel_options WHERE tripid='$tripid')) AND username='$username'");
    $mysqli -> query("DELETE FROM trippe.members WHERE tripid='$tripid' AND username='$username'");


    
    
    


    echo '<form id="myForm" action="trips.php" method="post">';
    echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
    echo '<input type="hidden" name="Username" value="'.$username.'">';
    echo '</form>';
    echo '<script type="text/javascript">';
    echo "document.getElementById('myForm').submit();";
    echo '</script>';
}

?>


<!--

DELETE FROM trippe.individual_entries WHERE tripid= 41 AND username='Preet1234';
DELETE FROM trippe.individual_budget WHERE tripid=41 AND username='Preet1234';
DELETE FROM trippe.destinations WHERE objectid In (SELECT objectid FROM custom_travels WHERE objectid In (SELECT objectid FROM travel_options WHERE tripid=41) AND username='Preet1234');
DELETE FROM trippe.custom_travels WHERE objectid In (SELECT objectid FROM travel_options WHERE tripid=41) AND username='Preet1234';
DELETE FROM trippe.passengers WHERE objectid In (SELECT objectid FROM cars WHERE objectid In (SELECT objectid FROM travel_options WHERE tripid=41)) AND username='Preet1234';
DELETE FROM trippe.members WHERE tripid= 41 AND username='Preet1234';
-->