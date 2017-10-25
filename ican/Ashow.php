<?php
$id = $_GET['id'];
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
	//mysqli_free_result($rows);
	$battery = null;	

for($a = 0 ; $a < $nums ; $a++){
	$sql = "SELECT * FROM trashcan_show_state where ican_ID = '$temp[$a]'";	
	$rows = mysqli_query($db , $sql);
	
	
	while($r = mysqli_fetch_assoc($rows))
	$output[] = $r;
	

	
}
echo(json_encode($output));
//$text = print_r($battery, true);


mysqli_free_result($rows);			


?>