<?php 
header("content-type:text/html; charset=utf-8"); 
require(substr(str_replace('\\','/',  __FILE__) ,0,-21) . 'mysql/db.class.php');

 $mysql = new Mysql();
if($_POST['reader_id'] == '' || $_POST['loss_date'] == ''){
	echo 'no value';
}else{
	$sql = " insert into loss_reporting values ( '" . $_POST['reader_id'] . "','" . $_POST['loss_date'] . "')";

$rs = $mysql->query($sql);

if($rs){
	echo 'success';
}else{
	echo 'failed';
}
}

?>