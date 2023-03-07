<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <title>Comparision of Apriori And Reverse-Apriori in Generation of Frequent Itemsets</title>
 <script src="resources/jquery.js"></script>
 
 
 <style>
 #click{ cursor:pointer;}
 .clickopen{ background-image:url(resources/hide_data.png); background-repeat:no-repeat;}
 .clickclose{ background-image:url(resources/show_data.png); background-repeat:no-repeat;}

 </style>
 </head>

 <body style="color:#009900" bgcolor="#000000">
 <center><font color="blue"><h2>Comparision of Apriori And Reverse-Apriori in Generation of Frequent Itemsets</h2></font></center>
 <br><br>
 
 <div style="width:800px; margin:0 auto;">
 
 <div id="box" style="width:800px auto; height: auto; background-color:#000000; ">
 <?php 
 include("data.php");
 echo "<h2>Transactional data</h2>";
 echo "<table border=1 cellspacing=3 cellpadding=5 >";
	global $o_data;
	for($i=0;$i<count($o_data);$i++)
	{	
		echo "<tr>";
		for($j=0;$j<count($o_data[$i]);$j++)
		{
			echo "<td>".$o_data[$i][$j]."</td>";
			
		}echo "</tr>";
	}
	echo "</table>";
	?>
 </div>
 
 <div style="width:800px; height:100px;background-color:#000000;">
 
 <div id="click" style=" width:213px; height:90px;float:right" class="clickopen">
 </div> <hr/></div></div>
<div style="width:800px; margin:0 auto;">
 <div style="width:800px auto; height: auto; background-color:#000000; ">
 
 <?php
 echo "<a href='index1.php?dataset=".$_GET['dataset']."' style='float:right;font-size:20px;font-weight:bold' >Run Reverse-Apriori</a>";
 include("apriori.php");
 
?>
 </div></div>
 
 
 
 <script>

var clickTrue = 0;

//show dialog

$("#click").click(function () {
	document.getElementById('box').style.visibility = 'visible';
     $('.clickopen').toggleClass("clickclose");


    $('#box').animate({
    opacity: 0.75,
    height: 'toggle'
    }, 400, function() {
    // Animation complete.
    });
 });

 </script>
 
 </body>
 
 </html>