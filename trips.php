<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}


if(isset($_POST)){
    $username = $_POST['Username'];    
}

?>
<html>
<head>
    <title>Trips</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        
</head>
<body>

<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-secondary"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg>
	        </button>
        </div>
	  		<div class="img bg-wrap text-center py-4" style="background-image: url(https://cdn.pixabay.com/photo/2015/06/19/21/24/the-road-815297_1280.jpg);"><!-- image goes here-->
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(logo_transparent.png);"></div>
	  				<h3>Trippe</h3>
	  			</div>
	  		</div>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <form method="post" name="trips" id="nogap" action="trips.php">
            <?php
            echo '<input type="hidden" name="Username" value="'.$username.'">';
            ?>
            <a href="javascript: submittripsform()"><span class="fa fa-home mr-3"></span> Home</a></form> 
          </li>
          <li>
            <a href="#"><span class="fa fa-cog mr-3"></span> Settings</a>
          </li>
          <li>
            <a href="index.html"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
         
        </ul>

    	</nav>



<script type="text/javascript"> 
        function submittripsform() { document.trips.submit(); } 
</script> 


        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
      <div id="newtrip">
    <form method="post" action="tripform.php">
    
<?php
    echo '<input type="hidden" name="Username" value="'.$username.'">';
?>
<div class="container">
<button type="submit" id ="createtrip" class="btn btn-primary";>Create Trip</button>
</div>
    </form>
    </div>
<hr>
    <!-- <div id="triplist">
	<table id="triptable">
		
		<tbody>     -->
<div class = "container">
    <div class = "row">
        

        
<?php
$query = "SELECT trips.tripid, trips.tripname, trips.datecreated  FROM trips  WHERE tripid IN (SELECT tripid FROM members WHERE username = '$username');";
$sql_data = $mysqli -> query($query);

    while ($row = $sql_data->fetch_assoc()){
        echo '<div id="manyforms" class = "col-xs-12 col-sm-6 col-md-3 col-lg-3 mr-1">';
        echo '<h1><form method="post" action="viewtrip.php"></h1>';
        echo '<input type="hidden" name="tripid" value="'.$row['tripid'].'">';
        echo '<input type="hidden" name="Username" value="'.$username.'">';
        echo '<button type="submit" class="btn btn-primary" id="thisbutton">'.$row['tripname'].'<br><div id="smalltext">'.substr($row['datecreated'], 0, -8).'</div></button>';        
        echo '<h2></form></h2>';
        echo '</div>';

        
    }

?>
    </div>
</div>




<style>
#thisbutton{ 
    background-color: #666666;
    background-image: url("https://cdn.pixabay.com/photo/2016/10/14/19/21/canyon-1740973_1280.jpg");
    background-size: auto 100%;
    padding: 40px 25px;
}
#smalltext{
    font-size: 10px;
}
#nogap{
    margin: 0 0 0 0;
}
body{
    background-color: #f2f2f2;
}
#createtrip{
    background-color: #404040;
}

</style>

      </div>
        </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    
</body>
</html>