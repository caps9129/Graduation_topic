<?php

$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
if(!$db){
    die("無法對資料庫連線");
} 
$sql =  "SELECT * FROM car_information where Car_ID = 'test'";  
$sth = mysqli_query($db , $sql);

        $data = array (
      'cols' => array( 
        array('id' => 'date', 'label' => 'date', 'type' => 'datetime'), 
        array('id' => 'volt', 'label' => 'volt', 'type' => 'number'), 
    ),
    'rows' => array()
);

while ($res = mysqli_fetch_assoc($sth)) {
     // assumes dates are patterned 'yyyy-MM-dd hh:mm:ss'
    preg_match('/(\d{4})-(\d{2})-(\d{2})\s(\d{2}):(\d{2}):(\d{2})/', $res['Log'], $match);
    $year = (int) $match[1];
    $month = (int) $match[2] - 1; // convert to zero-index to match javascript's dates
    $day = (int) $match[3];
    $hours = (int) $match[4];
    $minutes = (int) $match[5];
    $seconds = (int) $match[6];
    array_push($data['rows'], array('c' => array(
        array('v' => 'Date(' . date('Y,n,d,H,i,s', strtotime($res['Log'])).')'), 
        array('v' => floatval($res['Voltage'])), 
    )));   
    // array nesting is complex owing to to google charts api
}
    
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1.1', {'packages':['annotationchart']});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
            var bar_chart_data = new google.visualization.DataTable(<?php echo json_encode($data); ?>);
        var options = {
          title: 'Weather Station'
        };
        var chart = new google.visualization.AnnotationChart(document.getElementById('chart_div'));
        chart.draw(bar_chart_data, options);
      }
    </script>
 </head>
        <body>
                <div id="chart_div" style="width: 900px; height: 500px;"></div>
        </body>
</html>