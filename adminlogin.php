<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include('connection.php');
if(isset($_POST['submit']))
{    
     
	$unam1=$_POST['username'];
	$pass2=$_POST['password'];
	echo $unam1;
	$sql="select * from admin where name='".$unam1."' and pass='".$pass2."'";
	$query=mysql_query($sql);
	
	
	if($row=mysql_fetch_assoc($query))
	{ 
	    
		
	   echo "<script type='text/javascript'>alert('Detailed login successfull');</script>";
	   echo "<script type='text/javascript'>window.location='cmp.php';</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('wrong username or password');</script>";
	   echo "<script type='text/javascript'>window.location='index.php';</script>";
		
}
}
?>
</body>
</html>