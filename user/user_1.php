<?php 
header("content-type:text/html; charset=utf-8"); 
require('../mysql/db.class.php');

 $mysql = new Mysql();
 
$sql  = "select * from readers where reader_id = '" . $_POST['reader_id'] ."'";
$list = $mysql->getRow($sql);
 	echo '
	<li><span>读者编号<input type="text" name="reader_id" id="" value="' . $list['reader_id'] .'" readonly="readonly"/></span></li>
     <li><span>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名<input type="text" name="reader_name" id="" value="' . $list['reader_name'] .'" readonly="readonly"/></span></li>
    <li><span>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别<input type="text" name="sex" id="" value="' . $list['sex'] .'" readonly="readonly"/></span></li>
    <li><span>出生日期<input type="text" name="birthday" id="" value="' . $list['birthday'] .'" readonly="readonly"/></span></li>
    <li><span>电话号码<input type="text" name="phone" id="" value="' . $list['phone'] .'" readonly="readonly"/></span></li>
    <li><span>手机号码<input type="text" name="mobile" id="" value="' . $list['mobile'] .'" readonly="readonly"/></span></li>
    <li><span>证件名称<input type="text" name="card_name" id="" value="' . $list['card_name'] .'" readonly="readonly"/></span></li>
    <li><span>证件编号<input type="text" name="card_id" id="" value="' . $list['card_id'] .'" readonly="readonly"/></span></li>
    <li><span>会员级别<input type="text" name="level" id="" value="' . $list['level'] .'" readonly="readonly"/></span></li>
    <li><span>办证日期<input type="text" name="day" id="" value="' . $list['day'] .'" readonly="readonly"/></span></li>
	';
 

?>