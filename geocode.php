<?php
include_once('config.php');

if (isset($_POST)) {
  $username = $_POST['Username'];
  $tripid = $_POST['tripid'];
  $latt = $_POST['latt'];
  $longg = $_POST['longg'];
}
$memberidquery = $mysqli->query("SELECT * FROM members WHERE tripid = '$tripid' AND username = '$username'");
$memberidrow = $memberidquery->fetch_assoc();
$memberid = $memberidrow['member_id'];
?>

<html>

<head>
  <title>Simple Markers</title>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOZeaEFNNKBxFGVzJUzKyboA8G8QE_ucs&callback=initMap&libraries=&v=weekly" defer></script>
  <style type="text/css">
    /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
    #map {

      height: 100%;
    }

    /* Optional: Makes the sample page fill the window. */
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>



  <?php
  // Store long lat inside database


  ?>

  <script>
    //gets the long/lad

    "use strict";

    var latitude = <?= $latt ?>;
    var longitude = <?= $longg ?>;

    function initMap() {
      // longitude = <?= $longg ?>;
      // latitude = <?= $latt ?>;

      var myLatLng = {
        lat: latitude,
        lng: longitude

      };

      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: myLatLng,
        fullscreenControl: true,
        zoomControl: true,
        streetViewControl: false
      });
      new google.maps.Marker({
        position: myLatLng,
        map,
        title: "Hello World!"
      });

    }

    var url_api = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + latitude + ',' + longitude + '&key=AIzaSyBOZeaEFNNKBxFGVzJUzKyboA8G8QE_ucs';

    getaddress();
    async function getaddress() {
      const response = await fetch(url_api);
      const value = await response.json();

      var userlocation = value.results[3].formatted_address;
      console.log(userlocation);
      

      var forminfo = document.getElementsByName("location")[0];
      var data = document.createElement("INPUT");
      data.setAttribute("type", "hidden");
      data.setAttribute("name", "userlocation");
      data.setAttribute("value", userlocation);
      forminfo.appendChild(data);


      document.getElementById('loc').submit();
    }


  </script>
</head>

<body>
  <div>
  <form method="post" name="location" id="loc" action="API/insertlocationapi.php">
    <?php
    echo '<input type="hidden" name="tripid" value="' . $tripid . '">';
    echo '<input type="hidden" name="member_id" value="' . $memberid . '">';
    echo '<input type="hidden" name="Username" value="' . $username . '">';
    echo '<input type="hidden" name="latt" value="' . $latt . '">';
    echo '<input type="hidden" name="longg" value="' . $longg . '">';
    
    ?>

  </form>
  </div>


  <div id="map"></div>


  <form method="post" name="map" id="nogap" action="viewtraveloptions.php">
    <?php
    echo '<input type="hidden" name="tripid" value="' . $tripid . '">';
    echo '<input type="hidden" name="Username" value="' . $username . '">';
    echo '<button type="submit" class="btn btn-secondary">Back</button>';
    ?>

  </form>
</body>

</html>