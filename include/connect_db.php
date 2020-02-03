<?php

	//phpinfo();
	$DBHost	= "202.57.162.193";
	$DBUser	= "sa";
	$DBPassword	 = "smooth83pie";
	$DBName	= 'SMS_Log' ;
	$objConnect = mssql_connect( $DBHost,$DBUser,$DBPassword) or die("Error Connect to Database");
	$objDB = mssql_select_db($DBName , $objConnect );
	
?>