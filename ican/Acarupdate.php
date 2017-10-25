<?php

$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
    
if(!$db){
    die("無法對資料庫連線");
} 
$id = $_GET['id'];       
$voltage = $_GET['voltage'];
$current = $_GET['current'];       
$temperature = $_GET['temperature'];
$longitude = $_GET['longitude'];       
$latitude = $_GET['latitude'];

if($id != null)
{
        
	$sql = "INSERT INTO `car_information` (Car_ID, Voltage, Current, Temperature, Longitude, Latitude) VALUES ('$id' , '$voltage' , '$current' , '$temperature' , '$longitude' , '$latitude')";
	mysqli_query($db , $sql);
	$sql = "INSERT INTO `car_show_information` (Car_ID, Voltage, Current, Temperature, Longitude, Latitude) VALUES ('$id' , '$voltage' , '$current' , '$temperature' , '$longitude' , '$latitude')";
	mysqli_query($db , $sql);
	$sql = "UPDATE `car_show_information` SET `Voltage`= '$voltage' , `Current`= '$current' , `Temperature`= '$temperature' , `Longitude`= '$longitude' , `Latitude`= '$latitude' where `Car_ID`='$id'";
	mysqli_query($db , $sql);

	$sql = "SELECT Current FROM car_information where Car_ID = 'test'";
	$rows = mysqli_query($db , $sql);
	$nums = mysqli_num_rows($rows); 
	if($nums > 0){
	  $sql = "SELECT Log from car_information order by Log asc limit 1";
	  $start_datetime = mysqli_query($db , $sql);
	  $start = mysqli_fetch_row($start_datetime);
	  
	  $sql = "SELECT Log from car_information order by Log desc limit 1";
	  $end_datetime = mysqli_query($db , $sql);
	  $end = mysqli_fetch_row($end_datetime);
	  
	  
	  $difference_in_seconds = strtotime($end[0]) - strtotime($start[0]);
	  $per_sec = $difference_in_seconds / $nums;
	}
	  // time
	  $sql = "SELECT Current from car_information order by Log desc limit 1";
	  $nowv = mysqli_query($db , $sql);
	  $now_current = mysqli_fetch_row($nowv);
	  if($now_current[0] <= 1)
      	$now_current[0] = 1;


	  $cur_sum = 0;
	  for($i = 0 ; $i < $nums ; $i++){
	    $Current = mysqli_fetch_row($rows);
	    $cur_sum = $cur_sum + $Current[0] * $per_sec;
	  }
	  
	  //soc
	  $battery = 1 - ($cur_sum / 55913.074659616);
	  if($battery < 0)
	    $battery = - $battery;  
	  $battery = $battery * 100;

	  //time
	  /*$remain_time = (55914.074659616 - $cur_sum) / $now_current[0];*/
	  $remain_time = (55914.074659616 - $cur_sum) / 1.5;
  	  $Remain_Time = round($remain_time, 3);
  	  $time = gmdate('H:i:s',$remain_time);


  	  
  	  $sql = "INSERT INTO `car_battery` (id, battery, remain_time) VALUES ('$id' , '$battery' , '$time')";
	  mysqli_query($db , $sql);
	
	echo 'Successful!';
              
}
else{
	echo 'Fail!';
}
