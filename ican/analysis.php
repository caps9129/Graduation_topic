<?php
//echo "PHP Version: " . phpversion();
$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
if(!$db){
    die("無法對資料庫連線");
}        
$sql = "SELECT * FROM trashcan_follow where ID < 200";
$rows = mysqli_query($db , $sql);
$nums = mysqli_num_rows($rows);

if($nums > 0){
	for($i = 0 ; $i < $nums ; $i++){
		$row = mysqli_fetch_row($rows);
		$temp[$i] = $row[1];
	}
}
//echo json_encode($temp);
mysqli_free_result($rows);


$sql =  "SELECT * FROM trashcan_state where ican_ID = 'test'";  
$sth = mysqli_query($db , $sql);

        $data = array (
      'cols' => array( 
        array('id' => 'Date', 'label' => 'Date', 'type' => 'datetime'), 
        array('id' => 'Voltage', 'label' => 'Voltage', 'type' => 'number'), 
        array('id' => 'Current', 'label' => 'Current', 'type' => 'number'), 
        array('id' => 'Temperature', 'label' => 'Temperature', 'type' => 'number'),

    ),
    'rows' => array()
);

while ($res = mysqli_fetch_assoc($sth)) {
     // assumes dates are patterned 'yyyy-MM-dd hh:mm:ss'
    preg_match('/(\d{4})-(\d{2})-(\d{2})\s(\d{2}):(\d{2}):(\d{2})/', $res['last_used_time'], $match);
    $year = (int) $match[0];
    $month = (int) $match[1] - 1; // convert to zero-index to match javascript's dates
    $day = (int) $match[2];
    $hours = (int) $match[3];
    $minutes = (int) $match[4];
    $seconds = (int) $match[5];
    array_push($data['rows'], array('c' => array(
        array('v' => 'Date(' . date('Y,n,d,H,i,s', strtotime ( '-1 month' , strtotime ($res['last_used_time']) ) ).')'),
        array('v' => floatval($res['voltage'])), 
        array('v' => floatval($res['current'])),
        array('v' => floatval($res['temperature'])),
    )));   
    // array nesting is complex owing to to google charts api
}

/*$sql =  "SELECT * FROM  dht WHERE 1";  
$sth = mysqli_query($db , $sql);

        $data_dht = array (
      'cols' => array( 
        array('id' => 'Date', 'label' => 'Date', 'type' => 'datetime'), 
        array('id' => 'Humidity', 'label' => 'Humidity', 'type' => 'number'), 
        array('id' => 'Temperature', 'label' => 'Temperature', 'type' => 'number'), 

    ),
    'rows' => array()
);

while ($res = mysqli_fetch_assoc($sth)) {
     // assumes dates are patterned 'yyyy-MM-dd hh:mm:ss'
    preg_match('/(\d{4})-(\d{2})-(\d{2})\s(\d{2}):(\d{2}):(\d{2})/', $res['Log'], $match);
    $year = (int) $match[0];
    $month = (int) $match[1] - 1; // convert to zero-index to match javascript's dates
    $day = (int) $match[2];
    $hours = (int) $match[3];
    $minutes = (int) $match[4];
    $seconds = (int) $match[5];
    array_push($data_dht['rows'], array('c' => array(
        array('v' => 'Date(' . date('Y,n,d,H,i,s', strtotime ( '-1 month' , strtotime ($res['Log']) ) ).')'),
        array('v' => floatval($res['Humidity'])), 
        array('v' => floatval($res['Temperature'])),
    )));   
    // array nesting is complex owing to to google charts api
}*/

?>
<!DOCTYPE HTML>
<html>
  <head>
  <link rel="icon" 
      type="image/png" 
      href="images/icon.png">
    <title>智慧垃圾桶</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link href="assets/css/main.14219f9b.css" rel="stylesheet">
        <!--<link href="C:/Users/caps9/Desktop/html5up-helios/assets/css/bootstrap.css" rel="stylesheet">-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Voltaire" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
     <div id="line_top_x"  style="padding-top: 10% ; padding-left: 30%;"></div>
    <div id="chart_div"  style="padding-top: 10% ; padding-left: 30%;"></div>
    <div id="dht_div"  style="padding-top: 5% ; padding-left: 30%;"></div>
    <!--video width="2000" height="400" autoplay style="padding-top: 5%; padding-right: 3%;">
      <source src="DEMO.mp4" type="video/mp4">
    </video-->   
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    
        <link href="https://fonts.googleapis.com/css?family=Anton|Permanent+Marker" rel="stylesheet">

    </head>
    <body class="analysis">
    <div id= "page-wrapper">
    <div class="fullscreen-bg">
      <video loop muted autoplay poster="" class="fullscreen-bg__video">
          <source src="images/airport.mp4" type="video/mp4">
      </video>
    </div>  
    <!--script type="text/javascript">
      var nums = <?php echo $nums ?>;
      var temp_data = <?php echo json_encode($temp) ?>;

      var input_data = new Array();

      for(var i = 0; i < nums; i++){
      	var temp = Number(temp_data[i]);
      	input_data[i] = temp;
      }
      
  	 
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Count(0.5s)');
      data.addColumn('number', 'Rssi');
     

      for (var i = 0; i < nums; i++){
	      data.addRows([
	      [i, input_data[i]]
	      ]);
	   }   	
      var options = {
        series: {
          0: { color: '#FFFF00' },
        } ,
        chart: {
          title: 'Distance siganl strength ',
          subtitle: 'Beacon rssi',
        },
        vAxis: {
          format: '0.000' // show axis values to 3 decimal places
        },
        width: 800,
        height: 400,
        
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
      </script-->
    
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable(<?php echo json_encode($data); ?>);

      var options = {
        chart: {
          title: 'Baterry Analysis',
          subtitle: 'Voltage , Current , Temperature'
        },
        width: 800,
        height: 400,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('chart_div'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script>
   
  <!--script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable(<?php echo json_encode($data_dht); ?>);

      var options = {
        chart: {
          title: 'DHT Analysis',
          subtitle: 'Humidity , Temperature'
        },
        width: 800,
        height: 400,
        axes: {
          x: {
            0: {side: 'top'}
          }
        }
      };

      var chart = new google.charts.Line(document.getElementById('dht_div'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
  </script-->      
      <nav id="nav">
        <ul>
          <li><a href="index.html" class="scrolly">Home</a></li>  
          <li><a href="#footer" class="scrolly"><font color="#C10066">Analysis</font></a></li>
          <li><a href="#">Member</a>
            <ul>
            <li><a a href="management.php" class="scrolly">Management</a></li>
            <li><a href="register.html" class="scrolly">Register</a></li>
            <li><a href="report.html" class="scrolly">Report</a></li>
            <li><a href="logout.php" class="scrolly">Logout</a></li>
            </ul>
          </li>   
        </ul>
      </nav>  
    </div>  
  </body> 
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.dropotron.min.js"></script>
      <script src="assets/js/jquery.scrolly.min.js"></script>
      <script src="assets/js/jquery.onvisible.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="assets/js/main.js"></script>

  	
  	  <meta http-equiv="refresh" content="120; url="140.134.26.143/ican/ican/analysis.php">	
  	
</html>