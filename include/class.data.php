<?php

class ClassData extends Database {
		//constructor
		function ClassData(){
			// Make a connection to the database
			$this->Database();
		}
		function GetQueryData($sql_pass){
			$this->QueryExec($sql_pass);
			$infoArray=array();
			while ($row = $this->FetchObject()){
				//echo "ggg".$row;
				$infoArray[] = $row;
			}
		return $infoArray;
		}
		
		function GetRecord($sql_pass){
			$this->QueryExec($sql_pass);
			$num=$this->Record_Count();
		return $num;
		}
		
		function GetInsertedRow($sql_pass){
			$this->QueryExec($sql_pass);
			$affRow=$this->Affected_Rows();
		return $affRow;
		}
		
		function GetDeletedRow($sql_pass){
			$this->QueryExec($sql_pass);
			$affRow=$this->Affected_Rows();
		return $affRow;
		}
		
		function get_session(){
		return session_id().session_id();
		}
		
	//end class
	}

?>
