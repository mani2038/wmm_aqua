<?php 
$creatorId = $_COOKIE["user_id"];
$creatorName = $_COOKIE["name"];
?>
<style type="text/css">
.actionBar
{
display:none;
}

input[type="submit"]:hover {
background: #CCC;
color: #FFF;
}

</style>
<link rel="stylesheet" href="css/wizard.css" type="text/css" />


<link rel="stylesheet" href="css/main.css" />

<!--[if lt IE 9]>
    <script src="js/html5.js"></script>
    <![endif]-->
<!--Javascript-->
<script type="text/javascript" src="js/jquery.min.js"> </script>


<script type="text/javascript" src="js/jquery.tipsy.js"> </script>

<script type="text/javascript" src="js/jquery.autogrowtextarea.js"></script>
<script type="text/javascript" src="js/jquery.ui.tabs.js"></script>

<script type="text/javascript" src="js/gcal.js"></script>

<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>



<script type="text/javascript" src="js/main.js"> </script>


<script language = "JavaScript">

function check()
{
	var numtest= /^[0-9]+$/;

	var emailtest=/^[a-zA-Z][\w\_\.-]*[a-zA-Z0-9]@[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z]$/;


	if (document.form1.title.value=="")
	{
		alert("Please select the Title.");
		document.form1.title.focus();
		return false;
	}
	
	if (document.form1.description.value=="")
	{
		alert("Please select the Description.");
		document.form1.description.focus();
		return false;
	}
	
	if (document.form1.type.value=="")
	{
		alert("Please select the Type.");
		document.form1.type.focus();
		return false;
	}
	
	
	
	var chks = document.getElementsByName('digi[]');
	var hasChecked = false;
	for (var i = 0; i < chks.length; i++)
	{
	if (chks[i].checked)
	{
	hasChecked = true;
	break;
	}
	}
	if (hasChecked == false)
	{
	alert("Please select at least one Department Revenue.");
	return false;
	}
	
	
	
	if (document.form1.industry.value=="")
	{
		alert("Please select the Industrial Relevance.");
		document.form1.industry.focus();
		return false;
	}
	
		

	
//----------------------------------------------------------------------------------------------------

	return true;
}

</script>







        
<!--One_Wrap-->
 	<div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">r</span>
        	<h5>Create Knowledge Base</h5></div>
            <div class="widget_body">
				<!--Form fields-->
               
               
               
               

<div class="content">
                
                
                    
                    <!-- START OF DEFAULT WIZARD -->
                    <form class="stdform stdform2" method="post" action="actionForKnowledgeBase.php"  id="form1" name="form1" onSubmit="return check()">
                    <div id="wizard" class="wizard">
                    
                        <div id="wiz1step1" class="formwiz">
                        	<table style="width:100%">
                            
                           
                            
                            <tr>
                               <td> 
                              
<p><label>Title *</label><span class='field'><input type='text' name='title' id='title' class='longinput'/></span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
<p><label>Description *</label><span class="field form_input"><textarea class="auto" id="txtInput" name="description" cols="61" rows="4" ></textarea></span></p>                    	    
                                </td>
                                </tr>
                                
                                 <tr>
                               <td> 
                              
<p>
                      <label>Type</label>
                                    <span class="field">
                                    
                                <select size="5" name="type[ ]" multiple id="type">
                                <option value="">Select one</option>
                                <option value="Brand&nbsp; &amp; Marketing Consultancy">Brand &amp; Marketing Consultancy</option>
                                <option value="Creative&nbsp; Services">Creative Services</option> 
                                <option value="Activations">Activations</option>
                                <option value="Roadshows">Roadshows</option>
                                <option value="Promotions">Promotions</option>
                                <option value="Events">Events</option>
                                <option value="Merchandising">Merchandising</option>
                                <option value="Headcount">Headcount</option>
                                <option value="CRM">CRM</option>
                                <option value="Loyalty">Loyalty</option>
                                <option value="Incentives">Incentives</option>
                                <option value="Channel Programs">Channel Programs</option>
                                <option value="Direct Marketing">Direct Marketing</option>
                                <option value="Digital campaigns">Digital campaigns</option>
                                <option value="Lead Generation Events">Lead Generation Events</option>
                                <option value="Exhibitions">Exhibitions</option>
                                <option value="Marketing Collateral Design and Production">Marketing Collateral Design and Production</option>
                                <option value="Database Marketing">Database Marketing</option>
                                <option value="Integrated B2B campaign">Integrated B2B campaign</option>
                                <option value="Integrated B2C campaign">Integrated B2C campaign</option>
                                <option value="Retail">Retail</option>
                                <option value="Tools">Tools</option>
                                <option value="Social Media">Social Media</option>
                                <option value="Others">Others</option>
                                
                                </select>
                                <span style="font-size:10px;">Please hold CTRL Button to select multiple type</span>
                                              
                     
                      </span>
                                </p>                	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
<p>
  <label>Department Relevance *</label><span class='field'>
					 <input type='checkbox' name='digi[]' value='Digital' >
                  	 Digital &nbsp;&nbsp;&nbsp; 
					               
                    <input type='checkbox' name='digi[]' value='B2B' >
                  	B2B &nbsp;&nbsp;&nbsp; 
					
                    <input type='checkbox' name='digi[]' value='B2C'>
                    B2C &nbsp;&nbsp;&nbsp; 
                  
                    </span></p>                    	    
                                </td>
                                </tr>
                                
                                <tr>
                               <td> 
                              
<p><label>Industrial Relevance *</label><span class='field'><input type='text' name='industry' id='industry' class='longinput'/></span></p>                    	    
                                </td>
                                </tr>
                        
                                <tr>
                               <td> 
                              


<p>
<input type='hidden' name='creatorName' value="<?php echo $creatorName; ?>"/>
<input type='hidden' name='creatorId' value="<?php echo $creatorId; ?>"/>
<span class='field'><input type='submit' name='submit' id='submit' value="Submit"/></span></p>                    	    
                                </td>
                                </tr>
                                </table>
                                
                              
                                
                        	
                            
                        </div><!--#wiz1step1-->
                        
                       
                        
                    </div><!--#wizard-->
                    </form>
                    <!-- END OF DEFAULT WIZARD -->
                    
                    
                    <br clear="all" /><br /><br />
                    
                  
                    
                   
                    
                    
                   
                    
                </div>
               
               
               
               
               
            </div>
        </div>
    </div>
                      
	<!--One_TWO-->
 	
 	<br class="clear" />    
     
          
