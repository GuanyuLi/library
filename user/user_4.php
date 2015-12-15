<?php 
header("content-type:text/html; charset=utf-8"); 
require('../mysql/db.class.php');

 $mysql = new Mysql();
 
$sql  = "select * from t_order where reader_id = '" . $_POST['reader_id'] ."'";
$list = $mysql->getAll($sql);
print_r($list);

for ($i=0; $i <count($list) ; $i++) { 
 	echo '
    <tr>
    <td>'. $list[$i]['book_id'] .'</td>
    <td>'. $list[$i]['date_order'] .'</td>
    </tr>
	';
 }

?>