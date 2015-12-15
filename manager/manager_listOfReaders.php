<?php 
header("content-type:text/html; charset=utf-8"); 
require('../mysql/db.class.php');

 $mysql = new Mysql();
 $sql = 'select * from readers';
 $list = $mysql->getAll($sql);
 //print_r($list);
 for ($i=0; $i <count($list) ; $i++) { 
 	# code...
 	echo '
	<tr>
	<td>'. $list[$i]['reader_id'] .'</td>
	<td>'. $list[$i]['reader_name'] .'</td>
	<td>'. $list[$i]['sex'] .'</td>
	<td>'. $list[$i]['birthday'] .'</td>
	<td>'. $list[$i]['card_name'] .'</td>
	<td>'. $list[$i]['card_id'] .'</td>
	<td>'. $list[$i]['level'] .'</td>
	<td>'. $list[$i]['day'] .'</td>
	<td>'. $list[$i]['phone'] .'</td>
	<td>'. $list[$i]['mobile'] .'</td>
	</tr>
	';
 }



?>