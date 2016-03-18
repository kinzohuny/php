<?php
	header("Content-type: text/html; charset=utf-8"); 
	$arrs=getArray();
	echo "level|title|id|pid|sort<br>";
	foreach ($arrs as $arr){
		if($arr!=null && $arr['level']==1){
			echo $arr['level']."|".$arr['title']."|".$arr['id']."|".$arr['pid']."|xxx|".$arr['sort']."<br>";
			$id=$arr['id'];
			$arrs[$id]=null;
			getChildren($id);
		}
	}
	
	echo "===============<br>";
	
	foreach ($arrs as $arr){
		if($arr!=null){
			echo $arr['level']."|".$arr['title']."|".$arr['id']."|".$arr['pid']."|xxx|".$arr['sort']."<br>";
		}
	}
	
	function getChildren($id){
		foreach ($GLOBALS['arrs'] as $arr){
			if($arr!=null && $arr['pid']==$id && $arr['pid']!=$arr['id']){
				echo $arr['level']."|".$arr['title']."|".$arr['id']."|".$arr['pid']."|".$arr['sort']."<br>";
				$sub_id=$arr['id'];
				$GLOBALS['arrs'][$sub_id]=null;
				getChildren($sub_id);
			}
		}
	}

	function getArray(){
		$con = mysql_connect("localhost","crm_test","crm_test");
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		mysql_query("set character set 'utf-8'");//读库
		mysql_query("set names 'utf-8'");//写库
		mysql_select_db("test", $con);
		
		$baseinfo_sql="select id,title,level,pid,sort from role_column where status=0 order by pid,sort;";
		$result = mysql_query($baseinfo_sql);
		if(!$result){
			die('Error: ' . mysql_error()."<br>".$baseinfo_sql);
		}
		$arr=array();
		$num=0;
		while($row = mysql_fetch_array($result)){
			$arr[$row['id']]=array("id"=>$row['id'],"title"=>$row['title'],"level"=>$row['level'],"pid"=>$row['pid'],"sort"=>$row['sort']);
			$num++;
		}
		//echo $num."<br>";
		mysql_close($con);
		//print_r($arr);
		return $arr;
	}
?>