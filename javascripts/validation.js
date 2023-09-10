// JavaScript Document

function Global_validate(obj)
  {
    var len=obj.length;
	for(i=0;i<len;i++)
	  {
	    if(obj.elements[i].title!='' && obj.elements[i].value=='' && obj.elements[i].disabled==false)
		  {
		    alert(obj.elements[i].title);
			obj.elements[i].focus();
			return false;
		  }
	  }
	return true;
  }
  
  function trimspaces(str)
		{
			while((str.indexOf(' ',0) == 0) && (str.length > 1))
			{
				str = str.substring(1, str.length);
			}
			while((str.lastIndexOf(' ') == (str.length - 1) && (str.length > 1)))
			{
				str = str.substring(0,(str.length - 1));
			}
			if((str.indexOf(' ',0) == 0) && (str.length == 1)) str = '';
			return str;
		}
		  
	function validate_form(Obj)
		{
				
				//-- do not check validation for this form name
				/*alert(val);
				return false;*/
				/*if(Obj.name=='frm_add_sales')
					return true;*/
				
				for ( i = 0; i < Obj.elements.length; i++) {
						formElem = Obj.elements[i];
						//alert(formElem.type);
						//alert(formElem.value);
						if(formElem.name=='p_image' && formElem.value!='' )
							{
								var pdf_file2=formElem.value;
								if(pdf_file2.lastIndexOf(".jpg")==-1 && pdf_file2.lastIndexOf(".png")==-1 && pdf_file2.lastIndexOf(".gif")==-1) 					{
  								 alert("Please upload only .jpg, .png, .gif image");
 								  return false;
								}
								
							}
						if(formElem.name=='txtDate_from' && formElem.value!='' )
						{
										
										if(document.getElementById("txtDate_to").value!="")
										{
											
											from = document.getElementById("txtDate_from").value;
											to = document.getElementById("txtDate_to").value;
											var dateFrom = new Date;
											var dateTo = new Date;
											dateFrom = Date.parse(from);
											dateTo = Date.parse(to);
											//if(to<from)
											if(dateTo.toString()<dateFrom.toString())
											{
												alert("to date should be greater than from date");	
												return false;
											}
											
											
										}
								
						}
						switch (formElem.type) {
								case 'text':
								case 'password':
								case 'select-one':
								case 'textarea':
								case 'select-multiple':
										split_title=formElem.title.split("::");
										//alert(split_title[0]+"="+formElem.value);
										if(split_title[0]=='mandatory' && trimspaces(formElem.value)==''){
										alert(split_title[1]);
										formElem.focus();
										return false;
										}
										if(split_title[0]=='mandatory2' && trimspaces(formElem.value)==''){
										alert(split_title[1]);
										formElem.focus();
										return false;
										}
										if(split_title[0]=='mandatory2'  && isNaN(formElem.value)){
										alert('Please enter numeric value');
										formElem.focus();
										return false;
										}
										if(split_title[0]=='mandatory2'  && formElem.value!=""){
												if (/\./.test(formElem.value)) 
												{
													alert('Decimal values are not allowed');
													 formElem.focus();
													 return false;		
												}
											}
										
										if(split_title[0]=='mandatory2'  && parseInt(formElem.value)<=0){
										alert('Please enter positive value grater than zero');
										formElem.focus();
										return false;
										}
										if(split_title[0]=='mandatory3' && trimspaces(formElem.value)==''){
										alert(split_title[1]);
										formElem.focus();
										return false;
										}
										
										if(split_title[0]=='mandatory3' ){
											if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(formElem.value)){
												}else{
													alert('Invalid E-mail Address! Please re-enter.');
													formElem.focus();
													return false;
											}
										}
										if(split_title[0]=='mandatory4' && trimspaces(formElem.value)==''){
										alert(split_title[1]);
										formElem.focus();
										return false;
										}
										if(split_title[0]=='mandatory4' ){
											if(formElem.value !='')
												{
													var strLength = formElem.value.length;
													var spaceindex = formElem.value.lastIndexOf(' ');
													if(strLength < 6)
													{
														alert("Please enter "+formElem.name+" atleast 6 characters.");
														formElem.focus();
														return false;
													}
													if(spaceindex!='-1')
													{
														alert("Please remove space from "+formElem.name+".");
														formElem.focus();
														return false;
													}
												}
										}
										if(split_title[0]=='mandatory5' && trimspaces(formElem.value)==''){
										alert(split_title[1]);
										formElem.focus();
										return false;
										}
										if(split_title[0]=='mandatory5' && !isNaN(formElem.value)){
										alert("Please enter only letter");
										formElem.focus();
										return false;
										}
								
										if(split_title[0]=='mandatory6' && trimspaces(formElem.value)==''){
										alert(split_title[1]);
										formElem.focus();
										return false;
										}
										if(split_title[0]=='mandatory6'  && isNaN(formElem.value)){
										alert('Please enter numeric value');
										formElem.focus();
										return false;
										}
										if(split_title[0]=='mandatory6'  && parseInt(formElem.value)<0){
										alert('Please enter positive value');
										formElem.focus();
										return false;
										}
										
										if(split_title[0]=='mandatory7' && trimspaces(formElem.value)!=''){
											if(split_title[0]=='mandatory7'  && isNaN(formElem.value)){
											alert('Please enter danger zone value between 1 to 99');
											formElem.focus();
											return false;
											}
											if(split_title[0]=='mandatory7'  && parseInt(formElem.value)<=0){
											alert('Please enter danger zone value between 1 to 99');
											formElem.focus();
											return false;
											}
											if(split_title[0]=='mandatory7'  && parseInt(formElem.value)>=100){
											alert('Please enter danger zone value between 1 to 99');
											formElem.focus();
											return false;
											}
										}
										
										if(split_title[0]=='mandatory8' && trimspaces(formElem.value)!=''){
											if(split_title[0]=='mandatory8'  && isNaN(formElem.value)){
											alert('Please enter benchmark zone value between 1 to 100');
											formElem.focus();
											return false;
											}
											if(split_title[0]=='mandatory8'  && parseInt(formElem.value)<=0){
											alert('Please enter benchmark zone value between 1 to 100');
											formElem.focus();
											return false;
											}
											if(split_title[0]=='mandatory8'  && parseInt(formElem.value)>100){
											alert('Please enter benchmark zone value between 1 to 100');
											formElem.focus();
											return false;
											}
										}
										
									if(split_title[0]=='mandatory10' && formElem.value!='')
									{
										
									var	urlvalidation=/^(http:\/\/)+[a-zA-Z0-9-\.]+\.(com|org|net|mil|edu|ca|co.uk|com.au|gov)$/;
										if(!urlvalidation.test(formElem.value.toLowerCase()))
										{
											alert('Url should be in valid  format');
											formElem.focus();
											return false;
										}
									}
										
										if(split_title[0]=='mandatorygroup'){
											if(document.getElementById('group_radio1').checked == true)
											{
													if(document.getElementById('group_name').value=='' )
													{
														alert('Please Enter Group Name.');
														document.getElementById('group_name').focus();
														return false;
													}
													if(document.getElementById('comparison_option').value=='' )
													{
														alert('Please Select One Option.');
														document.getElementById('comparison_option').focus();
														return false;
													}
											}
											
											
											else if(document.getElementById('group_radio2').checked == true)
											{
													if(document.getElementById('group_name2').value=='' )
													{
														alert('Please Select Group Name.');
														document.getElementById('group_name2').focus();
														return false;
													}	
											}
											
										}
										
										if(split_title[0]=='mandatory9' && trimspaces(formElem.value)==''){
										alert(split_title[1]);
										formElem.focus();
										return false;
										}
										if(split_title[0]=='mandatory9' ){
											if(formElem.value !='')
												{
													
													
														if (/\./.test(formElem.value)) 
														{
															alert('Invalid formate for IMEI code.');
															 formElem.focus();
															 return false;		
														}
														
														if (/\-/.test(formElem.value)) 
														{
															alert('Invalid formate for IMEI code.');
															 formElem.focus();
															 return false;		
														}
													
											
													var strLength = formElem.value.length;
													var spaceindex = formElem.value.lastIndexOf(' ');
													if(strLength != 16)
													{
														alert("Please enter 16 digit IMEI code.");
														formElem.focus();
														return false;
													}
													if(spaceindex!='-1')
													{
														alert("Please remove space from IMEI code.");
														formElem.focus();
														return false;
													}
												}
										}
								break;
								}
						}//end of for loop
						return true;
		}  

function CheckAll(obj)
{
	//alert(obj);
	var count = obj.elements.length;
	for (i=0; i < count; i++) 
	{
		if(obj.elements[i].type == 'checkbox')
			obj.elements[i].checked = obj.chkall.checked;
	}
}

function doAction(action,obj,msgtype)
{
	//alert(action+" =="+obj);
	var count = obj.elements.length;
	
	var flag=false;
	var msg = "";
	if(msgtype !='')
	{
		msg = msgtype;	
	}
	for (i=0; i < count; i++) 
	{
		if(obj.elements[i].type == 'checkbox')
		{
			if(obj.elements[i].checked == 1)
			flag=true;
		}
	}
	if(flag==true)
	{
		if(window.confirm("Are you sure to delete "+msg))
		{
			obj.action.value=action;
			obj.submit();
		}
		else
		{
			var count = obj.elements.length;
			for (i=0; i < count; i++) 
			{
							obj.elements[i].checked =0;
							flag=false;
			}
		}
	}
	else
		alert("Please select at least one record to perform the action.");
}


function delete_record(id,msgtype)
{
	var count = document.adminForm.elements.length;
	var flag=false;
	var msg = "";
	//alert(msgtype);
	if(msgtype !='')
	{
		msg = msgtype;
	}
	for (i=0; i < count; i++) 
	{
		if(document.adminForm.elements[i].type == 'checkbox')
		{
			if(document.adminForm.elements[i].value==id){
			document.adminForm.elements[i].checked =1;
			flag=true;
			}
		}
	}
	if(flag==true)
	{
		if(window.confirm("Are you sure want to delete "+msg))
		{
			document.adminForm.action.value='delete';
			document.adminForm.submit();
		}
	else
		{
			var count = document.adminForm.elements.length;
			for (i=0; i < count; i++) 
			{
					if(document.adminForm.elements[i].value==id)
						{
							document.adminForm.elements[i].checked =0;
							flag=false;
						}
			}
		}
	}
	
}



function next_link(ref,life)
{

		window.location.href='./?life='+life;
}

function next_link_model(ref,life)
{

		window.location.href='./?life='+life+'&ns=1';
}

function delete_brand(obj,action,id)
{
	
	if(window.confirm("Are you sure want to delete the category.\n"))
		{
			
		}
		return false;
}
function submit_status(what,life,super_id)
{
	
	location.href=("./?life="+life+"&category_status="+what.value+"&super="+super_id);
	
	
}
function submit_category(what)
{
	
	
	location.href=("./?life=5&pi=1&category_status="+what.value);
	
}

function rest_brand(what)
{
	var categoryValue=document.project_brand.brand_category.value;
	location.href=("./?life=5&pi=1&brand_status="+what.value+"&category_status="+categoryValue);
}

function criteria_question_func(what)
{
	
	var criteriaValue=what.value;
	location.href=("./?life=5&pi=2&cr_qu_status="+criteriaValue+"#po1");
}

function criteria_question_func1(what)
{
	
	var criteriaValue=what.value;
	
	location.href=("./?life=5&pi=3&cr="+criteriaValue+"#po2");
}

function delete_question(action,obj,type_msg)
{

	var count = obj.elements.length;
	var flag=false;
	var msg = "";
	for (i=0; i < count; i++) 
	{
		if(obj.elements[i].type == 'checkbox')
		{
			
			if(obj.elements[i].checked == 1)
			{
			flag=true;}
		}
	}
	if(flag==true)
	{
		if(action == "Delete_Question")
		{
			msg = "";			
		}
		if(window.confirm("Are you sure want to delete "+type_msg))
		{
			obj.action.value=action;
			obj.submit();
		}
	}
	else
		alert("Please select at least one Question to perform the action.");
}

function criteria_credit_delete(action,obj,type_msg)
{
	//alert(action+" =="+obj);
	var count = obj.elements.length;
	var flag=false;
	var msg = "";
	for (i=0; i < count; i++) 
	{
		if(obj.elements[i].type == 'checkbox')
		{
			
			if(obj.elements[i].checked == 1)
			{
			flag=true;}
		}
	}
	if(flag==true)
	{
		if(action == "delete_criteria_credit")
		{
			msg = "";			
		}
		if(window.confirm("Are you sure want to delete "+type_msg))
		{
			obj.action.value=action;
			obj.submit();
		}
	}
	else
		alert("Please select at least one criteria to perform the action.");
}

function status_fun(action,what)
	{
		location.href=("./?life=5&pi=2&qi="+what+"&status="+action+"#po3");
	}
function project_status_fun(action,what)
	{
		var lstart=document.adminForm.limitstart.value;
		location.href=("./?life=51&pi="+what+"&status="+action+"&limitstart="+lstart);
	}
function project_status_fun_admin(action,what)
	{
		var lstart=document.adminForm.limitstart.value;
		location.href=("./?life=51&pi="+what+"&status="+action+"&limitstart="+lstart);
	}
	
function CheckCredit(obj)
	{
			alert(obj.value);
	}

function onlysubmit(puid,pi)
{
	window.document.location="./?life="+puid;
	
}


function show_area(id)
{
	if(document.getElementById(id).style.display=='none'){
		document.getElementById(id).style.display='';
	}
	else{
		document.getElementById(id).style.display='none';
	}
	
}

function removeimageAction(action,life,image,id)
{
	
		if(window.confirm("Are you sure to remove image"))
		{
			window.document.location="./?life="+life+"&remove="+image+"&id="+id;
		}
		else
		{
			return false;
		}
	
	
}

function removepromotionimage(action,life,type,id)
{
	
		if(window.confirm("Are you sure to remove image"))
		{
			window.document.location="./?life="+life+"&delimage="+type+"&id="+id;
		}
		else
		{
			return false;
		}
	
	
}
