<?php 
header("content-type:text/html; charset=utf-8"); 
require('../mysql/db.class.php');

 $mysql = new Mysql();
 $sql = 'select * from books';
 $list = $mysql->getAll($sql);
 //print_r($list);
 for ($i=0; $i <count($list) ; $i++) { 
 	# code...
 	$quantity_now = $list[$i]['quantity_in'] - $list[$i]['quantity_out'] - $list[$i]['quantity_loss'] -  $list[$i]['quantity_order'];
 	echo '
	<tr>
	<td>'. $list[$i]['book_id'] .'</td>
	<td>'. $list[$i]['book_name'] .'</td>
	<td>'. $list[$i]['category_id'] .'</td>
	<td>'. $list[$i]['author'] .'</td>
	<td>'. $list[$i]['publishing'] .'</td>
	<td>'. $list[$i]['price'] .'</td>
	<td>'. $quantity_now .'</td>
	</tr>
	';
 }



?>