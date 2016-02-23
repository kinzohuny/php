<?php
session_start();

if(isset($_SESSION['mobile'])){
	if(isset($_POST['step']) && $_POST['step']=="baseinfo"){
		if(checkBaseinfo()){
			showSelect(null);
		}
	}elseif(isset($_POST['step']) && $_POST['step']=="select"){
		if(checkSelect()){
			if(isset($_POST['select']) && $_POST['select']==2){
				showSelectCounty(null);
			}else{
				showQuestionz(null);
			}
		}
	}elseif(isset($_POST['step']) && $_POST['step']=="selectcounty"){
		if(checkSelectCounty()){
			showQuestionx(null);
		}
	}elseif(isset($_POST['step']) && $_POST['step']=="questionz"){
		if(checkQuestionz()){
			showThanks();
		}
	}elseif(isset($_POST['step']) && $_POST['step']=="questionx"){
		if(checkQuestionx()){
			showThanks();
		}
	}else{
			showBaseinfo(null);
	}
}else{
	showMobile(null);
}

function checkQuestionz(){
	
	return true;
}

function checkQuestionx(){
	
	return true;
}

function checkSelectCounty(){
	
	return true;
}

function checkSelect(){
	
	return true;
}

function checkBaseinfo(){
	if(1 == 2 ){
		showBaseinfo(null);
		return false;
	}
	return true;
}

function showThanks(){
	showPage(null, "thanks.html");
}

function showQuestionz($args){
	showPage($args, "questionz.html");
}

function showQuestionx($args){
	showPage($args, "questionx.html");
}

function showSelectCounty($args){
	showPage($args, "selectcounty.html");
}

function showSelect($args){
	showPage($args, "select.html");
}

function showBaseinfo($args){
	showPage($args, "baseinfo.html");
}

function showMobile($args){
	showPage($args, "mobile.html");
}



//显示页面公共方法
function showPage($args,$template){
	include_once("./smarty/Smarty.class.php"); //包含smarty类文件
	
	$smarty = new Smarty(); //建立smarty实例对象$smarty
	$smarty->setTemplateDir("./templates");
	$smarty->caching = false; //缓存方式
	
	$smarty->left_delimiter = "{#";
	$smarty->right_delimiter = "#}";
	
	if(isset($args)){
		foreach ($args as $arg){
			$smarty->assign($arg[0], $arg[1]);
		}
	}
	 //进行模板变量替换
	$smarty->display($template); //编译并显示位于./templates下的index.htm模板
}

?>