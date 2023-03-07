<script>
function fun() {
    window.print();
}
</script>
<?php
include_once("config.php");
if(isset($_POST['anstmod']))
{

	session_start();
	$name=$_SESSION['nam'];

	$regno=$_POST['regno'];
	$section=$_POST['module']; //is section
	$pepar=$_POST['type'];     // is paper name
	$sql="select * from admindata where Section='".$section."' and Pname='".$pepar."'";
	$res=mysql_query($sql) or die(mysql_error());
	$row=mysql_fetch_assoc($res);
	$file=$row["Qpaper"];
	$afile=$row["Apaper"];
	//$afile="interAdmin".$afile;
	$nof=$row["Nofquest"];
	$file="interAdmin/".$file;
	$afile="interAdmin/".$afile;
	$n="null";
	$a=$_POST['q'];
	$attendedq=$nof;

	for($i=1;$i<$nof;$i++)
	{

		if($a[$i]=="")
		{
			$a[$i]=$n;
			$attendedq=$attendedq-1;
		}
	}
	
	$count=0;
	$sql="select * from answers where Section='".$section."' and Papername='".$pepar."'";
	$res=mysql_query($sql) or die(mysql_error());
	//$row=mysql_fetch_assoc($res);
	$row=mysql_fetch_array($res);
	for($i=1;$i<$nof;$i++)
	{
		if($a[$i]==$row[$i+1])
		{
			$count=$count+1;
			$rowdata[$i]='<font color="#009900">'.$a[$i].'</font>';
		}
		else
		{
			$rowdata[$i]='<font color="#FF0000">'.$a[$i].'</font>';
		}
	}
	
	$total=$count;
	$wrong=$attendedq-$total;
	$correct=$total;
	if($nof==75)
	{

		for($i=1;$i<=$nof;$i++)
		{
			$arr.=",'$a[$i]'";
		}
	}else
	{
		for($i=1;$i<=$nof;$i++)
		{
			$arr.=",'$a[$i]'";
		}
		$nnof=75-$nof;
		for($i=1;$i<=$nnof;$i++)
		{
			$arr.=",'$n'";
		}
	}
		
		$sql="select * from sanswer where Regid='".$regno."' and Section='".$section."' and Papername='".$pepar."'";
		$res=mysql_query($sql) or die(mysql_error());
		if(mysql_num_rows($res)>0)
		{

			$row=mysql_fetch_assoc($res);
			$attempt=$row['Attempt'];
			$attempt=$attempt+1;
		}
		else
		{
			$attempt=1;
		}
		//echo $attempt;
		$sql="delete from sanswer where Regid='".$regno."' and Section='".$section."' and Papername='".$pepar."'";
		mysql_query($sql) or die(mysql_error());
		
				$sql="insert into sanswer values('".$regno."','".$section."','".$pepar."','".$attempt."','".$total."'".$arr.")";
				$res=mysql_query($sql) or die(mysql_error());
				if($total >=25 && $total <=$nof)
				{
					$result="<font color='#00CC33' size='+1'>PASS</font>";
					$total="<font color='#FF0000'  size='+1'>".$total."</font>";
				}
				else
				{
					$result="<font color='#FF0000' size='+1'>FAIL</font>";
					$total="<font color='#FF0000' size='+1'>".$total."</font>";
				}
				if($res)
				{

					session_start();
					setcookie("rid","",time()-3600);
					$_SESSION['nam']=0;
					header('Cache-Control: no-cache, must-revalidate');
					header('Pragma: no-cache');
					//header('Expires: Mon,26 Jul 1980 05:00:00 GMT');
					unset($_SESSION['nam']);
					session_destroy();
					echo '<html><head><meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/><title>Result</title><link rel="stylesheet" type="text/css" href="styles/techstyle.css" media="screen"/></head><body style="margin: 0 12%;"><div class="container"><div class="header"> <img src="styles/img/goallogo.png" alt="Goal Technologies"  width="300px" height="100px"/></div><div class="main"><div class="left"><div class="content"><h1>Result</h1><div class="quest" align="center"><div style="border:1px solid #cccccc;border-end:-1;left:0px;top:0px;width:100%;height:150px;margin-left:0px;margin-top:0px;"><font size="+1" style="font-weight:800;font-family:Comic Sans MS, cursive;">
					<table width="100%" border="0" height="100%" cellpadding="10" align="center">
					<tr align="left"><td colspan="8">Dear '.$name.', Your Test Score details is as follows</td></tr>
					<tr align="left"><td>Username:.</td><td>'.$regno.'</td><td width="100px">&nbsp;&nbsp;</td><td>Paper Name.</td><td>'.$pepar.'</td><td width="100px">&nbsp;&nbsp;</td><td>Attended Questions:.</td><td>'.$attendedq.'</td></tr>
					<tr align="left"><td>Correct Answers:.</td><td>'.$correct.'</td><td width="100px">&nbsp;&nbsp;</td><td>Wrong Answers:.</td><td>'.$wrong.'</td><td width="100px">&nbsp;&nbsp;</td><td>Total Score.</td><td>'.$total."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  [".$result."]".'</td></tr>
					</table></font></div><font size="+1"><a href="test.php">Goto Home</a></font>
					<div class="content1"><button onclick="fun()">Print</button></div>
</div></div></div>
					<div class="left1">
		  <div class="content1">'; 
					  
					  echo '<h1>Answer Paper&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
			<div class="quest1">
			  <iframe width="100%" height="100%" id="que" scrolling="yes" frameborder="1" name="que" src="interAdmin/".$afile></iframe>
			</div>
			<p align="center">&nbsp;</p>
		  </div>
		</div>

		<div class="right">
		  <div class="subnav">
			<h1>Answers</h1><p><font color="#009900">&nabla;currect answer</font><font color="#CCCCCC">&nabla;wrong answer</font><font color="#CCCCCC">&nabla;null</font>-not answered</p>
			<div id="answ"><table width="100%"><tr><th>Q.No</th><th>Key answer</th><th>Your answer</th></tr>';
			$sql="select * from answers where Section='".$section."' and Papername='".$pepar."'";
			 $res=mysql_query($sql) or die(mysql_error());
			 $row=mysql_fetch_assoc($res);
			 for($i=1;$i<$nof;$i++)
			{

				 $rowd[$i]=$row["q".$i];	 
			}
		 for($i=1;$i<$nof;$i++)
			{
				 echo '<tr style="font-size:15px;"><td>('.$i.')</td><td>'.$rowd[$i].'</td><td>'.$rowdata[$i].'</td></div></tr>';
				 //$i=$i+1;
			 }
			echo '</table></div>
		  </div>
		</div>';
					echo "<font size='+3'> Your score is  :".$total."</font>";
					

				}
				else
				{
					echo "<script type='text/javascript' language='javascript'>alert('submit failed');</script>";
				}
	
}







?>