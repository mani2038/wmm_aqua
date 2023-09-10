<?php
set_time_limit(300);
  include_once('inc_connection.php');
		$yes = addslashes(trim($_POST['yes']));
		$no = addslashes(trim($_POST['no']));
		
		
		if($yes == "Yes"){
			$actionChartId = addslashes(trim($_POST['actionChartId']));
		
		$sql1="INSERT INTO oxy2_action (`id`,`userId`,`department`,`leadNum`,`leadIdentification`,`completeLeadNumber`,`campaignName`,`clientName`, `stage`, `keyAccount`,`keyact`, `venue`,`city`, `type`, `eventDate`, `fromDate`, `endDate`,`projectLeader`,`bdName`,`status`,`email`,`campaignBrief` ,`progress` ,`criticalIssue`,`taskDay`,`updatedBy`,`updatedOn`,`dateAdded`) SELECT id,userId,department,leadNum,leadIdentification,completeLeadNumber,campaignName,clientName, stage, keyAccount,keyact, venue,city, type, eventDate, fromDate, endDate,projectLeader,bdName,status,email,campaignBrief ,progress ,criticalIssue,taskDay,updatedBy,updatedOn,dateAdded FROM oxy2_actiondeleted WHERE id='$actionChartId'";
		$result = mysql_query($sql1);
				
		$sql2="DELETE FROM oxy2_actiondeleted WHERE id = '$actionChartId'";
		mysql_query($sql2);
		
		$sql3="UPDATE oxy2_action SET reasonType = 'NULL',leadDeletionReason = 'NULL',actionStatus='NULL' WHERE id='$actionChartId'";
		mysql_query($sql3);
		
		 header("location:./?id=3&subId=11&res=3");

		
		}
		
		if($no == "No"){
			 header("location:./?id=3&subId=11");
		}
		
		

  
  ?>
