<?php include("includes/check_session.php");?>
<?php $id=$_REQUEST['id'];  ?>
<?php $reg=$_SESSION['user']['region'];  ?>
<?php
########paste to common function
function delete_image_knows($image_id)//Changes.......for knows
	{			
				global $ss;
				$sql=mysql_query("SELECT news_image FROM boursin_reg WHERE outlet_id='".$image_id."'");
				$del_item=mysql_result($sql,0);
				if($del_item!="")
				{
					$delete_path="uploaded_file/outlet_img/";
					if(file_exists($delete_path.$del_item))
					{
						unlink($delete_path.$del_item);
						mysql_query("update boursin_reg set news_image='' where outlet_id=".$image_id."");	
						header("Location: ./?ss=".$ss."&life=81&id=".$image_id."&error=300");
					}
					
					
				}
	}
################################

if(isset($_POST['add_news']) && $_POST['add_news']!='')
{
	$outlet_name			=	$_POST['outlet_name'];
	$address		=	$_POST['address'];
	$city	=	$_POST['city'];
	$region			=	$_POST['state'];
	$cperson			=	$_POST['cperson'];
	$cnumber			=	$_POST['cnumber'];
	$type			=	$_POST['type'];
	$news_image				=	$_FILES['news_image'];
	
	if(empty($id))
	{
		$ret=add_knows_master($_POST);//Changes.......for knows
		//echo"error - $ret";
		if(is_array($ret))
			$valid_array=$ret;
		else
			$g_error[]=$ret;
	}
	
}	
elseif(isset($_POST['update_news']) && $_POST['update_news']!='')
{

	$outlet_name			=	$_POST['outlet_name'];
	$address		=	$_POST['address'];
	$city	=	$_POST['city'];
	$region			=	$_POST['state'];
	$cperson			=	$_POST['cperson'];
	$cnumber			=	$_POST['cnumber'];
	$type			=	$_POST['type'];
	$news_image				=	$_FILES['news_image'];
	
	if(!empty($id))
	{
		$ret=update_knows_master($_POST);//Changes.......for knows
		if(is_array($ret))
			$valid_array=$ret;
		else
			$g_error[]=$ret;
			
			echo"<br><br><br>$ret";
			echo"$sql_insert";
	}
}

if(isset($id) && $id!='')
	{
		$fetch_data=select_saved_data("boursin_reg",'outlet_id',$id);//Changes.......for knows
		$outlet_name			=	stripslashes(htmlspecialchars($fetch_data[0]->outlet_name));
		$address		=	stripslashes(htmlspecialchars($fetch_data[0]->address));
		$city	=	stripslashes(htmlspecialchars($fetch_data[0]->city));
		$region			=	stripslashes(htmlspecialchars($fetch_data[0]->region));
		$cperson			=	stripslashes(htmlspecialchars($fetch_data[0]->cperson));
		$cnumber			=	stripslashes(htmlspecialchars($fetch_data[0]->cnumber));
		$type			=	stripslashes(htmlspecialchars($fetch_data[0]->type));
		$news_image_info	=	stripslashes(htmlspecialchars($fetch_data[0]->news_image));
		if(isset($_REQUEST["delimage"]) && $_REQUEST["delimage"]=='true')
		{
			
			delete_image_knows($id);//Changes.......for knows
		}
		$lable="Update";
	}
	else
		$lable="Add";


?>

<style type="text/css">
.txtlbl2 {	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
	text-decoration: none;
	padding: 3px;
}
.txtlbl {
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
	color: #000000;
	text-decoration: none;
}
</style>
<!-- /TinyMCE -->
<?php include("includes/highslide_js.php"); ?>
		  <form method="post" name="add_Gift" action="" enctype="multipart/form-data" onSubmit="return validate_form(this);">
              <table width="95%" border="0" align="center" cellpadding="2" cellspacing="2" class="txtcontent3bk">
                <tr>
                  <th align="left" style="padding-top:5px; padding-bottom:5px; "><strong>Outlet</strong></th>
                </tr>
                <tr>
                  <td>
                    <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
                      <tr>
                        <td colspan="3" align="right" style="text-align: left;">&nbsp;&nbsp;
						<?php if(isset($id) && $id!='') 
								echo "Update Outlet";
							else
								echo "Add Outlet";
						?>						</td>
                      </tr>
					  <?php 
					  if(isset($_REQUEST['error']) && $_REQUEST['error'] !=''){$g_error[]=$_REQUEST['error'];}
					  if(count($g_error)){echo "<tr><td align='center' colspan='4'>".showError($g_error)."</td></tr>";}	?>
					  <?php	if(count($valid_array))	{	echo "<tr><td colspan='4' align='center'>".show_error($valid_array)."</td></tr>";	}	?>
                      
					  <tr>
                        <td width="19%" height="38" class="txtlbl" ><font face="Verdana, Arial, Helvetica, sans-serif">Oultet Name: </font></td>
                        <td colspan="2"  ><input name="outlet_name" class="txtlbl2" id="outlet_name" type="text" maxlength="255"  style="width:230px;"  value="<?php echo $outlet_name; ?>"/></td>
                      </tr>
					  
                      <tr>
					    <td valign="top" class="txtlbl"><font face="Verdana, Arial, Helvetica, sans-serif">Contact Person</font></td>
					    <td valign="top"><input name="cperson" type="text" class="txtlbl2" id="cperson" value="<?php echo $cperson;?>" size="40" /></td>
				      </tr>
					  <tr>
					    <td valign="top" class="txtlbl"><font face="Verdana, Arial, Helvetica, sans-serif">Contact Number</font></td>
					    <td valign="top"><input name="cnumber" type="text" class="txtlbl2" id="cnumber" value="<?php echo $cnumber;?>" size="40" /></td>
				      </tr>
					  <tr>
					    <td valign="top" class="txtlbl"><span class="style20"><font face="Verdana, Arial, Helvetica, sans-serif">Address</font></span></td>
					    <td valign="top"><textarea name="address" cols="40" rows="2" class="txtlbl2" id="fname3"><?php echo $address;?></textarea></td>
				      </tr>
					  <tr>
					    <td valign="top" class="txtlbl"><span class="style20"><font face="Verdana, Arial, Helvetica, sans-serif">City*</font></span></td>
					    <td valign="top"><select name="city" class="txtlbl21" id="city">
					      <option value="" selected="selected">---------------------City---------------------</option>
                          <?php if ($city!="") { ?>
                          <option value="<?php echo "$city"; ?>" selected="selected"><?php echo "$city"; ?></option>
                          <?php } ?>
					      <?php
$que="SELECT distinct(city) FROM citylist order by city asc";
$res=mysql_query($que);
//echo "<select name='cao' id='cao' >";  
while($row=mysql_fetch_array($res))
{
echo "<option value='$row[city]'>$row[city]</option>";
}
//echo "</select>";
      ?>
					      </select>
					      </select></td>
				      </tr>
					  <tr>
					    <td valign="top" class="txtlbl"><span class="style20"><font face="Verdana, Arial, Helvetica, sans-serif">Region *</font></span></td>
					    <td valign="top"><select name="state" class="txtlbl21" id="state">
					      <option value="" selected="selected">-----------------Region-----------------</option>
                          <?php if ($reg!="") { ?>
                          <option value="<?php echo "$reg"; ?>" selected="selected"><?php echo "$reg"; ?></option>
                          <?php } ?>
					      <?php
		
if(!empty($region))
	{
	  if($_SESSION['user']['user_type'] =='1')
	  {	
	  		
		$que="SELECT distinct(region) FROM citylist order by region asc";
				
	  }
	  else
	  {
	    $que="SELECT distinct(region) FROM citylist where region='$reg'";
	  }
$res=mysql_query($que);
//echo "<select name='cao' id='cao' >";  
while($row=mysql_fetch_array($res))
{
echo "<option value='$row[region]'>$row[region]</option>";
}
	}
//echo "</select>";
      ?>
					      </select></td>
				      </tr>
					  <tr>
					    <td valign="top" class="txtlbl"><span class="style20"><font face="Verdana, Arial, Helvetica, sans-serif">Outlet Type*</font></span></td>
					    <td valign="top"><select name="type" id="type" class="txtlbl21">
					      <option value="" selected="selected">--</option>
                          <?php if ($type!="") { ?>
                          <option value="<?php echo "$type"; ?>" selected="selected"><?php echo "$type"; ?></option>
                          <?php } ?>
					      <option value="On">On</option>
					      <option value="Off">Off</option>
					      </select></td>
				      </tr>
					  <tr class="txtlbl2">
					    <td align="right" valign="top" ><span class="txtlbl">Upload File:</span>&nbsp;&nbsp; </td>
					    <td valign="middle" width="81%" >
                        <input type="file" name="news_image" id="news_image"><br />
						<?php if($news_image_info!='') 
						 { 
						?>
<table width="70" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><a href="uploaded_file/outlet_img/<?php echo $news_image_info;?>" onmousemove="return hs.htmlExpand(this,{contentId: 'polycarbonate-html-3'})" class="highslide" ><img src="create_thumb/thumb2.php?src=<?php echo $news_image_info;?>&amp;x=80&amp;y=70" style="padding:5px;" border="0"/></a></td>
  </tr>
  <tr>
    <td align="center"><a href="uploaded_file/outlet_img/<?php echo $news_image_info;?>" target="_blank">Download</a></td>
  </tr>
</table>
<?php
						  }
						  else 
						  {
						   echo "<img src='images/file_broken.png' alt='Not Found or Not Uploaded' border='0' >";
							} 
						 ?>&nbsp;</td>
					  </tr>
                     
					
                      <tr>
                        <td height="31" colspan="3" align="center" >
						 <?php  if(isset($id) && $id!='') { ?>
						 <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
						 <input name="update_news_image" type="image" src="images/update.gif" />
						 <input type="hidden" name="update_news" id="update_news" value="update_news" />
						 
						 <?php } else { ?>
						 <input type="hidden" name="add_news" id="add_news" value="add_news" />
						 <input name="add_news_image" type="image" src="images/submit.gif" />
						 <?php }?>		&nbsp;
						 <a href="#Cancel" onclick="next_link('','79');"><img border="0" name="Cancel"  src="images/cancle.gif" /></a>				</td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
            </form>