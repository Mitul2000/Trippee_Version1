<?php
include_once('config.php');


if(isset($_POST)){
    $username = $_POST['Username'];
    $tripid = $_POST['tripid'];
    $budget = $_POST['Budget'];    
}

$mysqli -> query("INSERT INTO group_budget (tripid, budget) VALUES ('$tripid','$budget')");

echo '<form id="myForm" action="viewgroupbudget.php" method="post">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
echo '<input type="hidden" name="Username" value="'.$username.'">';
echo '</form>';
echo '<script type="text/javascript">';
echo "document.getElementById('myForm').submit();";
echo '</script>';

?>