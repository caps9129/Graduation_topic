<?php

$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
    
if(!$db){
    die("無法對資料庫連線");
} 
$id = $_GET['id'];       
$used_time = $_GET['used_time'];
$voltage = $_GET['voltage'];
$current = $_GET['current'];       
$temperature = $_GET['temperature'];
$longitude = $_GET['longitude'];       
$latitude = $_GET['latitude'];
$state = $_GET['state'];
$warning = $_GET['warning'];

if($id != null)
{
        
	$sql = "INSERT INTO `trashcan_state` (ican_ID, used_time, voltage, current, temperature, latitude, longitude, warning, state) VALUES ('$id' ,'$used_time','$voltage' ,'$current' ,'$temperature' ,'$latitude' ,'$longitude', '$warning', '$state')";
	mysqli_query($db , $sql);

	$sql = "SELECT current FROM trashcan_state where Car_ID = 'test'";
	$rows = mysqli_query($db , $sql);
	$nums = mysqli_num_rows($rows); 
	if($nums > 0){
	  $sql = "SELECT last_used_time from trashcan_state order by last_used_time asc limit 1";
	  $start_datetime = mysqli_query($db , $sql);
	  $start = mysqli_fetch_row($start_datetime);
	  
	  $sql = "SELECT last_used_time from trashcan_state order by last_used_time desc limit 1";
	  $end_datetime = mysqli_query($db , $sql);
	  $end = mysqli_fetch_row($end_datetime);
	  
	  
	  $difference_in_seconds = strtotime($end[0]) - strtotime($start[0]);
	  $per_sec = $difference_in_seconds / $nums;

	  // time
	  /*$sql = "SELECT current from trashcan_state order by last_used_time desc limit 1";
	  $nowv = mysqli_query($db , $sql);
	  $now_current = mysqli_fetch_row($nowv);
	  if($now_current[0] <= 1)
	    $now_current[0] = 1;*/
	  //soc
	  $cur_sum = 0;
	  for($i = 0 ; $i < $nums ; $i++){
	    $Current = mysqli_fetch_row($rows);
	    $cur_sum = $cur_sum + $Current[0] * $per_sec;
	  }
	  $battery = 1 - ($cur_sum / 55913.074659616);
	  /*$remain_time = (55914.074659616 - $cur_sum) / $now_current[0];*/
	  /*echo round($remain_time, 3);*/
	  echo '<br>';  
	  if($battery < 0)
	    $battery = - $battery;  

		$battery = $battery * 100;
		$battery = round($battery, 3);
	  /*echo round($battery, 3);*/

	 } 

	$sql = "INSERT INTO `trashcan_show_state` (ican_ID, used_time, battery, voltage, current, temperature, latitude, longitude, warning, state) VALUES ('$id' ,'$used_time', '$battery','$voltage' ,'$current' ,'$temperature' ,'$latitude' ,'$longitude', '$warning', '$state')";
	mysqli_query($db , $sql);
	$sql = "UPDATE `trashcan_show_state` SET `voltage`= '$voltage' , `battery`= '$battery' , `current`= '$current' , `temperature`= '$temperature' , `longitude`= '$longitude' , `latitude`= '$latitude' , `warning`= '$warning' , `used_time` = '$used_time' , `state` = '$state' where `ican_ID`='$id'";
	mysqli_query($db , $sql);
	$sql = "INSERT INTO `trashcan_battery_state` (ican_ID, used_time, battery, voltage, current, temperature, latitude, longitude, warning, state) VALUES ('$id' ,'$used_time', '$battery','$voltage' ,'$current' ,'$temperature' ,'$latitude' ,'$longitude', '$warning', '$state')";
	mysqli_query($db , $sql);
	echo 'Successful!';
              
}
else{
	echo 'Fail!';
}