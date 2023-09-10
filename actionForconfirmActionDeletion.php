<?php
set_time_limit(300);
  include_once('inc_connection.php');
		$yes = addslashes(trim($_POST['yes']));
		$no = addslashes(trim($_POST['no']));
		
		
		if($yes == "Yes"){
			$actionId = addslashes(trim($_POST['actionId']));
		
		$sql1="INSERT INTO oxy2_actiondeleted (`id`,`userId`,`department`,`leadNum`,`leadIdentification`,`completeLeadNumber`,`campaignName`,`clientName`, `stage`, `keyAccount`,`keyact`, `venue`,`city`, `type`, `eventDate`, `fromDate`, `endDate`,`projectLeader`,`bdName`,`status`,`email`,`campaignBrief` ,`progress` ,`criticalIssue`,`taskDay`,`reasonType`,`leadDeletionReason`,`actionStatus`,`updatedBy`,`updatedOn`,`dateAdded`) SELECT id,userId,department,leadNum,leadIdentification,completeLeadNumber,campaignName,clientName, stage, keyAccount,keyact, venue,city, type, eventDate, fromDate, endDate,projectLeader,bdName,status,email,campaignBrief,progress,criticalIssue,taskDay,reasonType,leadDeletionReason,actionStatus,updatedBy,updatedOn,dateAdded FROM oxy2_action WHERE id='$actionId'";
		
		

		$result = mysql_query($sql1);
		
		$sql2="DELETE FROM oxy2_action WHERE id='$actionId' AND actionStatus = '4'";

		mysql_query($sql2);
		
		 header("location:./?id=3&subId=10&res=2");

		
		}
		
		if($no == "No"){
			 header("location:./?id=3&subId=10");
		}
		
		

  
  ?>