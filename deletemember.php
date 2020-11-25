<?php
include_once('config.php');


if(isset($_POST)){
    $username = $_POST['Username'];
    $tripid = $_POST['tripid'];
    $owner = $_POST['Owner'];
    
    $memberidquery = $mysqli -> query("SELECT * FROM members WHERE tripid = '$tripid' AND username = '$username'");
    $memberidrow = $memberidquery -> fetch_assoc();
    $member_id = $memberidrow['member_id'];

    $mysqli->query("DELETE FROM trippe.individual_entries WHERE member_id='$member_id'");
    $mysqli->query("DELETE FROM trippe.individual_budget WHERE member_id = '$member_id'");
    $mysqli->query("DELETE FROM trippe.destinations WHERE objectid In (SELECT objectid FROM custom_travels WHERE objectid In (SELECT objectid FROM travel_options WHERE tripid='$tripid') AND member_id='$member_id')");
    $mysqli->query("DELETE FROM trippe.custom_travels WHERE objectid In (SELECT objectid FROM travel_options WHERE tripid='$tripid') AND member_id='$member_id'");
    $mysqli->query("DELETE FROM trippe.passengers WHERE objectid In (SELECT objectid FROM cars WHERE objectid In (SELECT objectid FROM travel_options WHERE tripid='$tripid')) AND member_id='$member_id'");
    $mysqli->query("DELETE FROM trippe.members WHERE member_id='$member_id'");
    
    echo '<form id="myForm" action="viewmembers.php" method="post">';
    echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
    echo '<input type="hidden" name="Username" value="'.$owner.'">';
    echo '</form>';
    echo '<script type="text/javascript">';
    echo "document.getElementById('myForm').submit();";
    echo '</script>';
}

?>