<?php
include_once('config.php');

  $username = mysqli_real_escape_string($mysqli, $_POST['Username']);
  $password = mysqli_real_escape_string($mysqli, $_POST['Password']);


  $query = "SELECT * FROM users WHERE (username = '$username' AND password = '$password');";
  $sql_data = $mysqli -> query($query);

  if (mysqli_num_rows($sql_data) != 0){ 
    
    echo '<form id="myForm" action="trips.php" method="post">';  
    echo '<input type="hidden" name="Username" value="'.$username.'">';
    echo '</form>';
    echo '<script type="text/javascript">';
    echo "document.getElementById('myForm').submit();";
    echo '</script>';

  } else {
    echo "<script> alert('Username and password do not match, please try again or sign up') </script>";
    echo "<script>window.location.href='index.html';</script>";  
  }

  echo mysqli_num_rows($sql_data);
  mysqli_close($mysqli);
?>