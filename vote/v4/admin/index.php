<?php
	session_start();
	
	if(!isset($_SESSION['admin'])){
		Header("Location:./login.php");
	}elseif(isset($_POST['logout'])){
		$_SESSION['admin'] = null;
		Header("Location:./login.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>	
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' /> 
		<title>结果统计</title>
		<style type="text/css">
			table{ background:#099}
			table td{ background:#FFF}
		</style>
	</head>
	<body>
		<form method=post>
			<input type=hidden name=logout value=true>
			<input type=submit value="注销">
		</form>
		<?php
			$con = mysql_connect("localhost","root","");
			if (!$con){
				die('Could not connect: ' . mysql_error());
			}
			mysql_query("set character set 'utf8'");//读库
			mysql_query("set names 'utf8'");//写库
			mysql_select_db("vote", $con);
			
			//汇总数据
			echo '<h2>总问卷数</h2>';
			echo '<table>
				<tr><th></th><th>评价目标</th><th>问卷数</th></tr>';
			$result = mysql_query("select c.code,c.name,count(b.mobile) as num from vote_county c left join vote_baseinfo b on c.code=b.county group by 1;");
			$num=1;
			while($row = mysql_fetch_array($result)){
				echo '<tr><td>'.$row['code'].'</td><td>'.$row['name'].'</td><td>'.$row['num'].'</td></tr>';
				$num++;
			}
			echo '</table>';
			
			//汇总数据
			echo '<h2>近30天提交情况</h2>';
			echo '<table>
				<tr><th>日期</th><th>市直</th><th>区县</th><th>总数</th></tr>';
			mysql_free_result($result);
			$result = mysql_query("select date_format(created, '%Y-%m-%d') as created,sum(case when city=1 then 1 else 0 end) as sz,sum(case when city=2 then 1 else 0 end) as qx,count(0) as num from vote_baseinfo group by 1 order by 1 desc;");
			$num=1;
			while($row = mysql_fetch_array($result)){
				echo '<tr><td>'.$row['created'].'</td><td>'.$row['sz'].'</td><td>'.$row['qx'].'</td><td>'.$row['num'].'</td></tr>';
				$num++;
			}
			echo '</table>';
			
			//汇总数据
			echo '<h2>市直问卷概况</h2>';
			echo '<table>
				<tr><th>日期</th><th>市直</th><th>区县</th><th>总数</th></tr>';
			mysql_free_result($result);
			$result = mysql_query("select date_format(created, '%Y-%m-%d') as created,sum(case when city=1 then 1 else 0 end) as sz,sum(case when city=2 then 1 else 0 end) as qx,count(0) as num from vote_baseinfo group by 1 order by 1 desc;");
			$num=1;
			while($row = mysql_fetch_array($result)){
				echo '<tr><td>'.$row['created'].'</td><td>'.$row['sz'].'</td><td>'.$row['qx'].'</td><td>'.$row['num'].'</td></tr>';
				$num++;
			}
			echo '</table>';
			
			//汇总数据
			echo '<h2>区县问卷概况</h2>';
			echo '<table>
				<tr><th>区县</th><th>问题</th><th>优秀</th><th>良好</th><th>一般</th><th>较差</th></tr>';
			mysql_free_result($result);
			$result = mysql_query("select * from (
				select county,'x01' as q,sum(case when x01=0 then 1 else 0 end) a0,sum(case when x01=1 then 1 else 0 end) a1,sum(case when x01=2 then 1 else 0 end) a2,sum(case when x01=3 then 1 else 0 end) a3,sum(case when x01=4 then 1 else 0 end) a4 from vote_questionx group by 1
				union all select county,'x02' as q,sum(case when x02=0 then 1 else 0 end) a0,sum(case when x02=1 then 1 else 0 end) a1,sum(case when x02=2 then 1 else 0 end) a2,sum(case when x02=3 then 1 else 0 end) a3,sum(case when x02=4 then 1 else 0 end) a4 from vote_questionx group by 1
				) t order by t.county,t.q;");
			$num=1;
			while($row = mysql_fetch_array($result)){
				echo '<tr><td>'.$row['county'].'</td><td>'.$row['q'].'</td><td>'.$row['a4'].'</td><td>'.$row['a3'].'</td><td>'.$row['a2'].'</td><td>'.$row['a1'].'</td><td>'.$row['a0'].'</td></tr>';
				$num++;
			}
			echo '</table>';
			
			//查询完毕，关闭数据连接		
			mysql_free_result($result);
			mysql_close($con);
		?>
	</body>
</html>