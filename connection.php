<?php
$con=mysql_connect('localhost','root','password')or die("unable to connect to database" .mysql_error());
$sel=mysql_select_db('apriori1',$con)or die("unable to select database" .mysql_error());
?>