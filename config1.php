<?php
ini_set('max_execution_time',30000);//setting for maximum timeout

//providing hostname,userrname and password of MySql database
mysql_connect("localhost","root","") or die(mysql_error());

//Provide MySql database name
mysql_select_db("apriori") or die(mysql_error());

//Providing the table name which have Transactionl data
$query= mysql_query("select * from items");

//Providing support 
global $support;
$support= 20;
?>