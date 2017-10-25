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

if($id == 'ican' && $pw == 'cani'){
    setcookie("id" , $id , time()+3600*24);
    echo "Welcome to the management page";
    echo '<meta http-equiv=REFRESH CONTENT=1;url=management.php>';
}

else if($id != null && $pw != null && $row[0] == $id && $row[1] == $pw)
{
        setcookie("id" , $id , time()+3600*24);
        //將帳號寫入session，方便驗證使用者身份
        echo '登入成功!';
        if($row_1[1] != NULL){
        	//$date = strtotime("+1440seconds " , time());
            
            echo '<meta http-equiv=REFRESH CONTENT=1;url=user_management.php>';

		}
		
		 //顯示查詢出來資料所組成的二維陣列內容。
        else{
        	echo '帳號還未綁定ikey!';
        	echo '<meta http-equiv=REFRESH CONTENT=1;url=user_management.php>';
        }
        
        
}
else 
{
        echo '登入失敗!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=homepage.html>';
}
?>