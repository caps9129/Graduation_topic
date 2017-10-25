<?php

$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
    
if(!$db){
    die("無法對資料庫連線");
}  

$id = $_GET['id'];
$rfid = $_GET['rfid'];      
$row[0] = '';
$row[1] = '';

$sql = "SELECT * FROM trashcan_rfid where ID = '$id' AND rfid = '$rfid'";
$result = mysqli_query($db , $sql);
$row = mysqli_fetch_row($result);


if($id != '' && $rfid != '' && $row[0] == $id && $row[1] == $rfid)
{
        echo '1';         
}
else
{
        echo '0';
        
}
?>