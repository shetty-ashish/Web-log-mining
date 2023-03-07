<?php
ini_set('max_execution_time',30000);//setting for maximum timeout

//providing hostname,userrname and password of MySql database
mysql_connect("localhost","root","password") or die(mysql_error());

//Provide MySql database name
mysql_select_db("apriori1") or die(mysql_error());

//Providing the table name which have Transactionl data

if($_GET['dataset']=="1")
{
$query= mysql_query("select * from w");
}
/*if($_GET['dataset']=="2")
{
$query= mysql_query("select * from w");
}
if($_GET['dataset']=="3")
{
$query= mysql_query("select * from w");
}*/

//Providing support 
global $support;
$support= 20;
?>