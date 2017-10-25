<?php

$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
    
if(!$db){
    die("無法對資料庫連線");
}        
$id = $_POST['id'];
$comment = $_POST['comment'];


if($id != null && $comment != null)
{
		$sql = "INSERT INTO `trashcan_report` (account, comment) VALUES ('$id', N'$comment')";
		mysqli_query($db , $sql);
		$sql = "UPDATE `trashcan_report` SET `comment`= N'$comment' where `account`='$id'";
	    mysqli_query($db , $sql);
		echo 'Report Successful!';
		
}
else
{
        echo 'Report Fail , try it again!';
}
?>