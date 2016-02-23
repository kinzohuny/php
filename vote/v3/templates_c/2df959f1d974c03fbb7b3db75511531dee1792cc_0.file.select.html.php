<?php
/* Smarty version 3.1.29, created on 2016-02-23 10:16:59
  from "C:\Users\Kinzo\git\php\vote\v3\templates\select.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56cbc11bc7ab52_42781850',
  'file_dependency' => 
  array (
    '2df959f1d974c03fbb7b3db75511531dee1792cc' => 
    array (
      0 => 'C:\\Users\\Kinzo\\git\\php\\vote\\v3\\templates\\select.html',
      1 => 1456104786,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56cbc11bc7ab52_42781850 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>廊坊市干部考核社会评价调查系统</title>
	<link href="./css/main.css" type="text/css" rel="stylesheet">
	<?php echo '<script'; ?>
 type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"><?php echo '</script'; ?>
>
</head>
<body>
	<p class=title align=center>
		选择评价对象
	</p>

	<div class=main>
		<form id="user_login" action="" method="post">
			<p class=sub_title><b>请选择市直单位或县（市、区）进行评价。</b></p>
			<p class="sub_sub_title em2">
				<label><input type=radio name=select value=1 onClick='$("#result").val("questionz.html");' />市直单位</label>&nbsp;&nbsp;&nbsp;
				<label><input type=radio name=select value=2 onClick='$("#result").val("selectcounty.html");' />县（市、区）</label>
			</p>
			<p class=red>*注：每个手机号只限评价一个选项。</p>
			<br>
			<input type=hidden name=step value=select />
			<input class=btn type="submit" value="下一步" />
			<!-- <input class=btn type="button" value="下一步" onClick='location.href = $("#result").val();' /> -->
		</form>
	</div>
</body>
</html><?php }
}
