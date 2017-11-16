<?php
$id = $_COOKIE['id'];

session_start();
if(!isset($_COOKIE["id"])){
	echo '帳號已被登出';
	header("Location: http://140.134.26.143/ican/ican/login_index.html"); //將網址改為要導入的登入頁面
}

$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
if(!$db){
    die("無法對資料庫連線");
}        
$sql = "SELECT * FROM trashcan_authority where account = '$id'";
$rows = mysqli_query($db , $sql);
$nums = mysqli_num_rows($rows);

if($nums > 0){
	for($i = 0 ; $i < $nums ; $i++){
		$row = mysqli_fetch_row($rows);
		$temp[$i] = $row[1];
	}
}
mysqli_free_result($rows);	

?>
<!DOCTYPE HTML>
<html>
	<html style= "padding-top: 150px ; padding-left: 80px ; padding-right: 80px ; border-right-width: 20px; background-color: black;">
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
    	<div class = "show">
		    <?php
		    	echo "<h5><font color =\"white\"> welcome &nbsp: &nbsp $id</font></h5>";
		    ?>	
		    	<table>
		    		<thead>
		    			<tr>	
							<th>ID</th>
							<th>used time</th>
							<th>voltage</th>
							<th>current</th>
							<th>temperature</th>
							<th>battery</th>
							<th>latitude</th>
							<th>longitude</th>
							<th>warning</th>
							<th>state</th>
							<th>last used time</th>
						</tr>
					</thead>	
					<tbody>
					<?php
					$battery = NULL;
					for($a = 0 ; $a < $nums ; $a++){
						$sql = "SELECT * FROM trashcan_show_state where ican_ID = '$temp[$a]'";
						$rows = mysqli_query($db , $sql);
						$num = mysqli_num_rows($rows);
						if($num > 0){
							for($i = 0 ; $i < $num ; $i++){
							$row = mysqli_fetch_row($rows);
							echo "<tr>";
							echo "<td class = \"id_detail\">" . $row[0] . "</td>";
							echo "<td class = \"id_detail\">" . $row[1] . "</td>";
							echo "<td class = \"id_detail\">" . $row[2] . "</td>";
							echo "<td class = \"id_detail\">" . $row[3] . "</td>";
							echo "<td class = \"id_detail\">" . $row[4] . "</td>";
							echo "<td class = \"id_detail\">" . 0 . "</td>";
							echo "<td class = \"id_detail\">" . $row[5] . "</td>";
							echo "<td class = \"id_detail\">" . $row[6] . "</td>";
							echo "<td class = \"id_detail\">" . $row[7] . "</td>";
							echo "<td class = \"id_detail\">" . $row[8] . "</td>";
							echo "<td class = \"id_detail\">" . $row[9] . "</td>";
							echo "</tr>";
							if($row[3] < 20){
								$j = 0;
								$battery[$j] = $row[0];
								$j++;
								//echo"$battery[$a]";
								//echo("<script>alert('垃圾桶".$row[0]."號電量過低!!');</script>");
							}
							}		
						}
						
					}
					if($battery == NULL){
						print_r("<script>alert('沒有電量過低的垃圾桶!!');</script>");
					}
					else
					print_r("<script>alert('垃圾桶".json_encode($battery)."號電量過低!!');</script>");
					//$text = print_r($battery, true);

					
					mysqli_free_result($rows);
					?>
					</tbody>	
		    	</table>
	    	</div>	
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
			<?php header('refresh: 600;url="show.php"')?>
</html>