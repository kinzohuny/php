//发送验证码时添加cookie
function addCookie(name, value, expiresHours) {
	var cookieString = name + "=" + escape(value);
	//判断是否设置过期时间,0代表关闭浏览器时失效
	if (expiresHours > 0) {
		var date = new Date();
		date.setTime(date.getTime() + expiresHours * 1000);
		cookieString = cookieString + ";expires=" + date.toUTCString();
	}
	document.cookie = cookieString;
}
//修改cookie的值
function editCookie(name, value, expiresHours) {
	var cookieString = name + "=" + escape(value);
	if (expiresHours > 0) {
		var date = new Date();
		date.setTime(date.getTime() + expiresHours * 1000); //单位是毫秒
		cookieString = cookieString + ";expires=" + date.toGMTString();
	}
	document.cookie = cookieString;
}
//根据名字获取cookie的值
function getCookieValue(name) {
	var strCookie = document.cookie;
	var arrCookie = strCookie.split("; ");
	for (var i = 0; i < arrCookie.length; i++) {
		var arr = arrCookie[i].split("=");
		if (arr[0] == name) {
			return unescape(arr[1]);
			break;
		} else {
			return "";
			break;
		}
	}
}

//主要逻辑代码

$(function () {
	//点击提交按钮
	$("#checkcode").click(function () {
		checkcode($("#checkcode"));
	});
	//点击发送验证码按钮
	$("#second").click(function () {
		sendCode($("#second"));
	});
	v = getCookieValue("secondsremained"); //获取cookie值
	if (v > 0) {
		settime($("#second")); //开始倒计时
	}
})
//发送验证码
function sendCode(obj) {
	var phonenum = $("#phonenum").val();
	var result = isPhoneNum(phonenum);
	if (result) {
		doPostBack('mobile.php', afterSendCode, {
			"phonenum" : phonenum
		});
		addCookie("secondsremained", 60, 60); //添加cookie记录,有效时间60s
		settime(obj); //开始倒计时
	} else {
		alert('请输入有效的手机号码！');
	}
}
//验证码发送结果处理
function afterSendCode(data) {
	var d = $.parseJSON(data);
	if (!d.success) {
		alert(d.msg);
	} else { //返回验证码
		$("#code").val(d.msg);
	}
}
//提交
function checkcode(obj) {
	var code = $("#code").val();
	var result = isCode(code);
	if (result) {
		doPostBack('mobile.php', afterCheckcode, {
			"code" : code
		});
	} else {
		alert('验证码格式不正确！');
	}
}
//提交结果处理
function afterCheckcode(data) {
	var d = $.parseJSON(data);
	if (!d.success) {
		alert(d.msg);
	} else { //页面跳转
		window.location.href = "index.php";
	}
}
//将手机利用ajax提交到后台的发短信接口
function doPostBack(url, backFunc, queryParam) {
	$.ajax({
		async : false,
		cache : false,
		type : 'POST',
		url : url, // 请求的action路径
		data : queryParam,
		error : function () { // 请求失败处理函数
		},
		success : backFunc
	});
}

//开始倒计时
var countdown;
function settime(obj) {
	countdown = getCookieValue("secondsremained");
	if (countdown == 0) {
		obj.removeAttr("disabled");
		obj.val("免费获取验证码");
		return;
	} else {
		obj.attr("disabled", true);
		obj.val("重新发送(" + countdown + ")");
		countdown--;
		editCookie("secondsremained", countdown, countdown + 1);
	}
	setTimeout(function () {
		settime(obj)
	}, 1000) //每1000毫秒执行一次
}
//校验手机号是否合法
function isPhoneNum(phonenum) {
	var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
	if (!myreg.test(phonenum)) {
		return false;
	} else {
		return true;
	}
}
//校验验证码是否合法
function isCode(code) {
	var myreg = /^([0-9]{6})$/;
	if (!myreg.test(code)) {
		return false;
	} else {
		return true;
	}
}