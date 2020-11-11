<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");

if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

$username = mysqli_real_escape_string($mysqli, $_POST['Username']);
$password = mysqli_real_escape_string($mysqli, $_POST['Password']);
echo $username;
echo $password;

$query = "SELECT * FROM users WHERE (username = '$username' AND password = '$password');";
$sql_data = $mysqli -> query($query);

if (mysqli_num_rows($sql_data) != 0){ 
  echo "<h1> Successfully logged in! <h1>";
} else {
  echo "<h1> Username and password do not match, please try again or sign up <h1>";
}
echo mysqli_num_rows($sql_data);
mysqli_close($mysqli);
?>