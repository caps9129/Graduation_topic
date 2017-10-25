<?php

$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
    
if(!$db){
    die("無法對資料庫連線");
}        
$id = $_POST['id'];
$pw = $_POST['pw'];

$sql = "SELECT * FROM trashcan_account where account = '$id'";
$result = mysqli_query($db , $sql);
$row = mysqli_fetch_row($result);

$sql = "SELECT * FROM trashcan_authority where account = '$id'";
$result = mysqli_query($db , $sql);
$row_1 = mysqli_fetch_row($result);

if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw)
{
        
    if($row_1[1] == NULL){
    	echo "0000";   
    }
    else{
         echo "0001";
    }
        
        
}
else
{
    echo "0010";
}
?>