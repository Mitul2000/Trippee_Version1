<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

if(isset($_POST)){
    $tripid = $_POST['tripid'];
    $pollid = $_POST['pollid']; 
}

    $mysqli -> query("DELETE FROM trippe.polls WHERE pollid='$pollid'");
    $mysqli -> query("DELETE FROM trippe.poll_answers WHERE pollid='$pollid'");

    echo '<form id="myForm" action="viewpolls.php" method="post">';
    echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
    echo '</form>';
    echo '<script type="text/javascript">';
    echo "document.getElementById('myForm').submit();";
    echo '</script>';
?>