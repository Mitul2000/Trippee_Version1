<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if(isset($_POST)){
    $username = $_POST['Username']; 
    $tripid = $_POST['tripid'];
    $objectid = $_POST['objectid'];  
}

echo '<form method="post" action="viewtraveloptions.php">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
echo '<input type="hidden" name="Username" value="'.$username.'">';
echo '<input type="submit" value="Back">';
echo '</form>';

echo '<form method="post" action="insertdestinationcar.php">';
echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
echo '<input type="hidden" name="Username" value="'.$username.'">';
echo '<input type="hidden" name="objectid" value="'.$objectid.'">';
echo 'Destination: <input type="text" name="destination" required>';
echo 'Priority: <input type="number" name="priority" min="1" required>';
echo '<input type="submit" value="Add Destination">';
echo '</form>';
?>

<div id="triplist">
	<table id="triptable">
		<tbody>    
<?php
$query = "SELECT *  FROM destinations_car  WHERE objectid= '$objectid' ORDER BY priority";
$sql_data = $mysqli -> query($query);

    while ($row = $sql_data->fetch_assoc()){
        

        echo '<tr>';
        echo '<td>'.$row['priority'].'</td>';
        echo '<td>'.$row['location'].'</td>';
        echo '</tr>';
        
    }

?>
        </tbody>
    </table>
</div>

<script>
   
    function removeseat(seatid,pname) {
        
        
        document.getElementById(seatid).elements[4].style.display="none";
        var output = document.createElement("p");
        var content = document.getElementById(seatid);
        var text = document.createTextNode(pname);
        output.appendChild(text);
        content.appendChild(output);

    }
</script>



<div>
    <table>
        <tbody>
<?php
    $seats = $mysqli -> query("SELECT * FROM cars WHERE objectid='$objectid'");
    $seating = $seats->fetch_assoc();
    $num = $seating['seats'];

    if ($num <= 2){
        echo '<tr>';
        for($i = 1; $i <= $num; $i++){
            echo '<td>';
            echo '<form method="post" id ="'.$i.'0" action="insertpassenger.php">';
            echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
            echo '<input type="hidden" name="Username" value="'.$username.'">';
            echo '<input type="hidden" name="objectid" value="'.$objectid.'">';
            echo '<input type="hidden" name="seat" value="'.$i.'0">';
            echo '<input type="submit" value="Select Seat">';
            echo '</form>';
            echo '</td>';
        }
        echo '</tr>'; 
    }
    else{
        $tempnum = $num -2;
        echo '<tr>';
        for($i = 1; $i <= 2; $i++){
            echo '<td>';
            echo '<form method="post" id ="'.$i.'0" action="insertpassenger.php">';
            echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
            echo '<input type="hidden" name="Username" value="'.$username.'">';
            echo '<input type="hidden" name="objectid" value="'.$objectid.'">';
            echo '<input type="hidden" name="seat" value="'.$i.'0">';
            echo '<input type="submit" value="Select Seat">';
            echo '</form>';
            echo '</td>';
        }
        echo '</tr>'; 
        for($i= 1; $i<= ceil($tempnum/3); $i++){
            if ($i < ceil($tempnum/3)){
                echo '<tr>';
                for($j =1; $j<=3; $j++){
                    echo '<td>';
                    echo '<form method="post" id ="'.$i.''.$j.'" action="insertpassenger.php">';
                    echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
                    echo '<input type="hidden" name="Username" value="'.$username.'">';
                    echo '<input type="hidden" name="objectid" value="'.$objectid.'">';
                    echo '<input type="hidden" name="seat" value="'.$i.''.$j.'">';
                    echo '<input type="submit" value="Select Seat">';
                    echo '</form>';
                    echo '</td>';
                }
                echo '</tr>';
            }

            if ($i == ceil($tempnum/3)){
                echo '<tr>';
                for($j =1; $j<= $tempnum%3; $j++){
                    echo '<td>';
                    echo '<form method="post" id ="'.$i.''.$j.'" action="insertpassenger.php">';
                    echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
                    echo '<input type="hidden" name="Username" value="'.$username.'">';
                    echo '<input type="hidden" name="objectid" value="'.$objectid.'">';
                    echo '<input type="hidden" name="seat" value="'.$i.''.$j.'">';
                    echo '<input type="submit" value="Select Seat">';
                    echo '</form>';
                    echo '</td>';
                }
                if($tempnum%3 ==0){
                    for($j =1; $j<= 3; $j++){
                        echo '<td>';
                        echo '<form method="post" id ="'.$i.''.$j.'" action="insertpassenger.php">';
                        echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
                        echo '<input type="hidden" name="Username" value="'.$username.'">';
                        echo '<input type="hidden" name="objectid" value="'.$objectid.'">';
                        echo '<input type="hidden" name="seat" value="'.$i.''.$j.'">';
                        echo '<input type="submit" value="Select Seat">';
                        echo '</form>';
                        echo '</td>';
                    }
                }
                echo '</tr>';
            }
        }

    }


?>
        </tbody>
    </table>
</div>


<?php
  $passengers = $mysqli -> query("SELECT * FROM passengers WHERE objectid='$objectid'");
  while ($passSeating = $passengers->fetch_assoc()){
      echo '<script> removeseat('.$passSeating['seatnumber'].',"'.$passSeating['username'].'")</script>';
  }
?>


