<?php
include_once('config.php');


if(isset($_POST)){
    $username = $_POST['Username'];
    $tripid = $_POST['tripid'];
    $member_id = $_POST['member_id'];
    $budget = $_POST['Budget'];   
}

$mysqli -> query("INSERT INTO individual_budget (tripid, username, budget, member_id) VALUES ('$tripid', '$username', '$budget','$member_id')");

echo '<form id="myForm" action="viewindbudget.php" method="post">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
echo '<input type="hidden" name="Username" value="'.$username.'">';
echo '</form>';
echo '<script type="text/javascript">';
echo "document.getElementById('myForm').submit();";
echo '</script>';

?>