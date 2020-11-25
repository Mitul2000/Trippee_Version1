<?php

if (isset($_POST)) {
    $username = $_POST['Username'];
    $tripid = $_POST['tripid'];
    $memberid = $_POST['member_id'];
    $latt = $_POST['latt'];
    $longg = $_POST['longg'];
    $location = $_POST['userlocation'];
    echo $latt;
    echo $longg;
}

$mysqli = new mysqli("localhost:8080", "root", "WoI34DVV72McuhuJ", "trippe");

$mysqli->query("UPDATE `custom_travels` SET `location`='$location',`long`='$longg',`latt`='$latt' WHERE member_id ='$memberid' ");

$allcars = $mysqli->query("SELECT objectid FROM passengers WHERE member_id='$memberid'");
while ($row = $allcars->fetch_assoc()) {
    $objectid = $row['objectid'];
    $mysqli->query("UPDATE `cars` SET `location`='$location',`long`='$longg',`latt`='$latt' WHERE objectid ='$objectid'");
 }
  
?>
<html>

<head>
  <title>Simple Markers</title>
</head>
<body>
<?php
echo '<form id="myForm" action="../geocode2.php" method="post">';
echo '<input type="hidden" name="tripid" value="' . $tripid . '">';
echo '<input type="hidden" name="Username" value="' . $username . '">';
echo '<input type="hidden" name="latt" value="' . $latt . '">';
echo '<input type="hidden" name="longg" value="' . $longg . '">';
echo '<input type="hidden" name="userlocation" value="' . $location . '">';
echo '</form>';
echo '<script type="text/javascript">';
echo "document.getElementById('myForm').submit();";
echo '</script>';
?>

</body>
</head>