<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
    
if(!$db){
    die("無法對資料庫連線");
}        
$id = $_POST['id'];
$comment = $_POST['comment'];


//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($id != null && $comment != null)
{
		$sql = "INSERT INTO `trashcan_report` (account, comment) VALUES ('$id', N'$comment')";
		mysqli_query($db , $sql);
		$sql = "UPDATE `trashcan_report` SET `comment`= N'$comment' where `account`='$id'";
	    mysqli_query($db , $sql);
		echo 'Report Successful!';
		echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
		 //顯示查詢出來資料所組成的二維陣列內容。
}
else
{
        echo 'Report Fail , try it again!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=report.html>';
}
?>