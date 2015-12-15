<?php 
/*
数据库连接方法：
1.配置文件读取
2.构造函数
*/
class Mysql{
	private $host;
	private $user;
	private $pwd;
	private $dbName;
	private $charset;
	private $rs;

	public  $conn = null;//保存连接资源

	public function __construct(){
		//构造方法，读取配置文件，根据配置文件设置私有属性，此处没有配置文件，直接复制
		$this->host ='127.0.0.1';
		$this->user = 'user';
		$this->pwd = 'user';
		$this->dbName = 'library';
		$this->charset = 'utf8';
		//连接
		$this->connect($this->host,$this->user,$this->pwd);

		//切换库
		$this->switchdb($this->dbName);

		//设置字符集
		$this->setChar($this->charset);

	}
	//负责连接
	private function connect($h,$u,$p){
		$conn =mysql_connect($h,$u,$p);
		$this->conn = $conn;
	} 
	//负责发送sql语句
	public function query($sql){
		//echo $sql;
		$this->rs =  mysql_query($sql,$this->conn);
		//var_dump($this->rs);
		//echo "<br />";
		//var_dump(mysql_error());
		return $this->rs;
	}
	//负责切换数据库
	public function switchdb($db){
		$sql = 'use ' . $db;
		$rs = $this->query($sql);
	}
	//设置字符集
	public function setChar($char){
		$sql = 'set names ' . $char;
		$this->query($sql);
	}
	//负责获取多行多列的select结果
	public function getAll($sql){
		$list = array();
		$rs =$this->query($sql);
		if(!$rs){
			echo 'failed';
		}

		while ($row = mysql_fetch_assoc($rs)) {
			# code...
			$list[] = $row;
		}
		return $list;
	}
	public function getRow($sql){
		$rs = $this->query($sql);
		if(!$rs){
			return false;
		}
		return mysql_fetch_assoc($rs);
	}
	//获取单个值
	public function getOne($sql){
		$rs = $this->query($sql);
		if(!$rs){
			return false;
		}

		$row = mysql_fetch_row($rs);
		return $row[0];

	}
}
/*
$mysql = new Mysql();
print_r($mysql);

$sql = " insert into login values ('13281131','13281131')";

$rs = mysql->query($sql);


echo "<br />";
if($rs){
	echo "succeed";
}else{
	echo "failed";
}
$sql = "select count(*) from login ";
$list = $mysql->getOne($sql);
echo $list;*/
?>