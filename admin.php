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
	<title>Shopping</title>
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
		
	</style>
</head>
<body>
	<div class="container">
		<div class="navbar">
			<h3>VIT <strong>Shopping</strong></h3>
			<ul class="nav nav-tabs">
			  <li role="presentation" class="active"><a href="cpanel.php">Home</a></li>
			  <li role="presentation" class="active"><a href="#">Manage Movies</a></li>
			  <li role="presentation" class="active"><a href="#">Account</a></li>
			  <li role="presentation" class="active"><a href="login.php" style="background: #f75b10; color: white;">
			  	
			  </a></li>
			</ul>
		</div>
		<h1 id="head">Admin Panel<br></h1><br>
		<h3>Entry:</h3>
		<br>
		<div id="expand">
			<form action="" method="POST">
				<table>
					<tr>
						<td style="font-size:150%">Id:</td>
						<td><input type="text" name="id" required></td>
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
						<td><input type="file" name="pcat" required></td>
					</tr>
					<tr><td><br></td></tr>
					<tr><td><br></td></tr>
					<tr>
						<td style="font-size:150%">Product Description:</td>
						<td><input type="file" name="pdes" required></td>
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
				$uname=$_POST["un"];
				$pass=$_POST["pass"];
				$q="select * from login where uname='$uname' and pass='$pass'";
				$query=mysql_query($q,$con);
				$r=mysql_num_rows($query);
				if($r>0)
				{
					header('location:admin.php');
				}
				else
				{
					echo '<script language="javascript">';
					echo 'alert("invalid username or password")';
					echo 'window.location.href="admin_login.html";';
					echo '</script>';
				}
			}
			?>
		</div>
		<div id="foot">
			<img src="images/clabs-grey.png" style="height: 25px;">
			<h4 style="margin-left: 10px;">VIT <strong>Shopping</strong></h4>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src=script.js></script>
</body>
</html>