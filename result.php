<?php
$mysqli = new mysqli("localhost:8080","root","WoI34DVV72McuhuJ","trippe");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}


if(count($_POST) >= 5){
   $username = $_POST['Username'];
    $tripid = $_POST['tripid'];
    $pollid = $_POST['pollid'];
    $question = $_POST['question'];
    $answer = $_POST['poll_answer'];

    $mysqli -> query("UPDATE poll_answers SET votes = votes + 1 WHERE pollid = '$pollid' AND options = '$answer'");
    
} else {
   $username = $_POST['Username'];
	$tripid = $_POST['tripid'];
    $pollid = $_POST['pollid'];
    $question = $_POST['question'];
}

$view = $mysqli -> query("SELECT * FROM max_poll WHERE  pollid = '$pollid'");
$sql_data = $mysqli -> query("SELECT * FROM poll_answers WHERE pollid = '$pollid'");

$viewrow = $view -> fetch_assoc(); 

?>


<html>
<head>
    <title>Trip</title>
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
          <li>
            <form method="post" name="trips" id="nogap" action="trips.php">
            <?php
            echo '<input type="hidden" name="Username" value="'.$username.'">';
            ?>
            <a href="javascript: submittripsform()"><span class="fa fa-home mr-3"></span> Home</a></form> 
          </li>
          
          <li>
            <form method="post" name="groupbudget" id="nogap" action="viewgroupbudget.php">
            <?php        
            echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
            echo '<input type="hidden" name="Username" value="'.$username.'">';
            ?>
            <a href="javascript: submitgroupbudgetform()"><span class="fa fa-briefcase mr-3"></span> Group Budget</a></form>
          </li>
          
          <li>
            <form method="post" name="indbudget" id="nogap" action="viewindbudget.php">
            <?php        
            echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
            echo '<input type="hidden" name="Username" value="'.$username.'">';
            ?>
            <a href="javascript: submitindbudgetform()"><span class="fa fa-briefcase mr-3"></span> Your Budget</a></form>
          </li>
          
          <li>
            <form method="post" name="travel" id="nogap" action="viewtraveloptions.php">
            <?php        
            echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
            echo '<input type="hidden" name="Username" value="'.$username.'">';
            ?>
            <a href="javascript: submittravelform()"><span class="fa fa-road mr-3"></span> Travel</a></form>
          </li>

          <li>
            <form method="post" name="reminders" id="nogap" action="createreminders.php">
            <?php        
            echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
            echo '<input type="hidden" name="Username" value="'.$username.'">';
            ?>
            <a href="javascript: submitremindersform()"><span class="fa fa-calendar mr-3"></span> Add Reminder</a></form>
          </li>

          <li class="active">
            <form method="post" name="polls" id="nogap" action="viewpolls.php">
            <?php        
            echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
            echo '<input type="hidden" name="Username" value="'.$username.'">';
            ?>
            <a href="javascript: submitpollsform()"><span class="fa fa-question mr-3"></span> Polls</a></form>
          </li>


          <?php

            $tripowner = $mysqli -> query("SELECT owner FROM trips WHERE tripid = '$tripid' ");

            $row = mysqli_fetch_assoc($tripowner);
            $owner = $row['owner'];
            if ($owner == $username){
            echo '<li>';
              echo '<form method="post" name="members" id="nogap" action="viewmembers.php">';        
              echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
              echo '<input type="hidden" name="Username" value="'.$username.'">';
              echo '<a href="javascript: submitmembersform()"><span class="fa fa-users mr-3"></span> Manage Members</a></form>';
            echo '</li>';

            }
          ?>


          <li>
            <form method="post" name="delete" id="nogap" action="deletetrip.php">
            <?php        
            echo '<input type="hidden" name="tripid" value="'.$tripid.'">';
            echo '<input type="hidden" name="Username" value="'.$username.'">';
            ?>
            <a href="javascript: submitdeleteform()"><span class="fa fa-trash-o mr-3"></span> Delete Trip</a></form>
          </li>

          <li>
            <a href="index.html"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
         
        </ul>

    	</nav>



<script type="text/javascript"> 
        function submittripsform() { document.trips.submit(); }
        function submitgroupbudgetform() { document.groupbudget.submit(); }
        function submitindbudgetform() { document.indbudget.submit();}
        function submittravelform() { document.travel.submit();}
        function submitremindersform() { document.reminders.submit();}
        function submitpollsform() { document.polls.submit();}
        function submitmembersform() { document.members.submit();}
        function submitdeleteform() { document.delete.submit();}
        
</script> 

<!-- page content-->
<div id="content" class="p-4 p-md-5 pt-5">
  <div class = "container">
    <div class = "column">
       
    <h3><?=$question?></h3>
    <hr>
<div class="table-users">
<table>
    <thead>
        <tr>
            <td><h4>Option</h4></td>
            <td><h4>Votes</h4></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        <?php while($poll = $sql_data->fetch_assoc()){?>
        <tr>
        <td>
           <?php
            if ($viewrow['max'] == $poll['votes']){
               echo '<strong><h5>'.$poll['options'].'</h5></strong>';
            } else {
               echo $poll['options'];
            }
            ?>            
            </td>
            <td><?php
            if ($viewrow['max'] == $poll['votes']){
               echo '<strong><h5>'.$poll['votes'].'</h5></strong>';
            } else {
               echo $poll['votes'];
            }
            ?>            
            </td>
            <td>
        </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>

    </div>
    </div>
</div>

<style>
#nogap {
        margin: 0 0 0 0;
      }

      body {
        background-color: #f2f2f2;
      }

      .header {
        color: white;
        font-size: 1.5em;
        padding: 1rem;
        text-align: center;
        text-transform: uppercase;
      }

      .table-users {
        box-shadow: 3px 3px 0 rgba(0, 0, 0, 0.1);
        max-width: calc(100% - 2em);
        margin: 1em auto;
        overflow: hidden;
        width: 800px;
      }

      table {
        width: 100%;
      }

      @media screen and (max-width: 700px) {

        table,
        tr,
        td {
          display: block;
        }

        tr {
          position: relative;
        }
      }

      @media screen and (max-width: 500px) {
        .header {
          background-color: transparent;
          font-size: 2em;
          font-weight: 700;
          padding: 0;
          text-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);
        }

        img {
          border: 3px solid;
          margin: 0.5rem 0;
        }

        tr {
          background-color: white !important;
          box-shadow: 2px 2px 0 rgba(0, 0, 0, 0.1);
          margin: 0.5rem 0;
          padding: 0;
        }

        .table-users {
          border: none;
          box-shadow: none;
          overflow: visible;
        }
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