<?php
$connect = mysql_connect('localhost','root','rohitgadia95');
if(!$connect){
	echo mysql_error($connect);
}
else{
	$sql = "select * from information_schema.tables where table_type='base table' and table_schema='hospitals'";
	$query = mysql_query($sql);
	$i=0;
	$arr = array();
	mysql_select_db('hospitals');
	while($row = mysql_fetch_array($query))
	{
		$arr[$i] = $row['TABLE_NAME'];
		$i++;
	}
	for($k=1;$k<$i;$k++)
	{
		$sql = "alter table ".$arr[$k]." add id int(4) PRIMARY KEY AUTO_INCREMENT";
		echo $sql;
		$query = mysql_query($sql);
		if(!$query)
			echo mysql_error();
		else
			echo "Added";
	}
}	
?>