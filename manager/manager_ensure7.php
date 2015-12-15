<?php 
header("content-type:text/html; charset=utf-8"); 
require('../mysql/db.class.php');

 $mysql = new Mysql();

$sql = " update books set  book_name='" . $_POST['book_name'] . "',author='" . $_POST['author'] . "',publishing='" . $_POST['publishing']. "',category_id='" . $_POST['category_id'] . "',price='" . $_POST['price'] . "' where book_id='" . $_POST['book_id']. "'" ;

$rs = $mysql->query($sql);

if($rs){
	echo 'success';
	//header("Location:manager_1_success.html");
}else{
	echo 'failure';
	//header("Location:manager_1_failure.html");
}
?>