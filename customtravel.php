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
<form method="post" action="insertcustomtravel.php">
<?php        
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        echo '<input type="hidden" name="Username" value="'.$username.'">';
        echo 'Travel Meathod <input type="text" name="carName" required><br>';
       
?>
    <input type="submit" value="Add Cars">
</form>