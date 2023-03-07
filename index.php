<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login page</title>
<style type="text/css">
.sub{
	height:30px;
	width:45%;
	}


</style>
<script type="text/javascript">
function validate()
{
	var name=document.getElementById("username").value;
 var pass=document.getElementById("password").value;
	if(name=="")
	{
			alert("Username Not Entered");
			return false;
	}
	
    else if(!name.match(/^[A-Za-z]*$/))
   {   
     document.getElementById("username").focus();
	 alert("Name  must have aplbabet");
	 return false;
   }
   else if(pass=="")
	{
			alert("Password Not Entered");
			return false;
	}
	
	
	return true;
	
}
</script>	
</head>


<body style="color:#009900" bgcolor="#000000">
<center>
<h1 style="color:#0000FF">Comparision of Apriori And Reverse-Apriori in Generation of Frequent Itemsets</h1>

<form action="adminlogin.php" method="POST" onsubmit="return validate();">
<table border="1" cellspacing="30px" cellpadding="35px" bgcolor="#FFFFFF" >
<tr><td>
<label>USERNAME&nbsp;&nbsp;&nbsp;<input type="text" name="username" id="username"/></label></td></tr>
<tr><td>
<label>PASSWORD&nbsp;&nbsp;&nbsp;<input type="password" name="password" id="password"/></label></td></tr>
<tr><td><center>
<input type="submit" value="SIGN IN" name="submit" class="sub" />&nbsp;&nbsp;
<input type="reset" value="RESET" class="sub" /></center>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>

</form>
</center>


</body>

</html>
