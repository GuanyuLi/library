<?php 
header("content-type:text/html; charset=utf-8"); 
require('../mysql/db.class.php');

 $mysql = new Mysql();

$sql1 = "select * from borrow where book_id = '" . $_POST['book_id'] . "'" . "and reader_id = '" . $_POST['reader_id'] . "'";
$rs1 = $mysql->query($sql1);
$row = mysql_fetch_assoc($rs1);
if($row ==  false){
	echo "failure";
	//header("Location:manager_4_failure.html");
}else{
	$sql2 = "delete from borrow where book_id = '" . $_POST['book_id'] . "'" . "and reader_id = '" . $_POST['reader_id'] . "'";
	$rs2 = $mysql->query($sql2);

	$sql3 = "update books set quantity_out = quantity_out-1  where book_id = '". $_POST['book_id'] . "'";
	$rs3= $mysql->query($sql3);
	if($rs2 && $rs3){
		echo 'success';
		//header("Location:manager_4_success.html");
	}else{
		echo 'failure';
		//header("Location:manager_4_failure.html");
	}

}
?>