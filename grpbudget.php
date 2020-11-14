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
?>

<html>
<head>
	<title>Group Budget Form</title>
</head>
<body>
	<div id="grpbudget">

		<form method="post" action="insertgrpbudget.php">
			<?php
			echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
			echo '<input type="hidden" name="Username" value="'.$username.'">';
			?>
            Insert your trip budget: <input type="number" name="Budget" required><br><br>
			<input id="submit" type="submit" value="Submit">
		</form>

	</div>
</body>