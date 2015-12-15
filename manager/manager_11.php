<?php 
header("content-type:text/html; charset=utf-8"); 
require('../mysql/db.class.php');

 $mysql = new Mysql();
 $sql = 'select * from t_order';
 $list = $mysql->getAll($sql);
 //print_r($list);
 for ($i=0; $i <count($list) ; $i++) { 
 	# code...
 	$sql2 = "select reader_name from readers where reader_id = '" . $list[$i]['reader_id'] . "'";
 	$sql3 = "select book_name from books where book_id = '" . $list[$i]['book_id'] . "'";
 	$reader_name = $mysql->getOne($sql2);
 	$book_name = $mysql->getOne($sql3);
 	echo '
	<tr>
	<td>'. $reader_name .'</td>
	<td>'. $book_name .'</td>
	<td>'. $list[$i]['date_order'] .'</td>
	<td><a class="reset">释放</a></td>
	</tr>
	';
 }



?>