<?php
session_start();
if($_SESSION['uname']=="")
{
?>
<script type="text/javascript">
window.location="admin_login.php";
</script>
<?php
}


include "connection.php";
//session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>VIT Cinema</title>
	<link rel=icon href="images/favicon.png">
	<meta name='viewport' content="width=device-width, height=device-height, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		input{
			height: 30px;
			width: initial;
		}
		td{
			width: 200px;
		}
		table{
			margin-left: 50px;
		}
		
		.button {
    background-color: #4CAF50;
    border: 1px;
    color: white;
    padding: 15px 34px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	align:center;
	border-radius:5px;
	
}
		.but
		{
		 background-color: #4CAF50;
    border: 1px;
    color: white;
		}

	
	.wrapper
	{
	height:1000px;
	}
	
	.container
	{
	float:left;
	width:700px;
	height:120%;
	}
	
	#myimage
	{
	padding-top:300px;
	height:900px;
	width:500px;
	}
	
	.nav-tabs
	{
	list-style-type:none;
	}
	
	#logout
	{
	background-color: #4CAF50;
    border: 1px;
    color: white;
    padding: 15px 34px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
	align:right;
	border-radius:5px;
	}
	
	#logout_link
	{
	color:white;
	}
	
	.navbar
	{
	align:right;	
	}
	
		
		
		
	</style>
	<script src="slider.js"></script>
</head>
<body onload='changeimage(3)'>
<!--<h1>welcome <?php echo $_SESSION['uname']?></h1>-->

  

	<div class="container">
		<div class="navbar">
			<h3>VIT <strong>Cinema</strong></h3>
			<!--<button id="logout">
				<a href="log.html" id="logout_link">Logout</a></li>
			</button>-->
			<!--<select id="logout">
  <option value="welcome">Welcome</option>
  <option value="log"><a href="log.html" id="logout_link">Logout</a></option>
  <option value="view"><a href="view.html" id="logout_link">View</a></option>
 <!-- <option value="au">Audi</option>-->
</select>
<select id="logout" onchange="window.location.href=this.value;">
  <option value="welcome">Welcome</option>
  <option value="logout.php">Logout</option>
  <option value="view.html">View</option>
 <!-- <option value="au">Audi</option>-->
</select>
			  
		<center><h1><?php echo "welcome  ".$_SESSION['uname'];?></h1>	</center>  	
			  
			</ul>
		</div>
		
		<h1 id="head">Enter Schedule:<br></h1><br>
		<br>
		<div class="but">
		</div>
		<div id="expand">
			<form action="" method="POST" enctype="multipart/form-data">
				<table>
					<tr>
						<td style="font-size:150%">Id:</td>
						<td><input type="text" name="id"></td>
					</tr>
					<tr><td><br></td></tr>
					<tr><td><br></td></tr>
					<tr>
						<td style="font-size:150%">Product name:</td>
						<td><input type="text" name="pname" required></td>
					</tr>
					<tr><td><br></td></tr>
					<tr><td><br></td></tr>
					<tr>
						<td style="font-size:150%">Product price:</td>
						<td><input type="number" name="pprice" required></td>
					</tr>
					<tr><td><br></td></tr>
					<tr><td><br></td></tr>
					<tr>
						<td style="font-size:150%">Product Quantity:</td>
						<td><input type="number" name="pqty" required></td>
					</tr>
					<tr><td><br></td></tr>
					<tr><td><br></td></tr>
					<tr>
						<td style="font-size:150%">Product Image:</td>
						<td><input type="file" name="pimg" required></td>
					</tr>
					<tr><td><br></td></tr>
					<tr><td><br></td></tr>
					<tr>
						<td style="font-size:150%">Product Category:</td>
						<!--<td><input type="text" name="pcat" required></td>-->
						<td>
						<select name="pcat">
						<option value="Gents_Closthes">Gents Closthes</option>
						<option value="Ladies_Closthes">Ladies Closthes</option>
						<option value="Kids">Kids</option>
						</td>
					</tr>
					<tr><td><br></td></tr>
					<tr><td><br></td></tr>
					<tr>
						<td style="font-size:150%">Product Description:</td>
						<!--<td><input type="file" name="pdes" required></td>-->
						<td><textarea cols="30" rows="5" name="pdes"></textarea>
						</td>
						
						
					</tr>
					<tr><td><br></td></tr>
					<tr>
						<center><td><input type="submit" name="but1" class="button" value="LOGIN"></td>></td></center>
					</tr>
				</table>
			</form>
			<br><br>
			<?php
			if(isset($_POST["but1"]))
			{
				$v1=rand(1111,9999);
				$v2=rand(1111,9999);
				$v3=$v1.$v2;
				$v3=md5($v3);
				$id=$_POST["id"];
				$pname=$_POST["pname"];
				$pprice=$_POST["pprice"];
				$pqty=$_POST["pqty"];
				//$pimg=$_POST["pimg"];
				$pcat=$_POST["pcat"];
				$pdes=$_POST["pdes"];
				$from=$_FILES["pimg"]["name"];
				$dst="./prod_image/".$v3.$from;
				move_uploaded_file($_FILES["pimg"]["tmp_name"],$dst);
				$q="insert into product values($id,'$pname',$pprice,$pqty,'$dst','$pcat','$pdes')";
				$query=mysql_query($q,$con);
				if($query)
				{
					echo "successful insert";
				}
				
			}
			?>
		</div>
		<div id="foot">
			<img src="images/clabs-grey.png" style="height: 25px;">
			<h4 style="margin-left: 10px;">VIT <strong>Cinema 2k17</strong></h4>
			<div id="footer">
				<img src="images/youtube.png">
				<h6>YouTube</h6>
				<img src="images/twitter.png">
				<h6>Twitter</h6>
				<img src="images/facebook.png">
				<h6>Facebook</h6>
			</div>
		</div>
	</div>
	
	
	<div style="text-align:center-right" class="wrapper"><img id='myimage' src='2.jpg'/></img></div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src=script.js></script>
</body>

</html>