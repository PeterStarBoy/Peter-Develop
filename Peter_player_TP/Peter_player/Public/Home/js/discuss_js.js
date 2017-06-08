//定义XMLHttpRrequest对象
var xmlHttp=createXmlHttpRequestObject();

//获取XMLHttpRrequest对象
function createXmlHttpRequestObject(){
	//用来存储将要使用的XMLHttpRrequest对象
	var xmlHttp;
	//如果在internet Explorer下运行
	if(window.ActiveXObject){
		try{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlHttp=false;
		}

	}else{
	//如果在Mozilla或其他的浏览器下运行
		try{
			xmlHttp=new XMLHttpRequest();
		}catch(e){
			xmlHttp=false;
		}
	}
	 //返回创建的对象或显示错误信息
	if(!xmlHttp)
		alert("返回创建的对象或显示错误信息");
		else
		return xmlHttp;
}
//使用XMLHttpRequest对象创建异步HTTP请求
function process(){
	if(form1_discuss.tb_discuss_content.value==""){
		alert("请输入评论内容！");
		form1_discuss.tb_discuss_content.select();
		return(false);
		}
	
	//在xmlHttp对象不忙时进行处理
	if(xmlHttp.readyState==4 || xmlHttp.readyState==0){
	//获取用户在线表单中输入的姓名	

user = document.getElementById("tb_discuss_user").value;
	
	 content= document.getElementById("tb_discuss_content").value;
	dates = document.getElementById("tb_discuss_date").value;
	ids = document.getElementById("tb_video_id").value;
	//在服务器端执行quickstart.php
	xmlHttp.open("GET","discuss_ok.php?discuss_user="+user+"& discuss_content="+content+"& discuss_date="+dates+"& video_id="+ids,true);
	//定义获取服务器端响应的方法
	xmlHttp.onreadystatechange=handleServerResponse;
	//向服务器发送请求
	xmlHttp.send(null); return false;
	}else
	//如果服务器忙,1秒后重试
	setTimeout('process()',1000);
}
//当收到服务器端的消息时自动执行
function handleServerResponse(){
	//在处理结束时进入下一步
	if(xmlHttp.readystate==4){
		//状态为200表示处理成功结束
		if(xmlHttp.status==200){
			//获取服务器端发来的XML信息
			xmlResponse=xmlHttp.responseText;
if(xmlResponse!=2){
alert('成功');
document.getElementById("discuss_id").innerHTML=xmlResponse;
}else{
alert('失败');
}

			//document.getElementById("discuss_id").innerHTML='<i>'+helloMessage+'</i>';
			//重新开始
		}else{
			//如果HTTP的状态不是200表示发生错误
        	alert("There was a problem accessing the server:"+xmlHttp.statusText);
		}
	}
}


function artpagination(url){
	xmlHttp.open('get',url,true);
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readystate == 4 && xmlHttp.status == 200){
			document.getElementById("discuss_id").innerHTML = xmlHttp.responseText;
		}
	}
	xmlHttp.send(null);
}


function SetFull(){
	if(!document.rp1.CanStop()){
		alert("视频未开始播放无法切换为全屏模式");
	}else{
		alert("单击全屏播放按钮进入全屏播放模式，按ESC键退出");
		document.rp1.SetFullScreen();
}

}
