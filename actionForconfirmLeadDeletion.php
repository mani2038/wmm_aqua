<?php
set_time_limit(300);
  include_once('inc_connection.php');
		$yes = addslashes(trim($_POST['yes']));
		$no = addslashes(trim($_POST['no']));
		
		
		if($yes == "Yes"){
			$leadIda = addslashes(trim($_POST['leadId']));
		
		$sql1="INSERT INTO oxy2_leaddeleted (`leadno`,`contact`,`companyname`,`dept`,`add1`, `ccity`, `country`,`mob`, `email`,`desg`, `othersact`, `event_city`, `event_country`,`keydel`,`specinst`,`eventbrief`,`bdstatus`,`curr`,`profit`,`revnue`,`lgs`,`beventStartDate`,`beventEndDate`,`coutelet_type`,`c_permission`,`cnumber_outlets`,`cnumberOfdays`,`ceventStartDate`,`ceventEndDate`,`creator`,`updatedby`,`updationdate`,`leadname`,`reg_time`,`creatorid`,`invdate`,`invno`,`invamount`,`paychnn`,`paymentcoll`,`paydaterece`,`paybal`,`exppaydate`,`othclient`,`invgp`,`digital_work`,`otherDigitalWork`,`retail`,`zone`,`leadtype`,`fdate`,`tdate`,`contractee1`,`contractee2`,`contractee3`,`contractee4`,`reasonType`,`leadDeletionReason`,`reason`,`leadStatus`,`id`) SELECT leadno,contact,companyname,dept,add1,ccity,country,mob,email,desg,othersact,event_city,event_country,keydel,specinst,eventbrief,bdstatus,curr,profit,revnue,lgs,beventStartDate,beventEndDate,coutelet_type,c_permission,cnumber_outlets,cnumberOfdays,ceventStartDate,ceventEndDate,creator,updatedby,updationdate,leadname,reg_time,creatorid,invdate,invno,invamount,paychnn,paymentcoll,paydaterece,paybal,exppaydate,othclient,invgp,digital_work,otherDigitalWork,retail,zone,leadtype,fdate,tdate,contractee1,contractee2,contractee3,contractee4,reasonType,leadDeletionReason,reason,leadStatus,id FROM oxy2_lead WHERE id='$leadIda'";


		$result = mysql_query($sql1);
		
		$sql2="DELETE FROM oxy2_lead WHERE id='$leadIda' AND leadStatus = '4'";

		mysql_query($sql2);
		
		 header("location:./?id=10");

		
		}
		
		if($no == "No"){
			 header("location:./?id=2&subId=20");
		}
		
		

  
  ?>