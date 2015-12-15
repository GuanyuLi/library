<?php 
header("content-type:text/html; charset=utf-8"); 
require('../mysql/db.class.php');

 $mysql = new Mysql();

 	$sql4 = "select book_id from books where book_name = '" . $_POST['book_name'] . "'";
 	$sql5 = "select reader_id from readers where reader_name = '" . $_POST['reader_name'] . "'";
 	$book_id = $mysql->getOne($sql4);
 	$reader_id = $mysql->getOne($sql5);
	$sql1 = "select * from borrow where book_id = '" . $book_id . "'" . "and reader_id = '" . $reader_id . "'";
	$rs1 = $mysql->query($sql1);
	$row = mysql_fetch_assoc($rs1);
	if($row ==  false){
		echo "failure";
		//header("Location:manager_4_failure.html");
	}else{

		$sql2 = "delete from t_order where book_id = '" . $book_id . "'" . "and reader_id = '" . $reader_id . "'";
		$rs2 = $mysql->query($sql2);

		$sql3 = "update books set quantity_order = quantity_order-1  where book_id = '". $book_id . "'";
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