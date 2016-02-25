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