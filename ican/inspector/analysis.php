<?php
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
		$temp[$i] = -$row[1];
	}
}
mysqli_free_result($rows);	

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
     <div id="line_top_x"></div>
    
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    
        <link href="https://fonts.googleapis.com/css?family=Anton|Permanent+Marker" rel="stylesheet">

    </head>
    <body class="homepage" style="padding-top: 100px;">
    <div id= "page-wrapper">
  
    <script type="text/javascript">
      var nums = <?php echo $nums ?>;
      //var data = ["<?php echo join("\", \"", $temp); ?>"];
      

      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Day');
      data.addColumn('string', 'Guardians of the Galaxy');
     

      for (var i = 0; i < nums; i++){
	      data.addRows([
	      [i, "<?php echo $temp[+i]; ?>"]
	      ]);
	   }   	
      var options = {
        chart: {
          title: 'Box Office Earnings in First Two Weeks of Opening',
          subtitle: 'in millions of dollars (USD)'
         
        },
      
        width: 800,
        height: 400,
        
      };

      var chart = new google.charts.Line(document.getElementById('line_top_x'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
      </script>
      <nav id="nav">
        <ul>
          <li><a href="index.html" class="scrolly">Home</a></li>  
          <li><a href="#footer" class="scrolly"><font color="#C10066">Login</font></a></li>
          <li><a href="#">Member</a>
            <ul>
            <li><a href="login_index.php" class="scrolly">Login</a></li>
            <li><a href="register.html" class="scrolly">Register</a></li>
            <li><a href="ikey.html" class="scrolly">ikey</a></li>
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
  
</html>