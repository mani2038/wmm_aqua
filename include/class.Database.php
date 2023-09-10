<?php
class Database {
	var $db_host = '';
	var $db_user = '';
	var $db_passwd = '';
	var $db_name = '';
	
	// Database handler
	var $dbh;
	// Record set handler
	var $result;
	// Constructor. If connection is not provided do connect
	function Database(){
			global $naConfig_host;
			global $naConfig_db;
			global $naConfig_user;
			global $naConfig_password;
			$this->db_host = $naConfig_host;
			$this->db_user = $naConfig_user;
			$this->db_passwd = $naConfig_password;
			$this->db_name = $naConfig_db;
			$this->DatabaseConnect();
	}
	// Connect to a database
	function DatabaseConnect(){
		// Connect, select database and return
		$this->dbh = mysqli_connect($this->db_host,$this->db_user,$this->db_passwd,$this->db_name);
		//mysqli_select_db($this->db_name,$this->dbh);
		if ( mysqli_error($this->dbh) ) return "Error while connecting to database: ".mysqli_error($this->dbh);
		return $this->dbh;
	}

	function QueryExec($statement){
		$datetimearr = getdate();
		$this->result = mysql_query($statement,$this->dbh);
		return $this->result;
	}

	function FetchObject(){
		
		return mysql_fetch_object($this->result);
	}
	
	
	// Abstract databse layer. If you want to change the databse server just change mysql_query to pg_query for example
	function Record_Count(){
		return mysql_num_rows($this->result);
	}

	function Affected_Rows(){
		return mysql_affected_rows();
	}
	// Abstract databse layer. If you want to change the databse server just change mysql_query to pg_query for example
	function SQLError(){
		return mysql_error($this->dbh);
	}


	// Abstract databse layer. If you want to change the databse server just change mysql_query to pg_query for example
	function SQLClose(){
		mysql_close($this->dbh);
	}

	function Insert_ID(){
		return mysql_insert_id($this->dbh);
	}

	function generateID(){
		return uniqid(rand());
	}

	function escapeForDatabase($myString){
	
		$myString = ereg_replace ('"','&quot;',$myString);

	return $myString;
	}

	function makeTheDateForDb($myDate){
		$dateTimeArray = explode(" ",$myDate);
		$dateArray = explode("/",$dateTimeArray[0]);
		if ($dateTimeArray[1]){
			$dateTimeArray[1] = ' '.$dateTimeArray[1];
		}
		$result = $dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0].$dateTimeArray[1];
		return $result;
	}


}

?>
