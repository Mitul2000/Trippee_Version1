<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}


if(isset($_POST)){
    $username = $_POST['Username'];  
    
    $nickname = $_POST['Nickname'];
    $dateofBirth = $_POST['Dateofbirth'];

   
}
$flname = $mysqli -> query("SELECT * FROM users WHERE username ='$username';");
$value = $flname->fetch_assoc();
if ($nickname!= NULL){
    echo 'nickname needs to be updated';

    $mysqli -> query("UPDATE users SET nickname = '$nickname' WHERE username ='$username';");
    
}
if ($dateofBirth!= NULL){
    $mysqli -> query("UPDATE users SET dateofbirth = '$dateofBirth' WHERE username ='$username';");
}
echo '<form id="myForm" action="settings.php" method="post">';  
echo '<input type="hidden" name="Username" value="'.$username.'">';  
echo '</form>';
echo '<script type="text/javascript">';
echo "document.getElementById('myForm').submit();";
echo '</script>';
?>