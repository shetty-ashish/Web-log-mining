<?php

	include("config.php");
	
	
	$o_i=0;
	while($o_temp = mysql_fetch_row($query))
		{
			$o_data[$o_i]=$o_temp;
			sort($o_data[$o_i]);
			$o_i++;
			
		}
	global $o_data;

	

?>