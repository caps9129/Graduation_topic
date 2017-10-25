<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$db = mysqli_connect("140.134.26.143", "ican", "cani" , "i_can_db");
    
if(!$db){
    die("無法對資料庫連線");
}        

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];





//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($id != null && $pw != null && $pw2 != null && $pw == $pw2)
{
        //新增資料進資料庫語法
        $sql = "INSERT INTO `trashcan_account` (account, password, email , phone) VALUES ('$id', '$pw', '$email', '$telephone')";
        if(mysqli_query($db , $sql))
        {
                echo '新增成功!，記得綁定產品序號!!!!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=ikey.html>';
        }
        else
        {
                echo '新增失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
        }
}
else
{
        echo '註冊錯誤!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
}




?>