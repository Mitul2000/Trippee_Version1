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
    <title>Reminder</title>
</head>
<body>
<div id="reminderform">

<form method="post" action="insertreminder.php">

<?php
    echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
    echo '<input type="hidden" name="Username" value="'.$username.'">';
?>

    Name:<br> <input type="text" name="ReminderName" required><br><br>
    Description:<br> <textarea rows="4" cols="50" name="ReminderDescription"></textarea><br><br>
    Reminder Time:<br><input type="datetime-local" id="datefield" min='2020-11-11' name="ReminderTime"><br><br>
    <input id="submit" type="submit" value="Submit">
    <!-- <script>
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
         if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("datefield").setAttribute("min", today);
    </script> -->
</form>


</div>

</body>
</html>