<?php
/* Smarty version 3.1.29, created on 2016-02-23 01:46:54
  from "C:\Users\Kinzo\git\php\vote\v3\templates\mobile.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56cbba0eaccbc3_45621459',
  'file_dependency' => 
  array (
    '532fe32f0fa31848069bb2e84642f8b8158321b9' => 
    array (
      0 => 'C:\\Users\\Kinzo\\git\\php\\vote\\v3\\templates\\mobile.html',
      1 => 1456104787,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56cbba0eaccbc3_45621459 ($_smarty_tpl) {
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
	<?php echo '<script'; ?>
 type="text/javascript" src="./js/main.js"><?php echo '</script'; ?>
>
</head>
<body>
	<p class=title align=center>
		廊坊市干部考核社会评价调查系统
	</p>
	<div class=main>
		<br><br>
		<table align=center>
			<tr><td><p>手机号码：</p></td><td><input id="phonenum" /></td><td><input id="second" type="button"  value="获取验证码" /></td></tr>
			<tr><td colspan=3><em class=red id=msg1>&nbsp;</em></td></tr>
			<tr><td><p>验证码：</p></td><td><input id="code" /></td></tr>
			<tr><td colspan=3><em class=red id=msg2>&nbsp;</em></td></tr>
		</table>
		<br><br>
		<input class=btn id="checkcode" type="button" value="进入问卷" />
	</div>
</body>
</html><?php }
}
