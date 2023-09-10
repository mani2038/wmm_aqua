<?php
include("include_sessions.php");
?>
<?php include("common_function.php");
switch($_GET['swich'])
  {
	case "changeRegion":
	$str="changeRegion=!~=".createRegionSec($_GET['country'],$_GET['areaId'],'',$_GET['combination'])."=!~=".createCitySec($_GET['country'],$_GET['areaId']);
	break;
	
	case "changeRegionSec":
	$str="changeRegionSec=!~=".createRegionSec($_GET['country'],$_GET['areaId'],$_GET['regionId'],$_GET['combination'])."=!~=".createCitySec($_GET['country'],$_GET['areaId'],$_GET['cityId'],$_GET['regionId']);
	break;
	
	case "changeCity":
	$str="changeCity=!~=".createCity_New($_GET['regionId'],$_GET['areaId'],$_GET['countryId']);
	break;
	
	###### For Promoter.
	
	case "changeRegionPromo":
	$str="changeRegionPromo=!~=".createRegionSecPromo($_GET['country'],$_GET['areaId'],'',$_GET['combination'])."=!~=".createCitySecPromo($_GET['country'],$_GET['areaId']);
	break;
	
	case "changeRegionSecPromo":
	$str="changeRegionSecPromo=!~=".createRegionSecPromo($_GET['country'],$_GET['areaId'],$_GET['regionId'],$_GET['combination'])."=!~=".createCitySecPromo($_GET['country'],$_GET['areaId'],$_GET['cityId']);
	break;
	
	case "changeCityPromo":
	$str="changeCityPromo=!~=".createCity_NewPromo($_GET['regionId'],$_GET['areaId'],$_GET['countryId']);
	break;
	
	###### End.
	
	####### use for deepdive ###################################
	case "changeUserDefineComp":
	$str="changeUserDefineComp=!~=".chk(createcritera_deep_sec($_GET['p_id'],$_GET['criteria_id'],$_GET['brands_nocomp_sec'],$_GET['global_brand']),createcritera_brand_deep_sec($_GET['p_id'],$_GET['criteria_id'],$_GET['commas_seprated_brands'],$_GET['all_brand_sec'],$_GET['global_brand'],$_GET['fcheked']))."".createcritera_deep_sec($_GET['p_id'],$_GET['criteria_id'],$_GET['brands_nocomp_sec'],$_GET['global_brand'])."=!~=".createcritera_brand_deep_sec($_GET['p_id'],$_GET['criteria_id'],$_GET['commas_seprated_brands'],$_GET['all_brand_sec'],$_GET['global_brand'],$_GET['fcheked']);
	break;
	####### use for deepdive ###################################
	//case "changeBrandCompare":
	//$str="changeBrandCompare=!~=".createcritera_brand_deep_sec($_GET['p_id'],$_GET['criteria_id'],$_GET['commas_seprated_brands']);
	//break;
	
	
	######## End ###############################################
  }
  
function createRegionSec($countryId='',$areaId='',$regionId='',$combination='')
{
	$i=1;
	if($areaId !='')
	{
		$area_Arr = explode(",",$areaId);
		foreach($area_Arr as $k=>$v)
		{
			if($i!=1) $area_id .= ",";
			$area_id .= "'".$v."'";
			$i++;
		}
	}
	if($countryId =='')
		$query_select	=	"select distinct region_id from mp_combination where id IN($area_id)";
	else
		$query_select	=	"select distinct region_id from mp_combination where country_id='$countryId' and id IN($area_id)";
	
	//echo $regionId;
	//print $str;
	$rs				=	mysql_query($query_select);
	$createRegionDrop = "";
	if(mysql_num_rows($rs)>=1)
	{
		$combination_arr = explode(",",$combination);
	//echo $combination;
		//$createRegionDrop .= "<select name='tt' id='tt' onchange='changeCity(this,'".$areaId."');'><option value=''>All</option>";
		if(in_array("ct", $combination_arr))							
			$createRegionDrop .= "<select name='regionId' id='regionId' onchange='changeCity(this.value, \"$areaId\", \"$countryId\");'><option value=''>All</option>";
		else
			$createRegionDrop .= "<select name='regionId' id='regionId'><option value=''>All</option>";
		
		while($objCountry = mysql_fetch_array($rs))
		{
			if($regionId == $objCountry['region_id'])
				$slt = "selected";
			else
				$slt = "";
				
			$region_id = $objCountry['region_id'];
			if($region_id !='')
				$createRegionDrop .= "<option value='".$region_id."' ".$slt." >".region_name($region_id)."</option>";
		}
		$createRegionDrop .= "</select>";
	}
	return $createRegionDrop;
} 
function createCitySec($countryId='',$areaId='',$cityId='',$regionId='')
{
	$i=1;
	if($areaId !='')
	{
		$area_Arr = explode(",",$areaId);
		foreach($area_Arr as $k=>$v)
		{
			if($i!=1) $area_id .= ",";
			$area_id .= "'".$v."'";
			$i++;
		}
	}
	if($regionId !='' && $countryId !='')
		$query_select	=	"select distinct city_id from mp_combination where region_id='$regionId' and country_id='$countryId' and id IN($area_id)";
	else if($countryId !='' && $regionId =='')
		$query_select	=	"select distinct city_id from mp_combination where country_id='$countryId' and id IN($area_id)";
	else
		$query_select	=	"select distinct city_id from mp_combination where id IN($area_id)";
	//echo $query_select;
	//else if($regionId !='' && $countryId !='')
		//$query_select	=	"select distinct city_id from mp_combination where region_id='$regionId' and country_id='$countryId' and id IN($area_id)";
		
	$rs				=	mysql_query($query_select);
	$createCityDrop = "";
	if(mysql_num_rows($rs)>=1)
	{
		$createCityDrop .= "<select name='cityId' id='cityId'><option value=''>All</option>";
		while($objCountry = mysql_fetch_array($rs))
		{
			if($cityId == $objCountry['city_id'])
				$slt = "selected";
			else
				$slt = "";
			$city_id = $objCountry['city_id'];
			if($city_id !='')
				$createCityDrop .= "<option value='".$city_id."' ".$slt.">".city_name($city_id)."</option>";
		}	
		$createCityDrop .= "</select>";	
	}
	return $createCityDrop;
}

function createCity_New($regionId='',$areaId='',$countryId='')
{
	$i=1;
	if($areaId !='')
	{
		$area_Arr = explode(",",$areaId);
		foreach($area_Arr as $k=>$v)
		{
			if($i!=1) $area_id .= ",";
			$area_id .= "'".$v."'";
			$i++;
		}
	}
	//echo "countryId=".$countryId."regionId=".$regionId."areaId=".$areaId;
	if($regionId =='' && $countryId !='')
		$query_select	=	"select distinct city_id from mp_combination where country_id='$countryId' and id IN($area_id)";
	else if($regionId !='' && $countryId =='')
		$query_select	=	"select distinct city_id from mp_combination where region_id='$regionId' and id IN($area_id)";
	else
		$query_select	=	"select distinct city_id from mp_combination where region_id='$regionId' and id IN($area_id)";
	//echo $query_select;
	$rs				=	mysql_query($query_select);
	$createCityDrop_new = "";
	if(mysql_num_rows($rs)>=1)
	{
		//$createCityDrop_new .= "<option value=''>All</option>";
		$createCityDrop_new .= "<select name='cityId' id='cityId'><option value=''>All</option>";
		while($objCountry = mysql_fetch_array($rs))
		{
			if($cityId == $objCountry['city_id'])
				$slt = "selected";
			else
				$slt = "";
			$city_id = $objCountry['city_id'];
			if($city_id !='')
				$createCityDrop_new .= "<option value='".$city_id."' ".$slt.">".city_name($city_id)."</option>";
		}	
		$createCityDrop_new .= "</select>";		
	}
	return $createCityDrop_new;
}

##### Start only for promoter.

function createRegionSecPromo($countryId='',$areaId='',$regionId='',$combination='')
{
	$i=1;
	if($areaId !='')
	{
		$area_Arr = explode(",",$areaId);
		foreach($area_Arr as $k=>$v)
		{
			if($i!=1) $area_id .= ",";
			$area_id .= "'".$v."'";
			$i++;
		}
	}
	if($countryId =='')
		$query_select	=	"select distinct region_id from mp_combination where id IN($area_id)";
	else
		$query_select	=	"select distinct region_id from mp_combination where country_id='$countryId' and id IN($area_id)";
	
	//echo $regionId;
	//print $str;
	$rs				=	mysql_query($query_select);
	$createRegionDrop = "";
	if(mysql_num_rows($rs)>=1)
	{
		$combination_arr = explode(",",$combination);
		if(in_array("ct", $combination_arr))							
			$createRegionDrop .= "<select name='regionId' id='regionId' onchange='changeCity(this.value, \"$areaId\", \"$countryId\");'>";
		else
			$createRegionDrop .= "<select name='regionId' id='regionId'>";
		
		while($objCountry = mysql_fetch_array($rs))
		{
			if($regionId == $objCountry['region_id'])
				$slt = "selected";
			else
				$slt = "";
				
			$region_id = $objCountry['region_id'];
			if($region_id !='')
				$createRegionDrop .= "<option value='".$region_id."' ".$slt." >".region_name($region_id)."</option>";
		}
		$createRegionDrop .= "</select>";
	}
	return $createRegionDrop;
} 
function createCitySecPromo($countryId='',$areaId='',$cityId='')
{
	$i=1;
	if($areaId !='')
	{
		$area_Arr = explode(",",$areaId);
		foreach($area_Arr as $k=>$v)
		{
			if($i!=1) $area_id .= ",";
			$area_id .= "'".$v."'";
			$i++;
		}
	}
	if($countryId =='')
			$query_select	=	"select distinct city_id from mp_combination where id IN($area_id)";
	else
		$query_select	=	"select distinct city_id from mp_combination where country_id='$countryId' and id IN($area_id)";
	//echo $query_select;
	$rs				=	mysql_query($query_select);
	$createCityDrop = "";
	if(mysql_num_rows($rs)>=1)
	{
		$createCityDrop .= "<select name='cityId' id='cityId'>";
		while($objCountry = mysql_fetch_array($rs))
		{
			if($cityId == $objCountry['city_id'])
				$slt = "selected";
			else
				$slt = "";
			$city_id = $objCountry['city_id'];
			if($city_id !='')
				$createCityDrop .= "<option value='".$city_id."' ".$slt.">".city_name($city_id)."</option>";
		}	
		$createCityDrop .= "</select>";	
	}
	return $createCityDrop;
}
function createCity_NewPromo($regionId='',$areaId='',$countryId='')
{
	$i=1;
	if($areaId !='')
	{
		$area_Arr = explode(",",$areaId);
		foreach($area_Arr as $k=>$v)
		{
			if($i!=1) $area_id .= ",";
			$area_id .= "'".$v."'";
			$i++;
		}
	}
	//echo "countryId=".$countryId."regionId=".$regionId."areaId=".$areaId;
	if($regionId =='' && $countryId !='')
		$query_select	=	"select distinct city_id from mp_combination where country_id='$countryId' and id IN($area_id)";
	else if($regionId !='' && $countryId =='')
		$query_select	=	"select distinct city_id from mp_combination where region_id='$regionId' and id IN($area_id)";
	else
		$query_select	=	"select distinct city_id from mp_combination where region_id='$regionId' and id IN($area_id)";
	//echo $query_select;
	$rs				=	mysql_query($query_select);
	$createCityDrop_new = "";
	if(mysql_num_rows($rs)>=1)
	{
		//$createCityDrop_new .= "<option value=''>All</option>";
		$createCityDrop_new .= "<select name='cityId' id='cityId'>";
		while($objCountry = mysql_fetch_array($rs))
		{
			if($cityId == $objCountry['city_id'])
				$slt = "selected";
			else
				$slt = "";
			$city_id = $objCountry['city_id'];
			if($city_id !='')
				$createCityDrop_new .= "<option value='".$city_id."' ".$slt.">".city_name($city_id)."</option>";
		}	
		$createCityDrop_new .= "</select>";		
	}
	return $createCityDrop_new;
}
##### End.
################### This is for deep dive #####################
function createcritera_deep_sec($p_id,$criteria_id,$brands_nocomp_sec='',$global_brand='')
{
	$crit_id_arr_sec = explode(":",$criteria_id);
	$user_def_brand_arr = array();
	$total_criteria_num = count($crit_id_arr_sec);
	if(count($crit_id_arr_sec)>=1)
	{	
		foreach($crit_id_arr_sec as $ck=>$cv)
		{
			$query_select = "select * from mp_project_question where project_id='$p_id' and criteria_id='$cv'";
			$rs_Qns		  = mysql_query($query_select);
			if(mysql_num_rows($rs_Qns)>=1)
			{
				while($objQns = mysql_fetch_array($rs_Qns))
				{
					if($objQns['comparison_type'] == 'ud')
					{
						
						if($brands_nocomp_sec == $objQns['question_id'])
							$slt = "selected";
						else
							$slt = "";
							
						
						//$dropdown .= "<option value='".$objQns['question_id']."' $slt>".$objQns['group_name']."</option>";
						
						$user_def_brand_arr[$objQns['question_id']] = $objQns['group_name'];
						$flag	   = "yes";
					}
					else if(count($crit_id_arr_sec)==1 && $flag !='yes')
					{
						$dropdown_value = "no";
					}
					
				}
			}
		}
	}
	######### Unique dropdown #########################
	$temp_user_def_brand_arr = array_unique($user_def_brand_arr);
	foreach($temp_user_def_brand_arr as $temp_k=> $temp_v)
	{
		$tt_key = array_keys($user_def_brand_arr, $temp_v); 
		//echo count($tt_key)."==".$total_criteria_num."<br>";
		if(count($tt_key) == $total_criteria_num)
		{
			$dropdown .= "<option value='".$temp_k."' $slt>".$temp_v."</option>";
			//print_r($tt_key);
			$flag	   = "yes";
		}
	}
	########### End ###################################
	//print_r($dropdown);
	//die;
	if(count($crit_id_arr_sec)==1 && $flag !='yes')
	{
		$dropdown_value = "no";
		
	}
	else if($dropdown !='')
	{
		if($global_brand == "UB")
			$chkv = "checked='checked'";
		//<option value=''> - - Select One - - </option>
		$drop .= "<label><input type='radio' id='global_brand' name='global_brand' value='UB' $chkv /><strong>Select User Defined Group<strong></label><br>";
		$drop .= "&nbsp;&nbsp;&nbsp;&nbsp;<select name=brands_nocomp_sec>";
		//$drop .= "<option value=''> - - Select One - - </option>";
		$drop .= $dropdown;
		$drop .= "</select>";
	}
		return $drop;
}
##################### End #####################################
##################### Brand drop down according to criteria ###
function createcritera_brand_deep_sec($p_id,$criteria_id,$commas_seprated_brands,$brand_selected='',$global_brand='',$fcheked='')
{
	$brand_selected	 = explode(",",$brand_selected);
	$crit_id_arr_sec = explode(":",$criteria_id);
	$brands_arr		 = explode(",",$commas_seprated_brands);
	foreach($crit_id_arr_sec as $ck=>$cv)
	{
		$query_select = "select * from mp_project_question where project_id='$p_id' and criteria_id='$cv'";
		$rs_Qns		  = mysql_query($query_select);
		$noentry 	  = "yes";
		$flag		  = "no";
		if(mysql_num_rows($rs_Qns)>=1)
		{
			while($objQns = mysql_fetch_array($rs_Qns))
			{
					if($objQns['comparison_type']== 'bc' && $noentry == "yes")
					{
					###############
						foreach($brands_arr as $k=>$v)
						{
							//brand_name($v);
							$query_select = "select brand_name,brand_id from mp_brand_product where brand_id='$v'";
							$rs_brands	  = mysql_query($query_select);
							if(mysql_num_rows($rs_brands)>=1)
							{
								$objBrand = mysql_fetch_array($rs_brands);
								if(is_array($brand_selected))
								{
									if(in_array($objBrand['brand_id'],$brand_selected))
										$slt = "selected";
									else
										$slt = "";
								}
								else
								{
									if($brand_selected == $objBrand['brand_id'])
										$slt = "selected";
									else
										$slt = "";
								}
								if($fcheked == 1)
								{
									$slt = "selected";
								}	
								$drop .= "<option value='".$objBrand['brand_id']."' $slt>".$objBrand['brand_name']."</option>";
								$flag	   = "yes";
							}
							
						}
						$noentry = "no";
						$fcheked = 2;
						if($flag == "yes")
						{
							if($global_brand == "GB" || $global_brand != "UB")
								$chkv = "checked='checked'";
							//<option value=''> - - Select One - - </option>
							$drop_brand .= "<label><input type='radio' id='global_brand' name='global_brand' value='GB' $chkv /><strong>Select Brands<strong></label><br>";
							$drop_brand .= "&nbsp;&nbsp;&nbsp;&nbsp;<select name='brands_sec[]' multiple='multiple'>";
							$drop_brand .= $drop;
							$drop_brand .= "</select>";
							return $drop_brand;
						}
					#############
						
				}
				
			}
		}
	}
}
##################### End ######################################
function chk($fi='',$se='')
{
	if($fi !='' && $se !='')
	{
		//return "OR<br>";
		//$radio_buttun = "<input type";
		//return
	}
}
print $str;
?>
