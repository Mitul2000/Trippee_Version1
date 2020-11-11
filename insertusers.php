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

    $mysqli -> query("INSERT INTO trippe.users (username, firstname, lastname, nickname, dateofbirth, email, avatar, password) VALUES ('$username', '$firstname', '$lastname','$nickname','$dateofBirth','$email','','$password')");
    
    header("Location: login.html");
    die();
    
}

// Print auto-generated id
echo "New record has id: " . $mysqli -> insert_id;

$mysqli -> close();
?>