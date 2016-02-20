<?php
session_start();

if(isset($_SESSION['test'])){
	$_SESSION['test'] = $_SESSION['test']+1;
} else {
	$_SESSION['test'] = 0;
}
$tag = $_SESSION['test'];

include_once("./smarty/Smarty.class.php"); //包含smarty类文件

$smarty = new Smarty(); //建立smarty实例对象$smarty
$smarty->setTemplateDir("./templates");
$smarty->caching = false; //缓存方式

$smarty->left_delimiter = "{#";
$smarty->right_delimiter = "#}";
$smarty->assign("tag", $tag); //进行模板变量替换
$smarty->display("template.htm"); //编译并显示位于./templates下的index.htm模板

?>