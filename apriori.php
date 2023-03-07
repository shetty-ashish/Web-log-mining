<?php
echo "<h3>Finding Frequent Itemsets using Apriori algorithm</h3><br/><br/>";
$start = microtime(true);
include("config.php");
include("generate_combination.php");
global $numRows ;
global $data;
global $identical;
global $occur;
global $support;
global $conf;
global $output_identical;
global $frequent_count;
function getData()
{

	global $numRows;
	global $data;
	global $query;
	$numRows = mysql_num_rows($query);
	$i=0;
	while($temp = mysql_fetch_row($query))
		{
			$data[$i]=$temp;
			sort($data[$i]);
			$i++;
			
		}
//	var_dump($data);	

}
function calculate_timer()
{
global $start;
global $total;
$total = (microtime(true) - $start)*1000;
//echo $total."<br>";
}

function calculate_Identical_count()
{
	global $data;
	global $identical;
	global $numRows;
	$k=0;
	for($i=0;$i<count($data);$i++)
	{
		for($j=0;$j<count($data[$i]);$j++)
		{
			if($data[$i][$j] != '')
			{
			$temp[$k] = $data[$i][$j];
			$k++;
			}
		}
	}
	$temp1= array_count_values($temp);
	ksort($temp1);
	
	$temp2[0] = array_keys($temp1);
	$temp2[1] = array_values($temp1);
	
	// var_dump($temp2);
	for($i=0;$i<count($temp2[0]);$i++)
	{
		if($temp2[1][$i]>=$numRows)
		{
			$identical[0][$i]=$temp2[0][$i];
			$identical[1][$i]=$temp2[1][$i];
		}
	}
	if($identical == null)
	{
	echo "No Frequent Itemset Generated";
	exit("<script>alert('No Frequent Itemset Generated For Given Support')</script>");
	}
	
	
}

function calculateSupport($support)
{
	global $support;
	global $numRows;
	global $data;
	$numRows = round((count($data) * $support )/100);
	//echo $numRows;
}
function calculate_combinations()
{
	global $numRows;
	global $data;
	global $support;
	global $identical;
	global $n1;
	global $occur;
	global $t1;
	$combi = new generate_combinations;
	$n1 = count($identical[0]);
	$temp1=$identical[0];
	for($i=1;$i<=$n1;$i++)
	{
		foreach( $combi->combinations($temp1, $i) as $k ) 
		{
		$t1[]= join(',', $k);  
		//echo "<br>";
		}
	}
	global $t4;
	for($i=0;$i<count($t1);$i++)
	{
		
		$t4[$i]=explode(",",$t1[$i]);
		
	}
	global $occur;
	$occur =$t4;
	// var_dump($occur);
	
	
}


$m5=1;
function calculate_occurance_Count()
{
global $occur;global $data; global $m5;global $identical_temp;
global $identical;global $frequent_count;
// var_dump($occur);
	for($i=0;$i<count($occur);$i++)
	{
	for($j=0;$j<count($data);$j++)
		{
		
		if(count($occur[$i])==$m5)
		{
		$temp=(array_intersect($data[$j],$occur[$i]));
		if(count($temp)>$m5-1)
		$identical_temp[] =$temp;
		}
		else
		{
			$m5++;
			if(count($occur[$i])==$m5)
			{
			$temp=(array_intersect($data[$j],$occur[$i]));
			
				if(count($temp)>$m5-1)
				{
				$identical_temp[] =$temp;		
				}
			}
		}
		
		}
		
		
	}
	
	// var_dump($identical_temp);
	global $occurance_count;
	global $numRows;
	for($i=0;$i<count($identical_temp);$i++)
	{
		$occurance_count[$i] =implode($identical_temp[$i],",");
	}
	//var_dump($occurance_count);
	$c1= array_count_values($occurance_count);
	$ck2= array_keys($c1);
	$cv2= array_values($c1);
	$frequent_count[0] = $ck2;
	$frequent_count[1] = $cv2;
	// var_dump($frequent_count);
	
	$maxLen = count($identical[0]);
	$maxLen1 = count($identical[0]);
	$flag=0; $length=0;
	
	// var_dump($frequent_count);
	//echo $numRows;
	for($i=(count($frequent_count[0])-1);$i>=0;$i--)
	{
		
		if(($flag ==1) && ($length != strlen($frequent_count[0][$i])))
		break;
		if(($frequent_count[1][$i]>=$numRows))
			{
				// var_dump($frequent_count[0][$i]);
				$length=strlen($frequent_count[0][$i]);
				$flag =1;
			}
			
		
	}
	
}
function compute_output()
{
global $output_identical;
global $identical;
global $frequent_count;
global $numRows;
// var_dump($frequent_count);
	$count=1;$flag=1;$flag2=0;
	
	
	
		for($z1=0;$z1<count($frequent_count[0]);$z1++)
		{
		if($frequent_count[1][$z1]>=$numRows)
			{
				$temp = count_chars($frequent_count[0][$z1],1);
				if(array_key_exists("44",$temp))
				{
					
					if($flag ==1)
					echo "</table><br/><br/><br/><table border=1 cellspacing=1 cellpadding =1><th> &nbsp;".($count+1)." - Itemsets&nbsp;</th><th>&nbsp;Support&nbsp;</th></tr>";
					
					if($temp[44]== $count)
					{
						$flag=0;
						
						echo "<tr><td>".$frequent_count[0][$z1]."</td><td> ".$frequent_count[1][$z1]."</td></tr>";
					}
					else
					{
						$flag =1;
						$count++;
						$z1--;
					}
				}
				else
				{
					if($flag2==0)
					echo "<br><table border=1 cellspacing=1 cellpadding =1><th> &nbsp;1 - Itemset&nbsp;</th><th>&nbsp;Support&nbsp;</th>";
					echo "<tr><td>".$frequent_count[0][$z1]."</td><td> ".$frequent_count[1][$z1]."</td></tr>";
					$flag2=1;
					
				}
				
			}
		}
	global $total;
	echo "</table><br><br>Total time taken for execution (in milli seconds) = $total";
}



getData();
calculateSupport($support);
calculate_Identical_count();
calculate_combinations();
calculate_occurance_Count();
calculate_timer();
compute_output();

?>