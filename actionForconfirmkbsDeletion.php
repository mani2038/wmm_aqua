<?php
set_time_limit(300);
  include_once('inc_connection.php');
		$yes = addslashes(trim($_POST['yes']));
		$no = addslashes(trim($_POST['no']));
		
		
		if($yes == "Yes"){
			$kbsId = addslashes(trim($_POST['kbsId']));
			
		
		
		$sql1="INSERT INTO oxy2_knowledgebase_deleted(`id`,`title`,`description`,`department`,`industrialRelevance`,`type`,`createdby`,`creatorId`, `flag`, `createdOn`) SELECT id,title,description,department,industrialRelevance,type,createdby, createdby, flag,createdOn FROM oxy2_knowledgebase WHERE id='$kbsId'";
		
		
		

		$result = mysql_query($sql1);
		
		$sql2="DELETE FROM oxy2_knowledgebase WHERE id='$kbsId'";

		mysql_query($sql2);
		
		 header("location:./?id=10");

		
		}
		
		if($no == "No"){
			header("location:./?id=5&subId=3");
		}
		
		

  
  ?>