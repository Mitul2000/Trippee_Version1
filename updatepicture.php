<?php

$dbhost="localhost:8080";
$dbuser="root";
$dbpass="WoI34DVV72McuhuJ";
$dbname="trippe";

$connection= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (mysqli_connect_errno())
{
	die ("Database connection failed");
}



if(isset($_POST)){
    $username = $_POST['Username'];  
    
    if (is_uploaded_file($_FILES['image']['tmp_name']))  
    {
        $target = "pictures/".basename($_FILES['image']['name']); 
        $image = $_FILES['image']['name'];
        echo 'file was uploaded';
        $sql = "UPDATE users SET avatar = '$image' WHERE username ='$username';";
        mysqli_query($connection, $sql);

        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
            $msg = "Images uploaded successfully";
        }
        else{
            $msg = "There was a problem uploading";
        }
    }
    
   
}
echo '<form id="myForm" action="settings.php" method="post">';  
echo '<input type="hidden" name="Username" value="'.$username.'">';  
echo '</form>';
echo '<script type="text/javascript">';
echo "document.getElementById('myForm').submit();";
echo '</script>';


?>