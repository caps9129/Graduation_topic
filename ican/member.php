<?php
$id = $_COOKIE['id'];
$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
if(!$db){
    die("無法對資料庫連線");
}        
$sql = "SELECT * FROM trashcan_account where account = '$id'";
$rows = mysqli_query($db , $sql);
$nums = mysqli_num_rows($rows);


?>
<!DOCTYPE HTML>
<html>
	<html style= "padding-top: 150px ; padding-left: 38% ; padding-right: 80px ; border-right-width: 20px; background-color: black;">
	<head>
	<link rel="icon" 
      type="image/png" 
      href="images/icon.png">
		<title>智慧行李箱</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		
        <!--<link href="C:/Users/caps9/Desktop/html5up-helios/assets/css/bootstrap.css" rel="stylesheet">-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://fonts.googleapis.com/css?family=Voltaire" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
        <link href="https://fonts.googleapis.com/css?family=Anton|Permanent+Marker" rel="stylesheet">

    </head>

    <body>
    	<div class="fullscreen-bg">
            <video loop muted autoplay poster="" class="fullscreen-bg__video">
                <source src="images/airport.mp4" type="video/mp4">
            </video>
        </div>  
    		
    				
			
				
			
			
		<?php
		for($a = 0 ; $a < $nums ; $a++){
			$row = mysqli_fetch_row($rows);
			echo " <h4><font color =\"white\" style = \"line-height: 200%\"> Account: $row[0] </font></h4><br>";
			echo " <h4><font color =\"white\" style = \"line-height: 200%\"> Password: $row[1] </font></h4><br>";
			echo " <h4><font color =\"white\" style = \"line-height: 200%\"> Email: $row[2] </font></h4><br>";
			echo " <h4><font color =\"white\" style = \"line-height: 200%\"> Phone: $row[3] </font></h4><br>";
		}
			

		
		mysqli_free_result($rows);
		?>
			
    	
	    		
        <nav id="nav">
			<ul>
				<li><a href="index.html" class="scrolly">Home</a></li>	
				<li><a href="#footer" class="scrolly"><font color="#C10066">User Information</font></a></li>
				<li><a href="#">Member</a>
					<ul>
					<li><a href="user_management.php" class="scrolly">Management</a></li>
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
					