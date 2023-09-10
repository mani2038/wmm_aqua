<?php
include("include_sessions.php");
?>
<?php include("common_function.php");
switch($_GET['swich'])
  {
	case "changeRegion":
	$str="changeRegion=!~=".createRegionSec($_GET['country'],$_GET['areaId'])."=!~=".createCitySec($_GET['country'],$_GET['areaId']);
	break;
	
	case "changeRegionSec":
	$str="changeRegionSec=!~=".createRegionSec($_GET['country'],$_GET['areaId'],$_GET['regionId'])."=!~=".createCitySec($_GET['country'],$_GET['areaId'],$_GET['cityId']);
	break;
	
	case "changeCity":
	$str="changeCity=!~=".createCity_New($_GET['regionId'],$_GET['areaId']);
	break;
  }
  
function createRegionSec($countryId='',$areaId='',$regionId='')
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
		$createRegionDrop .= "<option value=''>All</option>";
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
	}
	return $createRegionDrop;
} 
function createCitySec($countryId='',$areaId='',$cityId='')
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
		$createCityDrop .= "<option value=''>All</option>";
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
	}
	return $createCityDrop;
}

function createCity_New($regionId='',$areaId='')
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
	//if($countryId =='')
	///		$query_select	=	"select distinct city_id from mp_combination where id IN($area_id)";
	//else
		$query_select	=	"select distinct city_id from mp_combination where region_id='$regionId' and id IN($area_id)";
	//echo $query_select;
	$rs				=	mysql_query($query_select);
	$createCityDrop_new = "";
	if(mysql_num_rows($rs)>=1)
	{
		//$createCityDrop_new .= "<option value=''>All</option>";
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
	}
	return $createCityDrop_new;
}
print $str;
?>
