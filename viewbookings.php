<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View Bookings</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<link rel="stylesheet" href="css/registerstyle.css" type="text/css">
	<link rel="stylesheet" href="css/userprofile.css" type="text/css">
	<link rel="stylesheet" href="css/agencyhome.css" type="text/css">
</head>
<style>
table{
    border-collapse: collapse;
	width:100%;
}

table, td, th {
    border: 1px solid black;
}
th {height: 50px;}
td ,th{ padding: 15px; text-align: left;}
tr:hover {background-color: #f5f5f5}

</style>
<?php
	session_start();
	if(empty($_SESSION['username'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
	$username = $_SESSION['username'];
	$conn=mysqli_connect("localhost","root","","traveldb");
	
	//$sql = "Select spid from selects where cusername='$username' ";
	$sql = "select packagename,spid from travelpackage,selects where cusername='$username' and spid=Pid";
	$result = mysqli_query($conn,$sql);
	
?>
<body>
	<div id="background">
		<div id="page">
			<div id="header">
				<div id="logo">
					<a href="index.html"><img src="travellogo.jpg" alt="LOGO" height="112" width="118"></a>
				</div>
				<div id="navigation" style="background-size:260px 50px;">
					<ul>
						<li class="selected">
							<a href="customerhome.php">Home</a>
						</li>
						<li>
							<a href="customerlogout.php">LOGOUT</a>
						</li>
					</ul>
				</div>
			</div>
		
			<div id="contents">
				<div class="box">
					
					<div>
						<div id="profile" class="body">
							<h1>Your Bookings</h1>
							<br>
							<div id="userborder">
								<table id="usertable">
									<tbody>
									<?php
									echo "<th>PackageID</th><th> Package Name</th>";
									
									while($row = mysqli_fetch_assoc($result))
									{	echo "<tr>";
								
										echo "<td>".$row['spid']."</td>";
										echo "<td>".$row['packagename']."</td>";
										echo "</tr>";
									}
									
									?>
										
									</tbody>
								</table>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	
	</div>
</body>
</html>
?>