<?php
include_once('config.php');

if (isset($_POST)) {
  $username = $_POST['Username'];
  $tripid = $_POST['tripid'];
  $member_id = $_POST['member_id'];
}
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
            <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
          </svg>
        </button>
      </div>
      <div class="img bg-wrap text-center py-4" style="background-image: url(https://cdn.pixabay.com/photo/2015/06/19/21/24/the-road-815297_1280.jpg);">
        <!-- image goes here-->
        <div class="user-logo">
          <div class="img" style="background-image: url(logo_transparent.png);"></div>
          <h3>Trippe</h3>
        </div>
      </div>
      <ul class="list-unstyled components mb-5">
        <li>
          <form method="post" name="trips" id="nogap" action="trips.php">
            <?php
            echo '<input type="hidden" name="Username" value="' . $username . '">';
            ?>
            <a href="javascript: submittripsform()"><span class="fa fa-home mr-3"></span> Home</a></form>
        </li>

        <li>
          <form method="post" name="groupbudget" id="nogap" action="viewgroupbudget.php">
            <?php
            echo '<input type="hidden" name="tripid" value="' . $tripid . '">';
            echo '<input type="hidden" name="Username" value="' . $username . '">';
            ?>
            <a href="javascript: submitgroupbudgetform()"><span class="fa fa-briefcase mr-3"></span> Group Budget</a></form>
        </li>

        <li>
          <form method="post" name="indbudget" id="nogap" action="viewindbudget.php">
            <?php
            echo '<input type="hidden" name="tripid" value="' . $tripid . '">';
            echo '<input type="hidden" name="Username" value="' . $username . '">';
            ?>
            <a href="javascript: submitindbudgetform()"><span class="fa fa-briefcase mr-3"></span> Your Budget</a></form>
        </li>

        <li class="active">
          <form method="post" name="travel" id="nogap" action="viewtraveloptions.php">
            <?php
            echo '<input type="hidden" name="tripid" value="' . $tripid . '">';
            echo '<input type="hidden" name="Username" value="' . $username . '">';
            ?>
            <a href="javascript: submittravelform()"><span class="fa fa-road mr-3"></span> Travel</a></form>
        </li>

        <li>
          <form method="post" name="reminders" id="nogap" action="createreminders.php">
            <?php
            echo '<input type="hidden" name="tripid" value="' . $tripid . '">';
            echo '<input type="hidden" name="Username" value="' . $username . '">';
            ?>
            <a href="javascript: submitremindersform()"><span class="fa fa-calendar mr-3"></span> Add Reminder</a></form>
        </li>

        <li>
          <form method="post" name="polls" id="nogap" action="viewpolls.php">
            <?php
            echo '<input type="hidden" name="tripid" value="' . $tripid . '">';
            echo '<input type="hidden" name="Username" value="' . $username . '">';
            ?>
            <a href="javascript: submitpollsform()"><span class="fa fa-question mr-3"></span> Polls</a></form>
        </li>


        <?php

        $tripowner = $mysqli->query("SELECT owner FROM trips WHERE tripid = '$tripid' ");

        $row = mysqli_fetch_assoc($tripowner);
        $owner = $row['owner'];
        if ($owner == $username) {
          echo '<li>';
          echo '<form method="post" name="members" id="nogap" action="viewmembers.php">';
          echo '<input type="hidden" name="tripid" value="' . $tripid . '">';
          echo '<input type="hidden" name="Username" value="' . $username . '">';
          echo '<a href="javascript: submitmembersform()"><span class="fa fa-users mr-3"></span> Manage Members</a></form>';
          echo '</li>';
        }
        ?>


        <li>
          <form method="post" name="delete" id="nogap" action="deletetrip.php">
            <?php
            echo '<input type="hidden" name="tripid" value="' . $tripid . '">';
            echo '<input type="hidden" name="Username" value="' . $username . '">';
            ?>
            <a href="javascript: submitdeleteform()"><span class="fa fa-trash-o mr-3"></span> Delete Trip</a></form>
        </li>

        
        <li>
          <a href="index.html"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
        </li>

      </ul>

    </nav>



    <script type="text/javascript">
      function submittripsform() {
        document.trips.submit();
      }

      function submitgroupbudgetform() {
        document.groupbudget.submit();
      }

      function submitindbudgetform() {
        document.indbudget.submit();
      }

      function submittravelform() {
        document.travel.submit();
      }

      function submitremindersform() {
        document.reminders.submit();
      }

      function submitpollsform() {
        document.polls.submit();
      }

      function submitmembersform() {
        document.members.submit();
      }

      function submitdeleteform() {
        document.delete.submit();
      }
    </script>

    <!-- Page Content  -->
    <style>
      .group {
        position: relative;
        margin-bottom: 45px;
      }

      input {
        font-size: 18px;
        padding: 10px 10px 10px 5px;
        display: block;
        width: 300px;
        border: none;
        border-bottom: 1px solid #757575;
      }

      input:focus {
        outline: none;
      }

      /* LABEL ======================================= */
      label {
        color: #999;
        font-size: 18px;
        font-weight: normal;
        position: absolute;
        pointer-events: none;
        left: 5px;
        top: 10px;
        transition: 0.2s ease all;
        -moz-transition: 0.2s ease all;
        -webkit-transition: 0.2s ease all;
      }

      /* active state */
      input:focus~label,
      input:valid~label {
        top: -20px;
        font-size: 14px;
        color: #5264AE;
      }

      /* HIGHLIGHTER ================================== */
      .highlight {
        position: absolute;
        height: 60%;
        width: 100px;
        top: 25%;
        left: 0;
        pointer-events: none;
        opacity: 0.5;
      }

      /* active state */
      input:focus~.highlight {
        -webkit-animation: inputHighlighter 0.3s ease;
        -moz-animation: inputHighlighter 0.3s ease;
        animation: inputHighlighter 0.3s ease;
      }

      /* ANIMATIONS ================ */
      @-webkit-keyframes inputHighlighter {
        from {
          background: #5264AE;
        }

        to {
          width: 0;
          background: transparent;
        }
      }

      @-moz-keyframes inputHighlighter {
        from {
          background: #5264AE;
        }

        to {
          width: 0;
          background: transparent;
        }
      }

      @keyframes inputHighlighter {
        from {
          background: #5264AE;
        }

        to {
          width: 0;
          background: transparent;
        }
      }
    </style>

    <!-- page content-->
    <div id="content" class="p-4 p-md-5 pt-5">
      <div class="container">
        <div class="row">
          <form method="post" action="insertcustomtravel.php">
            <?php
            echo '<input type="hidden" name="tripid" value="' . $tripid . '">';
            echo '<input type="hidden" name="Username" value="' . $username . '">';
            echo '<input type="hidden" name="member_id" value="' . $member_id . '">';
            echo '<div class="group">';
            echo '<input type="text" name="carName" required><br>';
            echo '<span class="highlight"></span>';
            echo '<span class="bar"></span>';
            echo '<label>Travel Method</label>';
            echo '</div>';
            ?>
            <button type="submit" class="btn btn-secondary">Add Custom Travel</button>
          </form>

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
    </style>

  </div>
  </div>


  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>