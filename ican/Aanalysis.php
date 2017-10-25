<?php

$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
    
if(!$db){
    die("無法對資料庫連線");
}        
$id = $_GET['id'];
$rssi = $_GET['rssi'];
$major = $_GET['major'];
$minor = $_GET['minor'];

if($id != null && $rssi != null && $major != null && $minor != null)
{
		
		$id = $id % 200;
		$sql = "INSERT INTO `trashcan_follow` (ID, rssi, major, minor) VALUES ('$id' , '$rssi' , '$major' , '$minor')";
		mysqli_query($db , $sql);
		$sql = "UPDATE `trashcan_follow` SET `rssi`= '$rssi' , `major`= '$major' , `minor`= '$minor' where `ID`='$id'";
	    mysqli_query($db , $sql);
		echo 'Successful!';
		
}
else
{
        echo 'Fail!';
}
?>