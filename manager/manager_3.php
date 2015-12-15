<?php 
header("content-type:text/html; charset=utf-8"); 
require(substr(str_replace('\\','/',  __FILE__) ,0,-21) . 'mysql/db.class.php');
date_default_timezone_set("PRC");

 $mysql = new Mysql();
 
$sql5= "select * from loss_reporting where reader_id = '" . $_POST['reader_id'] . "'";
$rs5 = $mysql->query($sql5);
if($_POST['book_id'] && $_POST['reader_id'] ){
	if(mysql_fetch_assoc($rs5)){
	echo "loss";
	}else{
		$date_borrow = date("Y-m-d") ;
		$sql8 = $sql3 = "select level from readers where reader_id = '" . $_POST['reader_id'] . "'" ;
		$level = $mysql->getOne($sql8);
		switch ($level) {
			case '金牌':
				# code...
				$date_return = date("Y-m-d",strtotime($date_borrow) + ceil(50*86400));
				break;
			case '银牌':
				# code...
				$date_return = date("Y-m-d",strtotime($date_borrow) + ceil(30*86400));
				break;
			case '普通':
				# code...
				$date_return = date("Y-m-d",strtotime($date_borrow) + ceil(10*86400));
				break;
			default:
				# code...
				break;
		}
		$sql2 = "update books set quantity_out=quantity_out +1 where book_id = '" . $_POST['book_id'] . "'" ;
		$sql3 = "select quantity_in from books where book_id = '" . $_POST['book_id'] . "'" ;
		$sql4 = "select quantity_out from books where book_id = '" . $_POST['book_id'] . "'" ;
		$sql6 = "select quantity_loss from books where book_id = '" . $_POST['book_id'] . "'" ;
		$sql7 = "select quantity_order from books where book_id = '" . $_POST['book_id'] . "'" ;
		$sql9 = "select * from t_order where book_id = '" . $_POST['book_id'] . "'" . "and reader_id = '" . $_POST['reader_id'] . "'";
		$sql10 = "update books set quantity_order=quantity_order +1 where book_id = '" . $_POST['book_id'] . "'" ;
		$sql11 = "delete from t_order where book_id = '" . $_POST['book_id'] . "'" . "and reader_id = '" . $_POST['reader_id'] . "'";
		$quantity_order = $mysql->getOne($sql7);
		$quantity_in = $mysql->getOne($sql3);
		$quantity_out = $mysql->getOne($sql4);
		$quantity_loss = $mysql->getOne($sql6);
		$rs9 = $mysql->query($sql9);
		if ($rs9) {
			# code...
			$mysql->query($sql2);
			$mysql->query($sql10);
			$mysql->query($sql11);
			echo "ordered booking";
		} else {
			# code...
			if($quantity_out + $quantity_loss + $quantity_order + 1 > $quantity_in){
			echo 'enough';
			}else{
				$sql1 = " insert into borrow values ( '" . $_POST['reader_id'] . "','" . $_POST['book_id'] . "','" . $date_borrow . "','" . $date_return.   "','0')";
				$rs1 = $mysql->query($sql1);

				if($rs1){
					
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