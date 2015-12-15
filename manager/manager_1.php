<?php 
header("content-type:text/html; charset=utf-8"); 
require(substr(str_replace('\\','/',  __FILE__) ,0,-21) . 'mysql/db.class.php');

 $mysql = new Mysql();
if ($_POST['price'] <=0 || $_POST['quality_in'] <=0 ) {
	# code...
	echo 'negative';
} else {
	# code...
	
$sql = " insert into books values ( '" . $_POST['book_id'] . "','" . $_POST['book_name'] . "','" . $_POST['author'] . "','" . $_POST['publishing']. "','" . $_POST['category_id'] . "','" . $_POST['price'] . "','" .  $_POST['date_in']. "','" .$_POST['quality_in'] . "','0','0','0')";

$rs = $mysql->query($sql);

if($rs){
	echo 'success';
	//header("Location:manager_1_success.html");
}else{
	echo 'failure';
	//header("Location:manager_1_failure.html");
}
}

?>