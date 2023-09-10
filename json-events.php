<?php

include 'inc_connection.php';

$SelQuery = "SELECT * FROM oxy2_lead";
$SelExec = mysql_query($SelQuery);
$cntt = mysql_num_rows($SelExec);

if($cntt > 0){
//echo $cntt;
$i = 0;
$arr = array();
//				'id' => 222,
//			'title' => "Event2",
//			'start' => "$year-02-20",
//			'end' => "$year-02-25",
//			'url' => "http://yahoo.com/"
//$ceventStartDate= $SelResult['ceventStartDate'];
//$ceventEndDate= $SelResult['ceventEndDate'];
			  while($SelResult = mysql_fetch_array($SelExec))
			  {
			  $i++;
			  //echo $SelResult['leadname'];
			  //echo $SelResult['beventStartDate'];
			  //echo $SelResult['beventEndDate'];
			 $leadno= $SelResult['leadno'];
			 $dept= $SelResult['dept'];
			 $row_array['id']=$i;
			 $row_array['title']=$SelResult['leadname'];
			 $row_array['start']=$SelResult['beventStartDate'];
			 $row_array['end']=$SelResult['beventEndDate'];
			 $row_array['url']="http://www.pulsesuite.com/oxygen/?id=2&subId=13&ldnumber=$leadno&dep=$dept";
			 array_push($arr,$row_array);
			  }
			  
}

$json_response = json_encode($arr);

# Optionally: Wrap the response in a callback function for JSONP cross-domain support

# Return the response
echo $json_response;
	


?>
