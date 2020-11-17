<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

if(count($_POST) >= 4){
	$tripid = $_POST['tripid'];
    $pollid = $_POST['pollid'];
    $question = $_POST['question'];
    $answer = $_POST['poll_answer'];

    $mysqli -> query("UPDATE poll_answers SET votes = votes + 1 WHERE pollid = '$pollid' AND options = '$answer'");
    
} else {
	$tripid = $_POST['tripid'];
    $pollid = $_POST['pollid'];
    $question = $_POST['question'];
}

$sql_data = $mysqli -> query("SELECT * FROM poll_answers WHERE pollid = '$pollid'");

?>

<h1><?=$question?></h1>
<table>
    <thead>
        <tr>
            <td>Option</td>
            <td>Votes</td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php while($poll = $sql_data->fetch_assoc()){?>
        <tr>
            <td><?=$poll['options']?></td>
            <td><?=$poll['votes']?></td>
            <td>
        </td>
        </tr>
        <?php } ?>
    </tbody>
</table>