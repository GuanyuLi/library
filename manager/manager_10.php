<?php 
header("content-type:text/html; charset=utf-8"); 
require('../mysql/db.class.php');
date_default_timezone_set("PRC");
$date = date("Y-m-d") ;

 $mysql = new Mysql();
 $sql = 'select * from borrow';
 $list = $mysql->getAll($sql);

 for ($i=0; $i <count($list) ; $i++) { 
 	//echo $list[$i]['date_return'];
 	if(strtotime($list[$i]['date_return']) < strtotime($date)){

 	$over =strtotime($date) - strtotime($list[$i]['date_return']);
 	$day = ceil($over/86400);
 	$sql2 = "select reader_name from readers where reader_id = '" . $list[$i]['reader_id'] . "'";
 	$sql3 = "select book_name from books where book_id = '" . $list[$i]['book_id'] . "'";
 	$reader_name = $mysql->getOne($sql2);
 	$book_name = $mysql->getOne($sql3);
 	//var_dump($reader_name);
 	echo '
	<tr>
	<td>'. $reader_name .'</td>
	<td>'. $book_name .'</td>
	<td>'. $list[$i]['data_borrow'] .'</td>
	<td>'. $list[$i]['date_return'] .'</td>
	<td>'. $day .'</td>
	</tr>
	';
	}
 }

?>