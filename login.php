<?php 
header("content-type:text/html; charset=utf-8"); 


$conn = mysql_connect('127.0.0.1','user','user');

mysql_query('use library',$conn);
mysql_query('set names utf-8',$conn);


$sql = 'select * from login where username = "' . $_POST['username'] . '" and password = "'  . $_POST['password'] .'"' ;

$rc = mysql_query($sql,$conn);

$row = mysql_fetch_assoc($rc);

if($row){
	
	if($row['username'] == "manager" ){
		header("Location:./manager/manager_main.html");
		//echo '<h1><a href="./manager/manager_main.html">' . "管理员你好，登录成功，请点击跳转" . "</h1>";
	}else{
		
		header("Location:./user/user_main.html?uid=". $row['username'] . "&id=" .  $row['username']);
		//echo '<h1><a href="./user/user_main.html">'. "读者你好，登录成功，请点击跳转" . "</h1>";
		}
}else{
	header("Location:index.html");
	//echo '<h1><a href="index.html">' . "登录失败，请点击返回" . "</h1>";
}
mysql_close($conn);
?>

