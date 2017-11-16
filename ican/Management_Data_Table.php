<!DOCTYPE HTML>
<html>
	<html style= "padding-top: 150px ; padding-left: 10% ; padding-right: 10% ; border-right-width: 20px; background-color: black;">
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
	   
    	
		<div id="content">
			<!--?php include 'Management_Data_Table_Select.php';?-->	
		</div>	
    	
    	
			
	    		
        <nav id="nav">
			<ul>
				<li><a href="index.html" class="scrolly">Home</a></li>	
				<li><a href="#footer" class="scrolly"><font color="#C10066">Management Form</font></a></li>
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
			<script>
				$(document).ready(function() {
	  				$.ajaxSetup({ cache: false }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
	  				setInterval(function() {
	    				$('#content').load('Management_Data_Table_Select.php');
	  				}, 1000); // the "3000" 
				});
			</script>
			<!--meta http-equiv="refresh" content="3"-->
</html>
			