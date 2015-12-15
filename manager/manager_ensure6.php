<?php 
header("content-type:text/html; charset=utf-8"); 
require('../mysql/db.class.php');

 $mysql = new Mysql();

$sql = " update readers set reader_name='"  . $_POST['reader_name'] . "',sex='" . $_POST['sex'] . "',birthday='" . $_POST['birthday']. "',phone='" . $_POST['phone'] . "',mobile='" . $_POST['mobile'] . "',card_name='" .  $_POST['card_name']. "',card_id='" .$_POST['card_id'] . "',level='" . $_POST['level']. "',day='" . $_POST['day']. "' where reader_id = '" . $_POST['reader_id'] . "'";

$rs = $mysql->query($sql);

if($rs){
	echo 'success';
	//header("Location:manager_1_success.html");
}else{
	echo 'failure';
	//header("Location:manager_1_failure.html");
}
?>