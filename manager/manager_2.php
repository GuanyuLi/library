<?php 
header("content-type:text/html; charset=utf-8"); 
require(substr(str_replace('\\','/',  __FILE__) ,0,-21) . 'mysql/db.class.php');

 $mysql = new Mysql();
$sql = " insert into readers values ( '" . $_POST['reader_id'] . "','" . $_POST['reader_name'] . "','" . $_POST['sex'] . "','" . $_POST['birthday']. "','" . $_POST['phone'] . "','" . $_POST['mobile'] . "','" .  $_POST['card_name']. "','" .$_POST['card_id'] . "','" . $_POST['level']. "','" . $_POST['day']. "')";
$rs = $mysql->query($sql);
if($rs){
	echo 'success';
	//header("Location:manager_2_success.html");
}else{
	echo 'failure';
	//header("Location:manager_2_failure.html");
}
?>