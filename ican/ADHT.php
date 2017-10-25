<?php

$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
    
if(!$db){
    die("無法對資料庫連線");
} 
$humidity = $_GET['humidity'];       
$temperature = $_GET['temperature'];

if($humidity > 10 && $humidity < 100)
{
        
	$sql = "INSERT INTO `dht` (Humidity, Temperature) VALUES ('$humidity' , '$temperature')";
	mysqli_query($db , $sql);
	
	echo 'Successful!';
              
}
else{
	echo 'Fail!';
}
