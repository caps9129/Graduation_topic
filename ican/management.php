<?php 
session_start();
if(!isset($_COOKIE["id"])){
    echo '帳號已被登出';
    header("Location: http://140.134.26.143/ican/ican/login_index.html"); //將網址改為要導入的登入頁面
}
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
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		
        <link href="https://fonts.googleapis.com/css?family=Anton|Permanent+Marker" rel="stylesheet">

    </head>
    <body class="homepage">
    	<div id="page-wrapper">
	    	<div class="fullscreen-bg">
                <video loop muted autoplay poster="" class="fullscreen-bg__video">
                    <source src="images/airport.mp4" type="video/mp4">
                </video>
	        </div>  
	    	
				
				
    			
	        <nav id="nav">
				<ul>
					<li><a href="index.html" class="scrolly">Home</a></li>	
					<li><a href="#footer" class="scrolly"><font color="#C10066">Platform</font></a></li>
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
			
		</div>	
		<div class="row">
	
			<div class="col-md-5">
				<a  class="image featured" href="analysis.php"><img src="images/5.png" class = "one"></a>
				<header>
					<h3><a class="one">Chart Analysis</a></h3>
				</header>
			</div>
			<div class="col-md-5">
				<a  class="image featured" href="Management_Data_Table.php"><img src="images/4.png" class = "two"></a>
				<header>
					<h3><a class="two">Management Data Table</a></h3>
				</header>
			</div>
			
			
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