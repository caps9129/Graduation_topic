<?php 
session_start();
if(!isset($_COOKIE["id"])){
    header("Location: http://140.134.26.143/ican/ican/login_index.html"); //將網址改為要導入的登入頁面
}
else if($_COOKIE["id"] == "ican"){
	header("Location: http://140.134.26.143/ican/ican/management.php");
}
else{		
	header("Location: http://140.134.26.143/ican/ican/user_management.php");
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
    		
				
				<form name="form" method="post" action="connect.php">
				<a>Account：</a><input type="text" name="id" placeholder="Account"/> <br>
				<a>Password：</a><input type="password" name="pw" placeholder="Password"/> <br>
				<input type="submit" name="button" value="Login" />&nbsp;&nbsp;
				<input type="button" value="register" onclick="location.href='register.html'">
				</form>
    			
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
