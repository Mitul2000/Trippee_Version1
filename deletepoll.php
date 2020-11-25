<?php
include_once('config.php');

if(isset($_POST)){
    $tripid = $_POST['tripid'];
    $username = $_POST['Username'];
    $pollid = $_POST['pollid']; 
}

    $mysqli -> query("DELETE FROM trippe.polls WHERE pollid='$pollid'");
    $mysqli -> query("DELETE FROM trippe.poll_answers WHERE pollid='$pollid'");

    echo '<form id="myForm" action="viewpolls.php" method="post">';
    echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
    echo '<input type="hidden" name="Username" value="'.$username.'">';  
    echo '</form>';
    echo '<script type="text/javascript">';
    echo "document.getElementById('myForm').submit();";
    echo '</script>';
?>