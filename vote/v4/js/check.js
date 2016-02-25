function numCtrl(obj,length){
	obj.value=obj.value.replace(/[^0-9]/g,'');
	if(obj.value.length>length){
		obj.value = obj.value.substring(0,length);
	}
}

function charCtrl(obj,length){
	obj.value=obj.value.replace(/[^A-Za-z0-9]/g,'');
	if(obj.value.length>length){
		obj.value = obj.value.substring(0,length);
	}
}

function checkMust(arr){
	for(var i=0;i<arr.length;i++){
		if(!checkRadio(arr[i],false)){
			return false;
		}
	}
	return true;
}

function checkMustAndMove(arr){
	for(var i=0;i<arr.length;i++){
		if(!checkRadio(arr[i],true)){
			return false;
		}
	}
	return true;
}

//检查指定name的必填radio是否已选，未选时必填闪烁
function checkRadio(name,isMove){
	var radio_oj = $('input[name="'+name+'"]');
	for(var i=0;i<radio_oj.length;i++){
		if(radio_oj[i].checked==true){
			return true;
		}
	}
	if(isMove){
		$("html,body").animate({scrollTop:$("#"+name+"_point").offset().top},50)
	}
	error(name+"_error",3);
	return false;
}

//错误信息闪烁--闪样式
function error(id,times)    
{    
    var obj=$("#"+id);    
    obj.css("background-color","#F6CECE");    
    times=times-1;    
    setTimeout("normal('"+id+"',"+times+")",200);    
}  

//错误信息闪烁--灭样式
function normal(id,times)    
{    
    var obj=$("#"+id);    
    obj.css("background-color","#FFF");    
    if(times<0)    
    {    
        return;    
    }    
    times=times-1;    
    setTimeout("error('"+id+"',"+times+")",150);    
}   

function checkMaxLen(obj,maxlength){
	if(obj.value.length>maxlength){
		obj.value = obj.value.substr(0,maxlength);
	}
}