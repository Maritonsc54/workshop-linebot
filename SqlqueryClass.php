<?php
include('include/connect_db.php');

class SqlqueryClass{
	
	//show campaign all
	public function campaign_list(){
		$strSQL = "SELECT * FROM campaign_detail where status='1' ORDER BY prefix asc"; 
		$objQuery = mssql_query($strSQL) or die ("Error Query [".$strSQL."]");
		$result =  mssql_fetch_array($objQuery);
		return $result;
	}
	
	public function campaign_use($prefix , $date_start , $date_end){
		$strSQL = "SELECT sum(lucky) as num_total  FROM  t_sendLog WHERE success=1 and  prefix ='".$prefix."' and recievetime BETWEEN '".$date_start."' AND '".$date_end."'; "; 
		$objQuery = mssql_query($strSQL) or die ("Error Query [".$strSQL."]");
		$result =  mssql_fetch_array($objQuery);
		return $result;
	}
	
	public function campaign_by_prefix($prefix){
		$strSQL = "SELECT *  FROM  campaign_detail WHERE status=1 and  prefix ='".$prefix."'"; 
		$objQuery = mssql_query($strSQL) or die ("Error Query [".$strSQL."]");
		$result =  mssql_fetch_array($objQuery);
		return $result;
	}
}
?>