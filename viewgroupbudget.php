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

$budget = $mysqli -> query("SELECT * FROM group_budget WHERE tripid = '$tripid'");


if (mysqli_num_rows($budget) == 0){
    echo '<form id="myForm" action="grpbudget.php" method="post">';
    echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
    echo '<input type="hidden" name="Username" value="'.$username.'">';
    echo '</form>';
    echo '<script type="text/javascript">';
    echo "document.getElementById('myForm').submit();";
    echo '</script>';
}


$row = $budget->fetch_assoc();
$budget = $row['budget'];    


echo '<form id="myForm" action="insertgrpbudentry.php" method="post">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';  
echo '<input type="hidden" name="Username" value="'.$username.'">';
echo 'DESCRIPTION: <input type="text" name="Description" required><br><br>';
echo 'VALUE: <input type="number" name="Value" required><br><br>';
echo '<input type="submit" value="Add Entry"><br><br>';
echo '</form>';


$view = $mysqli -> query("SELECT * FROM group_entries WHERE tripid = '$tripid'");

$total = 0;
$members = 0;
echo '<table id="grpentries">';
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

$num = $mysqli -> query("SELECT * FROM people_on_each_trip WHERE tripid = '$tripid'");

while ($row = $num->fetch_assoc()){
    $members = $row['count'];
}
$perperson = $total/$members;
echo'<p>Total value per person: $'.$perperson.'</p>';
if ($perperson > $budget){
    echo'<p>Value is over budget</p>';
}

?>