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
			mysql_query("set character set 'utf-8'");//读库
			mysql_query("set names 'utf-8'");//写库
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
				<tr><th>序号</th><th>手机号</th><th>填写时间</th><th>z01</th><th>z02</th><th>z03</th><th>z04</th><th>z05</th><th>z06</th><th>z07</th><th>z08</th><th>z09</th><th>z10</th><th>z11</th><th>z12</th><th>z13</th><th>z14</th><th>z15</th><th>z16</th><th>z17</th><th>z18</th><th>z19</th><th>z20</th><th>z21</th><th>z22</th><th>z23</th><th>z24</th><th>z25</th><th>z26</th><th>z27</th><th>z28</th><th>z29</th><th>z30</th><th>z31</th><th>z32</th><th>z33</th><th>z34</th><th>z35</th><th>z36</th><th>z37</th><th>z38</th><th>z39</th><th>z40</th><th>z41</th><th>z42</th><th>z43</th><th>z44</th><th>z45</th><th>z46</th><th>z47</th><th>z48</th><th>z49</th><th>z50</th><th>z51</th><th>z52</th><th>z53</th><th>z54</th><th>z55</th><th>z56</th><th>z57</th><th>z58</th><th>z59</th><th>z60</th><th>z61</th><th>z62</th><th>z63</th><th>z64</th><th>z65</th><th>z66</th><th>z67</th><th>z68</th><th>z69</th><th>z70</th><th>z71</th><th>z72</th><th>z73</th><th>z74</th><th>z75</th><th>z76</th><th>z77</th><th>z78</th><th>z79</th><th>z80</th><th>z81</th><th>z82</th><th>z83</th><th>z84</th><th>z85</th><th>z86</th><th>z87</th><th>suggest</th></tr>';
			mysql_free_result($result);
			$result = mysql_query("select b.`mobile`, b.`created`, `z01`, `z02`, `z03`, `z04`, `z05`, `z06`, `z07`, `z08`, `z09`, `z10`, `z11`, `z12`, `z13`, `z14`, `z15`, `z16`, `z17`, `z18`, `z19`, `z20`, `z21`, `z22`, `z23`, `z24`, `z25`, `z26`, `z27`, `z28`, `z29`, `z30`, `z31`, `z32`, `z33`, `z34`, `z35`, `z36`, `z37`, `z38`, `z39`, `z40`, `z41`, `z42`, `z43`, `z44`, `z45`, `z46`, `z47`, `z48`, `z49`, `z50`, `z51`, `z52`, `z53`, `z54`, `z55`, `z56`, `z57`, `z58`, `z59`, `z60`, `z61`, `z62`, `z63`, `z64`, `z65`, `z66`, `z67`, `z68`, `z69`, `z70`, `z71`, `z72`, `z73`, `z74`, `z75`, `z76`, `z77`, `z78`, `z79`, `z80`, `z81`, `z82`, `z83`, `z84`, `z85`, `z86`, `z87`, `suggest` from vote_baseinfo b,`vote_questionz` z where b.mobile=z.`mobile` order by b.created desc;");
			$num=1;
			while($row = mysql_fetch_array($result)){
				echo '<tr><td>'.$num.'</td><td>'.$row['mobile'].'</td><td>'.$row['created'].'</td><td>'.$row['z01'].'</td><td>'.$row['z02'].'</td><td>'.$row['z03'].'</td><td>'.$row['z04'].'</td><td>'.$row['z05'].'</td><td>'.$row['z06'].'</td><td>'.$row['z07'].'</td><td>'.$row['z08'].'</td><td>'.$row['z09'].'</td><td>'.$row['z10'].'</td><td>'.$row['z11'].'</td><td>'.$row['z12'].'</td><td>'.$row['z13'].'</td><td>'.$row['z14'].'</td><td>'.$row['z15'].'</td><td>'.$row['z16'].'</td><td>'.$row['z17'].'</td><td>'.$row['z18'].'</td><td>'.$row['z19'].'</td><td>'.$row['z20'].'</td><td>'.$row['z21'].'</td><td>'.$row['z22'].'</td><td>'.$row['z23'].'</td><td>'.$row['z24'].'</td><td>'.$row['z25'].'</td><td>'.$row['z26'].'</td><td>'.$row['z27'].'</td><td>'.$row['z28'].'</td><td>'.$row['z29'].'</td><td>'.$row['z30'].'</td><td>'.$row['z31'].'</td><td>'.$row['z32'].'</td><td>'.$row['z33'].'</td><td>'.$row['z34'].'</td><td>'.$row['z35'].'</td><td>'.$row['z36'].'</td><td>'.$row['z37'].'</td><td>'.$row['z38'].'</td><td>'.$row['z39'].'</td><td>'.$row['z40'].'</td><td>'.$row['z41'].'</td><td>'.$row['z42'].'</td><td>'.$row['z43'].'</td><td>'.$row['z44'].'</td><td>'.$row['z45'].'</td><td>'.$row['z46'].'</td><td>'.$row['z47'].'</td><td>'.$row['z48'].'</td><td>'.$row['z49'].'</td><td>'.$row['z50'].'</td><td>'.$row['z51'].'</td><td>'.$row['z52'].'</td><td>'.$row['z53'].'</td><td>'.$row['z54'].'</td><td>'.$row['z55'].'</td><td>'.$row['z56'].'</td><td>'.$row['z57'].'</td><td>'.$row['z58'].'</td><td>'.$row['z59'].'</td><td>'.$row['z60'].'</td><td>'.$row['z61'].'</td><td>'.$row['z62'].'</td><td>'.$row['z63'].'</td><td>'.$row['z64'].'</td><td>'.$row['z65'].'</td><td>'.$row['z66'].'</td><td>'.$row['z67'].'</td><td>'.$row['z68'].'</td><td>'.$row['z69'].'</td><td>'.$row['z70'].'</td><td>'.$row['z71'].'</td><td>'.$row['z72'].'</td><td>'.$row['z73'].'</td><td>'.$row['z74'].'</td><td>'.$row['z75'].'</td><td>'.$row['z76'].'</td><td>'.$row['z77'].'</td><td>'.$row['z78'].'</td><td>'.$row['z79'].'</td><td>'.$row['z80'].'</td><td>'.$row['z81'].'</td><td>'.$row['z82'].'</td><td>'.$row['z83'].'</td><td>'.$row['z84'].'</td><td>'.$row['z85'].'</td><td>'.$row['z86'].'</td><td>'.$row['z87'].'</td><td>'.$row['suggest'].'</td></tr>';
				$num++;
			}
			echo '</table>';
			
			//汇总数据
			echo '<h2>区县问卷概况</h2>';
			echo '<table>
				<tr><th>序号</th><th>手机</th><th>填写时间</th><th>区县</th><th>x01</th><th>x02</th><th>x03</th><th>x04</th><th>x05</th><th>x06</th><th>suggest0</th><th>x11</th><th>x12</th><th>x13</th><th>x14</th><th>x15</th><th>x16</th><th>x17</th><th>x18</th><th>suggest1</th></tr>';
			mysql_free_result($result);
			$result = mysql_query("select b.`mobile`, b.`created`, b.`county`, `x01`, `x02`, `x03`, `x04`, `x05`, `x06`, `suggest0`, `x11`, `x12`, `x13`, `x14`, `x15`, `x16`, `x17`, `x18`, `suggest1` from vote_baseinfo b,`vote_questionx` x where b.`mobile`=x.`mobile` order by b.`created` desc;");
			$num=1;
			while($row = mysql_fetch_array($result)){
				echo '<tr><td>'.$num.'</td><td>'.$row['mobile'].'</td><td>'.$row['created'].'</td><td>'.$row['county'].'</td><td>'.$row['x01'].'</td><td>'.$row['x02'].'</td><td>'.$row['x03'].'</td><td>'.$row['x04'].'</td><td>'.$row['x05'].'</td><td>'.$row['x06'].'</td><td>'.$row['suggest0'].'</td><td>'.$row['x11'].'</td><td>'.$row['x12'].'</td><td>'.$row['x13'].'</td><td>'.$row['x14'].'</td><td>'.$row['x15'].'</td><td>'.$row['x16'].'</td><td>'.$row['x17'].'</td><td>'.$row['x18'].'</td><td>'.$row['suggest1'].'</td></tr>';
				$num++;
			}
			echo '</table>';
			
			//查询完毕，关闭数据连接		
			mysql_free_result($result);
			mysql_close($con);
		?>
	</body>
</html>