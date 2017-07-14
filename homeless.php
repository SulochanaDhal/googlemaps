<?php
	//Database connection
	$obj = mysql_connect("localhost","root","");
    mysql_select_db("maps",$obj);
	//echo mysql_errno($obj) . ": " . mysql_error($obj). "\n";
	$data=mysql_query("select * from homeless");
	$array=array();
	$c=0;
	while($row=mysql_fetch_assoc($data))
	{
		$array[]=$row;
		$c++;
	}

	
?>
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
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 2;
        padding: 0;
      }
	  #drpdwn{
		height:5%;
		width:10%
	  }
	  .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
    </style>
  </head>
  <body align="center" >
  <form action="homeless.php" method="post">
	<br><br>
CATEGORY:
	<select id="drpdwn" onchange="initMap()">
	
	<option value="dropdown"><selected="dropdown"></selected>
    <option value="info" selected="selected">info</option>
    <option value="parking">parking</option>
    <option value="library">library</option>
    <option value="homeless">Homeless</option>
	</select>
   <br><br>
<input type="submit"  class="button" value="ADD" style="position:absolute;right:1;">
</form>
<br><br><br>
   <div id="map"></div>
	<script>
	
  
      var map;
	 
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: new google.maps.LatLng(-33.91722, 151.23064),
          mapTypeId: 'roadmap'
        });
		

        var icons = {
          parking: {
            icon: 'http://findicons.com/files/icons/2222/gloss_basic/32/pin_red.png'
          },
          library: {
            icon: 'http://findicons.com/files/icons/2222/gloss_basic/32/pin_red.png'
          },
          info: {
            icon: 'http://findicons.com/files/icons/2222/gloss_basic/32/pin_red.png'
          },
          current: {
            icon:'http://maps.google.com/mapfiles/kml/pal4/icon57.png'
				//'http://maps.google.com/mapfiles/kml/pal4/icon49.png'
			//'http://maps.google.com/mapfiles/kml/paddle/8.png'
			//'http://maps.gstatic.com/mapfiles/ridefinder-images/mm_20_purple.png'
			//'http://earth.google.com/images/kml-icons/track-directional/track-8.png'
          }
        };

        var features = [
		{
            position: new google.maps.LatLng(-33.91722,  151.23064),
            type: 'current'
          },
			{
            position: new google.maps.LatLng(-33.91721, 151.22630),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-33.91539, 151.22820),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-33.91747, 151.22912),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-33.91910, 151.22907),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-33.91725, 151.23011),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-33.91872, 151.23089),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-33.91784, 151.23094),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-33.91682, 151.23149),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-33.91790, 151.23463),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-33.91666, 151.23468),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-33.916988, 151.233640),
            type: 'info'
          }, {
            position: new google.maps.LatLng(-33.91662347903106, 151.22879464019775),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-33.916365282092855, 151.22937399734496),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-33.91665018901448, 151.2282474695587),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-33.919543720969806, 151.23112279762267),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-33.91608037421864, 151.23288232673644),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-33.91851096391805, 151.2344058214569),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-33.91818154739766, 151.2346203981781),
            type: 'parking'
          }, {
            position: new google.maps.LatLng(-33.91727341958453, 151.23348314155578),
            type: 'library'
          }
        ];

        // Create markers.
		var ch=document.getElementById("drpdwn");
		var txt=ch.options[ch.selectedIndex].text;
		if(txt=='Homeless'){
			window.location="homeless.php";
			}
			else{
        features.forEach(function(feature) {
		//window.alert(txt);
	if(txt==feature.type|| feature.type=='current'){
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });
	}
        });
		}
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5XT8EHodB07v73A-1vb39vVvFSjr600Q&callback=initMap">
    </script>

	</body>
</html>