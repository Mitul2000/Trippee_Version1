<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
if (!empty($_POST)){
  echo $_POST["Username"];
  $username = mysqli_real_escape_string($mysqli, $_POST["Username"]);
  $firstname = mysqli_real_escape_string($mysqli, $_POST["Firstname"]);
  $lastname = mysqli_real_escape_string($mysqli, $_POST["Lastname"]);
  $nickname = mysqli_real_escape_string($mysqli, $_POST["Nickname"]);
  $dateofBirth = mysqli_real_escape_string($mysqli, $_POST["Dateofbirth"]);
  $email = mysqli_real_escape_string($mysqli, $_POST["Emailaddress"]);
  $password = mysqli_real_escape_string($mysqli, $_POST["Password"]);

  
  


$query = "SELECT * FROM users WHERE (username = '$username');";
$sql_data = $mysqli -> query($query);

if (mysqli_num_rows($sql_data) == 0){ 
  $mysqli -> query("INSERT INTO trippe.users (username, firstname, lastname, nickname, dateofbirth, email, avatar, password) VALUES ('$username', '$firstname', '$lastname','$nickname','$dateofBirth','$email','','$password')");
    header("Location: index.html");
    die();

}
else{
  echo "<script> alert('Username already exists') </script>";
  echo "<script>window.location.href='index.html';</script>"; 

}

}


$mysqli -> close();
?>