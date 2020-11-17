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
<?php
        echo '<form method="post" action="validatingfriend.php" onsubmit="myFunction()">';
<<<<<<< HEAD
        echo '<input type="text" name="Username" required>';
=======
        echo '<input type="text" name="Username">';
>>>>>>> reminders
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        echo '<input type="hidden" name="Owner" value="'.$username.'">';
        echo '<input type="submit" value="Add">';
        echo '</form>';
        echo '<script>
        function myFunction() {
            console.log("The form was submitted");
          }
        </script>';
?>
 <?php
  //  $view_friends = "SELECT members.username FROM trippe.members WHERE tripid = $tripid;"
  //  $sql_members = $mysqli -> query($view_friends);
    // while ($row = $sql_members->fetch_assoc()){
    //     echo $row[username];
    // }

?> 
<hr>


<div id="memberlist">
	<table id="membertable">
		
		<tbody>    

<?php

$query = "SELECT * FROM trip_nickname WHERE tripid = '$tripid';";
$sql_data = $mysqli -> query($query);

    while ($row = $sql_data->fetch_assoc()){

        if ($username != $row['username']){
        echo '<tr>';
        echo '<td>';
        echo '<form method="post" action="deletemember.php">';
        echo '<input type="hidden" name="tripid" value="'.$row['tripid'].'">';
        echo '<input type="hidden" name="Username" value="'.$row['username'].'">';
        echo '<input type="hidden" name="Owner" value="'.$username.'">';
        echo $row['nickname'].'  ';
        echo '<input type="submit" value="Delete">';
        echo '</form>';
        echo '<td>';
        echo '</tr>';
        }
    }

?>

        </tbody>
    </table>
</div>

