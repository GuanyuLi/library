<?php 
header("content-type:text/html; charset=utf-8"); 
require('../mysql/db.class.php');
//var_dump($_POST);
date_default_timezone_set("PRC");
 $date = date("Y-m-d H:i:s") ;

 $mysql = new Mysql();
 $reader_id = substr($_POST['reader_id'], 0 , 1);
$sql5= "select * from loss_reporting where reader_id = '" . $reader_id . "'";
$rs5 = $mysql->query($sql5);
if($_POST['book_id'] && $_POST['reader_id'] ){
	if(mysql_fetch_assoc($rs5)){
	echo "loss";
}else{
	$sql8 = "select * from borrow where book_id = '" . $_POST['book_id'] . "'" . "and reader_id = '" . $_POST['reader_id'] . "'";
	$rs8 = $mysql->query($sql8);
	if ($rs8) {
		echo 'borrowed';
	} else {
		# code...
		$sql3 = "select quantity_in from books where book_id = '" . $_POST['book_id'] . "'" ;
		$sql4 = "select quantity_out from books where book_id = '" . $_POST['book_id'] . "'" ;
		$sql6 = "select quantity_loss from books where book_id = '" . $_POST['book_id'] . "'" ;
		$sql7 = "select quantity_order from books where book_id = '" . $_POST['book_id'] . "'" ;
		$quantity_order = $mysql->getOne($sql7);
		$quantity_in = $mysql->getOne($sql3);
		$quantity_out = $mysql->getOne($sql4);
		$quantity_loss = $mysql->getOne($sql6);

		if($quantity_out + $quantity_loss  +$quantity_order + 1 > $quantity_in){
			echo 'enough';
		}else{
			$sql1 = " insert into t_order values ('" . $reader_id . "','" . $_POST['book_id'] . "','" . $date .  "') ";
			$rs1 = $mysql->query($sql1);
			if($rs1){
				$sql2 = "update books set quantity_order=quantity_order+1 where book_id = '" . $_POST['book_id'] . "'" ;
				$rs2 = $mysql->query($sql2);
				if($rs2 ){
				echo 'success';
				}else{
				echo 'failure';
				}
			}else{
				echo 'done';
			}
			
		}
	}
	
}
}else{
	echo 'null';
}
 ?>