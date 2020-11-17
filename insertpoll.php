<?php
	$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
	if ($mysqli -> connect_errno) {
	    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	    exit();
	}

	if (!empty($_POST)){
	    $tripid = $_POST['tripid'];
	    $question = $_POST['question'];
	    $description = $_POST['description'];
	}

	$mysqli -> query("INSERT INTO polls (tripid, question, description) VALUES ('$tripid', '$question', '$description')");

	$pollid = $mysqli->insert_id;
	$options = isset($_POST['answers']) ? explode(",", $_POST['answers']) : '';

	foreach ($options as $option) {
	    if (empty($option)) continue;
	    $mysqli -> query("INSERT INTO poll_answers (pollid, options, votes) VALUES ('$pollid', '$option', 0)");
	}

	echo '<form id="myForm" action="viewpolls.php" method="post">';
    echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
    echo '</form>';
    echo '<script type="text/javascript">';
    echo "document.getElementById('myForm').submit();";
    echo '</script>';
?>