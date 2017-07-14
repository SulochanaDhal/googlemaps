
<!DOCTYPE html>
<html>
  <head>
    <title>Custom Markers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 2;
        padding: 0;
      }
	  
    </style>
  </head>
  <body align="center" >
  
    <div id="map"></div>
	<script>
	
  
      var map;
	 
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: new google.maps.LatLng(-33.91722, 151.23064),
          mapTypeId: 'roadmap'
        });
		

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maps";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM homeless";
$result = $conn->query($sql);

while($row=$result->fetch_assoc())
{?>
        // Create markers.
		         
	          var marker = new google.maps.Marker({
            position: {lat:<?php echo $row['LATITUDE'] ?>,lng:<?php echo $row['LONGITUDE'] ?>},
            icon: 'http://findicons.com/files/icons/2222/gloss_basic/32/pin_red.png',
            map: map
          });

			<?php } ?>
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5XT8EHodB07v73A-1vb39vVvFSjr600Q&callback=initMap">
    </script>

	<?php echo "<h2><strong><center>Thank you !!!"; ?>
	</body>
</html>