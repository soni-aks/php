<?php
//connection
include "connection.php";
//define no. of pages per page
$results_per_page=5;
//number of results in database
$q="select * from product";
$query=mysql_query($q,$con);
$number=mysql_num_rows($query);
echo $number."<br>";
/*while($r=mysql_fetch_array($query))
{
	echo $r[4]."<br>";
}*/

//determine number of pages
$num_pages=ceil($number/$results_per_page);
echo $num_pages."<br>";
//determine visitor current page
if(!isset($_GET['$page']))
{
	$page=1;
}
else
	$page=$_GET['page'];
//determine the sql limit starting number for the results on displaying page
$this_page_result=($page-1)*$results_per_page;
//retrieve selected results from database and display them on page
$ret_query="select * from product"; //LIMIT".$this_page_result.','.$results_per_page;
$query1=mysql_query($ret_query,$con);
while($row=mysql_fetch_array($query1))
{
	echo $row[id];//." ".$row[product_name]." ".$row[product_price];
	?>
	<img src="<?php echo $row["product_image"]?>" alt="" width="180" height="220";
	<?php
}
//display the links to the pages

for($page=1;$page<$num_pages;$page++)
{
	echo $page++;
	//echo '<a href="">'." ".$page." ".'</a>';
}


?>