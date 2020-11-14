<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}


if(isset($_POST)){
    $username = $_POST['Username'];
    $tripid = $_POST['tripid'];    
}

$budget = $mysqli -> query("SELECT * FROM individual_budget WHERE tripid = '$tripid' AND username = '$username'");

if (mysqli_num_rows($budget) == 0){
    echo '<form id="myForm" action="insertindbudget.php" method="post">';
    echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
    echo '<input type="hidden" name="Username" value="'.$username.'">';
    echo 'Insert your trip budget: <input type="number" name="Budget" required><br><br><input id="submit" type="submit" value="Submit">';
    echo '</form>';
    
}
else{
$row = $budget->fetch_assoc();
$budget = $row['budget'];

echo '<form id="myForm" action="insertindbudentry.php" method="post">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
echo '<input type="hidden" name="Username" value="'.$username.'">';
echo 'DESCRIPTION: <input type="text" name="Description" required><br><br>';
echo 'VALUE: <input type="number" name="Value" required><br><br>';
echo '<input type="submit" value="Add Entry"><br><br>';
echo '</form>';

$view = $mysqli -> query("SELECT * FROM individual_entries WHERE tripid = '$tripid' AND username = '$username'");

$total = 0;
echo '<table id="indentries">';
echo '<thead>';
echo '<tr>';
echo '<th>Description</th>';
echo '<th>Value</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

while ($row = $view->fetch_assoc()){
    echo '<tr>';
    echo '<td>';
    echo $row['description'];
    echo '<td>';
    echo '<td>';
    echo $row['value'];
    echo '<td>';
    echo '</tr>';
    $total = $total + $row['value'];
}

echo '</tbody>';
echo '</table>';
echo'<p>Total value: $'.$total.' ';
if ($total > $budget){
    echo'<p>Value is over budget</p>';
}
}
?>