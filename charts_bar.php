<!--One Wrap-->
<script src="js/jquery.animateNumbers.js"></script>

    <script>
    $(function() {


$('#file_upload').uploadify({
    'uploader'  : 'uploadify/uploadify.swf',
    'script'    : 'uploadify/uploadify.php',
    'cancelImg' : 'uploadify/cancel.png',    
    'folder'    : 'usr_chart_op',  /*Destination Folder*/
    'fileExt'   : '*.jpg;*.gif;*.png;*.pdf', /*These extenstion files*/
	//'checkExisting' : 'check.php',
    'multi'     : false,   /*Multiple file upload option*/
    'sizeLimit' : 200000, /*Here I have set the file size limit - 400KB*/
    'displayData': 'percentage',
    'scriptData' : {'event_id' : $('#event_id').val(),'section' : $('#section').val()},
    onComplete: function (evt, queueID, fileObj, response, data) {
	//alert('The file ' + fileObj.name + ' was uploaded with a response of ' + response + ' : ' + data);	
     //alert(": "+response);
	 if(response == "Invalid file type.")
	 {
	 alert("Please select coreect file type *.jpg *.gif *.png *.pdf");
	 }
	 else
	 {
	 $("#upload_con").val(response);
	 }
	
     }// end onComplete function		
	
	
	}); // end of uploadify code.......

});
	
	
	
	
    </script>


    <div class="one_wrap">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">H</span><h5>Stacked Bar</h5></div>
            <div class="widget_body">
            	<div class="content_pad">
                
                 

            	
  
                </div>
        </div>
    </div>  <div class="one_wrap fl_left">
    	<div class="widget">
        	<div class="widget_title"><span class="iconsweet">]</span><h5>File Uploader</h5></div>
            <div class="widget_body">
                <div id="file_uploader"><input id="file_upload" type="file" name="file_upload" /><a href="javascript:$('#file_upload').uploadifyUpload();" class="button_small whitishBtn" ><span class="iconsweet">I</span>Upload Files</a><input id="event_id" type="hidden" name="event_id"  value="eter"/><input id="section" type="hidden" name="section"  value="contract"/>
                <input id="upload_con" type="text" name="upload_con"  value=""/></div>
                <div class="action_bar">
                    
                </div>
            </div>
        </div>
    </div>