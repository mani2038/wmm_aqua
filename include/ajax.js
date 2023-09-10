var xmlHttp
function ajax(url,args,args1,args2,swich)
{ 
	url=url+'?'+args+'&'+args1+'&'+args2+'&'+swich
	xmlHttp=GetXmlHttpObject(stateChanged)
	xmlHttp.open("GET", url , true)
    xmlHttp.setRequestHeader("Cache-Control", "no-cache");
    xmlHttp.setRequestHeader("Pragma", "no-cache");
	xmlHttp.send(null)

}
function ajax_sec(url,args,args1,args2re,args3ct,args4,swich)
{ 
	url=url+'?'+args+'&'+args1+'&'+args2re+'&'+args3ct+'&'+args4+'&'+swich
	xmlHttp=GetXmlHttpObject(stateChanged)
	xmlHttp.open("GET", url , true)
    xmlHttp.setRequestHeader("Cache-Control", "no-cache");
    xmlHttp.setRequestHeader("Pragma", "no-cache");
	xmlHttp.send(null)

}
function ajax_city(url,args,args1,args2,swich)
{ 
	url=url+'?'+args+'&'+args1+'&'+args2+'&'+swich
	xmlHttp=GetXmlHttpObject(stateChanged)
	xmlHttp.open("GET", url , true)
    xmlHttp.setRequestHeader("Cache-Control", "no-cache");
    xmlHttp.setRequestHeader("Pragma", "no-cache");
	xmlHttp.send(null)

}

function ajax_deep_sec(url,args,args1,args2,args3,swich)
{ 
	url=url+'?'+args+'&'+args1+'&'+args2+'&'+args3+'&'+swich
	//alert(url);
	xmlHttp=GetXmlHttpObject(stateChanged)
	xmlHttp.open("GET", url , true)
    xmlHttp.setRequestHeader("Cache-Control", "no-cache");
    xmlHttp.setRequestHeader("Pragma", "no-cache");
	xmlHttp.send(null)

}

function ajax_deep_commbrand_sec(url,args,args1,args2,swich)
{ 
	
	url=url+'?'+args+'&'+args1+'&'+args2+'&'+swich
	xmlHttp=GetXmlHttpObject(stateChanged)
	xmlHttp.open("GET", url , true)
    xmlHttp.setRequestHeader("Cache-Control", "no-cache");
    xmlHttp.setRequestHeader("Pragma", "no-cache");
	xmlHttp.send(null)

}
function ajax_deep_sec_sec(url,args,args1,args2,args3,args4,args5,swich)
{ 
	url=url+'?'+args+'&'+args1+'&'+args2+'&'+args3+'&'+args4+'&'+args5+'&'+swich
	//alert(url);
	xmlHttp=GetXmlHttpObject(stateChanged)
	xmlHttp.open("GET", url , true)
    xmlHttp.setRequestHeader("Cache-Control", "no-cache");
    xmlHttp.setRequestHeader("Pragma", "no-cache");
	xmlHttp.send(null)

}

function stateChanged() 
{ 
	//alert("ggg");
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 
		results = xmlHttp.responseText;
		process_results(results);
		//document.getElementById('content').innerHTML=results;
	} 
} 
function GetXmlHttpObject(handler)
{ 
	var objXmlHttp=null
	if (navigator.userAgent.indexOf("Opera")>=0)
	{
		//alert("This example doesn't work in Opera") 
		//return 
		try{
			objXmlHttp = new XMLHttpRequest();
			objXmlHttp.onreadystatechange=handler 
			return objXmlHttp
		}
		catch(e)
		{ 
			alert("Error. Scripting for ActiveX might be disabled") 
			return 
		} 
	}
	if (navigator.userAgent.indexOf("Safari")>=0)
	{
		//alert("This example doesn't work in Opera") 
		//return 
		try{
			objXmlHttp = new XMLHttpRequest();
			objXmlHttp.onreadystatechange=handler 
			return objXmlHttp
		}
		catch(e)
		{ 
			alert("Error. Scripting for ActiveX might be disabled") 
			return 
		} 
	}
	if (navigator.userAgent.indexOf("MSIE")>=0)
	{ 
		var strName="Msxml2.XMLHTTP"
		if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
		{
			strName="Microsoft.XMLHTTP"
		} 
		try
		{ 
			objXmlHttp=new ActiveXObject(strName)
			objXmlHttp.onreadystatechange=handler 
			return objXmlHttp
		} 
		catch(e)
		{ 
			alert("Error. Scripting for ActiveX might be disabled") 
			return 
		} 
	} 
	if (navigator.userAgent.indexOf("Mozilla")>=0)
	{
		objXmlHttp=new XMLHttpRequest()
		objXmlHttp.onload=handler
		objXmlHttp.onerror=handler 
		return objXmlHttp
	}
}
