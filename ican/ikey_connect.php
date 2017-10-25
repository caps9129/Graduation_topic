<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$id = $_COOKIE['id'];
echo $id ;
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
    
if(!$db){
    die("無法對資料庫連線");
}        

$ikey = $_POST['ikey'];
//搜尋資料庫資料
//echo($id);



$sql = "SELECT * FROM trashcan_account where account = '$id'";
$result = mysqli_query($db , $sql);
$row = mysqli_fetch_row($result);


//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員

if($id != null &&  $row[0] == $id )
{
        
		$sql = "SELECT * FROM trashcan_ikey where ikey = '$ikey'";
		$result = mysqli_query($db , $sql);
		$row = mysqli_fetch_row($result);
		if($row[1] == $ikey){

			//將帳號寫入session，方便驗證使用者身份
			$_SESSION['username'] = $id;
			
			$row[2] = $row[2] - 1;
			
			if($row[2] == 0){
				$sql = "DELETE FROM `trashcan_ikey` WHERE ikey = '$ikey'";
            	mysqli_query($db , $sql);
			} 
			else{
				$sql = "UPDATE `trashcan_ikey` SET amount = '$row[2]' WHERE ikey = '$ikey'";
				mysqli_query($db , $sql);
			}

			date_default_timezone_set('Asia/Taipei');
			$datetime = date("Y/m/d H:i:s");

			$sql = "INSERT INTO `trashcan_authority` (account, ican_id, establish_time) VALUES ('$id', '$row[0]', '$datetime')";
			mysqli_query($db , $sql);
          
        	echo '成功綁定產品序號!';
        	echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';

		}
		else{
			echo '產品序號錯誤!';
        	echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
		}    
        
}
else
{
        echo '登入失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.html>';
}
?>