<?php 
session_start();
if(!isset($_COOKIE["id"])){
        echo '還未登入!';
        header("Location: http://140.134.26.143/ican/ican/login_index.php"); //將網址改為要導入的登入頁面
        }
    else{	
    		echo '成功登出!';
    		setcookie("id" , "" , time()-3600*24);	
    		header("Location: http://140.134.26.143/ican/ican/login_index.html");
        }
?>