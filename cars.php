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
<form method="post" action="insertcar.php">
<?php        
        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
        echo '<input type="hidden" name="Username" value="'.$username.'">';
        echo 'Car Name: <input type="text" name="carName" required><br>';
        echo 'Number Of Passangers: <input type="number" name="quantity" min="1" max="8" required><br>';
       
?>
    <input type="submit" value="Add Cars">
</form>