<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}

$msg = '';

if(isset($_POST)){
    $tripid = $_POST['tripid'];
}

?>

<html>
<head>
    <title>Poll</title>
</head>
<body>
    
<div id="pollform">

    <form method="post" action="insertpoll.php">

    <?php
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
    ?>

        <h2>Create Poll</h2>
        <label for="question">Question</label>
        <input type="text" name="question" id="question">
        <label for="description">Description</label>
        <input type="text" name="description" id="desc">
        <label for="answers">Answers (comma seperated)</label>
        <textarea name="answers" id="answers"></textarea>
        <input type="submit" value="Create">

    </form>


</div>

</body>
</html>
