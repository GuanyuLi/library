<?php 
header("content-type:text/html; charset=utf-8"); 
require(substr(str_replace('\\','/',  __FILE__) ,0,-21) . 'mysql/db.class.php');

 $mysql = new Mysql();
if($_POST['book_id'] == '' || $_POST['reader_id'] == ''){
	echo 'no value';
}else{
	$sql4 = "select * from borrow where book_id = '" . $_POST['book_id'] . "' and reader_id='" . $_POST['reader_id'] . "'";
	$rs4 = $mysql->query($sql4);
	if ($rs4) {
		# code...
		$sql3 = "select loss from borrow where book_id = '" . $_POST['book_id'] . "' and reader_id='" . $_POST['reader_id'] . "'";
		$loss = $mysql->getOne($sql3);
		if ($loss == 0) {
			# code...
			$sql = "update books set quantity_loss=quantity_loss + 1 where book_id = '" . $_POST['book_id'] . "'";
			$sql1 = "update borrow set loss = 1  where book_id = '" . $_POST['book_id'] . "' and reader_id='" . $_POST['reader_id'] . "'";
			$sql2 = "update books set quantity_out = quantity_out - 1  where book_id = '" . $_POST['book_id'] . "'" ;
			$rs = $mysql->query($sql);
			$rs1 = $mysql->query($sql1);
			$rs2 = $mysql->query($sql2);

			if($rs && $rs1 && $rs2){
				echo 'success';
			}else{
				echo 'failure';
			}
		} else {
			# code...
			echo 'done';
		}
		
		
	} else {
		# code...
		echo 'null';
	}
	

}

?>