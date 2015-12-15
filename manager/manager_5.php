<?php 
header("content-type:text/html; charset=utf-8"); 
require('../mysql/db.class.php');

 $mysql = new Mysql();
if($_POST['item'] == 'book'){
	$sql = "select * from books where book_id like '%" . $_POST['search1'] . "%' and book_name like '%" . $_POST['search2'] . "%' and author like '%" . $_POST['search3'] . "%'";
	$list = $mysql->getAll($sql);

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
}else if($_POST['item'] == 'reader'){
 	$sql = "select * from readers where reader_id like '%" . $_POST['search1'] . "%' and reader_name like '%" . $_POST['search2'] . "%'";
	$list = $mysql->getAll($sql);

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
 }
 

?>