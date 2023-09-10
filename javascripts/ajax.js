function xmlhttpPost(strURL,resultFun)
{
	
	//var xmlHttpReq = false;
	//var self = this;
	var aRequest;
	// Mozilla/Safari
	if (window.XMLHttpRequest)	{
		aRequest= new XMLHttpRequest();
	}
	// IE
	else if (window.ActiveXObject)	{
		aRequest = new ActiveXObject("Microsoft.XMLHTTP");
	}
	//aRequest.open('POST', strURL, true);
	aRequest.open('GET', strURL, true);
	//self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	aRequest.onreadystatechange = function() {
		if (aRequest.readyState == 4) {
			var str=aRequest.responseText;
			//alert(resultFun);
			if (resultFun == "emp")
			document.getElementById('div_row_id').style.display = "";
				
			if (resultFun == "emp")
				document.getElementById("detail").innerHTML = str;
			if (resultFun == "cat")
				document.getElementById("type_detail").innerHTML = str;
			if (resultFun == "comparison")
				document.getElementById("detail_comparison").innerHTML = str;
			if (resultFun == "comparison_no")
				document.getElementById("type_detail_comparison").innerHTML = str;	
			if (resultFun == "elsecase"){
				document.getElementById("detail").innerHTML = str;
				document.getElementById('div_row_id').style.display = "none";	
			}
		}
	}
	aRequest.send(null);
}



//**************************************************MY FUNCTION GOES HERE********************************************
//**********************************************************************************************************************

function xmlhttpPostNew(strURL,resultFun)
{
	//document.getElementById('div_row_cat').style.display = "";
	
			var aRequest;
			// Mozilla/Safari
			if (window.XMLHttpRequest)	{
				aRequest= new XMLHttpRequest();
			}
			// IE
			else if (window.ActiveXObject)	{
				aRequest = new ActiveXObject("Microsoft.XMLHTTP");
			}
			//aRequest.open('POST', strURL, true);
			aRequest.open('GET', strURL, true);
			
			aRequest.onreadystatechange = function() {
				if (aRequest.readyState == 4) {
					var str=aRequest.responseText;
			
					
					if (resultFun == "emp")
						{
						
							document.getElementById('div_row_id').style.display = "";
							document.getElementById("detail").innerHTML = str;
							//document.getElementById('div_row_cat').style.display = "none";
						
						
						}
					if (resultFun == "cat")
					{	
					
						
						//document.getElementById('div_row_cat').style.display = "";
						document.getElementById("detail_cat").innerHTML = str;
					}
					if (resultFun == "comparison")
						{document.getElementById("detail_comparison").innerHTML = str;}
					if (resultFun == "comparison_no")
						{document.getElementById("type_detail_comparison").innerHTML = str;	}
					if (resultFun == "elsecase"){ 
						document.getElementById("detail").innerHTML = str;
						document.getElementById('div_row_id').style.display = "none";
						
						document.getElementById("detail_cat").innerHTML = str;
					//	document.getElementById('div_row_cat').style.display = "none";
						
						}
				}
			}
			
			aRequest.send(null);
	
}