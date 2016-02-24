<?php
$connect = mysql_connect('localhost','root','rohitgadia95');
if(!$connect){
	echo mysql_error($connect);
}
else{
	 $sql = "select * from information_schema.tables where table_type='base table' and table_schema='hospitals'";
	 $query = mysql_query($sql);
	 $arr = array();
	 $i=0;
	 while($row=mysql_fetch_array($query))
	 {
	 	//print_r($row);
	 	//echo "<br>";
	 	$arr[$i] = $row['TABLE_NAME'];
	 	$i++;
	 }
	 mysql_select_db('hospitals');
	 $c=1;
	 echo $i;
	 for($k=1;$k<$i;$k++)
	 {
	 	$sql = "select Speciality from $arr[$k]";
	 	echo $sql;
	 	$query = mysql_query($sql);
	 	$ar = array();
	 	$m=0;
	 	while($result=mysql_fetch_array($query))
	 	{
	 		print_r($result);
	 		if($m==0)
	 		{
	 			echo 'Added '.$result['Speciality'];
	 			$ar[$m]=$result['Speciality'];
	 			$m++;
	 		}
	 		else
	 		{
	 			$count=0;
	 			for($z=0;$z<$m;$z++)
	 			{
	 				if($ar[$z]==$result['Speciality'])
	 					break;
	 				else
	 					$count++;
	 			}
	 			if($count==$m)
	 			{
	 				echo 'Added '.$result['Speciality'];
	 				$ar[$m]=$result['Speciality'];
	 				$m++;
	 			}

	 		}
	 	}
	 	$string='';
	 	for($l=0;$l<$m;$l++)
	 		$string = $string.$ar[$l].'|';
	 	$sql = "update a_chennai_listings set speciality='".substr($string,0,strlen($string)-1)."' where locality='".$arr[$k]."'";
	 	$query = mysql_query($sql);
	 	if(!$query)
	 		echo mysql_error();
	 	
	 }
}
?>
