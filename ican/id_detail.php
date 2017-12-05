<?php
$ID = $_GET['id'];
$Longitude = 120.642485;
$Latitude = 24.179000;

$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
if(!$db){
    die("無法對資料庫連線");
}        
 $sql = "SELECT * from trashcan_state WHERE ican_ID = '$ID' order by last_used_time desc limit 10";
$rows = mysqli_query($db , $sql);
$nums = mysqli_num_rows($rows);
?>
<!DOCTYPE HTML>
<html>
	<html style= "padding-top: 10% ; padding-left: 0% ; padding-right: 0% ; border-right-width: 20px; background-color: black;">
	<head>
	<link rel="icon" 
      type="image/png" 
      href="images/icon.png">
		<title>智慧行李箱</title>
		<meta charset="utf-8" />
		<style>
	      /* Always set the map height explicitly to define the size of the div
	       * element that contains the map. */
	      #map {
	        height: 100%;
	      }
	      /* Optional: Makes the sample page fill the window. */
	      html, body {
	        height: 100%;
	        margin: 0;
	        padding: 0;
	      }
	    </style>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		
        <!--<link href="C:/Users/caps9/Desktop/html5up-helios/assets/css/bootstrap.css" rel="stylesheet">-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://fonts.googleapis.com/css?family=Voltaire" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
        <link href="https://fonts.googleapis.com/css?family=Anton|Permanent+Marker" rel="stylesheet">
        <!--  map  -->
      
    </head>

    <body>
    	<div id="contain_blank"></div>
	    <script>
	      var map;
	      function initMap() {
	        map = new google.maps.Map(document.getElementById('map'), {
	          zoom: 16,
	          center: new google.maps.LatLng(<?php echo $Latitude; ?>,<?php echo $Longitude; ?>),
	          /*var myLatlng = new google.maps.LatLng(<?php echo $Latitude[0]; ?>,<?php echo $Longitude[0]; ?>);*/
	          /*center: new google.maps.LatLng(24.179568 , 120.644438),*/
	          mapTypeId: 'roadmap'
	        });
	      
	        var icons = {
	          gas: {
	            icon: 'images/gas.png'
	          },
	          email: {
	            /*icon: dot_center + 'red-dot.png'*/
	            icon: 'images/email.png'
	          }
	        };
	        var features = [
	          {
	            position: new google.maps.LatLng(<?php echo $Latitude; ?>,<?php echo $Longitude; ?>),
	            type: 'info'
	          },
	          {
	            position: new google.maps.LatLng(24.171188, 120.6311989),
	            type: 'gas'
	          }, 
	          {
	            position: new google.maps.LatLng(24.1713234, 120.6417413),
	            type: 'gas'
	          }, 
	          {
	            position: new google.maps.LatLng(24.1635083, 120.6482792),
	            type: 'gas'
	          },
	          {
	            position: new google.maps.LatLng(24.171223, 120.6293373),
	            type: 'gas'
	          }, 
	          {
	            position: new google.maps.LatLng(24.166172, 120.6167743),
	            type: 'gas'
	          }, 
	          {
	            position: new google.maps.LatLng(24.1721424, 120.6432125),
	            type: 'gas'
	          },
	          {
	            position: new google.maps.LatLng(24.182369, 120.6314393),
	            type: 'gas'
	          },
	          {
	            position: new google.maps.LatLng(24.201513, 120.6526283),
	            type: 'gas'
	          }, 
	          {
	            position: new google.maps.LatLng(24.1782459, 120.6183106),
	            type: 'gas'
	          }, 
	          {
	            position: new google.maps.LatLng(24.1796619, 120.6169046),
	            type: 'gas'
	          },
	        ];
	        // Create markers.
	        features.forEach(function(feature) {
	          var marker = new google.maps.Marker({
	            position: feature.position,
	            icon: icons[feature.type].icon,
	            map: map
	          });
	        });
	      }
	    </script>
	    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQhNukU-sEshEijjJClTz6o-53RFLvSsM&callback=initMap"   type="text/javascript"></script>
    	<table cellpadding="8" border="1">
    		<thead>
    			<tr>	
					<th>ID</th>
					<th>used time</th>
					<th>voltage</th>
					<th>current</th>
					<th>temperature</th>
					<th>battery</th>
					<!--th>latitude</th>
					<th>longitude</th-->
					<th>warning</th>
					<th>state</th>
					<th>last used time</th>
				</tr>
			</thead>	
			<tbody>
			<?php
			for($a = 0 ; $a < $nums ; $a++){
				$row = mysqli_fetch_row($rows);
				echo "<tr>";
				echo "<td class = \"id_detail\"> <a href='id_detail.php?id=$row[0]&lon=120.642485&lat=24.179000'  target='_blank'>{$row[0]}</a> </td>";
				echo "<td class = \"id_detail\">" . $row[1] . "</td>";
				echo "<td class = \"id_detail\">" . $row[2] . "</td>";
				echo "<td class = \"id_detail\">" . $row[3] . "</td>";
				echo "<td class = \"id_detail\">" . $row[4] . "</td>";
				echo "<td class = \"id_detail\">" . 0 . "</td>";
				/*echo "<td class = \"id_detail\">" . $row[5] . "</td>";
				echo "<td class = \"id_detail\">" . $row[6] . "</td>";*/
				echo "<td class = \"id_detail\">" . $row[7] . "</td>";
				echo "<td class = \"id_detail\">" . $row[8] . "</td>";
				echo "<td class = \"id_detail\">" . $row[9] . "</td>";
				echo "</tr>";	
			}
			mysqli_free_result($rows);
			?>
			</tbody>	
    	</table>
    	<div id="map"></div>
    	<div id="contain_blank"></div>
    	<?php
    		if($Latitude != 0 && $Longitude != 0){
	    		$urlApi = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$Latitude.",".$Longitude."&destinations=24.181076,120.631971|24.161451,120.618195|24.180547,120.653836&avoid=highways&key=AIzaSyAQhNukU-sEshEijjJClTz6o-53RFLvSsM";
			    $result = file_get_contents($urlApi);
			    $data = json_decode($result, true);
			    for($i = 0 ; $i < 3 ; $i++){
			      $destination_addresses[$i] = $data['destination_addresses'][$i];
			      $millas[$i] =  $data['rows'][0]['elements'][$i]['distance']['text'];
			      $millasKm[$i] = round(($millas[$i] * 1.60934),2);
			      $duration[$i] = $data['rows'][0]['elements'][$i]['duration']['text'];
			      $compare[$i] = $data['rows'][0]['elements'][$i]['duration']['value'];
			    }
			    /* bubble sort*/
			    for($i = 0 ; $i < 2 ; $i++)
			    {
			      for($j = 0 ; $j < 2 - $i ; $j++)
			      {
			        if($compare[$j] > $compare[$j + 1])
			        {
			          $temp = $duration[$j + 1];
			          $duration[$j + 1] = $duration[$j];
			          $duration[$j] = $temp;
			          $temp = $millasKm[$j + 1];
			          $millasKm[$j + 1] = $millasKm[$j];
			          $millasKm[$j] = $temp;
			          $temp = $destination_addresses[$j + 1];
			          $destination_addresses[$j + 1] = $destination_addresses[$j];
			          $destination_addresses[$j] = $temp;
			          $temp = $compare[$j + 1];
			          $compare[$j + 1] = $compare[$j];
			          $compare[$j] = $temp;
			        } 
			      }
			    }
			    /**/
			    echo '<table class=';
			    echo 'table>';
			    echo '
			        <thead>           
			          <tr style="background:#A500CC; color:white; font-weight:bold">
			            <th>                
			              Charging Station
			            </th>
			            <th>
			              Distance
			            </th>
			            <th>
			              Spend
			            </th>
			          </tr> 
			        </thead>
			        <tbody>';
			    
			    
			    for($i = 0 ; $i < 3 ; $i++){
			      echo"<td>" . $destination_addresses[$i] . "</td>"; 
			      echo"<td>" . $millasKm[$i] . "km" . "</td>"; 
			      echo"<td>" . $duration[$i] . "</td>"; 
			      echo"</tr>";
			    }
			    echo '</tbody></table>';
			}    
    	?>	
    	<div id="contain_blank"></div>			
        <nav id="nav">
			<ul>
				<li><a href="index.html" class="scrolly">Home</a></li>	
				<li><a href="#footer" class="scrolly"><font color="#C10066">I-can Information</font></a></li>
				<li><a href="#">Member</a>
					<ul>
					<li><a href="management.php" class="scrolly">Management</a></li>
					<li><a href="register.html" class="scrolly">Register</a></li>
					<li><a href="report.html" class="scrolly">Report</a></li>
					<li><a href="logout.php" class="scrolly">Logout</a></li>
					</ul>
				</li>		
			</ul>
		</nav>	
			
	
	</body>	
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.onvisible.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			
</html>