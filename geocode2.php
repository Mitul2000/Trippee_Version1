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
  <script src="https://unpkg.com/@google/markerclustererplus@4.0.1/dist/markerclustererplus.min.js"></script>
  <?php
  $key = "AIzaSyBOZeaEFNNKBxFGVzJUzKyboA8G8QE_ucs";
  echo '<script src="https://maps.googleapis.com/maps/api/js?key='.$key.'&callback=initMap&libraries=&v=weekly" defer></script>';
  ?>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
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



  <script>    
  <?php
  $sql_data = $mysqli->query("SELECT * FROM location_display WHERE tripid = '$tripid'");
  
  while ($row = $sql_data->fetch_assoc()) {
    if ($row['latt'] != NULL) { 
        
        $book[] = array(
            'lat' => (float) $row['latt'],
            'lng' => (float) $row['long']
          );
      

    }
  }
  ?>
///----------------------------

var book = <?php echo json_encode($book, JSON_PRETTY_PRINT) ?>;

console.log(book);





//------------------------
  
    "use strict";

    var latitude = <?= $latt ?>;
    var longitude = <?= $longg ?>;



    function initMap() {
      var myLatLng = {
        lat: latitude,
        lng: longitude
      };

      const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 3,
        center: myLatLng,
        fullscreenControl: true,
        zoomControl: true,
        streetViewControl: false
      });

    //   new google.maps.Marker({
    //     position: myLatLng,
    //     map,
    //     title: "Hello World!"
    //   });

      // const markers = locations.map((location, i) => {
      //   return new google.maps.Marker({
      //     position: location
      //   });
      // });

      const markers = book.map((location, i) => {
        return new google.maps.Marker({
          position: location
        });
      });

      new MarkerClusterer(map, markers, {
        imagePath: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
      });
    }
  </script>
  
  
</head>

<body>

  <div id="map"></div>


  <style>
  *{padding:0;margin:0;}

  .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:black;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
  }

  .my-float{
	margin-top:22px;
  }

  </style>
  <form method="post" name="map" id="nogap" action="viewtraveloptions.php">
    <?php
    echo '<input type="hidden" name="tripid" value="' . $tripid . '">';
    echo '<input type="hidden" name="Username" value="' . $username . '">';
    echo '<a href="javascript: submitbackform()" class="float"><i class="fa fa-sign-out my-float"></i></a>';
    ?>
  </form>

  <script type="text/javascript"> 
    function submitbackform() { document.map.submit(); }
  </script> 
</body>

</html>