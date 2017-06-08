var xmlobj;
function CreateXMLHttpRequest(){
	if(window.ActiveXObject){
		xmlobj=new ActiveXObject("Microsoft.XMLHTTP");
	}else if (window.XMLHttpRequest){
		xmlobj=new XMLHttpRequest();
	}
}
function ReqXml(url){
	CreateXMLHttpRequest();	
	xmlobj.onreadystatechange=StatHandler;
	xmlobj.open("get",url,true);
	xmlobj.send(null);
return false;
}
function StatHandler(){
	if(xmlobj.readystate==4 && xmlobj.status==200){
		xml=xmlobj.responseXML;
		var allees=xml.getElementsByTagName("item");
		row='<table width="1004" border="0" cellpadding="0" cellspacing="0"><tr><td colspan="3"><img src="images/子页_02.gif" width="1004" height="40"></td></tr><tr><td width="39" background="images/子页_03.gif">&nbsp;</td><td width="908"><table width="900" border="0" cellpadding="0" cellspacing="0"><tr><td><img src="images/子页_06.gif" width="880" height="36"></td></tr><tr><td><table border="0" width="900" cellpadding="0" cellspacing="0">';
		for(var i=0; i<allees.length;i++){
			if((i % 5) == 0){
 				row+='</tr><tr>'; 
			}
			row+= '<td align="center">';
			var tempobj,item_title,item_link,item_pubDate,item_description,item_links;

			tempobj=allees[i].getElementsByTagName("link");	
			item_link=tempobj[0].childNodes[0].nodeValue;

			tempobj=allees[i].getElementsByTagName("title");	
		
			item_title="<a href='"+item_link+"'"+"target='_blank'"+">"+tempobj[0].childNodes[0].nodeValue+"</a>"+"<br>";
			tempobj=allees[i].getElementsByTagName("pubDate");
			item_pubDate=tempobj[0].childNodes[0].nodeValue+"<br>";

			tempobj=allees[i].getElementsByTagName("description");
			counts=tempobj.length;
			if(counts>0){
				item_description=tempobj[0].childNodes[0].nodeValue+"<br>";
			}else{
				item_description="没有内容摘要！"+"<br>";
			}
			row+=item_description+item_title+item_pubDate;

			row+='</td>';
        	if((i%5)!= 0){
      		}
		}
		row+='</tr></table></td></tr></table></td><td width="57" background="images/子页_05.gif">&nbsp;</td></tr><tr><td colspan="3"><img src="images/子页_12.gif" width="1004" height="35"></td></tr></table><img src="images/登录后_11.gif" width="1004" height="85">';
		document.getElementById('xmlpage').innerHTML+=row;	
	}
}
